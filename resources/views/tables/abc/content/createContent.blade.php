<x-navbar :title="$title" activeGroup="systemFirst" activeName="content"></x-navbar>
<form action="{{ route('content.store', $workspacename) }}" method="POST">
    @csrf
    <div class="content-wrapper m-0 min-height--none">
        <!-- Content Header (Page header) -->
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
                    <span class="nearLast-span">
                        <a class="text-dark" href="{{ route('provides.index', $workspacename) }}">
                            Kho
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
                    <span class="last-span">Tạo nội dung thu chi</span>
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <a href="{{ route('warehouse.index', $workspacename) }}" class="user_flow" data-type="NCC"
                            data-des="Hủy thêm nhà cung cấp">
                            <button class="btn-destroy btn-light mx-1 d-flex align-items-center h-100" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 14 14" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM5.03033 3.96967C4.73744 3.67678 4.26256 3.67678 3.96967 3.96967C3.67678 4.26256 3.67678 4.73744 3.96967 5.03033L5.93934 7L3.96967 8.96967C3.67678 9.26256 3.67678 9.73744 3.96967 10.0303C4.26256 10.3232 4.73744 10.3232 5.03033 10.0303L7 8.06066L8.96967 10.0303C9.26256 10.3232 9.73744 10.3232 10.0303 10.0303C10.3232 9.73744 10.3232 9.26256 10.0303 8.96967L8.06066 7L10.0303 5.03033C10.3232 4.73744 10.3232 4.26256 10.0303 3.96967C9.73744 3.67678 9.26256 3.67678 8.96967 3.96967L7 5.93934L5.03033 3.96967Z"
                                        fill="#6D7075" />
                                </svg>
                                <span class="text-btnIner-primary ml-2">Hủy</span>
                            </button>
                        </a>

                        <button type="submit" class="custom-btn d-flex align-items-center h-100"
                            style="margin-right:10px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                    fill="white" />
                            </svg>
                            <span class="text-btnIner-primary ml-2">Lưu nội dung thu chi</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="content" style="margin-top:3.8rem;">
            <section class="content margin-250">
                <div class="container-fluided">
                    <div class="bg-filter-search border-top-0 text-left border-custom">
                        <p class="font-weight-bold text-uppercase info-chung--heading">THÔNG TIN CHUNG</p>
                    </div>
                    <div class="info-chung">
                        <div class="content-info">
                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                    <p class="p-0 m-0  margin-left32 text-13">Loại</p>
                                </div>
                                <select name="type" id=""
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                    @foreach($type as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                    <p class="p-0 m-0 required-label margin-left32 text-13-red">Nội dung thu chi</p>
                                </div>
                                <input type="text" placeholder="Nhập thông tin" name="content" required
                                    class="border  border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                            </div>




                            {{-- <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-left-0 height-100">
                                    <p class="p-0 m-0 margin-left32 text-13">Chứng từ</p>
                                </div>
                                <input type="text" placeholder="Nhập thông tin" name="document"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                            </div>
                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                    <p class="p-0 m-0 margin-left32 text-13">Tên</p>
                                </div>
                                <input type="text" placeholder="Nhập thông tin" name="name"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                            </div>
                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                    <p class="p-0 m-0  margin-left32 text-13">Số tiền</p>
                                </div>
                                <input type="number" placeholder="Nhập thông tin" name="qty_money" required
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                            </div>
                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                    <p class="p-0 m-0  margin-left32 text-13">Quỹ</p>
                                </div>
                                <select name="fund_id" id=""
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                    @foreach ($quy as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                    <p class="p-0 m-0  margin-left32 text-13">Ghi chú</p>
                                </div>
                                <input type="text" placeholder="Nhập thông tin" name="notes"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                            </div>
                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                    <p class="p-0 m-0  margin-left32 text-13">Ngày tạo</p>
                                </div>
                                <input
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100"
                                    name="" placeholder="Chọn thông tin" id="datePicker"
                                    value="{{ date('Y-m-d') }}" />
                                <input type="hidden" name="date" id="hiddenDateInput"
                                    value="{{ date('Y-m-d') }}">
                            </div> --}}
                        </div>
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
</script>


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
</script> --}}
