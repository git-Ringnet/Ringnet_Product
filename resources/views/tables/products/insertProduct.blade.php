<x-navbar :title="$title" activeGroup="products" activeName="product"></x-navbar>
<form action="{{ route('inventory.store', $workspacename) }}" method="POST">
    @csrf
    <div class="content-wrapper1 py-2 border-bottom" style="background: none;">
        <div class="d-flex justify-content-between align-items-center pl-4 ml-1">
            <div class="container-fluided">
                <div class="mb">
                    <span class="font-weight-bold">Kho hàng</span>
                    <span class="mx-2"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8"></path>
                        </svg>
                    </span>
                    <span class="font-weight-bold">Sản phẩm</span>
                    <span class="mx-2"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8"></path>
                        </svg>
                    </span>
                    <span class="font-weight-bold text-secondary">Thêm sản phẩm</span>
                </div>
            </div>
            <div class="container-fluided z-index-block">
                <div class="row m-0">
                    <div class="dropdown">
                        <a href="{{ route('inventory.index', $workspacename) }}">
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
                    </div>

                    <button type="submit" class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                        <svg class="mx-1" width="18" height="18" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                fill="white"></path>
                        </svg>
                        <span>Lưu</span>
                    </button>

                    <div>
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

    <div class="content-wrapper1 px-0 py-0" style="background: none;">
        <section class="content">
            <div class="container-fluided">
                <div class="bg-filter-search border-top-0 py-2">
                    <span class="font-weight-bold text-secondary text-nav ml-4">THÔNG TIN CHUNG</span>
                </div>
                <div class="info-chung">
                    <div class="content-info">
                        <div class="d-flex align-items-center">
                            <div class="title-info py-2 border border-top-0 border-left-0">
                                <p class="p-0 m-0 px-3 ml-2">Tên sản phẩm</p>
                            </div>
                            <input type="text" required placeholder="Nhập thông tin" name="product_name"
                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="title-info py-2 border border-left-0">
                                <p class="p-0 m-0 px-3 ml-2">Mã sản phẩm</p>
                            </div>
                            <input type="text" placeholder="Nhập thông tin" name="product_code"
                                class="border w-100 py-2 border-left-0 border-right-0 px-3">
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="title-info py-2 border border-top-0 border-left-0">
                                <p class="p-0 m-0 px-3 ml-2">Đơn vị tính</p>
                            </div>
                            <input type="text" required="" placeholder="Nhập thông tin" name="product_unit"
                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="title-info py-2 border border-top-0 border-left-0">
                                <p class="p-0 m-0 px-3 ml-2">Loại sản phẩm</p>
                            </div>
                            <input type="text" placeholder="Nhập thông tin" name="product_type"
                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="title-info py-2 border border-top-0 border-left-0">
                                <p class="p-0 m-0 px-3 ml-2">Hãng</p>
                            </div>
                            <input type="number" placeholder="Nhập thông tin" name="product_manufacturer"
                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="title-info py-2 border border-top-0 border-left-0">
                                <p class="p-0 m-0 px-3 ml-2">Xuất xứ</p>
                            </div>
                            <input type="number" placeholder="Nhập thông tin" name="product_origin"
                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="title-info py-2 border border-top-0 border-left-0">
                                <p class="p-0 m-0 px-3 ml-2">Bảo hành</p>
                            </div>
                            <input type="number" placeholder="Nhập thông tin" name="product_guarantee"
                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="title-info py-2 border border-top-0 border-left-0">
                                <p class="p-0 m-0 px-3 ml-2">Quản lý Serial Number</p>
                            </div>
                            <div class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                <input type="checkbox" placeholder="Nhập thông tin" name="check_seri"
                                    class="" checked>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="bg-filter-search border-top-0 py-2">
                    <span class="font-weight-bold text-secondary text-nav ml-4">THÔNG TIN GIÁ</span>
                </div>
                <div class="info-chung">
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
                                                    fill="#42526E"></path>
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
                                                    fill="#42526E"></path>
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
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M15.75 2.25L2.25 15.75" stroke="#42526E" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
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

                    </div>
                    <div class="d-flex align-items-center">
                        <div class="title-info py-2 border border-top-0 border-left-0">
                            <p class="p-0 m-0 px-3 ml-2">Đơn giá bán</p>
                        </div>
                        <input type="text" placeholder="Nhập thông tin" name="product_price_export"
                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="title-info py-2 border border-top-0 border-left-0">
                            <p class="p-0 m-0 px-3 ml-2">Đơn giá mua</p>
                        </div>
                        <input type="text" placeholder="Nhập thông tin" name="product_price_import"
                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="title-info py-2 border border-top-0 border-left-0">
                            <p class="p-0 m-0 px-3 ml-2">Hệ số nhân</p>
                        </div>
                        <input type="text" placeholder="Nhập thông tin" name="product_ratio"
                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="title-info py-2 border border-top-0 border-left-0">
                            <p class="p-0 m-0 px-3 ml-2">Thuế</p>
                        </div>
                        <div class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                            <select name="product_tax" id="" class="border-0">
                                <option value="0">0%</option>
                                <option value="8">8%</option>
                                <option value="10">10%</option>
                                <option value="99">NOVAT</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>



    <!-- Content Header (Page header) -->
    {{-- <section class="content">
        <div class="container-fluided">
            <div class="row">
                <div class="col-12">
                    <div class="info-chung">
                        <p class="font-weight-bold ml-2 px-3">Thông tin chung</p>
                        <div class="content-info">
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-left-0">
                                    <p class="p-0 m-0 px-3">Tên sản phẩm</p>
                                </div>
                                <input type="text" placeholder="Nhập thông tin" name="product_name"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-3" autocomplete="off"
                                    required>
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 px-3">Mã sản phẩm</p>
                                </div>
                                <input type="text" placeholder="Nhập thông tin" name="product_code"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 px-3">Đơn vị tính</p>
                                </div>
                                <input type="text" placeholder="Nhập thông tin" name="product_unit"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 px-3">Loại sản phẩm</p>
                                </div>
                                <input type="text" placeholder="Nhập thông tin" name="product_type"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 px-3">Hãng</p>
                                </div>
                                <input type="text" placeholder="Nhập thông tin" name="product_manufacturer"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 px-3">Xuất xứ</p>
                                </div>
                                <input type="text" placeholder="Nhập thông tin" name="product_origin"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 px-3">Bảo hành</p>
                                </div>
                                <input type="text" placeholder="Nhập thông tin" name="product_guarantee"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 px-3">Quản lý Serial Number</p>
                                </div>
                                <div class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    <input type="checkbox" checked name="check_seri" class="">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section class="content">
        <div class="container-fluided">
            <div class="row">
                <div class="col-12">
                    <div class="info-chung">
                        <p class="font-weight-bold ml-2 px-3 pt-3">Thông tin giá</p>
                        <div class="content-info">
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-left-0">
                                    <p class="p-0 m-0 px-3">Đơn giá bán</p>
                                </div>
                                <input type="text" placeholder="Nhập thông tin" name="product_price_export"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-3" autocomplete="off">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 px-3">Đơn giá nhập</p>
                                </div>
                                <input type="text" placeholder="Nhập thông tin" name="product_price_import"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 px-3">Hệ số nhân</p>
                                </div>
                                <input type="text" placeholder="Nhập thông tin" name="product_ratio"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 px-3">Thuế</p>
                                </div>
                                <div class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    <select name="product_tax" id="" class="form-control w-25">
                                        <option value="0">0%</option>
                                        <option value="8">8%</option>
                                        <option value="10">10%</option>
                                        <option value="99">NOVAT</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

</form>
</div>
