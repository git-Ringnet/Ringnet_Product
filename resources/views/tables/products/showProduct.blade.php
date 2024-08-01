<x-navbar :title="$title" activeGroup="systemFirst" activeName="product"></x-navbar>
<div class="min-height--none pr-2" style="min-height: 0 !important;">
    <div class="content-header-fixed p-0 border-bottom-0">
        <div class="content__header--inner">
            <div class="content__heading--left">
                <span class="ml-4">Thiết lập ban đầu</span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                            fill="#26273B" fill-opacity="0.8" />
                    </svg>
                </span>
                <span class="nearLast-span">Hàng hóa</span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                            fill="#26273B" fill-opacity="0.8" />
                    </svg>
                </span>
                <span class="last-span">
                    {{ $title }}
                </span>
            </div>
            <div class="d-flex content__heading--right">
                <a href="{{ route('inventory.index', $workspacename) }}">
                    <button type="button" class="btn-destroy btn-light mx-1 d-flex align-items-center h-100 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                            fill="none">
                            <path
                                d="M5.6738 11.4801C5.939 11.7983 6.41191 11.8413 6.73012 11.5761C7.04833 11.311 7.09132 10.838 6.82615 10.5198L5.3513 8.75H12.25C12.6642 8.75 13 8.41421 13 8C13 7.58579 12.6642 7.25 12.25 7.25L5.3512 7.25L6.82615 5.4801C7.09132 5.1619 7.04833 4.689 6.73012 4.4238C6.41191 4.1586 5.939 4.2016 5.6738 4.5198L3.1738 7.51984C2.942 7.79798 2.942 8.20198 3.1738 8.48012L5.6738 11.4801Z"
                                fill="#6D7075" />
                        </svg>
                        <span class="text-btnIner-primary ml-2">Trở về</span>
                    </button>
                </a>
                @if ($display == 1)
                    <a
                        href="{{ route('inventory.edit', ['workspace' => $workspacename, 'inventory' => $product->id]) }}">
                        <button type="button" class="custom-btn d-flex mx-1 align-items-center h-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                fill="none">
                                <path
                                    d="M4.75 2.00007C2.67893 2.00007 1 3.679 1 5.75007V11.25C1 13.3211 2.67893 15 4.75 15H10.2501C12.3212 15 14.0001 13.3211 14.0001 11.25V8.00007C14.0001 7.58586 13.6643 7.25007 13.2501 7.25007C12.8359 7.25007 12.5001 7.58586 12.5001 8.00007V11.25C12.5001 12.4927 11.4927 13.5 10.2501 13.5H4.75C3.50736 13.5 2.5 12.4927 2.5 11.25V5.75007C2.5 4.50743 3.50736 3.50007 4.75 3.50007H7C7.41421 3.50007 7.75 3.16428 7.75 2.75007C7.75 2.33586 7.41421 2.00007 7 2.00007H4.75Z"
                                    fill="white" />
                                <path
                                    d="M12.1339 5.19461L10.7197 3.7804L6.52812 7.97196C5.77185 8.72823 5.25635 9.69144 5.0466 10.7402C5.03144 10.816 5.09828 10.8828 5.17409 10.8677C6.22285 10.6579 7.18606 10.1424 7.94233 9.38618L12.1339 5.19461Z"
                                    fill="white" />
                                <path
                                    d="M13.4559 1.45679C13.2663 1.39356 13.0571 1.44293 12.9158 1.58431L11.7803 2.71974L13.1945 4.13395L14.33 2.99852C14.4714 2.85714 14.5207 2.64802 14.4575 2.45834C14.2999 1.98547 13.9288 1.61441 13.4559 1.45679Z"
                                    fill="white" />
                            </svg>
                            <span class="text-btnIner-primary ml-2">Sửa</span>
                        </button>
                    </a>
                    {{-- <a href="#">
                            <div class="mr-2">
                                <button class="btn btn-secondary" name="action" value="1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 18 18" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.6511 0.123503C11.8471 0.0419682 12.0573 0 12.2695 0C12.4818 0 12.6919 0.0419682 12.888 0.123503C13.084 0.205038 13.2621 0.32454 13.4121 0.475171L14.7065 1.77321C14.8567 1.92366 14.9758 2.10232 15.0571 2.29897C15.1384 2.49564 15.1803 2.70643 15.1803 2.91931C15.1803 3.13219 15.1384 3.34299 15.0571 3.53965C14.9758 3.73631 14.8567 3.91497 14.7065 4.06542L13.0911 5.68531C13.0818 5.69595 13.072 5.70637 13.0618 5.71655C13.0517 5.72673 13.0413 5.73653 13.0307 5.74594L4.70614 14.094C4.57631 14.2241 4.40022 14.2973 4.21661 14.2973H1.61538C1.23302 14.2973 0.923067 13.9865 0.923067 13.603V10.9945C0.923067 10.8103 0.996015 10.6337 1.12586 10.5035L9.44489 2.16183C9.45594 2.149 9.46754 2.13648 9.47969 2.1243C9.49185 2.11211 9.50435 2.10046 9.51716 2.08936L11.127 0.475171C11.2768 0.324749 11.4552 0.20496 11.6511 0.123503ZM9.97051 3.59834L2.30768 11.2821V12.9088H3.92984L11.5923 5.22471L9.97051 3.59834ZM12.5714 4.24288L10.9496 2.61656L12.1069 1.45617C12.1282 1.43472 12.1536 1.41771 12.1815 1.4061C12.2094 1.39449 12.2393 1.38852 12.2695 1.38852C12.2997 1.38852 12.3297 1.39449 12.3576 1.4061C12.3855 1.41771 12.4113 1.43514 12.4326 1.45658L13.7277 2.75531C13.7491 2.77681 13.7664 2.8026 13.778 2.83069C13.7897 2.85878 13.7956 2.8889 13.7956 2.91931C13.7956 2.94973 13.7897 2.97985 13.778 3.00793C13.7664 3.03603 13.7491 3.06182 13.7277 3.08332L12.5714 4.24288ZM0 17.3057C0 16.9223 0.309957 16.6115 0.692308 16.6115H17.3077C17.69 16.6115 18 16.9223 18 17.3057C18 17.6892 17.69 18 17.3077 18H0.692308C0.309957 18 0 17.6892 0 17.3057Z"
                                            fill="white" />
                                    </svg>
                                    <span>Sửa tồn kho</span>
                                </button>
                            </div>
                        </a> --}}
                @endif
                <div class="btn-option" type="button">
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
        <section class="content-header--options p-0">
            <ul class="header-options--nav nav nav-tabs margin-left32"
                @if ($product->type == 2) style="width:100px;" @endif>
                <li>
                    <a class="text-secondary pl-3 active" data-toggle="tab" href="#info">Thông tin</a>
                </li>
                @if ($product->type == 1)
                    <li>
                        <a class="text-secondary" data-toggle="tab" href="#history">Hàng hóa</a>
                    </li>
                    <li>
                        <a class="text-secondary pr-3" data-toggle="tab" href="#serialnumber">Serial Number</a>
                    </li>
                @endif
            </ul>
        </section>
    </div>
    <div class="tab-content editGuest" style="margin-top: 13.5rem;">
        <div id="info" class="content tab-pane in active">
            <section class="content">
                <div class="container-fluided">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="info-chung">
                                <p class="font-weight-bold text-uppercase info-chung--heading">Thông tin chung</p>
                                <div class="content-info">

                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-left-0 height-100 border-bottom-0">
                                            <p class="p-0 m-0 text-danger margin-left32 text-13">Danh mục sản phẩm</p>
                                        </div>
                                        <div
                                            class="border height-100 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black d-flex border-bottom-0">
                                            <input type="radio" id="hanghoa" name="type_product" value="1"
                                                class="py-2" @if ($product->type == 1) checked @endif disabled
                                                style="margin-right:10px;">
                                            <label for="html" class="m-0">Hàng hóa</label>
                                            <input type="radio" id="dichvu" name="type_product" value="2"
                                                class="py-2" @if ($product->type == 2) checked @endif
                                                disabled style="margin-left:40px; margin-right:10px;">
                                            <label for="html" class="m-0">Dịch vụ</label>
                                        </div>
                                    </div>


                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-left-0 height-100">
                                            <p class="p-0 m-0 required-label text-danger margin-left32 text-13">Tên sản
                                                phẩm</p>
                                        </div>
                                        <input readonly type="text" placeholder="Nhập thông tin"
                                            name="product_name"
                                            class="border w-100 height-100 py-2 border-left-0 border-right-0 px-3 text-13-black"
                                            autocomplete="off" required value="{{ $product->product_name }}" />
                                    </div>
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0  margin-left32 text-13">Mã sản phẩm</p>
                                        </div>
                                        <input readonly type="text" required="" placeholder="Nhập thông tin"
                                            name="product_code" value="{{ $product->product_code }}"
                                            class="border height-100 border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black" />
                                    </div>
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 margin-left32 text-13">Đơn vị tính</p>
                                        </div>
                                        <input readonly type="text" placeholder="Nhập thông tin"
                                            name="product_unit" value="{{ $product->product_unit }}"
                                            class="border height-100 border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black" />
                                    </div>

                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 margin-left32 text-13">Giá nhập</p>
                                        </div>
                                        <input readonly type="text" placeholder="Nhập thông tin"
                                            name="product_unit"
                                            value="{{ number_format($product->product_price_import) }}"
                                            class="border height-100 border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black" />
                                    </div>
                                    @if ($product->type == 1)
                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 margin-left32 text-13">Giá bán lẻ</p>
                                            </div>
                                            <input readonly type="text" placeholder="Nhập thông tin"
                                                name="product_unit"
                                                value="{{ number_format($product->price_retail) }}"
                                                class="border height-100 border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black" />
                                        </div>

                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 margin-left32 text-13">Giá bán sỉ</p>
                                            </div>
                                            <input readonly type="text" placeholder="Nhập thông tin"
                                                name="product_unit"
                                                value="{{ number_format($product->price_wholesale) }}"
                                                class="border height-100 border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black" />
                                        </div>

                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 margin-left32 text-13">Giá đặc biệt</p>
                                            </div>
                                            <input readonly type="text" placeholder="Nhập thông tin"
                                                name="product_unit"
                                                value="{{ number_format($product->price_specialsale) }}"
                                                class="border height-100 border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black" />
                                        </div>

                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 margin-left32 text-13">Trọng lượng</p>
                                            </div>
                                            <input readonly type="text" placeholder="Nhập thông tin"
                                                name="product_unit"
                                                value="{{ number_format($product->product_weight) }}"
                                                class="border height-100 border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black" />
                                        </div>
                                    @endif
                                    <div class="d-flex align-items-center height-60-mobile ">
                                        <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                            <p class="p-0 m-0 margin-left32 text-13">Thuế</p>
                                        </div>
                                        <div
                                            class="border border-top-0 w-100 border-left-0 border-right-0 px-3 height-100 pt-2 pb-1">
                                            <select disabled name="product_tax" id=""
                                                class="text-13-black border-0"
                                                style="background-color:white; width:10%;">
                                                <option value="0"
                                                    @if ($product->product_tax == 0) selected @endif>0%
                                                </option>
                                                <option value="8"
                                                    @if ($product->product_tax == 8) selected @endif>8%
                                                </option>
                                                <option value="10"
                                                    @if ($product->product_tax == 10) selected @endif>
                                                    10%</option>
                                                <option value="99"
                                                    @if ($product->product_tax == 99) selected @endif>
                                                    NOVAT</option>
                                            </select>
                                        </div>
                                    </div>
                                    @if ($product->type == 1)
                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 margin-left32 text-13">Loại sản phẩm</p>
                                            </div>
                                            <input readonly type="text" placeholder="Nhập thông tin"
                                                name="product_type" value="{{ $product->product_type }}"
                                                class="border height-100 border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black">
                                        </div>
                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 margin-left32 text-13">Hãng</p>
                                            </div>
                                            <input readonly type="text" placeholder="Nhập thông tin"
                                                name="product_manufacturer"
                                                value="{{ $product->product_manufacturer }}"
                                                class="border height-100 border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black" />
                                        </div>
                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 margin-left32 text-13">Xuất xứ</p>
                                            </div>
                                            <input readonly type="text" placeholder="Nhập thông tin"
                                                name="product_origin" value="{{ $product->product_origin }}"
                                                class="border height-100 border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black">
                                        </div>
                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 margin-left32 text-13">Bảo hành</p>
                                            </div>
                                            <input readonly type="text" placeholder="Nhập thông tin"
                                                name="product_guarantee" value="{{ $product->product_guarantee }}"
                                                class="border height-100 border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black">
                                        </div>
                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                                <p class="p-0 m-0 height-100 margin-left32 text-13">Quản lý Serial
                                                    Number
                                                </p>
                                            </div>
                                            <div
                                                class="border border-top-0 height-100 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black">
                                                <input disabled type="checkbox" name="check_seri"
                                                    @if ($product->check_seri == 1) checked @endif>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 margin-left32 text-13">Nhóm</p>
                                            </div>
                                            <input readonly type="text" placeholder="Nhập thông tin"
                                                name="product_guarantee"
                                                value="@if ($product->getGroup) {{ $product->getGroup->name }} @endif"
                                                class="border height-100 border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- <section class="content">
                <div class="container-fluided">
                    <div class="row">
                        <div class="col-12">
                            <div class="info-chung">
                                <p class="font-weight-bold text-uppercase info-chung--heading">Thông tin giá</p>
                                <div class="content-info">
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-left-0 height-100 ">
                                            <p class="p-0 m-0 margin-left32 text-13 required-label text-danger">Đơn giá
                                                bán</p>
                                        </div>
                                        <input readonly type="text" placeholder="Nhập thông tin"
                                            name="product_price_export"
                                            value="{{ number_format($product->product_price_export) }}"
                                            class="border w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100 "
                                            autocomplete="off" required>
                                    </div>
                                    <div class="d-flex  align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                            <p class="p-0 m-0 margin-left32 text-13">Đơn giá nhập</p>
                                        </div>
                                        <input readonly type="text" required="" placeholder="Nhập thông tin"
                                            name="product_price_import"
                                            value="{{ number_format($product->product_price_import) }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                    </div>
                                    <div class="d-flex  align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                            <p class="p-0 m-0 margin-left32 text-13">Hệ số nhân</p>
                                        </div>
                                        <input readonly type="text" placeholder="Nhập thông tin"
                                            name="product_ratio" value="{{ $product->product_ratio }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
            @if ($product->type == 1)
                <section class="content">
                    <div class="container-fluided">
                        <div class="row">
                            <div class="col-12 p-0">
                                <div class="info-chung">
                                    <p class="font-weight-bold text-uppercase info-chung--heading">Thông tin tồn kho
                                    </p>
                                    <div class="content-info">
                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class=" py-2 border border-left-0 height-100" style="width:27%;">
                                                <p class="p-0 m-0 margin-left32 text-13 text-left">Tên kho hàng</p>
                                            </div>
                                            <div class="py-2 border border-left-0 height-100 title-info">
                                                <p class="p-0 m-0  text-13 text-right px-2">Tồn kho</p>
                                            </div>
                                            <div class="py-2 border border-left-0 height-100 title-info">
                                                <p class="p-0 m-0 text-13 text-right px-2">Đang giao dịch</p>
                                            </div>
                                            <div class="py-2 border border-left-0 height-100 title-info">
                                                <p class="p-0 m-0 text-13 text-right px-2">Sẵn hàng</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="content-info mb-3">
                                        @if ($product->getProductByWarehouse)
                                            @foreach ($product->getProductByWarehouse as $item)
                                                @if ($item->qty > 0)
                                                    <div class="d-flex align-items-center height-60-mobile">
                                                        <div class="py-2 border border-left-0 height-100"
                                                            style="width:27%;">
                                                            <input type="text"
                                                                class="py-2 border-0  p-0 text-13-black w-100 padding-left35"
                                                                @if ($item->getWarehouse) value="{{ $item->getWarehouse->warehouse_name }}" @endif>
                                                        </div>
                                                        <div class="title-info py-2 border border-left-0 height-100">
                                                            <input
                                                                class="border-0   border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black text-right"
                                                                type="text"
                                                                value="{{ number_format($item->qty) }}">
                                                        </div>
                                                        <div class="title-info py-2 border border-left- height-100">
                                                            <input
                                                                class="border-0   border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black text-right"
                                                                type="text"
                                                                value="{{ number_format($product->product_trade) }}">
                                                        </div>
                                                        <div class="title-info py-2 border border-left-0 height-100">
                                                            <input
                                                                class="border-0   border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black text-right"
                                                                type="text"
                                                                value="{{ number_format($product->product_available) }}">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        </div>

        <div id="history" class="tab-pane fade">
            <section class="content">
                <div class="container-fluided">
                    <div class="row">
                        <div class="col-12">
                            <div class="row m-auto filter pt-2 pb-4 height-50 content__heading--searchFixed">
                                <form class="w-100" action="" method="get" id="search-filter">
                                    <div class="row mr-0">
                                        <div class="col-md-5 d-flex">
                                            <div class="position-relative" style="width: 55%;">
                                                <input type="text" placeholder="Tìm kiếm" name="keywords"
                                                    class="pr-4 w-100 input-search text-13-black" value="">
                                                <span id="search-icon" class="search-icon">
                                                    <i class="fas fa-search" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <button class="btn-filter_search mx-2 d-none" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" viewBox="0 0 16 16" fill="none">
                                                        <path
                                                            d="M12.9548 3H10.0457C9.74445 3 9.50024 3.24421 9.50024 3.54545V6.45455C9.50024 6.75579 9.74445 7 10.0457 7H12.9548C13.256 7 13.5002 6.75579 13.5002 6.45455V3.54545C13.5002 3.24421 13.256 3 12.9548 3Z"
                                                            fill="#6D7075" />
                                                        <path
                                                            d="M6.45455 3H3.54545C3.24421 3 3 3.24421 3 3.54545V6.45455C3 6.75579 3.24421 7 3.54545 7H6.45455C6.75579 7 7 6.75579 7 6.45455V3.54545C7 3.24421 6.75579 3 6.45455 3Z"
                                                            fill="#6D7075" />
                                                        <path
                                                            d="M6.45455 9.50024H3.54545C3.24421 9.50024 3 9.74445 3 10.0457V12.9548C3 13.256 3.24421 13.5002 3.54545 13.5002H6.45455C6.75579 13.5002 7 13.256 7 12.9548V10.0457C7 9.74445 6.75579 9.50024 6.45455 9.50024Z"
                                                            fill="#6D7075" />
                                                        <path
                                                            d="M12.9548 9.50024H10.0457C9.74445 9.50024 9.50024 9.74445 9.50024 10.0457V12.9548C9.50024 13.256 9.74445 13.5002 10.0457 13.5002H12.9548C13.256 13.5002 13.5002 13.256 13.5002 12.9548V10.0457C13.5002 9.74445 13.256 9.50024 12.9548 9.50024Z"
                                                            fill="#6D7075" />
                                                    </svg>
                                                    <span class="text-btnIner">Bộ lọc</span>
                                                    <svg width="16" height="16" viewBox="0 0 16 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                                            fill="#6B6F76" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content-header--options p-0 mt-5">
                <ul class="header-options--nav-1 nav nav-tabs margin-left32">
                    <li>
                        <a class="text-secondary active" data-toggle="tab" href="#detailExport">Bán hàng</a>
                    </li>
                    <li>
                        <a class="text-secondary pr-3" data-toggle="tab" href="#detailImport">Đặt hàng</a>
                    </li>
                </ul>
            </section>
            <section class="content">
                <div class="tab-content">
                    <div class="content tab-pane in active" id="detailExport">
                        <div class="outer text-nowrap">
                            <table id="example2" class="table table-hover bg-white rounded">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width:5%;padding-left: 2rem;" class="height-52">
                                            <input type="checkbox" name="all" id="checkall">
                                        </th>
                                        <th scope="col" class="height-52" style="width: 14%;">
                                            <span class="d-flex justify-content-start">
                                                <a href="#" class="sort-link btn-submit"
                                                    data-sort-by="quotation_number" data-sort-type="DESC">
                                                    <button class="btn-sort text-13" type="submit">
                                                        Mã phiếu
                                                    </button>
                                                </a>
                                                <div class="icon" id="icon-quotation_number"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="height-52" style="width: 15%;">
                                            <span class="d-flex justify-content-start">
                                                <a href="#" class="sort-link btn-submit"
                                                    data-sort-by="reference_number" data-sort-type="DESC"><button
                                                        class="btn-sort text-13" type="submit">Số phiếu</button>
                                                </a>
                                                <div class="icon" id="icon-reference_number"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="height-52" style="width: 15%;">
                                            <span class="d-flex justify-content-start">
                                                <a href="#" class="sort-link btn-submit" data-sort-by="ngayBG"
                                                    data-sort-type="DESC">
                                                    <button class="btn-sort text-13" type="submit">
                                                        Ngày lập
                                                    </button>
                                                </a>
                                                <div class="icon" id="icon-ngayBG"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="height-52" style="width: 15%;">
                                            <span class="d-flex justify-content-start">
                                                <a href="#" class="sort-link btn-submit"
                                                    data-sort-by="guest_name_display" data-sort-type="DESC"><button
                                                        class="btn-sort text-13" type="submit">Khách
                                                        hàng</button>
                                                </a>
                                                <div class="icon" id="icon-guest_name_display"></div>
                                            </span>
                                        </th>
                                        @can('isAdmin')
                                            <th scope="col" class="height-52" style="width: 15%;">
                                                <span class="d-flex justify-content-start">
                                                    <a href="#" class="sort-link btn-submit" data-sort-by=""
                                                        data-sort-type="DESC">
                                                        <button class="btn-sort text-13" type="submit">
                                                            Người tạo
                                                        </button>
                                                    </a>
                                                    <div class="icon" id=""></div>
                                                </span>
                                            </th>
                                        @endcan
                                        <th scope="col" class="height-52" style="width: 15%;">
                                            <span class="d-flex justify-content-center">
                                                <a href="#" class="sort-link btn-submit"
                                                    data-sort-by="status_receive" data-sort-type="DESC"><button
                                                        class="btn-sort text-13" type="submit">Giao hàng</button>
                                                </a>
                                                <div class="icon" id="icon-status_receive"></div>
                                            </span>
                                        </th>
                                        <th scope="col" class="height-52">
                                            <span class="d-flex justify-content-end">
                                                <a href="#" class="sort-link btn-submit"
                                                    data-sort-by="total_price" data-sort-type="DESC"><button
                                                        class="btn-sort text-13" type="submit">Tổng tiền</button>
                                                </a>
                                                <div class="icon" id="icon-total_price"></div>
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="tbody-detailExport">
                                    @foreach ($quoteExport as $value_export)
                                        <tr class="position-relative detailExport-info height-52"
                                            data-id="{{ $value_export->maBG }}">
                                            <input type="hidden" name="id-detailExport" class="id-detailExport"
                                                id="id-detailExport" value="{{ $value_export->maBG }}">
                                            <td class="text-13-black border-top-0 border-bottom">
                                                <span class="margin-Right10">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6"
                                                        height="10" viewBox="0 0 6 10" fill="none">
                                                        <g clip-path="url(#clip0_1710_10941)">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z"
                                                                fill="#282A30" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_1710_10941">
                                                                <rect width="6" height="10" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </span>
                                                <input type="checkbox" class="checkall-btn p-0 m-0" name="ids[]"
                                                    id="checkbox" value="" onclick="event.stopPropagation();">
                                            </td>
                                            <td class="text-13-black text-left border-top-0 border-bottom">
                                                <div class="">
                                                    <a href="{{ route('seeInfo', ['workspace' => $workspacename, 'id' => $value_export->maBG]) }}"
                                                        class="duongDan activity" data-name1="BG"
                                                        data-des="Xem đơn báo giá">{{ $value_export->quotation_number }}</a>
                                                </div>
                                            </td>
                                            <td
                                                class="text-13-black max-width120 text-left border-top-0 border-bottom">
                                                {{ $value_export->reference_number }}
                                            </td>
                                            <td class="text-13-black text-left border-top-0 border-bottom">
                                                {{ date_format(new DateTime($value_export->ngayBG), 'd/m/Y') }}</td>
                                            <td
                                                class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                                {{ $value_export->guest_name_display }}
                                            </td>
                                            @can('isAdmin')
                                                <td
                                                    class="text-13-black max-width180 text-left border-top-0 border-bottom">
                                                    {{ $value_export->name }}
                                                </td>
                                            @endcan
                                            <td class="text-13-black text-center border-top-0 border-bottom">
                                                @if ($value_export->status_receive === 1)
                                                    <svg width="16" height="16" viewBox="0 0 16 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M8 3C5.23858 3 3 5.23858 3 8C3 10.7614 5.23858 13 8 13C10.7614 13 13 10.7614 13 8C13 5.23858 10.7614 3 8 3ZM1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8Z"
                                                            fill="#858585" />
                                                    </svg>
                                                @elseif ($value_export->status_receive === 3)
                                                    <svg width="16" height="16" viewBox="0 0 16 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_1699_20021)">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M7.99694 13.8634C11.237 13.8634 13.8636 11.2368 13.8636 7.9967C13.8636 4.75662 11.237 2.13003 7.99694 2.13003C4.75687 2.13003 2.13027 4.75662 2.13027 7.9967C2.13027 11.2368 4.75687 13.8634 7.99694 13.8634ZM7.99694 15.4634C12.1207 15.4634 15.4636 12.1204 15.4636 7.9967C15.4636 3.87297 12.1207 0.530029 7.99694 0.530029C3.87322 0.530029 0.530273 3.87297 0.530273 7.9967C0.530273 12.1204 3.87322 15.4634 7.99694 15.4634Z"
                                                                fill="#E8B600" />
                                                            <path
                                                                d="M11.8065 7.9967C11.8065 10.1006 10.1009 11.8062 7.99697 11.8062L7.9967 4.18717C10.1007 4.18717 11.8065 5.89275 11.8065 7.9967Z"
                                                                fill="#E8B600" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_1699_20021">
                                                                <rect width="16" height="16" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                @elseif($value_export->status_receive === 2)
                                                    <svg width="16" height="16" viewBox="0 0 16 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z"
                                                            fill="#08AA36" fill-opacity="0.75" />
                                                    </svg>
                                                @endif
                                            </td>
                                            <td class="text-13-black text-right border-top-0 border-bottom">
                                                {{ number_format($value_export->total_price + $value_export->total_tax) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="detailImport">
                        <table id="example2" class="table table-hover">
                            <thead>
                                <tr class="height-52">
                                    <th scope="col" style="width:5%;padding-left: 2rem;"
                                        class="height-52 border-bottom">
                                        <input type="checkbox" name="all" id="checkall" class="checkall-btn">
                                    </th>
                                    <th scope="col" class="border-bottom" style="width: 15%;">
                                        <span class="d-flex justify-content-start">
                                            <a href="#" class="sort-link btn-submit"
                                                data-sort-by="quotation_number" data-sort-type="DESC">
                                                <button class="btn-sort text-13" type="submit">Mã
                                                    phiếu</button>
                                            </a>
                                            <div class="icon" id="icon-quotation_number"></div>
                                        </span>
                                    </th>
                                    <th scope="col" class="border-bottom" style="width: 15%;">
                                        <span class="d-flex justify-content-start">
                                            <a href="#" class="sort-link btn-submit"
                                                data-sort-by="reference_number" data-sort-type="DESC"><button
                                                    class="btn-sort text-13" type="submit">Số phiếu</button>
                                            </a>
                                            <div class="icon" id="icon-reference_number"></div>
                                        </span>
                                    </th>
                                    <th scope="col" class="border-bottom" style="width: 15%;">
                                        <span class="justify-content-start">
                                            <a href="#" class="sort-link btn-submit" data-sort-by="created_at"
                                                data-sort-type="DESC">
                                                <button class="btn-sort text-13" type="submit">Ngày
                                                    lập</button>
                                            </a>
                                            <div class="icon" id="icon-created_at"></div>
                                        </span>
                                    </th>
                                    <th scope="col" class="border-bottom" style="width: 15%;">
                                        <span class="d-flex justify-content-start">
                                            <a href="#" class="sort-link btn-submit"
                                                data-sort-by="provide_name" data-sort-type="DESC"><button
                                                    class="btn-sort text-13" type="submit">Nhà cung
                                                    cấp</button>
                                            </a>
                                            <div class="icon" id="icon-provide_name"></div>
                                        </span>
                                    </th>
                                    @can('isAdmin')
                                        <th scope="col" class="border-bottom" style="width: 15%;">
                                            <span class="d-flex justify-content-start">
                                                <a href="#" class="sort-link" data-sort-by="total"
                                                    data-sort-type=""><button class="btn-sort text-13"
                                                        type="submit">Người tạo</button>
                                                </a>
                                                <div class="icon" id="icon-total"></div>
                                            </span>
                                        </th>
                                    @endcan
                                    <th scope="col" class="border-bottom" style="width: 15%;">
                                        <span class="d-flex justify-content-center">
                                            <a href="#" class="sort-link btn-submit"
                                                data-sort-by="status_receive" data-sort-type="DESC"><button
                                                    class="btn-sort text-13" type="submit">Nhận hàng</button>
                                            </a>
                                            <div class="icon" id="icon-status_receive"></div>
                                        </span>
                                    </th>
                                    <th scope="col" class="border-bottom">
                                        <span class="d-flex justify-content-end">
                                            <a href="#" class="sort-link btn-submit" data-sort-by="total_tax"
                                                data-sort-type="DESC"><button class="btn-sort text-13"
                                                    type="submit">Tổng tiền</button>
                                            </a>
                                            <div class="icon" id="icon-total_tax"></div>
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="tbody-import">
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($import as $item)
                                    <tr class="position-relative import-info height-52"
                                        data-id="{{ $item->id }}">
                                        <input type="hidden" name="id-import" class="id-import" id="id-import"
                                            value="{{ $item->id }}">
                                        <td class="text-13-black border-bottom border-top-0">
                                            <span class="margin-Right10">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="10"
                                                    viewBox="0 0 6 10" fill="none">
                                                    <g clip-path="url(#clip0_1710_10941)">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z"
                                                            fill="#282A30"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1710_10941">
                                                            <rect width="6" height="10" fill="white">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </span>
                                            <input type="checkbox" class="checkall-btn p-0 m-0" name="ids[]"
                                                id="checkbox" value="" onclick="event.stopPropagation();">
                                        </td>
                                        <td class="text-13-black border-bottom border-top-0 text-wrap">
                                            <div class="user_flow" data-type="DMH" data-des="Xem đơn mua hàng">
                                                <a href="{{ route('import.show', ['workspace' => $workspacename, 'import' => $item->id]) }}"
                                                    class="duongDan">
                                                    {{ $item->quotation_number == null ? $item->id : $item->quotation_number }}
                                                </a>
                                            </div>
                                        </td>
                                        <td class="text-13-black border-bottom border-top-0 text-wrap">
                                            {{ $item->reference_number }}
                                        </td>
                                        <td class="text-13-black border-bottom border-top-0">
                                            {{ date_format(new DateTime($item->created_at), 'd/m/Y') }}
                                        </td>
                                        <td class="text-13-black border-bottom border-top-0 text-wrap">
                                            {{ $item->provide_name_display }}
                                        </td>
                                        @can('isAdmin')
                                            <td class="text-13-black border-bottom border-top-0">
                                                @if ($item->getNameUser)
                                                    {{ $item->getNameUser->name }}
                                                @endif
                                            </td>
                                        @endcan
                                        <td class="text-center py-2 border-bottom border-top-0">
                                            @if ($item->status_receive == 0)
                                            @elseif ($item->status_receive == 1)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M7.9967 13.8636C11.2368 13.8636 13.8634 11.237 13.8634 7.99694C13.8634 4.75687 11.2368 2.13027 7.9967 2.13027C4.75662 2.13027 2.13003 4.75687 2.13003 7.99694C2.13003 11.237 4.75662 13.8636 7.9967 13.8636ZM7.9967 15.4636C12.1204 15.4636 15.4634 12.1207 15.4634 7.99694C15.4634 3.87322 12.1204 0.530273 7.9967 0.530273C3.87297 0.530273 0.530029 3.87322 0.530029 7.99694C0.530029 12.1207 3.87297 15.4636 7.9967 15.4636Z"
                                                        fill="#E8B600" />
                                                    <path
                                                        d="M11.8062 7.99694C11.8062 10.1009 10.1007 11.8064 7.99673 11.8064L7.99646 4.18742C10.1004 4.18742 11.8062 5.89299 11.8062 7.99694Z"
                                                        fill="#E8B600" />
                                                </svg>
                                            @elseif($item->status_receive == 2)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 14 14" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                                        fill="#08AA36" fill-opacity="0.75" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 14 14" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M7 2C4.23858 2 2 4.23858 2 7C2 9.76142 4.23858 12 7 12C9.76142 12 12 9.76142 12 7C12 4.23858 9.76142 2 7 2ZM0 7C0 3.13401 3.13401 0 7 0C10.866 0 14 3.13401 14 7C14 10.866 10.866 14 7 14C3.13401 14 0 10.866 0 7Z"
                                                        fill="#858585" />
                                                </svg>
                                            @endif
                                        </td>
                                        <td class="text-13-black text-right border-bottom border-top-0">
                                            {{ number_format($item->total_tax) }}
                                        </td>
                                    </tr>
                                    @php
                                        $total += $item->total_tax;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>

        <div id="serialnumber" class="tab-pane fade">
            <section class="content">
                <div class="container-fluided">
                    <div class="row">
                        <div class="col-12">
                            <div class="row m-auto filter pt-2 pb-4 height-50 content__heading--searchFixed">
                                <form class="w-100" action="" method="get" id="search-filter">
                                    <div class="row mr-0 w-100">
                                        <div class="col-md-5 d-flex">
                                            <div class="position-relative" style="width: 55%;">
                                                <input type="text" placeholder="Tìm kiếm" name="keywords"
                                                    class="pr-4 w-100 input-search text-13-black" value="" />
                                                <span id="search-icon" class="search-icon">
                                                    <i class="fas fa-search" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <button class="btn-filter_search mx-2 d-none" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" viewBox="0 0 16 16" fill="none">
                                                        <path
                                                            d="M12.9548 3H10.0457C9.74445 3 9.50024 3.24421 9.50024 3.54545V6.45455C9.50024 6.75579 9.74445 7 10.0457 7H12.9548C13.256 7 13.5002 6.75579 13.5002 6.45455V3.54545C13.5002 3.24421 13.256 3 12.9548 3Z"
                                                            fill="#6D7075" />
                                                        <path
                                                            d="M6.45455 3H3.54545C3.24421 3 3 3.24421 3 3.54545V6.45455C3 6.75579 3.24421 7 3.54545 7H6.45455C6.75579 7 7 6.75579 7 6.45455V3.54545C7 3.24421 6.75579 3 6.45455 3Z"
                                                            fill="#6D7075" />
                                                        <path
                                                            d="M6.45455 9.50024H3.54545C3.24421 9.50024 3 9.74445 3 10.0457V12.9548C3 13.256 3.24421 13.5002 3.54545 13.5002H6.45455C6.75579 13.5002 7 13.256 7 12.9548V10.0457C7 9.74445 6.75579 9.50024 6.45455 9.50024Z"
                                                            fill="#6D7075" />
                                                        <path
                                                            d="M12.9548 9.50024H10.0457C9.74445 9.50024 9.50024 9.74445 9.50024 10.0457V12.9548C9.50024 13.256 9.74445 13.5002 10.0457 13.5002H12.9548C13.256 13.5002 13.5002 13.256 13.5002 12.9548V10.0457C13.5002 9.74445 13.256 9.50024 12.9548 9.50024Z"
                                                            fill="#6D7075" />
                                                    </svg>
                                                    <span class="text-btnIner">Bộ lọc</span>
                                                    <svg width="16" height="16" viewBox="0 0 16 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                                            fill="#6B6F76" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content margin-top-fixed3">
                <div class="container-fluided table-responsive">
                    <table class="table table-hover bg-white rounded" id="inputcontent">
                        <thead>
                            <tr>
                                <th scope="col" class="text-nowrap text-13 padding-left35">Serial Number
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                        viewBox='0 0 16 16' fill='none'>
                                        <path
                                            d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z'
                                            fill='#6B6F76' />
                                    </svg>
                                </th>
                                <th scope="col" class="text-nowrap text-13">Đơn mua hàng
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                        viewBox='0 0 16 16' fill='none'>
                                        <path
                                            d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z'
                                            fill='#6B6F76' />
                                    </svg>
                                </th>
                                <th scope="col" class="text-nowrap text-13">Đơn bán hàng
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                        viewBox='0 0 16 16' fill='none'>
                                        <path
                                            d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z'
                                            fill='#6B6F76' />
                                    </svg>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history as $item)
                                @if ($item->getSerialNumber)
                                    @foreach ($item->getSerialNumber as $sn)
                                        @if ($item->product_id == $sn->product_id)
                                            <tr class="bg-white">
                                                <td class="text-14-black padding-left35 text-left border-top-0 border-bottom"
                                                    style="width: 33.34%;"> {{ $sn->serinumber }} </td>
                                                <td class= "text-14-blue text-left border-top-0 border-bottom"
                                                    style="width: 33.34%;">
                                                    <span style="display:block;" class="text-14-blue">
                                                        <a
                                                            href="{{ route('receive.edit', ['workspace' => $workspacename, 'receive' => $item->getReceive->id]) }}">
                                                            {{ $item->getReceive->delivery_code }}
                                                        </a>
                                                    </span>
                                                    <span style="display:block;" class="text-14-blue">
                                                        {{ date_format(new DateTime($sn->created_at), 'd-m-Y') }}
                                                    </span>
                                                </td>
                                                <td
                                                    class="text-14-blue text-left border-top-0 border-bottom"style="width: 33.34%;">
                                                    @if ($sn->getQuotation)
                                                        <span style="display:block;" class="text-14-blue">
                                                            <a
                                                                href="{{ route('watchDelivery', ['workspace' => $workspacename, 'id' => $sn->getQuotation->id]) }}">
                                                                {{ $sn->getQuotation->code_delivery }}
                                                            </a>
                                                        </span>
                                                        <span style="display:block;" class="text-14-blue">
                                                            {{ date_format(new DateTime($sn->getQuotation->created_at), 'd-m-Y') }}
                                                        </span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</div>
</div>
<script src="{{ asset('/dist/js/products.js') }}"></script>
