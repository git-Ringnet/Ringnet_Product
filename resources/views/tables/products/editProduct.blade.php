<x-navbar :title="$title" activeGroup="products" activeName="editproduct"></x-navbar>
<form action="{{ route('inventory.update', ['workspace' => $workspacename, 'inventory' => $product->id]) }}"
    method="POST">
    @method('PUT')
    @csrf
    <input type="hidden" name="type_product" value="{{ $product->type }}">
    <div class="content-wrapper editGuest min-height--none" style="background: none;">
        <div class="content-header-fixed p-0 margin-250">
            <div class="content__header--inner margin-left32">
                <div class="content__heading--left">
                    <span>Kho hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="nearLast-span">Sản phẩm</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="last-span">
                        Sửa sản phẩm
                    </span>
                </div>
                <div class="d-flex content__heading--right">
                    <a href="{{ route('inventory.index', $workspacename) }}">
                        <button type="button"
                            class="btn-destroy btn-light mx-1 d-flex align-items-center h-100 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM5.03033 3.96967C4.73744 3.67678 4.26256 3.67678 3.96967 3.96967C3.67678 4.26256 3.67678 4.73744 3.96967 5.03033L5.93934 7L3.96967 8.96967C3.67678 9.26256 3.67678 9.73744 3.96967 10.0303C4.26256 10.3232 4.73744 10.3232 5.03033 10.0303L7 8.06066L8.96967 10.0303C9.26256 10.3232 9.73744 10.3232 10.0303 10.0303C10.3232 9.73744 10.3232 9.26256 10.0303 8.96967L8.06066 7L10.0303 5.03033C10.3232 4.73744 10.3232 4.26256 10.0303 3.96967C9.73744 3.67678 9.26256 3.67678 8.96967 3.96967L7 5.93934L5.03033 3.96967Z"
                                    fill="#6D7075" />
                            </svg>
                            <span class="text-btnIner-primary ml-2">Hủy</span>
                        </button>
                    </a>
                    {{-- Sửa --}}
                    @if ($display == 1)
                        <button class="custom-btn d-flex align-items-center h-100" name="action" value="1"
                            style="margin-right:10px;">
                            <svg class="mx-1" width="18" height="18" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                    fill="white"></path>
                            </svg>
                            <span class="text-btnIner-primary ml-2">Lưu</span>
                        </button>
                    @endif
                    {{-- Sửa tồn kho --}}
                    @if ($display == 2)
                        <div class="mr-2">
                            <button class="custom-btn d-flex align-items-center h-100" name="action" value="2"
                                style="margin-right:10px;">
                                <svg class="mx-1" width="18" height="18" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                        fill="white"></path>
                                </svg>
                                <span>Sửa tồn kho</span>
                            </button>
                        </div>
                    @endif
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
        <div class="content editGuest margin-top-38">
            <section class="content">
                <section class="container-fluided">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="info-chung">
                                <p class="font-weight-bold text-uppercase info-chung--heading border-custom">Thông tin
                                    chung</p>
                                <div class="content-info">

                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-left-0 border-top-0 height-100">
                                            <p class="p-0 m-0 text-danger margin-left32 text-13">Danh mục sản phẩm</p>
                                        </div>
                                        <div
                                            class="border height-100 w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black d-flex">
                                            <input type="radio" id="hanghoa" name="type_product" value="1"
                                                class="py-2" @if ($product->type == 1) checked @endif
                                                disabled style="margin-right:10px;">
                                            <label for="html" class="m-0">Hàng hóa</label>
                                            <input type="radio" id="dichvu" name="type_product" value="2"
                                                class="py-2" @if ($product->type == 2) checked @endif
                                                disabled style="margin-left:40px; margin-right:10px;">
                                            <label for="html" class="m-0">Dịch vụ</label>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-left-0 border-top-0 height-100">
                                            <p class="p-0 m-0 required-label text-danger margin-left32 text-13">Tên sản
                                                phẩm
                                            </p>
                                        </div>
                                        <input required type="text" placeholder="Nhập thông tin"
                                            name="product_name" value="{{ $product->product_name }}"
                                            class="border height-100 w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black">
                                    </div>
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-left-0 border-top-0 height-100">
                                            <p class="p-0 m-0 margin-left32 text-13">Mã sản phẩm</p>
                                        </div>
                                        <input type="text" placeholder="Nhập thông tin" name="product_code"
                                            value="{{ $product->product_code }}"
                                            class="border height-100 w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black">
                                    </div>
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-left-0 border-top-0 height-100">
                                            <p class="p-0 m-0 margin-left32 text-13">Đơn vị tính</p>
                                        </div>
                                        <input type="text" placeholder="Nhập thông tin" name="product_unit"
                                            value="{{ $product->product_unit }}"
                                            class="border height-100 w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black">
                                    </div>
                                    <div class="d-flex align-items-center height-60-mobile ">
                                        <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                            <p class="p-0 m-0 margin-left32 text-13">Thuế</p>
                                        </div>
                                        <div
                                            class="border border-top-0 w-100 border-left-0 border-right-0 px-3 height-100 pt-2 pb-1">
                                            <select name="product_tax" id="" class="text-13-black border-0"
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
                                            <div class="title-info py-2 border border-left-0 border-top-0 height-100">
                                                <p class="p-0 m-0 margin-left32 text-13">Loại sản phẩm</p>
                                            </div>
                                            <input type="text" placeholder="Nhập thông tin" name="product_type"
                                                value="{{ $product->product_type }}"
                                                class="border height-100 w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black">
                                        </div>
                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info py-2 border border-left-0 border-top-0 height-100">
                                                <p class="p-0 m-0 margin-left32 text-13">Hãng</p>
                                            </div>
                                            <input type="text" placeholder="Nhập thông tin"
                                                name="product_manufacturer"
                                                value="{{ $product->product_manufacturer }}"
                                                class="border height-100 w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black">
                                        </div>
                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info py-2 border border-left-0 border-top-0 height-100">
                                                <p class="p-0 m-0 margin-left32 text-13">Xuất xứ</p>
                                            </div>
                                            <input type="text" placeholder="Nhập thông tin" name="product_origin"
                                                value="{{ $product->product_origin }}"
                                                class="border height-100 w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black">
                                        </div>
                                        <div class="d-flex align-items-center height-60-mobile">
                                            <div class="title-info py-2 border border-left-0 border-top-0 height-100">
                                                <p class="p-0 m-0 margin-left32 text-13">Bảo hành</p>
                                            </div>
                                            <input type="text" placeholder="Nhập thông tin"
                                                name="product_guarantee" value="{{ $product->product_guarantee }}"
                                                class="border height-100 w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black">
                                        </div>
                                        @if ($product->getSerialNumber)
                                            @if (count($product->getSerialNumber) == 0 && $product->product_inventory == 0)
                                                <div class="d-flex align-items-center height-60-mobile">
                                                    <div
                                                        class="title-info py-2 border border-left-0 border-top-0 height-100">
                                                        <p class="p-0 m-0 margin-left32 text-13">Quản lý Serial Number
                                                        </p>
                                                    </div>
                                                    <div
                                                        class="border height-100 w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black">
                                                        <input type="checkbox" name="check_seri"
                                                            @if ($product->check_seri == 1) checked @endif>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {{-- @if ($product->type == 1)
                    <section class="content">
                        <div class="container-fluided">
                            <div class="row">
                                <div class="col-12 p-0">
                                    <div class="info-chung">
                                        <p class="font-weight-bold text-uppercase info-chung--heading">Thông tin tồn
                                            kho
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
                                            <div class="d-flex align-items-center height-60-mobile">
                                                <div class="py-2 border border-left-0 height-100" style="width:27%;">
                                                    <input type="text"
                                                        class="py-2 border-0  p-0 text-13-black w-100 padding-left35"
                                                        value="{{ $product->product_manufacturer }}">
                                                </div>
                                                <div class="title-info py-2 border border-left-0 height-100">
                                                    <input
                                                        class="border-0   border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black text-right"
                                                        type="text"
                                                        value="{{ number_format($product->product_inventory) }}">
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif --}}
            </section>
        </div>
    </div>
</form>
</div>
<script src="{{ asset('/dist/js/products.js') }}"></script>
<script>
    $('form').on('submit', function(e) {
        e.preventDefault();
        var id = {{ $product->id }}
        var name = $('input[name="product_name"]').val()
        $.ajax({
            url: "{{ route('checkProductName') }}",
            type: "get",
            data: {
                name: name,
                action: "edit",
                id: id
            },
            success: function(data) {
                if (data.status == false) {
                    showNotification('warning', data.msg);
                } else {
                    $('form')[1].submit();
                }
            }
        })
    })
</script>
