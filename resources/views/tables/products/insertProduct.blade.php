<x-navbar :title="$title" activeGroup="products" activeName="product"></x-navbar>
<form action="{{ route('inventory.store', $workspacename) }}" method="POST">
    @csrf
    <div class="content-wrapper m-0" style="background: none;">
        <div class="content-header-fixed p-0 margin-250">
            <div class="content__header--inner margin-left32">
                <div class="content__heading--left">
                    <span>Kho hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z" fill="#26273B" fill-opacity="0.8"/>
                        </svg>
                    </span>
                    <span class="nearLast-span">Sản phẩm</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z" fill="#26273B" fill-opacity="0.8"/>
                        </svg>
                    </span>
                    <span class="last-span">Thêm sản phẩm</span>
                </div>
                <div class="d-flex content__heading--right">
                    <a href="{{ route('inventory.index', $workspacename) }}">
                        <button type="button" class="btn-destroy btn-light mx-2 d-flex align-items-center h-100 rounded"
                            style="margin-right:10px">
                            <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z"
                                    fill="#6D7075"></path>
                            </svg>
                            <span class="text-btnIner-primary ml-2">Hủy</span>
                        </button>
                    </a>
    
                    <button type="submit" class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                        <svg class="mx-1" width="18" height="18" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                fill="white"></path>
                        </svg>
                        <span class="text-btnIner-primary ml-2">Lưu</span>
                    </button>
    
                    <div type="button" class="btn-option">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                                fill="#42526E">
                            </path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                                fill="#42526E">
                            </path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                                 fill="#42526E">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="content margin-top-fixed4" style="background: none;">
            <section class="content margin-250">
                <section class="container-fluided">
                    <div class="info-chung">
                        <p class="font-weight-bold text-uppercase info-chung--heading border-custom">Thông tin chung</p>
                        <div class="content-info">
                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-left-0 height-100">
                                    <p class="p-0 m-0 required-label text-danger margin-left32 text-13">Tên sản phẩm</p>
                                </div>
                                <input type="text" required placeholder="Nhập thông tin" name="product_name"
                                    class="border height-100 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black">
                            </div>
                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-left-0">
                                    <p class="p-0 m-0 margin-left32 text-13">Mã sản phẩm</p>
                                </div>
                                <input type="text" placeholder="Nhập thông tin" name="product_code"
                                    class="border height-100 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black">
                            </div>
                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-left-0 height-100">
                                    <p class="p-0 m-0 margin-left32 text-13">Đơn vị tính</p>
                                </div>
                                <input type="text" required="" placeholder="Nhập thông tin" name="product_unit"
                                    class="border height-100 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black">
                            </div>
                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-left-0 height-100">
                                    <p class="p-0 m-0 margin-left32 text-13">Loại sản phẩm</p>
                                </div>
                                <input type="text" placeholder="Nhập thông tin" name="product_type"
                                    class="border height-100 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black">
                            </div>
                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-left-0 height-100">
                                    <p class="p-0 m-0 margin-left32 text-13">Hãng</p>
                                </div>
                                <input type="number" placeholder="Nhập thông tin" name="product_manufacturer"
                                    class="border height-100 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black">
                            </div>
                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-left-0 height-100">
                                    <p class="p-0 m-0 margin-left32 text-13">Xuất xứ</p>
                                </div>
                                <input type="number" placeholder="Nhập thông tin" name="product_origin"
                                    class="border height-100 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black">
                            </div>
                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-left-0 height-100">
                                    <p class="p-0 m-0 margin-left32 text-13">Bảo hành</p>
                                </div>
                                <input type="number" placeholder="Nhập thông tin" name="product_guarantee"
                                    class="border height-100 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black">
                            </div>
                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-left-0 height-100">
                                    <p class="p-0 m-0 margin-left32 text-13">Quản lý Serial Number</p>
                                </div>
                                <div class="border height-100 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black">
                                    <input type="checkbox" placeholder="Nhập thông tin" name="check_seri"
                                        class="" checked>
                                </div>
    
                            </div>
                        </div>
                    </div>
                </section>
                <section class="container-fluided">
                    <div class="info-chung">
                        <p class="font-weight-bold text-uppercase info-chung--heading border-custom">Thông tin giá</p>
                        <div class="d-flex align-items-center height-60-mobile">
                            <div class="title-info py-2 border border-left-0 height-100">
                                <p class="p-0 m-0 margin-left32 text-13">Đơn giá bán</p>
                            </div>
                            <input type="text" placeholder="Nhập thông tin" name="product_price_export"
                                class="border w-100 py-2 border-left-0 height-100  px-3 text-13-black">
                        </div>
                        <div class="d-flex align-items-center height-60-mobile">
                            <div class="title-info py-2 border border-left-0 height-100">
                                <p class="p-0 m-0 margin-left32 text-13">Đơn giá mua</p>
                            </div>
                            <input type="text" placeholder="Nhập thông tin" name="product_price_import"
                                class="border w-100 py-2 border-left-0 height-100  px-3 text-13-black">
                        </div>
                        <div class="d-flex align-items-center height-60-mobile">
                            <div class="title-info py-2 border border-left-0 height-100">
                                <p class="p-0 m-0 margin-left32 text-13">Hệ số nhân</p>
                            </div>
                            <input type="text" value="Theo hệ thống" name="product_ratio" readonly
                                class="border w-100 py-2 border-left-0 height-100  px-3 text-13-blue">
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="title-info py-2 border border-top-0 border-left-0">
                                <p class="p-0 m-0 margin-left32 text-13">Thuế</p>
                            </div>
                            <div class="border border-top-0 w-100 border-left-0 border-right-0 px-3 text-13-black">
                                <select name="product_tax" id="" class="form-control w-25 text-13-black border-0">
                                    <option value="0">0%</option>
                                    <option value="8">8%</option>
                                    <option value="10">10%</option>
                                    <option value="99">NOVAT</option>
                                </select>
                            </div>
    
                        </div>
                    </div>
                </section>
            </section>
        </div>
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
