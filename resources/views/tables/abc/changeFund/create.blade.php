<x-navbar :title="$title" activeGroup="manageProfess" activeName="changefund"></x-navbar>
<form action="{{ route('changeFund.store', $workspacename) }}" method="POST">
    @csrf
    <div class="content-wrapper m-0 min-height--none">
        <!-- Content Header (Page header) -->
        <div class="content-header-fixed p-0">
            <div class="content__header--inner">
                <div class="content__heading--left">
                    <span class="ml-4">Quản lý nghiệp vụ</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="nearLast-span">
                        <a class="text-dark" href="{{ route('changeFund.index', $workspacename) }}">
                            Chuyển tiền nội bộ
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
                    <span class="last-span">Tạo chuyển tiền nội bộ</span>
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <div class="dropdown">
                            <button type="submit" data-toggle="dropdown"
                                class="btn-save-print rounded d-flex mx-1 align-items-center h-100 dropdown-toggle px-2">
                                <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                        fill="#6D7075" />
                                </svg>
                                <span class="text-button">In phiếu</span>
                            </button>
                            <div class="dropdown-menu" style="z-index: 9999;">
                                <a class="dropdown-item text-13-black" href="#"
                                    onclick="printChangeFund('printContent')">Chuyển tiền nội bộ</a>
                            </div>
                        </div>
                        <a href="{{ route('changeFund.index', $workspacename) }}" class="user_flow" data-type="NCC"
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

                        <button type="submit" id="btn-submit" class="custom-btn d-flex align-items-center h-100"
                            style="margin-right:10px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                    fill="white" />
                            </svg>
                            <span class="text-btnIner-primary ml-2">Xác nhận chuyển tiền</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="content" style="margin-top:10rem;">
            <section class="content">
                <div class="container-fluided">
                    <div class="bg-filter-search border-top-0 text-left border-custom">
                        <p class="font-weight-bold text-uppercase info-chung--heading">THÔNG TIN CHUNG</p>
                    </div>
                    <div class="info-chung">
                        <div class="content-info">
                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                    <p class="p-0 m-0  margin-left32 text-13">Ngày lập</p>
                                </div>
                                <input
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100"
                                    name="" placeholder="Chọn thông tin" id="datePicker"
                                    value="{{ date('Y-m-d') }}" />
                                <input type="hidden" class="date" name="payment_day" id="hiddenDateInput"
                                    value="{{ date('Y-m-d') }}">
                            </div>

                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                    <p class="p-0 m-0 margin-left32 text-13">Mã phiếu</p>
                                </div>
                                <input type="text" placeholder="Nhập thông tin" name="form_code" required readonly
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100 quote"
                                    value="{{ $getQuoteCount }}">
                            </div>
                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                    <p class="p-0 m-0 margin-left32 text-13">Người lập</p>
                                </div>
                                <input type="text" placeholder="Nhập thông tin" name="content" required
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100 name"
                                    value="{{ Auth::user()->name }}" readonly>
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            </div>

                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                    <p class="p-0 m-0 margin-left32 text-13">Số tiền</p>
                                </div>
                                <input type="text" placeholder="Nhập thông tin" id="qty_money" name="qty_money"
                                    required
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100 price">
                            </div>

                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                    <p class="p-0 m-0 margin-left32 text-13">Từ quỹ</p>
                                </div>
                                <select name="from_fund" id="from_fund" required
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100 fund1">
                                    <option value="" disabled selected>Chọn quỹ</option>
                                    @foreach ($fund as $va)
                                        <option value="{{ $va->id }}">{{ $va->name }}</option>
                                    @endforeach
                                </select>
                                <span id="from_fund_error" class="text-danger"></span>
                            </div>

                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                    <p class="p-0 m-0 margin-left32 text-13">Đến quỹ</p>
                                </div>
                                <select name="to_fund" id="to_fund" required
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100 fund2">
                                    <option value="" disabled selected>Chọn quỹ đích</option>
                                    @foreach ($fund as $va)
                                        <option value="{{ $va->id }}">{{ $va->name }}</option>
                                    @endforeach
                                </select>
                                <span id="to_fund_error" class="text-danger"></span>
                            </div>
                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                    <p class="p-0 m-0 margin-left32 text-13">Ghi chú</p>
                                </div>
                                <input type="text" placeholder="Nhập thông tin" name="notes" required
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100 note">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

</form>
</div>
<x-print-export :title="$title" />

<script src="{{ asset('/dist/js/import.js') }}"></script>
<script src="{{ asset('/dist/js/products.js') }}"></script>
<script src="{{ asset('/dist/js/number.js') }}"></script>
<script src="{{ asset('/dist/js/print.js') }}"></script>
<script src="{{ asset('/dist/js/export.js') }}"></script>

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
    $(document).ready(function() {
        $('#from_fund, #to_fund').change(function() {
            var fromFund = $('#from_fund').val();
            var toFund = $('#to_fund').val();

            if (fromFund && toFund && fromFund === toFund) {
                $('#from_fund').addClass('input-error');
                $('#to_fund').addClass('input-error');
                $('#btn-submit').prop('disabled', true).css('pointer-events', 'none');
            } else {
                $('#from_fund').removeClass('input-error');
                $('#to_fund').removeClass('input-error');
                $('#btn-submit').prop('disabled', false).css('pointer-events', 'auto');
            }
        });
    });
</script>
