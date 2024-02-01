<x-navbar :title="$title" activeGroup="sell" activeName="delivery">
</x-navbar>
<form action="{{ route('delivery.store', ['workspace' => $workspacename]) }}" method="POST">
    @csrf
    <input type="hidden" name="detailexport_id" id="detailexport_id"
        value="@isset($yes) {{ $data['detailexport_id'] }} @endisset">
    <div id="selectedSerialNumbersContainer"></div>
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
                    <span class="font-weight-bold">Đơn giao hàng</span>
                    <span class="mx-2"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="font-weight-bold text-secondary">Tạo đơn giao hàng</span>
                </div>
            </div>
            <div class="container-fluided z-index-block">
                <div class="row m-0">
                    <div class="dropdown">
                        <a href="{{ route('delivery.index', $workspacename) }}">
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
                            class="btn-save-print rounded d-flex align-items-center h-100 dropdown-toggle"
                            style="margin-right:10px">
                            <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                    fill="#6D7075" />
                            </svg>
                            <span class="text-button">In</span>
                        </button>
                        <div class="dropdown-menu" style="z-index: 9999;">
                            <a class="dropdown-item" href="#">Xuất Excel</a>
                            <a class="dropdown-item" href="#">Xuất PDF</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button type="submit" name="action" value="2"
                            class="btn-save-print rounded d-flex align-items-center h-100 dropdown-toggle px-2"
                            style="margin-right:10px" onclick="kiemTraFormGiaoHang(event);" id="giaoHang">
                            <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 16 16" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z"
                                    fill="#6D7075" />
                            </svg>
                            <span class="text-button">Giao hàng</span>
                        </button>
                    </div>
                    <button type="submit" name="action" value="1"
                        class="custom-btn d-flex align-items-center h-100 py-1 px-2" style="margin-right:10px"
                        onclick="kiemTraFormGiaoHang(event);" id="luuNhap">
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
        <div class="bg-filter-search text-center py-2 border-right-0">
            <span class="font-weight-bold text-secondary text-nav">THÔNG TIN SẢN PHẨM</span>
        </div>
        <section class="content">
            <div class="container-fluided">
                <section class="content">
                    <div class="container-fluided order_content">
                        <section class="multiple_action" style="display: none;">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="count_checkbox mr-5">Đã chọn 1</span>
                                <div class="row action">
                                    <div class="btn-chotdon my-2 ml-3">
                                        <button type="button" id="btn-chot"
                                            class="btn-group btn-light d-flex align-items-center h-100">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
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
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
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
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.75 15.75L2.25 2.25" stroke="#42526E" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M15.75 2.25L2.25 15.75" stroke="#42526E" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <span class="px-1">Xóa</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="btn ml-auto cancal_action">
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
                        <table class="table table-hover bg-white rounded">
                            <thead>
                                <tr>
                                    <th class="border-right p-1 border-top-0 border-bottom-0">
                                        <input class="ml-4" id="checkall" type="checkbox">
                                        <span class="text-table text-secondary">Mã sản phẩm</span>
                                    </th>
                                    <th class="border-right p-1 border-top-0 border-bottom-0">
                                        <span class="text-table text-secondary">Tên sản phẩm</span>
                                    </th>
                                    <th class="border-right p-1 border-top-0 border-bottom-0">
                                        <span class="text-table text-secondary">Đơn vị</span>
                                    </th>
                                    <th class="border-right p-1 border-top-0 border-bottom-0">
                                        <span class="text-table text-secondary">Số lượng</span>
                                    </th>
                                    <th class="border-right d-none">
                                        <span class="text-table text-secondary">Quản lý S/N</span>
                                    </th>
                                    <th class="border-right note p-1 border-top-0 border-bottom-0">
                                        <span class="text-table text-secondary">Ghi chú</span>
                                    </th>
                                    <th class="border-top-0 border-bottom-0"></th>
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
                                <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
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
                            <button type="button" data-toggle="dropdown" id="add-field-btn"
                                class="btn-save-print d-flex align-items-center h-100 py-1 px-2 rounded"
                                style="margin-right:10px">
                                <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 18 18" fill="none">
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
                                style="margin-right:10px">
                                <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 18 18" fill="none">
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
                <div class="content">
                    <div class="container-fluided">
                        <div class="row position-relative footer-total m-0">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6">
                                <div class="mt-4 w-50" style="float: right;">
                                    <div class="d-flex justify-content-between">
                                        <span class="text-table"><b>Giá trị trước thuế:</b></span>
                                        <span id="total-amount-sum" class="text-table">
                                            @isset($yes)
                                                {{ number_format($getInfoQuote->total_price) }}
                                            @endisset
                                        </span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2 align-items-center">
                                        <span class="text-table"><b>Thuế VAT:</b></span>
                                        <span id="product-tax" class="text-table">
                                            @isset($yes)
                                                {{ number_format($getInfoQuote->total_tax) }}
                                            @endisset
                                        </span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <span class="text-lg"><b>Tổng cộng:</b></span>
                                        <span><b id="grand-total" data-value="0">
                                                @isset($yes)
                                                    {{ number_format($getInfoQuote->total_tax + $getInfoQuote->total_price) }}
                                                @endisset
                                            </b></span>
                                        <input type="text" hidden="" name="totalValue" value="0"
                                            id="total">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Modal seri --}}
        <div id="list_modal">
            <div class="modal fade" id="exampleModal0" tabindex="-1" aria-labelledby="exampleModalLabel"
                style="display: none;" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Thông tin Serial Number</h5>
                            <button type="button" class="close btnclose" data-dismiss="" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table id="table_SNS">
                                <thead>
                                    <tr>
                                        <td style="width:2%"></td>
                                        <th style="width:5%">STT</th>
                                        <th style="width:100%">Serial number</th>
                                        <th style="width:3%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary check-seri" data-dismiss="">Save
                                changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                            <span class="text-table ml-2">Số báo giá</span>
                        </div>
                        <div id="show-title-guest">
                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                <span class="text-table ml-2">Khách hàng</span>
                            </div>
                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                <span class="text-table ml-2">Người đại diện</span>
                            </div>
                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                <span class="text-table ml-2">Đơn vị vận chuyển</span>
                            </div>
                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                <span class="text-table ml-2">Phí giao hàng</span>
                            </div>
                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                <span class="text-table ml-2">Ngày giao hàng</span>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                            <input type="text" placeholder="Chọn thông tin"
                                class="border-0 bg w-100 bg-input-guest py-0 px-0 numberQute" id="myInput"
                                autocomplete="off" name="quotation_number" required
                                value="@isset($yes) {{ $data['quotation_number'] }} @endisset">
                            <input type="hidden" name="detail_id" id="detail_id"
                                value="@isset($yes) {{ $data['detail_id'] }} @endisset">
                            <ul id="myUL"
                                class="bg-white position-absolute rounded shadow p-0 scroll-data list-guest"
                                style="z-index: 99;">
                                <div class="p-1">
                                    <div class="position-relative">
                                        <input type="text" placeholder="Nhập số báo giá"
                                            class="pr-4 w-100 input-search" id="companyFilter">
                                        <span id="search-icon" class="search-icon"><i
                                                class="fas fa-search text-table" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                @foreach ($numberQuote as $quote_value)
                                    <li>
                                        <a href="#" class="text-dark p-2 search-info w-100"
                                            id="{{ $quote_value->id }}" name="search-info">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span
                                                    class="text-table font-weight-bold">{{ $quote_value->quotation_number }}</span>
                                                <span>
                                                    <svg width="16" height="16" viewBox="0 0 16 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M8 2.92308C5.19582 2.92308 2.92308 5.19582 2.92308 8C2.92308 10.8042 5.19582 13.0769 8 13.0769C10.8042 13.0769 13.0769 10.8042 13.0769 8C13.0769 5.19582 10.8042 2.92308 8 2.92308ZM8 14C4.68602 14 2 11.314 2 8C2 4.68602 4.68602 2 8 2C11.314 2 14 4.68602 14 8C14 11.314 11.314 14 8 14Z"
                                                            fill="#26273B" fill-opacity="0.8" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M8.00011 4.76904C8.25501 4.76904 8.46165 4.97568 8.46165 5.23058V8.3075C8.46165 8.56241 8.25501 8.76904 8.00011 8.76904C7.74521 8.76904 7.53857 8.56241 7.53857 8.3075V5.23058C7.53857 4.97568 7.74521 4.76904 8.00011 4.76904Z"
                                                            fill="#26273B" fill-opacity="0.8" />
                                                        <circle cx="7.99991" cy="10.4616" r="0.615385"
                                                            fill="#26273B" fill-opacity="0.8" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
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
                        <div id="show-info-guest">
                            <div
                                class="d-flex align-items-center justify-content-between border border-left-0 py-1 border-top-0">
                                <input type="text" placeholder="Nhập thông tin" readonly
                                    class="border-0 bg w-100 bg-input-guest py-0 px-0 nameGuest" autocomplete="off"
                                    required
                                    value="@isset($yes){{ $getGuestbyId[0]->guest_name_display }}@endisset">
                                <input type="hidden" class="idGuest" autocomplete="off" name="guest_id"
                                    value="@isset($yes){{ $getGuestbyId[0]->id }}@endisset">
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
                                <input type="text" placeholder="Nhập thông tin" readonly
                                    class="border-0 bg w-100 bg-input-guest py-0 px-0 represent_name" autocomplete="off"
                                    required
                                    value="@isset($yes){{ $getRepresentbyId[0]->represent_name }}@endisset">
                                <input type="hidden" class="idRepresent" autocomplete="off" name="represent_id"
                                    value="@isset($yes){{ $getRepresentbyId[0]->id }}@endisset">
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
                                <input type="text" placeholder="Nhập thông tin"
                                    class="border-0 bg w-100 bg-input-guest py-0 px-0 unit_ship" autocomplete="off"
                                    name="shipping_unit">
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
                                <input type="text" placeholder="Nhập thông tin" name="shipping_fee"
                                    class="border-0 bg w-100 bg-input-guest py-0 px-0 fee_ship" autocomplete="off">
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
                                <input type="date" placeholder="Nhập thông tin" value="{{ date('Y-m-d') }}"
                                    name="date_deliver" required class="border-0 bg w-100 bg-input-guest py-0 px-0">
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
<script>
    $('#checkall').change(function() {
        $('.cb-element').prop(
            'checked', this
            .checked);
        updateMultipleActionVisibility
            ();
    });
    $('.cb-element').change(function() {
        updateMultipleActionVisibility
            ();
        if ($('.cb-element:checked')
            .length === $(
                '.cb-element')
            .length) {
            $('#checkall').prop(
                'checked', true);
        } else {
            $('#checkall').prop(
                'checked', false
            );
        }
    });
    $(document).on('click',
        '.cancal_action',
        function(e) {
            e.preventDefault();
            $('.cb-element:checked')
                .prop('checked', false);
            $('#checkall').prop(
                'checked', false);
            updateMultipleActionVisibility
                ()
        })

    function updateMultipleActionVisibility() {
        if ($('.cb-element:checked')
            .length > 0) {
            $('.multiple_action').show();
            $('.count_checkbox').text(
                'Đã chọn ' + $(
                    '.cb-element:checked'
                ).length);
        } else {
            $('.multiple_action').hide();
        }
    }
    $('.deleteProduct1').click(function() {
        $(this).closest("tr")
            .remove();
        fieldCounter--;
        calculateTotalAmount();
        calculateGrandTotal();
        var productTaxText = $(
                '#product-tax')
            .text();
        var productTaxValue =
            parseFloat(
                productTaxText
                .replace(/,/g, ''));
        var taxAmount = parseFloat((
                '.product_tax1')
            .text());
        var totalTax =
            productTaxValue -
            taxAmount;
        $('#product-tax').text(
            totalTax);
    });
    //thêm sản phẩm
    let fieldCounter = 1;
    $(document).ready(function() {
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
                "<li>" +
                "<a href='javascript:void(0);' class='text-dark d-flex justify-content-between p-2 idProduct w-100' id='{{ $product_value->id }}' name='idProduct'>" +
                "<span class='w-50'>{{ $product_value->product_name }}</span>" +
                "</a>" +
                "</li>" +
                "@endforeach" +
                "</a></ul>" +
                "<div class='d-flex align-items-center'>" +
                "<input type='text' class='border-0 px-2 py-1 w-100 product_name' autocomplete='off' required name='product_name[]'>" +
                "<input type='hidden' class='product_id' autocomplete='off' name='product_id[]'>" +
                "<div class='info-product' data-toggle='modal' data-target='#productModal'>" +
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
                "<div class='d-flex align-items-center'>" +
                "<div>" +
                "<input type='number' value='' data-product-id='' class='border-0 px-2 py-1 w-100 quantity-input' autocomplete='off' required='' name='product_qty[]'>" +
                "<input type='hidden' class='tonkho'>" +
                "<p class='text-primary text-center position-absolute inventory' style='top: 68%;'>Tồn kho: <span class='soTonKho'></span></p>" +
                "</div>" +
                "<div>" +
                "<button type='button' class='btn btn-primary open-modal-btn d-none' data-toggle='modal' data-target='#exampleModal0' style='background:transparent; border:none;'>" +
                "<svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' viewBox='0 0 32 32' fill='none'>" +
                "<rect width='32' height='32' rx='4' fill='white'></rect>" +
                "<path fill-rule='evenodd' clip-rule='evenodd' d='M11.9062 10.643C11.9062 10.2092 12.258 9.85742 12.6919 9.85742H24.2189C24.6528 9.85742 25.0045 10.2092 25.0045 10.643C25.0045 11.0769 24.6528 11.4286 24.2189 11.4286H12.6919C12.258 11.4286 11.9062 11.0769 11.9062 10.643Z' fill='#0095F6'></path>" +
                "<path fill-rule='evenodd' clip-rule='evenodd' d='M11.9062 16.4707C11.9062 16.0368 12.258 15.6851 12.6919 15.6851H24.2189C24.6528 15.6851 25.0045 16.0368 25.0045 16.4707C25.0045 16.9045 24.6528 17.2563 24.2189 17.2563H12.6919C12.258 17.2563 11.9062 16.9045 11.9062 16.4707Z' fill='#0095F6'></path>" +
                "<path fill-rule='evenodd' clip-rule='evenodd' d='M11.9062 22.2978C11.9062 21.8639 12.258 21.5122 12.6919 21.5122H24.2189C24.6528 21.5122 25.0045 21.8639 25.0045 22.2978C25.0045 22.7317 24.6528 23.0834 24.2189 23.0834H12.6919C12.258 23.0834 11.9062 22.7317 11.9062 22.2978Z' fill='#0095F6'></path>" +
                "<path fill-rule='evenodd' clip-rule='evenodd' d='M6.6665 10.6431C6.6665 9.91981 7.25282 9.3335 7.97607 9.3335C8.69932 9.3335 9.28563 9.91981 9.28563 10.6431C9.28563 11.3663 8.69932 11.9526 7.97607 11.9526C7.25282 11.9526 6.6665 11.3663 6.6665 10.6431ZM6.6665 16.4705C6.6665 15.7473 7.25282 15.161 7.97607 15.161C8.69932 15.161 9.28563 15.7473 9.28563 16.4705C9.28563 17.1938 8.69932 17.7801 7.97607 17.7801C7.25282 17.7801 6.6665 17.1938 6.6665 16.4705ZM7.97607 20.9884C7.25282 20.9884 6.6665 21.5747 6.6665 22.298C6.6665 23.0212 7.25282 23.6075 7.97607 23.6075C8.69932 23.6075 9.28563 23.0212 9.28563 22.298C9.28563 21.5747 8.69932 20.9884 7.97607 20.9884Z' fill='#0095F6'></path>" +
                "</svg>" +
                "</button>" +
                "</div>" +
                "</div>" +
                "</td>" +
                "</td>" +
                "<td class='text-center ui-sortable-handle d-none'>" +
                "<input class='check-add-sn' type='checkbox' name='cbSeri[]' value='1'>" +
                "</td>"
            );
            const donGia = $(
                "<td class='border border-bottom-0 position-relative d-none'>" +
                "<input type='text' class='border-0 px-2 py-1 w-100 product_price' autocomplete='off' name='product_price[]'>" +
                "<p class='text-primary text-right position-absolute transaction' style='top: 68%;right: 5%;'>Giao dịch gần đây</p>" +
                "</td>"
            );
            const thue = $(
                "<td class='border border-bottom-0 px-4 d-none'>" +
                "<select name='product_tax[]' class='border-0 text-center product_tax'>" +
                "<option value='0'>0%</option>" +
                "<option value='8'>8%</option>" +
                "<option value='10'>10%</option>" +
                "<option value='99'>NOVAT</option>" +
                "</select>" +
                "</td>"
            );
            const thanhTien = $(
                "<td class='border border-bottom-0 d-none'><input type='text' readonly class='border-0 px-2 py-1 w-100 total-amount'>" +
                "</td><td class='border-top border-secondary p-0 bg-secondary Daydu d-none' style='width:1%;'></td>"
            );
            const option = $(
                "<td class='border border-bottom-0 border-right-0 text-right'>" +
                "<svg width='17' height='17' viewBox='0 0 17 17' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
                "<path fill-rule='evenodd' clip-rule='evenodd' d='M13.1417 6.90625C13.4351 6.90625 13.673 7.1441 13.673 7.4375C13.673 7.47847 13.6682 7.5193 13.6589 7.55918L12.073 14.2992C11.8471 15.2591 10.9906 15.9375 10.0045 15.9375H6.99553C6.00943 15.9375 5.15288 15.2591 4.92702 14.2992L3.34113 7.55918C3.27393 7.27358 3.45098 6.98757 3.73658 6.92037C3.77645 6.91099 3.81729 6.90625 3.85826 6.90625H13.1417ZM9.03125 1.0625C10.4983 1.0625 11.6875 2.25175 11.6875 3.71875H13.8125C14.3993 3.71875 14.875 4.19445 14.875 4.78125V5.3125C14.875 5.6059 14.6371 5.84375 14.3438 5.84375H2.65625C2.36285 5.84375 2.125 5.6059 2.125 5.3125V4.78125C2.125 4.19445 2.6007 3.71875 3.1875 3.71875H5.3125C5.3125 2.25175 6.50175 1.0625 7.96875 1.0625H9.03125ZM9.03125 2.65625H7.96875C7.38195 2.65625 6.90625 3.13195 6.90625 3.71875H10.0938C10.0938 3.13195 9.61805 2.65625 9.03125 2.65625Z' fill='#6B6F76'/>" +
                "</svg>" +
                "</td>" +
                "<td style='display:none;'><input type='text' class='product_tax1'></td>"
            );
            const heSoNhan = $(
                "<td class='border border-bottom-0 position-relative product_ratio d-none'>" +
                "<input type='text' class='border-0 px-2 py-1 w-100 heSoNhan' autocomplete='off' name='product_ratio[]'>" +
                "</td>"
            );
            const giaNhap = $(
                "<td class='border border-bottom-0 position-relative price_import d-none'>" +
                "<input type='text' class='border-0 px-2 py-1 w-100 giaNhap' autocomplete='off' name='price_import[]'>" +
                "</td>"
            );
            const ghiChu = $(
                "<td class='border border-bottom-0 position-relative note p-1'>" +
                "<input type='text' class='border-0 py-1 w-100' placeholder='Nhập ghi chú' name='product_note[]'>" +
                "</td>"
            );
            // Gắn các phần tử vào hàng mới
            newRow.append(maSanPham, tenSanPham, dvTinh,
                soLuong, donGia, thue, thanhTien, heSoNhan, giaNhap, ghiChu, option
            );
            $("#dynamic-fields").before(newRow);
            // Tăng giá trị fieldCounter
            fieldCounter++;

            //kéo thả vị trí sản phẩm
            $("table tbody").sortable({
                axis: "y",
                handle: "td",
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
                    $('.count_checkbox').text('Đã chọn ' + $('.cb-element:checked').length);
                } else {
                    $('.multiple_action').hide();
                }
            }

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
                $('.transaction').hide();
                $('.idProduct').click(function() {
                    var productCode = $(this).closest('tr').find('.product_code');
                    var productName = $(this).closest('tr').find('.product_name');
                    var productUnit = $(this).closest('tr').find('.product_unit');
                    var productPrice = $(this).closest('tr').find('.product_price');
                    var thue = $(this).closest('tr').find('.product_tax');
                    var product_id = $(this).closest('tr').find('.product_id');
                    var tonkho = $(this).closest('tr').find('.tonkho');
                    var soTonKho = $(this).closest('tr').find('.soTonKho');
                    var idProduct = $(this).attr('id');
                    var currentRow = $(this).closest('tr');
                    $.ajax({
                        url: '{{ route('getProductFromQuote') }}',
                        type: 'GET',
                        data: {
                            idProduct: idProduct
                        },
                        success: function(data) {
                            if (Array.isArray(data) && data.length > 0) {
                                console.log(data);
                                var productData = data[0];
                                var seriProArray = productData.seri_pro;
                                productCode.val(productData.product_code);
                                productName.val(productData.product_name);
                                productUnit.val(productData.product_unit);
                                productPrice.val(productData.product_price_export)
                                thue.val(productData.product_tax);
                                product_id.val(productData.id);
                                tonkho.val(productData.product_inventory);
                                soTonKho.text(productData
                                    .product_inventory == null ? 0 :
                                    productData
                                    .product_inventory);
                                // Cập nhật ID của hàng (row)
                                var newRowID = 'dynamic-row-' + productData
                                    .id;
                                $(this).closest('tr').attr('id', newRowID);
                                var dataTarget = '#exampleModal' +
                                    productData.id;
                                currentRow.find('.add-seri-number').attr(
                                    'data-target', dataTarget);
                                var dataProduct = '#exampleModal' +
                                    productData.id;
                                currentRow.find('.add-seri-number').attr(
                                    'data-target', dataTarget);
                                var quantityInput = currentRow.find(
                                    '.quantity-input');
                                quantityInput.attr('data-product-id',
                                    productData.id);
                                //Ẩn/hiện button S/N
                                var rowElement = $(`#${newRowID}`);
                                if (seriProArray && seriProArray.length >
                                    0 && seriProArray[0] !== null) {
                                    currentRow.find('.open-modal-btn')
                                        .removeClass('d-none');
                                    currentRow.find(`.check-add-sn`)
                                        .prop('disabled', true);
                                } else {
                                    currentRow.find('.open-modal-btn')
                                        .addClass('d-none');
                                    currentRow.find(`.check-add-sn`)
                                        .prop('disabled', false);
                                }
                                //Hiện SN theo sản phẩm
                                $('.open-modal-btn').off('click').on(
                                    'click',
                                    function() {
                                        var trElement = $(this)
                                            .closest('tr');
                                        var productInput = trElement
                                            .find('.product_id');
                                        var productId = productInput
                                            .val();
                                        var selectedSerialNumbersForProduct =
                                            selectedSerialNumbers[
                                                productId] || [];
                                        var qty_enter = trElement
                                            .find('.quantity-input')
                                            .val();
                                        $("#exampleModal0 .modal-body tbody")
                                            .empty();

                                        $.ajax({
                                            url: "{{ route('getProductSeri') }}",
                                            method: 'GET',
                                            data: {
                                                productId: productId,
                                            },
                                            success: function(
                                                response
                                            ) {
                                                response
                                                    .forEach(
                                                        function(
                                                            sn
                                                        ) {
                                                            var snId =
                                                                parseInt(
                                                                    sn
                                                                    .id
                                                                );
                                                            var selectedSerialNumbersForProductInt =
                                                                selectedSerialNumbersForProduct
                                                                .map(
                                                                    function(
                                                                        value
                                                                    ) {
                                                                        return parseInt(
                                                                            value
                                                                        );
                                                                    }
                                                                );
                                                            var isChecked =
                                                                selectedSerialNumbersForProductInt
                                                                .includes(
                                                                    snId
                                                                );
                                                            var newRow = `<tr style="">
                        <td class="ui-sortable-handle">
                            <input type="checkbox" class="check-item" value="${sn.id}" ${isChecked ? 'checked' : ''}>
                        </td>
                        <td class="ui-sortable-handle">${sn.id}</td>
                        <td class="ui-sortable-handle">
                            <input readonly class="form-control w-25" type="text" value="${sn.serinumber}">
                        </td>
                    </tr>`;
                                                            $("#exampleModal0 .modal-body tbody")
                                                                .append(
                                                                    newRow
                                                                );
                                                        }
                                                    );
                                                $('.check-item')
                                                    .on('change',
                                                        function() {
                                                            event
                                                                .stopPropagation();
                                                            var checkedCheckboxes =
                                                                $(
                                                                    '.check-item:checked'
                                                                )
                                                                .length;
                                                            var serialNumberId =
                                                                $(
                                                                    this
                                                                )
                                                                .val();

                                                            if (checkedCheckboxes >
                                                                qty_enter
                                                            ) {
                                                                $(this)
                                                                    .prop(
                                                                        'checked',
                                                                        false
                                                                    );
                                                            } else {
                                                                if ($(
                                                                        this
                                                                    )
                                                                    .is(
                                                                        ':checked'
                                                                    )
                                                                ) {
                                                                    if (!
                                                                        selectedSerialNumbers[
                                                                            productId
                                                                        ]
                                                                    ) {
                                                                        selectedSerialNumbers
                                                                            [
                                                                                productId
                                                                            ] = [];
                                                                    }

                                                                    selectedSerialNumbers
                                                                        [
                                                                            productId
                                                                        ]
                                                                        .push(
                                                                            serialNumberId
                                                                        );

                                                                    // Tạo một trường input ẩn mới và đặt giá trị
                                                                    var newInput =
                                                                        $('<input>', {
                                                                            type: 'hidden',
                                                                            name: 'selected_serial_numbers[]',
                                                                            value: serialNumberId,
                                                                            'data-product-id': productId,
                                                                        });

                                                                    // Thêm trường input mới vào container
                                                                    $('#selectedSerialNumbersContainer')
                                                                        .append(
                                                                            newInput
                                                                        );
                                                                } else {
                                                                    // Nếu checkbox bị bỏ chọn, loại bỏ Serial Number khỏi danh sách cho sản phẩm
                                                                    if (selectedSerialNumbers[
                                                                            productId
                                                                        ]) {
                                                                        selectedSerialNumbers
                                                                            [
                                                                                productId
                                                                            ] =
                                                                            selectedSerialNumbers[
                                                                                productId
                                                                            ]
                                                                            .filter(
                                                                                function(
                                                                                    item
                                                                                ) {
                                                                                    return item !==
                                                                                        serialNumberId;
                                                                                }
                                                                            );

                                                                        // Xóa trường input ẩn tương ứng
                                                                        $('input[name="selected_serial_numbers[]"][value="' +
                                                                                serialNumberId +
                                                                                '"]'
                                                                            )
                                                                            .remove();
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    );
                                                // Xoá sự kiện click trước đó nếu có
                                                $('.check-seri')
                                                    .off(
                                                        'click'
                                                    )
                                                    .on('click',
                                                        function() {
                                                            var checkedCheckboxes =
                                                                $(
                                                                    '.check-item:checked'
                                                                )
                                                                .length;
                                                            var check_item =
                                                                $(
                                                                    '.check-item'
                                                                );
                                                            if (check_item
                                                                .length >
                                                                0
                                                            ) {
                                                                if (checkedCheckboxes <
                                                                    qty_enter
                                                                ) {
                                                                    alert
                                                                        (
                                                                            'Vui lòng chọn đủ serial number theo số lượng xuất!'
                                                                        );
                                                                    // Không cho phép đóng modal khi có lỗi
                                                                    return false;
                                                                } else if (
                                                                    checkedCheckboxes ==
                                                                    qty_enter
                                                                ) {
                                                                    // Kiểm tra xem nút được nhấn có class 'check-seri' không
                                                                    if ($(
                                                                            this
                                                                        )
                                                                        .hasClass(
                                                                            'check-seri'
                                                                        )
                                                                    ) {
                                                                        $(this)
                                                                            .attr(
                                                                                'data-dismiss',
                                                                                'modal'
                                                                            );
                                                                    }
                                                                }
                                                            } else {
                                                                $(this)
                                                                    .attr(
                                                                        'data-dismiss',
                                                                        'modal'
                                                                    );
                                                            }
                                                        }
                                                    );

                                                // Xoá sự kiện click trước đó nếu có
                                                $('.btnclose')
                                                    .off(
                                                        'click'
                                                    )
                                                    .on('click',
                                                        function() {
                                                            var checkedCheckboxes =
                                                                $(
                                                                    '.check-item:checked'
                                                                )
                                                                .length;
                                                            var check_item =
                                                                $(
                                                                    '.check-item'
                                                                );
                                                            if (check_item
                                                                .length >
                                                                0
                                                            ) {
                                                                if (checkedCheckboxes <
                                                                    qty_enter
                                                                ) {
                                                                    alert
                                                                        (
                                                                            'Vui lòng chọn đủ serial number theo số lượng xuất!'
                                                                        );
                                                                    // Không cho phép đóng modal khi có lỗi
                                                                    return false;
                                                                } else if (
                                                                    checkedCheckboxes ==
                                                                    qty_enter
                                                                ) {
                                                                    $('.btnclose')
                                                                        .attr(
                                                                            'data-dismiss',
                                                                            'modal'
                                                                        );
                                                                }
                                                            } else {
                                                                $('.btnclose')
                                                                    .attr(
                                                                        'data-dismiss',
                                                                        'modal'
                                                                    );
                                                            }
                                                        }
                                                    );

                                            }
                                        });
                                    });
                                //Hủy checked
                                if (productData.check_seri == 1) {
                                    currentRow.find(`.check-add-sn`)
                                        .prop('checked', true);
                                } else {
                                    currentRow.find(`.check-add-sn`)
                                        .prop('checked', false);
                                }
                                //Kiểm tra đã thêm seri chưa
                                $('#luuNhap').off('click').on('click',
                                    function(e) {
                                        var
                                            insufficientSeriProducts = [];
                                        $(".bg-white.addProduct")
                                            .each(function() {
                                                var checkbox =
                                                    $(this)
                                                    .find(
                                                        ".check-add-sn"
                                                    );
                                                // Trường hợp chọn seri
                                                if (checkbox
                                                    .prop(
                                                        "checked"
                                                    ) &&
                                                    checkbox
                                                    .prop(
                                                        "disabled"
                                                    )) {
                                                    var quantityValue =
                                                        parseFloat(
                                                            $(
                                                                this
                                                            )
                                                            .find(
                                                                ".quantity-input"
                                                            )
                                                            .val()
                                                        );
                                                    var productId =
                                                        $(this)
                                                        .find(
                                                            ".product_id"
                                                        )
                                                        .val();
                                                    var productName =
                                                        $(this)
                                                        .find(
                                                            ".product_name"
                                                        )
                                                        .val();

                                                    for (var i =
                                                            0; i <
                                                        quantityValue; i++
                                                    ) {
                                                        var isSeriInputExist =
                                                            $(
                                                                `input[name="selected_serial_numbers[]"][data-product-id="${productId}"]:eq(${i})`
                                                            )
                                                            .length >
                                                            0;

                                                        if (!
                                                            isSeriInputExist
                                                        ) {
                                                            insufficientSeriProducts
                                                                .push(
                                                                    productName
                                                                );
                                                            break;
                                                        }
                                                    }
                                                }
                                            });

                                        // Nếu có sản phẩm không đủ "seri", hiển thị thông báo
                                        if (insufficientSeriProducts
                                            .length > 0) {
                                            alert(
                                                `Số lượng "seri" không đủ cho các sản phẩm: ${insufficientSeriProducts.join(", ")}`
                                            );
                                            e.preventDefault();
                                        } else {
                                            var allFieldsFilled = true;

                                            $('.addProduct').each(
                                                function() {
                                                    var productName =
                                                        $(this)
                                                        .find(
                                                            '.product_name'
                                                        ).val();
                                                    var productUnit =
                                                        $(this)
                                                        .find(
                                                            '.product_unit'
                                                        ).val();
                                                    var productQty =
                                                        $(this)
                                                        .find(
                                                            '.quantity-input'
                                                        ).val();

                                                    if (productName ===
                                                        '' ||
                                                        productUnit ===
                                                        '' ||
                                                        productQty ===
                                                        '') {
                                                        allFieldsFilled
                                                            = false;
                                                        return false;
                                                    }
                                                });
                                            if (allFieldsFilled) {
                                                $('.check-add-sn:checked[disabled]')
                                                    .prop('disabled',
                                                        false);
                                            } else {
                                                console.log(
                                                    'Vui lòng điền đầy đủ thông tin cho mỗi sản phẩm.'
                                                );
                                            }
                                        }
                                    });
                                $('#giaoHang').off('click').on('click',
                                    function(e) {
                                        var
                                            insufficientSeriProducts = [];
                                        var
                                            invalidInventoryProducts = [];

                                        $(".bg-white.addProduct").each(
                                            function() {
                                                var soTonKho =
                                                    parseFloat($(
                                                            this)
                                                        .find(
                                                            ".soTonKho"
                                                        ).text()
                                                    );
                                                var checkbox = $(
                                                    this).find(
                                                    ".check-add-sn"
                                                );

                                                var quantity =
                                                    parseFloat(
                                                        $(this)
                                                        .find(
                                                            ".quantity-input"
                                                        )
                                                        .val());
                                                var productNameInventory =
                                                    $(this)
                                                    .find(
                                                        ".product_name"
                                                    ).val();
                                                // Kiểm tra số lượng tồn kho
                                                if (quantity >
                                                    soTonKho) {
                                                    invalidInventoryProducts
                                                        .push(
                                                            productNameInventory
                                                        );
                                                }

                                                if (checkbox.prop(
                                                        "checked"
                                                    ) &&
                                                    checkbox.prop(
                                                        "disabled")
                                                ) {
                                                    var quantityValue =
                                                        parseFloat(
                                                            $(this)
                                                            .find(
                                                                ".quantity-input"
                                                            )
                                                            .val());
                                                    var productId =
                                                        $(this)
                                                        .find(
                                                            ".product_id"
                                                        ).val();
                                                    var productName =
                                                        $(this)
                                                        .find(
                                                            ".product_name"
                                                        ).val();

                                                    for (var i =
                                                            0; i <
                                                        quantityValue; i++
                                                    ) {
                                                        var isSeriInputExist =
                                                            $(
                                                                `input[name="selected_serial_numbers[]"][data-product-id="${productId}"]:eq(${i})`
                                                            )
                                                            .length >
                                                            0;

                                                        if (!
                                                            isSeriInputExist
                                                        ) {
                                                            insufficientSeriProducts
                                                                .push(
                                                                    productName
                                                                );
                                                            break;
                                                        }
                                                    }
                                                }
                                            });

                                        // Hiển thị thông báo nếu có sản phẩm không đủ "seri"
                                        if (insufficientSeriProducts
                                            .length > 0) {
                                            alert(
                                                `Số lượng "seri" không đủ cho các sản phẩm: ${insufficientSeriProducts.join(", ")}`
                                            );
                                            e.preventDefault();
                                        } else {
                                            // Hiển thị thông báo nếu không đủ số lượng tồn kho
                                            if (invalidInventoryProducts
                                                .length > 0) {
                                                alert("Không đủ số lượng tồn kho cho các sản phẩm:\n" +
                                                    invalidInventoryProducts
                                                    .join(', '));
                                                e.preventDefault();
                                            } else {
                                                // Tiếp tục kiểm tra thông tin sản phẩm và submit form nếu hợp lệ
                                                var allFieldsFilled =
                                                    true;

                                                $('.addProduct').each(
                                                    function() {
                                                        var productName =
                                                            $(this)
                                                            .find(
                                                                '.product_name'
                                                            )
                                                            .val();
                                                        var productUnit =
                                                            $(this)
                                                            .find(
                                                                '.product_unit'
                                                            )
                                                            .val();
                                                        var productQty =
                                                            $(this)
                                                            .find(
                                                                '.quantity-input'
                                                            )
                                                            .val();

                                                        if (productName ===
                                                            '' ||
                                                            productUnit ===
                                                            '' ||
                                                            productQty ===
                                                            '') {
                                                            allFieldsFilled
                                                                =
                                                                false;
                                                            return false;
                                                        }
                                                    });

                                                if (allFieldsFilled) {
                                                    $('.check-add-sn:checked[disabled]')
                                                        .prop(
                                                            'disabled',
                                                            false);
                                                    document
                                                        .getElementById(
                                                            'deliveryForm'
                                                        ).submit();
                                                } else {
                                                    console.log(
                                                        'Vui lòng điền đầy đủ thông tin cho mỗi sản phẩm.'
                                                    );
                                                }
                                            }
                                        }
                                    });
                            } else {
                                console.error(
                                    'Invalid or empty data structure.');
                            }
                        }.bind(this),
                        error: function(xhr, status, error) {
                            console.error('Error fetching product data:',
                                error);
                        }
                    });
                });
            });

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
    //hiện, tìm kiếm, ẩn danh sách số báo giá khi click trường tìm kiếm
    $("#myUL").hide();
    $(document).ready(function() {
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
    });

    var selectedSerialNumbers = [];
    //Lấy thông tin từ số báo giá
    $(document).ready(function() {
        $('#show-info-guest').hide();
        $('#show-title-guest').hide();
        $('.search-info').click(function(event, idQuote) {
            if (idQuote) {
                idQuote = idQuote
            } else {
                idQuote = parseInt($(this).attr('id'), 10);
            }
            $.ajax({
                url: '{{ route('getInfoQuote') }}',
                type: 'GET',
                data: {
                    idQuote: idQuote
                },
                success: function(data) {
                    $('.idRepresent').val(data.represent_id)
                    $('.numberQute').val(data.quotation_number)
                    $('.nameGuest').val(data.guest_name_display)
                    $('.represent_name').val(data.represent_name)
                    $('#show-info-guest').show();
                    $('#show-title-guest').show();
                    $.ajax({
                        url: '{{ route('getProductQuote') }}',
                        type: 'GET',
                        data: {
                            idQuote: idQuote
                        },
                        success: function(data) {
                            $(".addProduct").remove();
                            $.each(data, function(index, item) {
                                var totalTax = parseFloat(item
                                    .total_tax) || 0;
                                var totalPrice = parseFloat(item
                                    .total_price) || 0;
                                var grandTotal = totalTax + totalPrice;
                                $(".idGuest").val(item.guest_id);
                                $("#detailexport_id").val(item.maXuat);
                                $("#total-amount-sum").text(
                                    formatCurrency(totalPrice));
                                $("#product-tax").text(formatCurrency(
                                    totalTax));
                                $("#grand-total").text(formatCurrency(
                                    grandTotal));
                                $("#voucher").val(formatCurrency(item
                                    .discount == null ? 0 : item
                                    .discount));
                                $("#transport_fee").val(formatCurrency(
                                    item.transfer_fee == null ?
                                    0 : item.transfer_fee));
                                var newRow = `
                                <tr id="dynamic-row-${item.maSP}" class="bg-white addProduct">
                            <td class="border border-left-0 border-bottom-0 position-relative">
                                <div class="d-flex w-100 justify-content-between align-items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9 3C7.89543 3 7 3.89543 7 5C7 6.10457 7.89543 7 9 7C10.1046 7 11 6.10457 11 5C11 3.89543 10.1046 3 9 3Z" fill="#42526E"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9 10C7.89543 10 7 10.8954 7 12C7 13.1046 7.89543 14 9 14C10.1046 14 11 13.1046 11 12C11 10.8954 10.1046 10 9 10Z" fill="#42526E"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9 17C7.89543 17 7 17.8954 7 19C7 20.1046 7.89543 21 9 21C10.1046 21 11 20.1046 11 19C11 17.8954 10.1046 17 9 17Z" fill="#42526E"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 3C13.8954 3 13 3.89543 13 5C13 6.10457 13.8954 7 15 7C16.1046 7 17 6.10457 17 5C17 3.89543 16.1046 3 15 3Z" fill="#42526E"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 10C13.8954 10 13 10.8954 13 12C13 13.1046 13.8954 14 15 14C16.1046 14 17 13.1046 17 12C17 10.8954 16.1046 10 15 10Z" fill="#42526E"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 17C13.8954 17 13 17.8954 13 19C13 20.1046 13.8954 21 15 21C16.1046 21 17 20.1046 17 19C17 17.8954 16.1046 17 15 17Z" fill="#42526E"></path>
                                    </svg>
                                    <input type="checkbox" class="cb-element">
                                    <input type="text" value="${item.product_code == null ? '' : item.product_code}" readonly autocomplete="off" class="border-0 px-2 py-1 w-75 product_code" name="product_code[]">
                                </div>
                            </td>
                            <td class="border border-bottom-0 position-relative">
                                <div class="d-flex align-items-center">
                                    <input type="text" value="${item.product_name}" readonly class="border-0 px-2 py-1 w-100 product_name" autocomplete="off" required="" name="product_name[]">
                                    <input type="hidden" class="product_id" value="${item.maSP}" autocomplete="off" name="product_id[]">
                                    <div class="info-product" data-toggle="modal" data-target="#productModal">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1704_35239)">
                                        <path d="M7.99996 1.69596C6.32803 1.69596 4.72458 2.36012 3.54235 3.54235C2.36012 4.72458 1.69596 6.32803 1.69596 7.99996C1.69596 9.67188 2.36012 11.2753 3.54235 12.4576C4.72458 13.6398 6.32803 14.304 7.99996 14.304C9.67188 14.304 11.2753 13.6398 12.4576 12.4576C13.6398 11.2753 14.304 9.67188 14.304 7.99996C14.304 6.32803 13.6398 4.72458 12.4576 3.54235C11.2753 2.36012 9.67188 1.69596 7.99996 1.69596ZM0.303955 7.99996C0.303955 5.95885 1.11478 4.00134 2.55806 2.55806C4.00134 1.11478 5.95885 0.303955 7.99996 0.303955C10.0411 0.303955 11.9986 1.11478 13.4418 2.55806C14.8851 4.00134 15.696 5.95885 15.696 7.99996C15.696 10.0411 14.8851 11.9986 13.4418 13.4418C11.9986 14.8851 10.0411 15.696 7.99996 15.696C5.95885 15.696 4.00134 14.8851 2.55806 13.4418C1.11478 11.9986 0.303955 10.0411 0.303955 7.99996Z" fill="#282A30"></path><path d="M8.08001 4.96596C7.91994 4.95499 7.75932 4.97706 7.60814 5.0308C7.45696 5.08454 7.31845 5.1688 7.20121 5.27834C7.08398 5.38788 6.99053 5.52037 6.92667 5.66756C6.86281 5.81475 6.82991 5.97351 6.83001 6.13396C6.83001 6.31868 6.75663 6.49584 6.62601 6.62646C6.49539 6.75708 6.31824 6.83046 6.13351 6.83046C5.94879 6.83046 5.77163 6.75708 5.64101 6.62646C5.51039 6.49584 5.43701 6.31868 5.43701 6.13396C5.43691 5.66404 5.56601 5.20314 5.81019 4.80164C6.05436 4.40014 6.40422 4.0735 6.82152 3.85743C7.23881 3.64136 7.70748 3.54417 8.17629 3.57649C8.64509 3.60881 9.09599 3.76939 9.47968 4.04069C9.86338 4.31198 10.1651 4.68354 10.3519 5.11475C10.5386 5.54595 10.6033 6.02021 10.5387 6.48567C10.4741 6.95113 10.2828 7.38987 9.98568 7.75394C9.68857 8.11801 9.29708 8.39338 8.85401 8.54996C8.8079 8.56649 8.76805 8.59691 8.73993 8.63702C8.71182 8.67713 8.69682 8.72497 8.69701 8.77396V9.39996C8.69701 9.58468 8.62363 9.76184 8.49301 9.89246C8.36239 10.0231 8.18524 10.0965 8.00051 10.0965C7.81579 10.0965 7.63863 10.0231 7.50801 9.89246C7.37739 9.76184 7.30401 9.58468 7.30401 9.39996V8.77396C7.30392 8.43693 7.4083 8.10815 7.60279 7.83289C7.79727 7.55764 8.0723 7.34944 8.39001 7.23696C8.64354 7.14711 8.85837 6.97265 8.99832 6.74296C9.13828 6.51326 9.19482 6.24235 9.15843 5.97585C9.12203 5.70935 8.99492 5.46352 8.7985 5.27977C8.60208 5.09601 8.34835 4.98454 8.08001 4.96596Z" fill="#282A30"></path><path d="M8.05005 11.571C8.00257 11.571 7.95705 11.5898 7.92348 11.6234C7.88991 11.657 7.87105 11.7025 7.87105 11.75C7.87105 11.7974 7.88991 11.843 7.92348 11.8765C7.95705 11.9101 8.00257 11.929 8.05005 11.929C8.09752 11.929 8.14305 11.9101 8.17662 11.8765C8.21019 11.843 8.22905 11.7974 8.22905 11.75C8.22905 11.7025 8.21019 11.657 8.17662 11.6234C8.14305 11.5898 8.09752 11.571 8.05005 11.571ZM8.05005 12.5C8.14854 12.5 8.24607 12.4806 8.33706 12.4429C8.42805 12.4052 8.51073 12.3499 8.58038 12.2803C8.65002 12.2106 8.70527 12.128 8.74296 12.037C8.78065 11.946 8.80005 11.8484 8.80005 11.75C8.80005 11.6515 8.78065 11.5539 8.74296 11.4629C8.70527 11.3719 8.65002 11.2893 8.58038 11.2196C8.51073 11.15 8.42805 11.0947 8.33706 11.057C8.24607 11.0194 8.14854 11 8.05005 11C7.85114 11 7.66037 11.079 7.51972 11.2196C7.37907 11.3603 7.30005 11.551 7.30005 11.75C7.30005 11.9489 7.37907 12.1396 7.51972 12.2803C7.66037 12.4209 7.85114 12.5 8.05005 12.5Z" fill="#282A30"></path></g><defs><clipPath id="clip0_1704_35239"><rect width="16" height="16" fill="white"></rect></clipPath></defs>
                                    </svg>
                                    </div>
                                </div>
                            </td>
                            <td class="border border-bottom-0">
                                <input type="text" value="${item.product_unit}" readonly autocomplete="off" class="border-0 px-2 py-1 w-100 product_unit" required="" name="product_unit[]">
                            </td>
                            <td class="border border-bottom-0 position-relative">
                                <div class="d-flex align-items-center">
                                    <div>
                                <input type="number" value="${item.soLuongCanGiao}" data-product-id="${item.maSP}" class="border-0 px-2 py-1 w-100 quantity-input" autocomplete="off" required="" name="product_qty[]">
                                <input type="hidden" class="tonkho">
                                <p class="text-primary text-center position-absolute inventory" style="top: 68%;">Tồn kho: <span class="soTonKho">${item.product_inventory == null ? 0 : item.product_inventory}</span></p>
                                </div>  
                                <div>
                                <button type="button" class="btn btn-primary open-modal-btn" data-toggle="modal" data-target="#exampleModal0" style="background:transparent; border:none;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                        <rect width="32" height="32" rx="4" fill="white"></rect>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9062 10.643C11.9062 10.2092 12.258 9.85742 12.6919 9.85742H24.2189C24.6528 9.85742 25.0045 10.2092 25.0045 10.643C25.0045 11.0769 24.6528 11.4286 24.2189 11.4286H12.6919C12.258 11.4286 11.9062 11.0769 11.9062 10.643Z" fill="#0095F6"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9062 16.4707C11.9062 16.0368 12.258 15.6851 12.6919 15.6851H24.2189C24.6528 15.6851 25.0045 16.0368 25.0045 16.4707C25.0045 16.9045 24.6528 17.2563 24.2189 17.2563H12.6919C12.258 17.2563 11.9062 16.9045 11.9062 16.4707Z" fill="#0095F6"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9062 22.2978C11.9062 21.8639 12.258 21.5122 12.6919 21.5122H24.2189C24.6528 21.5122 25.0045 21.8639 25.0045 22.2978C25.0045 22.7317 24.6528 23.0834 24.2189 23.0834H12.6919C12.258 23.0834 11.9062 22.7317 11.9062 22.2978Z" fill="#0095F6"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.6665 10.6431C6.6665 9.91981 7.25282 9.3335 7.97607 9.3335C8.69932 9.3335 9.28563 9.91981 9.28563 10.6431C9.28563 11.3663 8.69932 11.9526 7.97607 11.9526C7.25282 11.9526 6.6665 11.3663 6.6665 10.6431ZM6.6665 16.4705C6.6665 15.7473 7.25282 15.161 7.97607 15.161C8.69932 15.161 9.28563 15.7473 9.28563 16.4705C9.28563 17.1938 8.69932 17.7801 7.97607 17.7801C7.25282 17.7801 6.6665 17.1938 6.6665 16.4705ZM7.97607 20.9884C7.25282 20.9884 6.6665 21.5747 6.6665 22.298C6.6665 23.0212 7.25282 23.6075 7.97607 23.6075C8.69932 23.6075 9.28563 23.0212 9.28563 22.298C9.28563 21.5747 8.69932 20.9884 7.97607 20.9884Z" fill="#0095F6"></path>
                                    </svg>
                                </button>
                                </div>
                                </div>
                            </td>
                            <td class="text-center d-none">
                                <input class="check-add-sn" data-seri="${item.maSP}" type="checkbox" name="cbSeri[]" value="1" ${(item.check_seri == 1) ? 'checked' : ''}>    
                            </td>
                            <td class="border border-bottom-0 position-relative d-none">
                                <input type="text" value="${formatCurrency(item.price_export)}" readonly class="border-0 px-2 py-1 w-100 product_price" autocomplete="off" name="product_price[]" required="" readonly="readonly">
                                <p class="text-primary text-right position-absolute transaction" style="top: 68%; right: 5%; display: none;">Giao dịch gần đây</p>
                            </td>
                            <td class="border border-bottom-0 px-4 d-none">
                                <select name="product_tax[]" class="border-0 text-center product_tax" required="">
                                    <option value="0" ${(item.product_tax == 0) ? 'selected' : ''}>0%</option>
                                    <option value="8" ${(item.product_tax == 8) ? 'selected' : ''}>8%</option>
                                    <option value="10" ${(item.product_tax == 10) ? 'selected' : ''}>10%</option>
                                    <option value="99" ${(item.product_tax == 99) ? 'selected' : ''}>NOVAT</option>
                                </select>
                            </td>
                            <td class="border border-bottom-0 d-none">
                                <input type="text" value="${formatCurrency(item.product_total)}" readonly class="border-0 px-2 py-1 w-100 total-amount">
                            </td>
                            <td class="border-top border-secondary p-0 bg-secondary Daydu d-none" style="width:1%;"></td>
                            <td class="border border-bottom-0 position-relative product_ratio d-none">
                                <input type="text" value="${item.product_ratio}" readonly class="border-0 px-2 py-1 w-100 heSoNhan" autocomplete="off" required="required" name="product_ratio[]">
                            </td>
                            <td class="border border-bottom-0 position-relative price_import d-none">
                                <input type="text" value="${formatCurrency(item.price_import)}" readonly class="border-0 px-2 py-1 w-100 giaNhap" autocomplete="off" required="required" name="price_import[]">
                            </td>
                            <td class="border border-bottom-0 position-relative note p-1">
                                <input type="text" readonly value="${(item.product_note == null) ? '' : item.product_note}" class="border-0 py-1 w-100" name="product_note[]">
                            </td>
                            <td class="border border-bottom-0 border-right-0 text-right deleteProduct">
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M13.1417 6.90625C13.4351 6.90625 13.673 7.1441 13.673 7.4375C13.673 7.47847 13.6682 7.5193 13.6589 7.55918L12.073 14.2992C11.8471 15.2591 10.9906 15.9375 10.0045 15.9375H6.99553C6.00943 15.9375 5.15288 15.2591 4.92702 14.2992L3.34113 7.55918C3.27393 7.27358 3.45098 6.98757 3.73658 6.92037C3.77645 6.91099 3.81729 6.90625 3.85826 6.90625H13.1417ZM9.03125 1.0625C10.4983 1.0625 11.6875 2.25175 11.6875 3.71875H13.8125C14.3993 3.71875 14.875 4.19445 14.875 4.78125V5.3125C14.875 5.6059 14.6371 5.84375 14.3438 5.84375H2.65625C2.36285 5.84375 2.125 5.6059 2.125 5.3125V4.78125C2.125 4.19445 2.6007 3.71875 3.1875 3.71875H5.3125C5.3125 2.25175 6.50175 1.0625 7.96875 1.0625H9.03125ZM9.03125 2.65625H7.96875C7.38195 2.65625 6.90625 3.13195 6.90625 3.71875H10.0938C10.0938 3.13195 9.61805 2.65625 9.03125 2.65625Z" fill="#6B6F76"></path></svg>
                            </td>
                            <td style="display:none;" class="><input type="text" class="product_tax1"></td>
                            <td style="display:none;"><input type="text" class="product_tax1"></td>
                            <td style='display:none;'><ul class ='seri_pro'></ul></td>
                            </tr>`;
                                $("#dynamic-fields").before(newRow);
                                //Check S/N
                                var rowId = $(this.currentTarget)
                                    .closest('tr').attr('id');
                                var seriList = item.seri_pro.filter(
                                    item => item !== null).join(
                                    '</li><li>');
                                var seriProElement = $(
                                    `#dynamic-row-${item.maSP} .seri_pro`
                                );
                                var rowElement = $(
                                    `#dynamic-row-${item.maSP}`);

                                if (seriList.length > 0) {
                                    rowElement.find(`.check-add-sn`)
                                        .prop('disabled', true);
                                    seriProElement.hide();
                                } else {
                                    seriProElement.html(
                                        `<li>${seriList}</li>`);
                                    seriProElement.show();
                                    rowElement.find(`.open-modal-btn`)
                                        .hide();
                                }
                                //Kiểm tra đã thêm seri chưa
                                $('#luuNhap').off('click').on('click',
                                    function(e) {
                                        var
                                            insufficientSeriProducts = [];

                                        $(".bg-white.addProduct")
                                            .each(function() {
                                                var checkbox =
                                                    $(this)
                                                    .find(
                                                        ".check-add-sn"
                                                    );
                                                var isCheckedAndNotDisabled =
                                                    checkbox
                                                    .prop(
                                                        "checked"
                                                    ) && !
                                                    checkbox
                                                    .prop(
                                                        "disabled"
                                                    );
                                                // Trường hợp chọn seri
                                                if (checkbox
                                                    .prop(
                                                        "checked"
                                                    ) &&
                                                    checkbox
                                                    .prop(
                                                        "disabled"
                                                    )) {
                                                    var quantityValue =
                                                        parseFloat(
                                                            $(
                                                                this
                                                            )
                                                            .find(
                                                                ".quantity-input"
                                                            )
                                                            .val()
                                                        );
                                                    var productId =
                                                        $(this)
                                                        .find(
                                                            ".product_id"
                                                        )
                                                        .val();
                                                    var productName =
                                                        $(this)
                                                        .find(
                                                            ".product_name"
                                                        )
                                                        .val();

                                                    for (var i =
                                                            0; i <
                                                        quantityValue; i++
                                                    ) {
                                                        var isSeriInputExist =
                                                            $(
                                                                `input[name="selected_serial_numbers[]"][data-product-id="${productId}"]:eq(${i})`
                                                            )
                                                            .length >
                                                            0;

                                                        if (!
                                                            isSeriInputExist
                                                        ) {
                                                            insufficientSeriProducts
                                                                .push(
                                                                    productName
                                                                );
                                                            break;
                                                        }
                                                    }
                                                }
                                            });
                                        // Nếu có sản phẩm không đủ "seri", hiển thị thông báo
                                        if (insufficientSeriProducts
                                            .length > 0) {
                                            alert(
                                                `Số lượng "seri" không đủ cho các sản phẩm: ${insufficientSeriProducts.join(", ")}`
                                            );
                                            e.preventDefault();
                                        } else {
                                            // Hủy disabled cho các checkbox được chọn
                                            var allFieldsFilled =
                                                true;
                                            $('.addProduct').each(
                                                function() {
                                                    var productName =
                                                        $(this)
                                                        .find(
                                                            '.product_name'
                                                        ).val();
                                                    var productUnit =
                                                        $(this)
                                                        .find(
                                                            '.product_unit'
                                                        ).val();
                                                    var productQty =
                                                        $(this)
                                                        .find(
                                                            '.quantity-input'
                                                        ).val();

                                                    if (productName ===
                                                        '' ||
                                                        productUnit ===
                                                        '' ||
                                                        productQty ===
                                                        '') {
                                                        allFieldsFilled
                                                            =
                                                            false;
                                                        return false;
                                                    }
                                                });
                                            if (allFieldsFilled) {
                                                $('.check-add-sn:checked[disabled]')
                                                    .prop(
                                                        'disabled',
                                                        false);
                                            } else {
                                                console.log(
                                                    'Vui lòng điền đầy đủ thông tin cho mỗi sản phẩm.'
                                                );
                                            }
                                        }
                                    });
                                $('#giaoHang').off('click').on('click',
                                    function(e) {
                                        var
                                            insufficientSeriProducts = [];
                                        var
                                            invalidInventoryProducts = [];

                                        $(".bg-white.addProduct")
                                            .each(
                                                function() {
                                                    var soTonKho =
                                                        parseFloat(
                                                            $(
                                                                this
                                                            )
                                                            .find(
                                                                ".soTonKho"
                                                            ).text()
                                                        );
                                                    var checkbox =
                                                        $(
                                                            this)
                                                        .find(
                                                            ".check-add-sn"
                                                        );

                                                    var quantity =
                                                        parseFloat(
                                                            $(this)
                                                            .find(
                                                                ".quantity-input"
                                                            )
                                                            .val());
                                                    var productNameInventory =
                                                        $(this)
                                                        .find(
                                                            ".product_name"
                                                        ).val();
                                                    // Kiểm tra số lượng tồn kho
                                                    if (quantity >
                                                        soTonKho) {
                                                        invalidInventoryProducts
                                                            .push(
                                                                productNameInventory
                                                            );
                                                    }

                                                    if (checkbox
                                                        .prop(
                                                            "checked"
                                                        ) &&
                                                        checkbox
                                                        .prop(
                                                            "disabled"
                                                        )
                                                    ) {
                                                        var quantityValue =
                                                            parseFloat(
                                                                $(
                                                                    this
                                                                )
                                                                .find(
                                                                    ".quantity-input"
                                                                )
                                                                .val()
                                                            );
                                                        var productId =
                                                            $(this)
                                                            .find(
                                                                ".product_id"
                                                            ).val();
                                                        var productName =
                                                            $(this)
                                                            .find(
                                                                ".product_name"
                                                            ).val();

                                                        for (var i =
                                                                0; i <
                                                            quantityValue; i++
                                                        ) {
                                                            var isSeriInputExist =
                                                                $(
                                                                    `input[name="selected_serial_numbers[]"][data-product-id="${productId}"]:eq(${i})`
                                                                )
                                                                .length >
                                                                0;

                                                            if (!
                                                                isSeriInputExist
                                                            ) {
                                                                insufficientSeriProducts
                                                                    .push(
                                                                        productName
                                                                    );
                                                                break;
                                                            }
                                                        }
                                                    }
                                                });

                                        // Hiển thị thông báo nếu có sản phẩm không đủ "seri"
                                        if (insufficientSeriProducts
                                            .length > 0) {
                                            alert(
                                                `Số lượng "seri" không đủ cho các sản phẩm: ${insufficientSeriProducts.join(", ")}`
                                            );
                                            e.preventDefault();
                                        } else {
                                            // Hiển thị thông báo nếu không đủ số lượng tồn kho
                                            if (invalidInventoryProducts
                                                .length > 0) {
                                                alert("Không đủ số lượng tồn kho cho các sản phẩm:\n" +
                                                    invalidInventoryProducts
                                                    .join(', '));
                                                e.preventDefault();
                                            } else {
                                                // Tiếp tục kiểm tra thông tin sản phẩm và submit form nếu hợp lệ
                                                var allFieldsFilled =
                                                    true;

                                                $('.addProduct')
                                                    .each(
                                                        function() {
                                                            var productName =
                                                                $(
                                                                    this
                                                                )
                                                                .find(
                                                                    '.product_name'
                                                                )
                                                                .val();
                                                            var productUnit =
                                                                $(
                                                                    this
                                                                )
                                                                .find(
                                                                    '.product_unit'
                                                                )
                                                                .val();
                                                            var productQty =
                                                                $(
                                                                    this
                                                                )
                                                                .find(
                                                                    '.quantity-input'
                                                                )
                                                                .val();

                                                            if (productName ===
                                                                '' ||
                                                                productUnit ===
                                                                '' ||
                                                                productQty ===
                                                                ''
                                                            ) {
                                                                allFieldsFilled
                                                                    =
                                                                    false;
                                                                return false;
                                                            }
                                                        });

                                                if (
                                                    allFieldsFilled
                                                ) {
                                                    $('.check-add-sn:checked[disabled]')
                                                        .prop(
                                                            'disabled',
                                                            false);
                                                    document
                                                        .getElementById(
                                                            'deliveryForm'
                                                        ).submit();
                                                } else {
                                                    console.log(
                                                        'Vui lòng điền đầy đủ thông tin cho mỗi sản phẩm.'
                                                    );
                                                }
                                            }
                                        }
                                    });

                                //Kiểm tra seri có được nhập
                                $('.save-seri-btn').off('click').on(
                                    'click',
                                    function() {
                                        var maSP = $(this).data(
                                            'masp');
                                        var inputs = $(
                                            'input[name="seri[' +
                                            maSP + '][]"]');
                                        var quantityInput = $(
                                            'input.quantity-input[data-product-id="' +
                                            maSP + '"]');
                                        var requiredCount =
                                            parseInt(quantityInput
                                                .val());
                                        var isValid = true;
                                        if (inputs.length > 0) {
                                            if (inputs.length !==
                                                requiredCount) {
                                                isValid = false;
                                            } else {
                                                inputs.each(
                                                    function() {
                                                        if ($(
                                                                this
                                                            )
                                                            .val()
                                                            .trim() ===
                                                            ''
                                                        ) {
                                                            isValid
                                                                =
                                                                false;
                                                            return false;
                                                        }
                                                    });
                                            }

                                            if (!isValid) {
                                                alert(
                                                    'Serinumber đang được bỏ trống hoặc chưa được nhập đủ số lượng!'
                                                );
                                                $(this).attr(
                                                    'data-dismiss',
                                                    '');
                                            } else {
                                                $(this).attr(
                                                    'data-dismiss',
                                                    'modal');
                                            }
                                        } else {
                                            alert(
                                                'Vui lòng thêm serinumber!'
                                            );
                                        }
                                    });
                                //kéo thả vị trí sản phẩm
                                $("table tbody").sortable({
                                    axis: "y",
                                    handle: "td",
                                });
                                //Xóa sản phẩm
                                $('.deleteProduct').click(function() {
                                    $(this).closest("tr")
                                        .remove();
                                    fieldCounter--;
                                    calculateTotalAmount();
                                    calculateGrandTotal();
                                    var productTaxText = $(
                                            '#product-tax')
                                        .text();
                                    var productTaxValue =
                                        parseFloat(
                                            productTaxText
                                            .replace(/,/g, ''));
                                    var taxAmount = parseFloat((
                                            '.product_tax1')
                                        .text());
                                    var totalTax =
                                        productTaxValue -
                                        taxAmount;
                                    $('#product-tax').text(
                                        totalTax);
                                });
                                // Checkbox
                                $('#checkall').change(function() {
                                    $('.cb-element').prop(
                                        'checked', this
                                        .checked);
                                    updateMultipleActionVisibility
                                        ();
                                });
                                $('.cb-element').change(function() {
                                    updateMultipleActionVisibility
                                        ();
                                    if ($('.cb-element:checked')
                                        .length === $(
                                            '.cb-element')
                                        .length) {
                                        $('#checkall').prop(
                                            'checked', true);
                                    } else {
                                        $('#checkall').prop(
                                            'checked', false
                                        );
                                    }
                                });
                                $(document).on('click',
                                    '.cancal_action',
                                    function(e) {
                                        e.preventDefault();
                                        $('.cb-element:checked')
                                            .prop('checked', false);
                                        $('#checkall').prop(
                                            'checked', false);
                                        updateMultipleActionVisibility
                                            ()
                                    })

                                function updateMultipleActionVisibility() {
                                    if ($('.cb-element:checked')
                                        .length > 0) {
                                        $('.multiple_action').show();
                                        $('.count_checkbox').text(
                                            'Đã chọn ' + $(
                                                '.cb-element:checked'
                                            ).length);
                                    } else {
                                        $('.multiple_action').hide();
                                    }
                                }
                                //Xem thông tin sản phẩm
                                $('.info-product').click(function() {
                                    var idProduct =
                                        $(this)
                                        .closest('tr').find(
                                            '.product_id')
                                        .val();
                                    $.ajax({
                                        url: '{{ route('getProductFromQuote') }}',
                                        type: 'GET',
                                        data: {
                                            idProduct: idProduct
                                        },
                                        success: function(
                                            data
                                        ) {
                                            if (Array
                                                .isArray(
                                                    data
                                                ) &&
                                                data
                                                .length >
                                                0) {
                                                var productData =
                                                    data[
                                                        0
                                                    ];
                                                $('#productModal')
                                                    .find(
                                                        '.modal-body'
                                                    )
                                                    .html(
                                                        '<b>Tên sản phẩm: </b> ' +
                                                        productData
                                                        .product_name +
                                                        '<br>' +
                                                        '<b>Đơn vị: </b>' +
                                                        productData
                                                        .product_unit +
                                                        '<br>' +
                                                        '<b>Tồn kho: </b>' +
                                                        (productData
                                                            .product_inventory ==
                                                            null ?
                                                            0 :
                                                            productData
                                                            .product_inventory
                                                        ) +
                                                        '<br>' +
                                                        '<b>Thuế: </b>' +
                                                        (productData
                                                            .product_tax ==
                                                            99 ||
                                                            productData
                                                            .product_tax ==
                                                            null ?
                                                            "NOVAT" :
                                                            productData
                                                            .product_tax +
                                                            '%'
                                                        )
                                                    );
                                            }
                                        }
                                    });
                                });
                                $('.open-modal-btn').off('click').on(
                                    'click',
                                    function() {
                                        var trElement = $(this)
                                            .closest('tr');
                                        var productInput = trElement
                                            .find('.product_id');
                                        var productId = productInput
                                            .val();
                                        var selectedSerialNumbersForProduct =
                                            selectedSerialNumbers[
                                                productId] || [];
                                        var qty_enter = trElement
                                            .find('.quantity-input')
                                            .val();
                                        $("#exampleModal0 .modal-body tbody")
                                            .empty();

                                        $.ajax({
                                            url: "{{ route('getProductSeri') }}",
                                            method: 'GET',
                                            data: {
                                                productId: productId,
                                            },
                                            success: function(
                                                response
                                            ) {
                                                response
                                                    .forEach(
                                                        function(
                                                            sn
                                                        ) {
                                                            var snId =
                                                                parseInt(
                                                                    sn
                                                                    .id
                                                                );
                                                            var selectedSerialNumbersForProductInt =
                                                                selectedSerialNumbersForProduct
                                                                .map(
                                                                    function(
                                                                        value
                                                                    ) {
                                                                        return parseInt(
                                                                            value
                                                                        );
                                                                    }
                                                                );
                                                            var isChecked =
                                                                selectedSerialNumbersForProductInt
                                                                .includes(
                                                                    snId
                                                                );
                                                            var newRow = `
                    <tr style="">
                        <td class="ui-sortable-handle">
                            <input type="checkbox" class="check-item" value="${sn.id}" ${isChecked ? 'checked' : ''}>
                        </td>
                        <td class="ui-sortable-handle">${sn.id}</td>
                        <td class="ui-sortable-handle">
                            <input readonly class="form-control w-25" type="text" value="${sn.serinumber}">
                        </td>
                    </tr>`;
                                                            $("#exampleModal0 .modal-body tbody")
                                                                .append(
                                                                    newRow
                                                                );
                                                        }
                                                    );
                                                $('.check-item')
                                                    .on('change',
                                                        function() {
                                                            event
                                                                .stopPropagation();
                                                            var checkedCheckboxes =
                                                                $(
                                                                    '.check-item:checked'
                                                                )
                                                                .length;
                                                            var serialNumberId =
                                                                $(
                                                                    this
                                                                )
                                                                .val();

                                                            if (checkedCheckboxes >
                                                                qty_enter
                                                            ) {
                                                                $(this)
                                                                    .prop(
                                                                        'checked',
                                                                        false
                                                                    );
                                                            } else {
                                                                if ($(
                                                                        this
                                                                    )
                                                                    .is(
                                                                        ':checked'
                                                                    )
                                                                ) {
                                                                    if (!
                                                                        selectedSerialNumbers[
                                                                            productId
                                                                        ]
                                                                    ) {
                                                                        selectedSerialNumbers
                                                                            [
                                                                                productId
                                                                            ] = [];
                                                                    }

                                                                    selectedSerialNumbers
                                                                        [
                                                                            productId
                                                                        ]
                                                                        .push(
                                                                            serialNumberId
                                                                        );

                                                                    // Tạo một trường input ẩn mới và đặt giá trị
                                                                    var newInput =
                                                                        $('<input>', {
                                                                            type: 'hidden',
                                                                            name: 'selected_serial_numbers[]',
                                                                            value: serialNumberId,
                                                                            'data-product-id': productId,
                                                                        });

                                                                    // Thêm trường input mới vào container
                                                                    $('#selectedSerialNumbersContainer')
                                                                        .append(
                                                                            newInput
                                                                        );
                                                                } else {
                                                                    // Nếu checkbox bị bỏ chọn, loại bỏ Serial Number khỏi danh sách cho sản phẩm
                                                                    if (selectedSerialNumbers[
                                                                            productId
                                                                        ]) {
                                                                        selectedSerialNumbers
                                                                            [
                                                                                productId
                                                                            ] =
                                                                            selectedSerialNumbers[
                                                                                productId
                                                                            ]
                                                                            .filter(
                                                                                function(
                                                                                    item
                                                                                ) {
                                                                                    return item !==
                                                                                        serialNumberId;
                                                                                }
                                                                            );

                                                                        // Xóa trường input ẩn tương ứng
                                                                        $('input[name="selected_serial_numbers[]"][value="' +
                                                                                serialNumberId +
                                                                                '"]'
                                                                            )
                                                                            .remove();
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    );
                                                // Xoá sự kiện click trước đó nếu có
                                                $('.check-seri')
                                                    .off(
                                                        'click'
                                                    )
                                                    .on('click',
                                                        function() {
                                                            var checkedCheckboxes =
                                                                $(
                                                                    '.check-item:checked'
                                                                )
                                                                .length;
                                                            var check_item =
                                                                $(
                                                                    '.check-item'
                                                                );
                                                            if (check_item
                                                                .length >
                                                                0
                                                            ) {
                                                                if (checkedCheckboxes <
                                                                    qty_enter
                                                                ) {
                                                                    alert
                                                                        (
                                                                            'Vui lòng chọn đủ serial number theo số lượng xuất!'
                                                                        );
                                                                    // Không cho phép đóng modal khi có lỗi
                                                                    return false;
                                                                } else if (
                                                                    checkedCheckboxes ==
                                                                    qty_enter
                                                                ) {
                                                                    // Kiểm tra xem nút được nhấn có class 'check-seri' không
                                                                    if ($(
                                                                            this
                                                                        )
                                                                        .hasClass(
                                                                            'check-seri'
                                                                        )
                                                                    ) {
                                                                        $(this)
                                                                            .attr(
                                                                                'data-dismiss',
                                                                                'modal'
                                                                            );
                                                                    }
                                                                }
                                                            } else {
                                                                $(this)
                                                                    .attr(
                                                                        'data-dismiss',
                                                                        'modal'
                                                                    );
                                                            }
                                                        }
                                                    );

                                                // Xoá sự kiện click trước đó nếu có
                                                $('.btnclose')
                                                    .off(
                                                        'click'
                                                    )
                                                    .on('click',
                                                        function() {
                                                            var checkedCheckboxes =
                                                                $(
                                                                    '.check-item:checked'
                                                                )
                                                                .length;
                                                            var check_item =
                                                                $(
                                                                    '.check-item'
                                                                );
                                                            if (check_item
                                                                .length >
                                                                0
                                                            ) {
                                                                if (checkedCheckboxes <
                                                                    qty_enter
                                                                ) {
                                                                    alert
                                                                        (
                                                                            'Vui lòng chọn đủ serial number theo số lượng xuất!'
                                                                        );
                                                                    // Không cho phép đóng modal khi có lỗi
                                                                    return false;
                                                                } else if (
                                                                    checkedCheckboxes ==
                                                                    qty_enter
                                                                ) {
                                                                    $('.btnclose')
                                                                        .attr(
                                                                            'data-dismiss',
                                                                            'modal'
                                                                        );
                                                                }
                                                            } else {
                                                                $('.btnclose')
                                                                    .attr(
                                                                        'data-dismiss',
                                                                        'modal'
                                                                    );
                                                            }
                                                        }
                                                    );

                                            }
                                        });
                                    });

                            });
                        }
                    });
                }
            });
        });
        var idQuote = $('#detail_id').val();
        if (idQuote) {
            $('.search-info').trigger('click', idQuote);
        }
    });
    //tính thành tiền của sản phẩm
    $(document).ready(function() {
        calculateTotals();
    });

    $(document).on('input', '.quantity-input, [name^="product_price"], .product_tax', function() {
        calculateTotals();
    });

    function calculateTotals() {
        var totalAmount = 0;
        var totalTax = 0;

        // Lặp qua từng hàng
        $('tr').each(function() {
            var productQty = parseFloat($(this).find('.quantity-input').val());
            var productPriceElement = $(this).find('[name^="product_price"]');
            var productPrice = 0;
            var taxValue = parseFloat($(this).find('.product_tax option:selected').val());
            if (taxValue == 99) {
                taxValue = 0;
            }
            if (productPriceElement.length > 0) {
                var rawPrice = productPriceElement.val();
                if (rawPrice !== "") {
                    productPrice = parseFloat(rawPrice.replace(/,/g, ''));
                }
            }

            if (!isNaN(productQty) && !isNaN(taxValue)) {
                var donGia = productPrice;
                var rowTotal = productQty * donGia;
                var rowTax = (rowTotal * taxValue) / 100;

                // Làm tròn từng thuế
                rowTax = Math.round(rowTax);
                $(this).find('.product_tax1').val(formatCurrency(rowTax));

                // Hiển thị kết quả
                $(this).find('.total-amount').val(formatCurrency(Math.round(rowTotal)));
                $(this).find('.product_price').val(formatCurrency(donGia));

                // Cộng dồn vào tổng totalAmount và totalTax
                totalAmount += rowTotal;
                totalTax += rowTax;
            }
        });

        // Hiển thị tổng totalAmount và totalTax
        $('#total-amount-sum').text(formatCurrency(Math.round(totalAmount)));
        $('#product-tax').text(formatCurrency(Math.round(totalTax)));

        // Tính tổng thành tiền và thuế
        calculateGrandTotal(totalAmount, totalTax);
    }

    function calculateGrandTotal(totalAmount, totalTax) {
        if (!isNaN(totalAmount) || !isNaN(totalTax)) {
            var grandTotal = totalAmount + totalTax;
            $('#grand-total').text(formatCurrency(Math.round(grandTotal)));
        }

        // Cập nhật giá trị data-value
        $('#grand-total').attr('data-value', grandTotal);
        $('#total').val(totalAmount);
    }

    function formatCurrency(value) {
        // Làm tròn đến 2 chữ số thập phân
        value = Math.round(value * 100) / 100;

        // Xử lý phần nguyên
        var parts = value.toString().split(".");
        var integerPart = parts[0];
        var formattedValue = "";

        // Định dạng phần nguyên
        var count = 0;
        for (var i = integerPart.length - 1; i >= 0; i--) {
            formattedValue = integerPart.charAt(i) + formattedValue;
            count++;
            if (count % 3 === 0 && i !== 0) {
                formattedValue = "," + formattedValue;
            }
        }

        // Nếu có phần thập phân, thêm vào sau phần nguyên
        if (parts.length > 1) {
            formattedValue += "." + parts[1];
        }

        return formattedValue;
    }

    //format giá
    var inputElement = document.getElementById('product_price');
    $('body').on('input', '.product_price, #transport_fee, .giaNhap, #voucher, .fee_ship', function(event) {
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
        var rows = document.querySelectorAll('tr');
        var hasProducts = false;

        for (var i = 1; i < rows.length; i++) {
            if (rows[i].classList.contains('addProduct')) {
                hasProducts = true;
            }
        }

        var inputValue = $('.idGuest').val();

        if ($.trim(inputValue) === '') {
            alert('Vui lòng chọn số báo giá từ danh sách!');
            event.preventDefault();
        } else {
            // Hiển thị thông báo nếu không có sản phẩm
            if (!hasProducts) {
                alert("Không có sản phẩm để báo giá");
                event.preventDefault();
            }
        }
    }
</script>
</body>

</html>
