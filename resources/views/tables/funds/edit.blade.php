<x-navbar :title="$title" activeGroup="systemFirst" activeName="funds"></x-navbar>
<form action="{{ route('funds.update', $fund->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="content-wrapper m-0">
        <div class="content-header-fixed p-0">
            <div class="content__header--inner">
                <div class="content__heading--left text-long-special">
                    <span class="ml-4">
                        Thiết lập ban đầu
                    </span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="font-weight-bold">
                        <a class="text-dark" href="{{ route('funds.index', ['workspace' => $workspacename]) }}">Quỹ</a>
                    </span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="last-span">{{ $fund->name }}</span>
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <div class="dropdown">
                            <a href="{{ route('funds.index', ['workspace' => $workspacename]) }}">
                                <button type="button" class="btn-save-print d-flex align-items-center h-100 rounded"
                                    style="margin-right:10px;">
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
                        <button type="submit" class="custom-btn d-flex align-items-center h-100"
                            style="margin-right:10px">
                            <svg class="mx-1" width="18" height="18" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                    fill="white" />
                            </svg>
                            <p class="p-0 m-0">Cập nhật quỹ</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="content editgroup" style="margin-top:10rem">
            <section class="">
                <div id="info" class="content tab-pane in active">
                    <section class="content">
                        <div class="container-fluided">
                            <div class="bg-filter-search border-top-0 text-left border-custom">
                                <p class="font-weight-bold text-uppercase info-chung--heading">THÔNG TIN CHUNG</p>
                            </div>
                            <div class="info-chung">
                                <div class="content-info">
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info height-100 py-2 border border-left-0">
                                            <p class="p-0 m-0 required-label margin-left32 text-13-red">Tên quỹ</p>
                                        </div>
                                        <input type="text" name="name" id="name" placeholder="Nhập thông tin"
                                            value="{{ $fund->name }}"
                                            class="border w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100"
                                            required>
                                    </div>
                                    <div class="d-flex  align-items-center height-60-mobile ">
                                        <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 required-label margin-left32 text-13-red">Tiền quỹ</p>
                                        </div>
                                        <input type="text" name="amount" id="amount"
                                            value="{{ number_format($fund->amount) }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100"
                                            placeholder="Nhập thông tin" required>
                                    </div>
                                    <div class="d-flex  align-items-center height-60-mobile ">
                                        <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 required-label margin-left32 text-13-red">Ngày bắt đầu
                                            </p>
                                        </div>
                                        <input type="date" placeholder="Nhập thông tin" name="start_date"
                                            id="start_date" value="{{ $fund->start_date }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black"
                                            required>
                                    </div>
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 margin-left32 text-13">Mô tả</p>
                                        </div>
                                        <input type="text" name="description" id="description"
                                            placeholder="Nhập thông tin" value="{{ $fund->description }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                    </div>
                                    <div class="d-flex align-items-center height-60-mobile ">
                                        <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 margin-left32 text-13">Tên ngân hàng</p>
                                        </div>
                                        <input type="text" name="bank_name" id="bank_name"
                                            placeholder="Nhập thông tin" value="{{ $fund->bank_name }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                    </div>
                                    <div class="d-flex  align-items-center height-60-mobile ">
                                        <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 margin-left32 text-13">Số tài khoản</p>
                                        </div>
                                        <input type="text" name="bank_account_number" placeholder="Nhập thông tin"
                                            id="bank_account_number" value="{{ $fund->bank_account_number }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                    </div>
                                    <div class="d-flex  align-items-center height-60-mobile ">
                                        <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 margin-left32 text-13">Chủ tài khoản</p>
                                        </div>
                                        <input type="text" name="bank_account_holder" id="bank_account_holder"
                                            placeholder="Nhập thông tin" value="{{ $fund->bank_account_holder }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                    </div>

                                    <div class="d-none  align-items-center height-60-mobile ">
                                        <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 margin-left32 text-13">Ngày kết thúc</p>
                                        </div>
                                        <input type="date" name="end_date" id="end_date"
                                            value="{{ $fund->end_date }}"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </div>
</form>
<x-user-flow></x-user-flow>
<script src="{{ asset('/dist/js/number.js') }}"></script>
