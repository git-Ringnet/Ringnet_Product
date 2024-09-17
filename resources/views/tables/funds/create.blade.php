<x-navbar :title="$title" activeGroup="systemFirst" activeName="funds" :workspacename="$workspacename"></x-navbar>
<form action="{{ route('funds.store', $workspacename) }}" method="POST">
    @csrf
    <div class="content-wrapper m-0 min-height--none">
        <div class="content-header-fixed p-0">
            <div class="content__header--inner">
                <div class="content__heading--left text-long-special">
                    <span class="ml-4">Thiết lập ban đầu</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="text-dark">Quỹ</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="last-span">Tạo quỹ</span>
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <div class="dropdown">
                            <a href="{{ route('funds.index', $workspacename) }}" class="activity" data-name1="KH"
                                data-des="Hủy">
                                <button class="btn-destroy btn-light mx-1 d-flex align-items-center h-100"
                                    type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        viewBox="0 0 14 14" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM5.03033 3.96967C4.73744 3.67678 4.26256 3.67678 3.96967 3.96967C3.67678 4.26256 3.67678 4.73744 3.96967 5.03033L5.93934 7L3.96967 8.96967C3.67678 9.26256 3.67678 9.73744 3.96967 10.0303C4.26256 10.3232 4.73744 10.3232 5.03033 10.0303L7 8.06066L8.96967 10.0303C9.26256 10.3232 9.73744 10.3232 10.0303 10.0303C10.3232 9.73744 10.3232 9.26256 10.0303 8.96967L8.06066 7L10.0303 5.03033C10.3232 4.73744 10.3232 4.26256 10.0303 3.96967C9.73744 3.67678 9.26256 3.67678 8.96967 3.96967L7 5.93934L5.03033 3.96967Z"
                                            fill="#6D7075" />
                                    </svg>
                                    <span class="text-btnIner-primary ml-2">Hủy</span>
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
                            <span>Tạo quỹ</span>
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
                                <div class="title-info height-100 py-2 border border-left-0">
                                    <p class="p-0 m-0 required-label margin-left32 text-13-red">Tên quỹ</p>
                                </div>
                                <input type="text" name="name" id="name" placeholder="Nhập thông tin"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100 bg-input-guest-blue"
                                    required>
                            </div>
                            <div class="d-flex align-items-center height-60-mobile ">
                                <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 required-label margin-left32 text-13-red">Tiền quỹ</p>
                                </div>
                                <input type="text" name="amount" id="amount"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100 bg-input-guest-blue"
                                    placeholder="Nhập thông tin" required>
                            </div>
                            <div class="d-flex  align-items-center height-60-mobile ">
                                <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 required-label margin-left32 text-13-red">Ngày bắt đầu</p>
                                </div>
                                <input type="date" placeholder="Nhập thông tin" name="start_date" id="start_date"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black bg-input-guest-blue"
                                    value="{{ now()->format('Y-m-d') }}" required>
                            </div>
                            <div class="align-items-center height-60-mobile d-none">
                                <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 margin-left32 text-13">Ngày kết thúc</p>
                                </div>
                                <input type="date" name="end_date" id="end_date"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black bg-input-guest-blue"
                                    value="{{ now()->format('Y-m-d') }}">
                            </div>
                            <div class="d-flex align-items-center height-60-mobile">
                                <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 margin-left32 text-13">Mô tả</p>
                                </div>
                                <input type="text" name="description" id="description"
                                    placeholder="Nhập thông tin"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100 bg-input-guest-blue">
                            </div>

                            <div class="d-flex align-items-center height-60-mobile ">
                                <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 margin-left32 text-13">Tên ngân hàng</p>
                                </div>
                                <input type="text" name="bank_name" id="bank_name" placeholder="Nhập thông tin"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100 bg-input-guest-blue">
                            </div>
                            <div class="d-flex  align-items-center height-60-mobile ">
                                <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 margin-left32 text-13">Số tài khoản</p>
                                </div>
                                <input type="text" name="bank_account_number" placeholder="Nhập thông tin"
                                    id="bank_account_number"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100 bg-input-guest-blue">
                            </div>
                            <div class="d-flex  align-items-center height-60-mobile ">
                                <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 margin-left32 text-13">Chủ tài khoản</p>
                                </div>
                                <input type="text" name="bank_account_holder" id="bank_account_holder"
                                    placeholder="Nhập thông tin"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100 bg-input-guest-blue">
                            </div>

                        </div>
                    </div>
            </section>
        </div>
    </div>
</form>
<x-user-flow></x-user-flow>
<script src="{{ asset('/dist/js/number.js') }}"></script>
