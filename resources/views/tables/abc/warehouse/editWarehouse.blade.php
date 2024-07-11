<x-navbar :title="$title" activeGroup="systemFirst" activeName="warehouse"></x-navbar>
<form action="{{ route('warehouse.update', ['workspace' => $workspacename, 'warehouse' => $wareHouse->id]) }}"
    method="POST">
    @method('PUT')
    @csrf
    <div class="pr-2 editGuest min-height--none" style="background: none;">
        <div class="content-header-fixed p-0">
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
                    <span class="nearLast-span">Kho</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="last-span">
                        Sửa thông tin kho
                    </span>
                </div>
                <div class="d-flex content__heading--right">
                    <a href="{{ route('warehouse.index', $workspacename) }}">
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
                        <div class="col-12">
                            <div class="info-chung">
                                <p class="font-weight-bold text-uppercase info-chung--heading border-custom">Thông tin
                                    chung</p>
                                <div class="content-info">

                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-left-0 border-top-0 height-100">
                                            <p class="p-0 m-0 text-danger margin-left32 text-13">Mã kho
                                                hàng
                                            </p>
                                        </div>
                                        <input type="hidden" placeholder="Nhập thông tin" name="id"
                                            value="{{ $wareHouse->id }}">
                                        <input type="text" placeholder="Nhập thông tin" name="warehouse_code"
                                            value="{{ $wareHouse->warehouse_code }}"
                                            class="border height-100 w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black">
                                    </div>
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-left-0 border-top-0 height-100">
                                            <p class="p-0 required-label m-0 margin-left32 text-13-red">Tên kho hàng</p>
                                        </div>
                                        <input type="text" placeholder="Nhập thông tin" name="warehouse_name"
                                            value="{{ $wareHouse->warehouse_name }}" required
                                            class="border height-100 w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black">
                                    </div>
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-left-0 border-top-0 height-100">
                                            <p class="p-0 m-0 margin-left32 text-13">Địa chỉ</p>
                                        </div>
                                        <input type="text" placeholder="Nhập thông tin" name="warehouse_address"
                                            value="{{ $wareHouse->warehouse_address }}"
                                            class="border height-100 w-100 py-2 border-left-0 border-right-0 border-top-0 px-3 text-13-black">
                                    </div>
                                </div>
                            </div>
                            <div class="bg-filter-search border-top-0 text-left border-custom">
                                <p class="font-weight-bold text-uppercase info-chung--heading">THỦ KHO</p>
                            </div>
                            <div class="info-chung">
                                <div class="outer container-fluided order_content">
                                    <table class="table table-hover bg-white rounded" id="warehouseTable">
                                        <thead>
                                            <tr>
                                                <th class="border-right height-52 padding-left35 text-13-red required-label"
                                                    style="width: 23%;">
                                                    Tên thủ kho
                                                </th>
                                                <th class="border-right height-52 padding-left35 text-13"
                                                    style="width: 23%;">
                                                    Số điện thoại
                                                </th>
                                                <th class="border-right height/-52 padding-left35 text-13"
                                                    style="width: 23%;">
                                                    Email
                                                </th>
                                                <th style="width: 8%;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($warehouseManager as $item)
                                                <tr id="dynamic-row-1"
                                                    class="bg-white addWarehouse representative-row">
                                                    <td class="border border-top-0 border-left-0 padding-left35">
                                                        <input type="text" autocomplete="off"
                                                            value="{{ $item->name }}"
                                                            class="border-0 px-2 py-1 w-100" required=""
                                                            name="name[]">
                                                        <input type="hidden" autocomplete="off"
                                                            value="{{ $item->id }}" name="manager_id[]">
                                                    </td>
                                                    <td class="border border-top-0 padding-left35 border-left-0"><input
                                                            type="number" autocomplete="off"
                                                            value="{{ $item->phone }}"
                                                            class="border-0 px-2 py-1 w-100" name="phone[]"></td>
                                                    <td class="border border-top-0 padding-left35 border-left-0"><input
                                                            type="email" autocomplete="off"
                                                            value="{{ $item->email }}"
                                                            class="border-0 px-2 py-1 w-100" name="email[]"></td>
                                                    <td class="border border-top-0 border-right-0 text-left border-left-0 delete-product"
                                                        data-name1="KH" data-des="Xóa người đại diện"><svg
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M10.5454 5C10.2442 5 9.99999 5.24421 9.99999 5.54545C9.99999 5.8467 10.2442 6.09091 10.5454 6.09091H13.4545C13.7558 6.09091 14 5.8467 14 5.54545C14 5.24421 13.7558 5 13.4545 5H10.5454ZM6 7.72726C6 7.42601 6.24421 7.18181 6.54545 7.18181H7.63637H16.3636H17.4545C17.7558 7.18181 18 7.42601 18 7.72726C18 8.02851 17.7558 8.27272 17.4545 8.27272H16.9091V17C16.9091 18.2113 15.9118 19.1818 14.7135 19.1818H9.25891C8.97278 19.1816 8.68906 19.1247 8.42499 19.0145C8.16092 18.9044 7.92126 18.7431 7.71979 18.5399C7.51833 18.3367 7.35905 18.0957 7.25112 17.8307C7.14347 17.5664 7.08903 17.2834 7.09091 16.9981V8.27272H6.54545C6.24421 8.27272 6 8.02851 6 7.72726ZM8.18182 17.0041V8.27272H15.8182V17C15.8182 17.5966 15.3216 18.0909 14.7135 18.0909H9.25938C9.11713 18.0908 8.97632 18.0625 8.84503 18.0077C8.71375 17.953 8.5946 17.8728 8.49444 17.7718C8.39429 17.6707 8.3151 17.5509 8.26144 17.4192C8.20779 17.2874 8.18074 17.1464 8.18182 17.0041ZM13.4545 10.0909C13.7558 10.0909 14 10.3351 14 10.6364V15.7273C14 16.0285 13.7558 16.2727 13.4545 16.2727C13.1533 16.2727 12.9091 16.0285 12.9091 15.7273V10.6364C12.9091 10.3351 13.1533 10.0909 13.4545 10.0909ZM11.0909 10.6364C11.0909 10.3351 10.8467 10.0909 10.5454 10.0909C10.2442 10.0909 9.99999 10.3351 9.99999 10.6364V15.7273C9.99999 16.0285 10.2442 16.2727 10.5454 16.2727C10.8467 16.2727 11.0909 16.0285 11.0909 15.7273V10.6364Z"
                                                                fill="#42526E"></path>
                                                        </svg>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr id="dynamic-fields" class="bg-white"></tr>
                                        </tbody>
                                    </table>
                                </div>
                                <section class="content">
                                    <div class="container-fluided">
                                        <div class="d-flex">
                                            <button type="button" data-toggle="dropdown" id="add-warehouse-manager"
                                                data-name1="K" data-des="Thêm thủ kho"
                                                class="btn-save-print d-flex align-items-center h-100 py-1 px-2 ml-4 rounded activity"
                                                style="margin-right:10px">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none">
                                                    <path
                                                        d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                                        fill="#6D7075" />
                                                </svg>
                                                <span class="text-13 pl-2">Thêm thủ kho</span>
                                            </button>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </div>
    </div>
</form>
</div>
<script src="{{ asset('/dist/js/export.js') }}"></script>
<script>
    $(document).ready(function() {
        $("form").on("submit", function(e) {
            var rows = $("#warehouseTable .addWarehouse");
            if (rows.length === 0) {
                showAutoToast("warning", "Vui lòng thêm thủ kho!");
                e.preventDefault();
            }
        });
    });
</script>
{{-- <script src="{{ asset('/dist/js/products.js') }}"></script>
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
</script> --}}
