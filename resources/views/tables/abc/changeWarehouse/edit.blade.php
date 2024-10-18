<x-navbar :title="$title" activeGroup="manageProfess" activeName="changeWarehouse"></x-navbar>
<form
    action="{{ route('changeWarehouse.update', ['workspace' => $workspacename, 'changeWarehouse' => $changeWarehouse->id]) }}"
    method="POST" id="formSubmit" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="content-wrapper m-0 min-height--none p-0">
        <!-- Content Header (Page header) -->
        <div class="content-header-fixed p-0">
            <div class="content__header--inner">
                <div class="content__heading--left opacity-0">
                    {{-- <span>Kho hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span> --}}
                    <span class="nearLast-span ml-4">
                        <a class="text-dark" href="{{ route('changeWarehouse.index', $workspacename) }}">
                            Phiếu chuyển kho
                        </a>
                    </span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="last-span">Chỉnh sửa phiếu xuất chuyển kho</span>
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <a href="{{ route('changeWarehouse.index', $workspacename) }}" class="user_flow" data-type="NCC"
                            data-des="Hủy thêm nhà cung cấp">
                            <button class="btn-destroy btn-light mx-1 d-flex align-items-center h-100" type="button">
                                <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 14 14" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM5.03033 3.96967C4.73744 3.67678 4.26256 3.67678 3.96967 3.96967C3.67678 4.26256 3.67678 4.73744 3.96967 5.03033L5.93934 7L3.96967 8.96967C3.67678 9.26256 3.67678 9.73744 3.96967 10.0303C4.26256 10.3232 4.73744 10.3232 5.03033 10.0303L7 8.06066L8.96967 10.0303C9.26256 10.3232 9.73744 10.3232 10.0303 10.0303C10.3232 9.73744 10.3232 9.26256 10.0303 8.96967L8.06066 7L10.0303 5.03033C10.3232 4.73744 10.3232 4.26256 10.0303 3.96967C9.73744 3.67678 9.26256 3.67678 8.96967 3.96967L7 5.93934L5.03033 3.96967Z"
                                        fill="#6D7075" />
                                </svg>
                                <p class="m-0 p-0">Hủy</p>
                            </button>
                        </a>

                        <button id="sideGuest" type="button" class="btn-option border-0 mx-1">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="16" width="16" height="16" rx="5" transform="rotate(90 16 0)"
                                    fill="#ECEEFA"></rect>
                                <path
                                    d="M15 11C15 13.2091 13.2091 15 11 15L5 15C2.7909 15 1 13.2091 1 11L1 5C1 2.79086 2.7909 1 5 1L11 1C13.2091 1 15 2.79086 15 5L15 11ZM10 13.5L10 2.5L5 2.5C3.6193 2.5 2.5 3.61929 2.5 5L2.5 11C2.5 12.3807 3.6193 13.5 5 13.5H10Z"
                                    fill="#26273B" fill-opacity="0.8"></path>
                            </svg>
                        </button>

                        {{-- <button type="submit" class="custom-btn d-flex align-items-center h-100"
                            style="margin-right:10px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                    fill="white" />
                            </svg>
                            <span class="text-btnIner-primary ml-2">Xác nhận chuyển tiền</span>
                        </button> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="content" style="margin-top: 8.7rem;">
            <div class="" id="main">
                <section class="content">
                    <div class="container-fluided">
                        <div class="info-chung">
                            <div class="content-info">
                                <div class="d-flex w-100">
                                    <div
                                        class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-60-mobile">
                                        <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày lập</span>
                                        <input type="text" placeholder="Chọn ngày" id="datePicker" readonly
                                            value="{{ date_format(new DateTime($changeWarehouse->created_at), 'd/m/Y') }}"
                                            class="border-0 w-100 py-2 px-3 text-13-black height-100">
                                        <input type="hidden" name="created_at" id="hiddenDateInput">
                                    </div>
                                    <div
                                        class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-60-mobile">
                                        <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Thủ kho</span>
                                        <div class="w-100">
                                            <select name="manager_warehouse" disabled
                                                class="text-13-black w-100 border-0 bg-input-guest py-2 px-2">
                                                @foreach ($users as $user_item)
                                                    <option value="{{ $user_item->id }}"
                                                        @if ($changeWarehouse->manager_warehouse == $user_item->id) selected @endif>
                                                        {{ $user_item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-60-mobile">
                                        <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Kho xuất</span>
                                        <input type="text" placeholder="Nhập thông tin" name="qty" required
                                            class="w-100 py-2 border-0 px-3 text-13-black height-100"
                                            @if ($changeWarehouse->getFromWarehouse) value="{{ $changeWarehouse->getFromWarehouse->warehouse_name }}" @endif
                                            readonly>
                                    </div>
                                </div>
                                <div class="d-flex w-100">
                                    <div
                                        class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-60-mobile">
                                        <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Mã phiếu</span>
                                        <input type="text" readonly name="change_warehouse_code"
                                            value="{{ $changeWarehouse->change_warehouse_code }}"
                                            class="border-0 w-100 py-2 px-3 text-13-black height-100">
                                    </div>
                                    <div
                                        class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-60-mobile">
                                        <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Người lập</span>
                                        <input type="text" placeholder="Nhập thông tin"
                                            class="border-0 w-100 py-2 px-3 text-13-black height-100"
                                            value="{{ Auth::user()->name }}" readonly>
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    </div>
                                    <div
                                        class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-60-mobile">
                                        <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Kho nhận</span>
                                        <input type="text" placeholder="Nhập thông tin" name="qty" required
                                            class="border-0 w-100 py-2 px-3 text-13-black height-100"
                                            @if ($changeWarehouse->getToWarehouse) value="{{ $changeWarehouse->getToWarehouse->warehouse_name }}" @endif
                                            readonly>
                                    </div>
                                </div>
                                <div class="d-flex w-100">
                                    <div
                                        class="d-flex w-100 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative height-60-mobile">
                                        <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ghi chú</span>
                                        <input type="text" readonly name="note"
                                            class="border-0 w-100 py-2 px-3 text-13-black height-100"
                                            value="{{ $changeWarehouse->note }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {{-- Thông tin hàng hóa --}}
                <div class="content">
                    <div id="title--fixed" class="bg-filter-search text-center border-custom border-0">
                        <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN SẢN PHẨM
                        </p>
                    </div>
                    <div class="container-fluided">
                        <section class="content">
                            <table class="table" id="inputcontent">
                                <thead>
                                    <tr style="height:44px;">
                                        <th class="border-right px-2 p-0 text-left">
                                            <span class="text-table text-secondary">Hàng hóa</span>
                                        </th>
                                        <th class="border-right px-2 p-0 text-left">
                                            <span class="text-table text-secondary">ĐVT</span>
                                        </th>
                                        <th class="border-right px-2 p-0 text-left">
                                            <span class="text-table text-secondary">Số lượng</span>
                                        </th>
                                        <th class="border-right note px-2 p-0 text-left">
                                            <span class="text-table text-secondary">Ghi chú</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $item_product)
                                        <tr>
                                            <td
                                                class="border-right p-2 text-13-black align-top position-relative border-bottom border-top-0">
                                                {{ $item_product->product_name }}</td>
                                            <td
                                                class="border-right p-2 text-13-black align-top position-relative border-bottom border-top-0">
                                                {{ $item_product->product_unit }}</td>
                                            <td
                                                class="border-right p-2 text-13-black align-top position-relative border-bottom border-top-0">
                                                {{ $item_product->qty }}</td>
                                            <td
                                                class="border-right p-2 text-13-black align-top position-relative border-bottom border-top-0">
                                                {{ $item_product->note }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div>
            <x-view-mini :listDetail="$listDetail" :workspacename="$workspacename" :page="'PXCK'" :status="'2'" :listUser="$users" />
        </div>
</form>
</div>
<script src="{{ asset('/dist/js/import.js') }}"></script>
<script src="{{ asset('/dist/js/products.js') }}"></script>
{{-- <script>
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
</script> --}}

{{-- <script>
    getKeyProvide($('input[name="provide_name_display"]'))
    $('form').on('submit', function(e) {
        e.preventDefault();
        var check = false;
        var provide_name_display = $("input[name='provide_name_display']").val().trim();
        var provide_code = $("input[name='provide_code']").val().trim();
        var provide_address = $("input[name='provide_address']").val().trim();
        var key = $("input[name='key']").val().trim();

        if (provide_name_display == '') {
            showNotification('warning', 'Vui lòng nhập tên hiển thị')
            check = true;
            return false;
        }
        if (provide_code == '') {
            showNotification('warning', 'Vui lòng nhập mã số thuế')
            check = true;
            return false;
        }
        if (provide_address == '') {
            showNotification('warning', 'Vui lòng nhập địa chỉ nhà cung cấp')
            check = true;
            return false;
        }

        if (!check) {
            $.ajax({
                url: "{{ route('checkKeyProvide') }}",
                type: "get",
                data: {
                    provide_name_display: provide_name_display,
                    provide_code: provide_code,
                    provide_address: provide_address,
                    key: key,
                    status: "add"
                },
                success: function(data) {
    
                    if (data.success) {
                        $('form')[1].submit();
                    } else {
                        if (data.key) {
                            $("input[name='key']").val(data.key)
                            showNotification('warning', data.msg);
                            delayAndShowNotification('success', 'Tên viết tắt đã được thay đổi',
                                500);
                        } else {
                            showNotification('warning', data.msg);
                        }
                    }
                }
            })
        }
    })

    function delayAndShowNotification(type, message, delayTime) {
        setTimeout(function() {
            showNotification(type, message);
        }, delayTime);
    }

    $(document).off('click').on('click', '.user_flow', function(e) {
        var type = $(this).attr('data-type')
        var des = $(this).attr('data-des');
        $.ajax({
            url: "{{ route('addUserFlow') }}",
            type: "get",
            data: {
                type: type,
                des: des
            },
            success: function(data) {}
        })
    })
</script> --}}
