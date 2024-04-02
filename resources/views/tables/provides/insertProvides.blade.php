<x-navbar :title="$title" activeGroup="buy" activeName="provide"></x-navbar>
<form action="{{ route('provides.store', $workspacename) }}" method="POST">
    @csrf
    <div class="content-wrapper m-0">
        <!-- Content Header (Page header) -->
        <div class="content-header-fixed p-0 margin-250">
            <div class="content__header--inner margin-left32">
                <div class="content__heading--left">
                    <span>Mua hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="nearLast-span">
                        <a class="text-dark" href="{{ route('provides.index', $workspacename) }}">
                            Nhà cung cấp
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
                    <span class="last-span">Tạo nhà cung cấp</span>
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <a href="{{ route('provides.index', $workspacename) }}" class="user_flow" data-type="NCC"
                            data-des="Hủy thêm nhà cung cấp">
                            <button class="btn-destroy btn-light mx-1 d-flex align-items-center h-100" type="button">
                                <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z"
                                        fill="#6D7075"></path>
                                </svg>
                                <span class="text-btnIner-primary ml-1">Hủy</span>
                            </button>
                        </a>

                        <button type="submit" class="custom-btn d-flex mx-1 align-items-center h-100"
                            style="margin-right:10px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                    fill="white" />
                            </svg>
                            <span class="text-btnIner-primary ml-2">Lưu nhà cung cấp</span>
                        </button>

                        <button class="btn-option">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                                    fill="#42526E" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                                    fill="#42526E" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                                    fill="#42526E" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="content margin-top-38">
            <section class="content margin-250">
                <div class="container-fluided">
                    <div class="bg-filter-search border-top-0 text-left border-custom">
                        <p class="font-weight-bold text-uppercase info-chung--heading">THÔNG TIN CHUNG</p>
                    </div>
                    <div class="info-chung">
                        <div class="content-info">
                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-left-0 height-100">
                                    <p class="p-0 m-0 required-label margin-left32 text-13-red">Tên hiển thị</p>
                                </div>
                                <input type="text" required placeholder="Nhập thông tin" name="provide_name_display"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                            </div>
                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                    <p class="p-0 m-0  margin-left32 required-label text-13-red">Mã số thuế</p>
                                </div>
                                <input type="text" required placeholder="Nhập thông tin" name="provide_code"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                            </div>
                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                    <p class="p-0 m-0  margin-left32 required-label text-13-red">Địa chỉ</p>
                                </div>
                                <input type="text" required placeholder="Nhập thông tin" name="provide_address"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                            </div>
                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                    <p class="p-0 m-0  margin-left32 text-13">Tên viết tắt</p>
                                </div>
                                <input type="text" placeholder="Nhập thông tin" name="key"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                            </div>
                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                    <p class="p-0 m-0  margin-left32 text-13">Tên đầy đủ</p>
                                </div>
                                <input type="text" placeholder="Nhập thông tin" name="provide_name"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                            </div>
                        </div>
                    </div>
                    {{-- Thông tin đại diện --}}
                    <div class="bg-filter-search border-top-0 text-left border-custom">
                        <p class="font-weight-bold text-uppercase info-chung--heading">THÔNG TIN NGƯỜI ĐẠI DIỆN</p>
                    </div>
                    <div class="info-chung">
                        <div class="container-fluided order_content">
                            <table class="table table-hover bg-white rounded" id="listrepesent">
                                <thead>
                                    <tr>
                                        <th class="border-right text-13 px-0 py-2 padding-left35 height-52"
                                            style="width: 23%;">Người đại diện</th>
                                        <th class="border-right text-13 px-0 py-2 padding-left35 height-52"
                                            style="width: 20%;">Số điện thoại</th>
                                        <th class="border-right text-13 px-0 py-2 padding-left35 height-52"
                                            style="width: 20%;">Email</th>
                                        <th class="border-right text-13 px-0 py-2 padding-left35 height-52"
                                            style="width: 20%;">Địa chỉ nhận</th>
                                        <th class="border-right text-13 px-0 py-2 padding-left35 height-52"
                                            style="width: 20%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <section class="content margin-left32">
                            <div class="container-fluided">
                                <div class="d-flex">
                                    <button type="button" data-toggle="dropdown"
                                        class="btn-save-print d-flex align-items-center h-100 py-1 px-2 user_flow"
                                        data-type="NCC" data-des="Thêm người đại diện" id="addRowRepesent"
                                        style="margin-right:10px; border-radius:4px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
                                            <path
                                                d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                                fill="#6D7075" />
                                        </svg>
                                        <span class="text-13 pl-2">Thêm người đại diện</span>
                                    </button>
                                    <button class="btn-option py-1 px-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
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
                                    </button>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </div>
    </div>

</form>
</div>
<script src="{{ asset('/dist/js/import.js') }}"></script>
<script src="{{ asset('/dist/js/products.js') }}"></script>
<script>
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
                    console.log(data);
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
</script>
