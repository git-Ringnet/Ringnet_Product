<x-navbar :title="$title" activeGroup="buy" activeName="provide">
</x-navbar>
<div class="content-wrapper1 py-2 border-bottom">
    <!-- Content Header (Page header) -->
    <div class="d-flex justify-content-between align-items-center pl-4 ml-1">
        <div class="container-fluided">
            <div class="mb">
                <span class="font-weight-bold">Mua hàng</span>
                <span class="mx-2">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                            fill="#26273B" fill-opacity="0.8"></path>
                    </svg>
                </span>
                <span class="font-weight-bold"><a class="text-dark"
                        href="{{ route('provides.index', $workspacename) }}">Nhà cung cấp</a></span>
                <span class="mx-2">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                            fill="#26273B" fill-opacity="0.8"></path>
                    </svg>
                </span>
                <span class="font-weight-bold text-secondary">{{ $title }}</span>
            </div>
        </div>
        <div class="container-fluided z-index-block">
            <div class="row m-0">
                <a href="{{ route('provides.index', $workspacename) }}">
                    <button type="button" class="btn-save-print d-flex align-items-center h-100 rounded"
                        style="margin-right:10px;">
                        <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            viewBox="0 0 16 16" fill="none">
                            <path
                                d="M5.6738 11.4801C5.939 11.7983 6.41191 11.8413 6.73012 11.5761C7.04833 11.311 7.09132 10.838 6.82615 10.5198L5.3513 8.75H12.25C12.6642 8.75 13 8.41421 13 8C13 7.58579 12.6642 7.25 12.25 7.25L5.3512 7.25L6.82615 5.4801C7.09132 5.1619 7.04833 4.689 6.73012 4.4238C6.41191 4.1586 5.939 4.2016 5.6738 4.5198L3.1738 7.51984C2.942 7.79798 2.942 8.20198 3.1738 8.48012L5.6738 11.4801Z"
                                fill="#6D7075"></path>
                        </svg>
                        <span class="text-button">Trở về</span>
                    </button>
                </a>

                <a href="{{ route('provides.edit', ['workspace' => $workspacename, 'provide' => $provide->id]) }}">
                    <button type="button" class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                            class="mx-1" fill="none">
                            <path
                                d="M4.75 2.00007C2.67893 2.00007 1 3.679 1 5.75007V11.25C1 13.3211 2.67893 15 4.75 15H10.2501C12.3212 15 14.0001 13.3211 14.0001 11.25V8.00007C14.0001 7.58586 13.6643 7.25007 13.2501 7.25007C12.8359 7.25007 12.5001 7.58586 12.5001 8.00007V11.25C12.5001 12.4927 11.4927 13.5 10.2501 13.5H4.75C3.50736 13.5 2.5 12.4927 2.5 11.25V5.75007C2.5 4.50743 3.50736 3.50007 4.75 3.50007H7C7.41421 3.50007 7.75 3.16428 7.75 2.75007C7.75 2.33586 7.41421 2.00007 7 2.00007H4.75Z"
                                fill="white"></path>
                            <path
                                d="M12.1339 5.19461L10.7197 3.7804L6.52812 7.97196C5.77185 8.72823 5.25635 9.69144 5.0466 10.7402C5.03144 10.816 5.09828 10.8828 5.17409 10.8677C6.22285 10.6579 7.18606 10.1424 7.94233 9.38618L12.1339 5.19461Z"
                                fill="white"></path>
                            <path
                                d="M13.4559 1.45679C13.2663 1.39356 13.0571 1.44293 12.9158 1.58431L11.7803 2.71974L13.1945 4.13395L14.33 2.99852C14.4714 2.85714 14.5207 2.64802 14.4575 2.45834C14.2999 1.98547 13.9288 1.61441 13.4559 1.45679Z"
                                fill="white"></path>
                        </svg>
                        <span>Sửa</span>
                    </button>
                </a>

                <div>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                            fill="#42526E"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                            fill="#42526E"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                            fill="#42526E"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="content-wrapper1 p-2 position-relative" style="margin-top:2px; margin-bottom: 2px;">
    <div class="d-flex justify-content-between">
        <ul class="nav nav-tabs bg-filter-search border-0 py-2 rounded ml-3">
            <li class="text-nav"><a data-toggle="tab" href="#info" class="active text-secondary">Thông
                    tin</a>
            </li>
            <li class="text-nav">
                <a data-toggle="tab" href="#history" class="text-secondary mx-4">Lịch sử</a>
            </li>
            <li class="text-nav">
                <a data-toggle="tab" href="#files" class="text-secondary">File đính kèm</a>
            </li>
        </ul>
        <div class="d-flex position-sticky" style="right: 10px; top: 80px;">
        </div>
    </div>
</section>

<div class="tab-content mt-3">
    <div id="info" class="content tab-pane in active">
        <div class="content-wrapper1 py-0 pl-0 px-0">
            <div class="container-fluided">
                <div class="tab-content">
                    <div id="info" class="content tab-pane in active">
                        <div class="bg-filter-search border-bottom-0 py-2">
                            <span class="font-weight-bold text-secondary text-nav ml-4">THÔNG TIN CHUNG</span>
                        </div>
                        <div class="content-info">
                            <div class="d-flex align-items-center">
                                <div class="title-info py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 px-3 ml-2">Tên hiển thị</p>
                                </div>
                                <input readonly type="text" required placeholder="Nhập thông tin"
                                    name="provide_name_display"
                                    value="{{ old('provide_name_display') ?? $provide->provide_name_display }}"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="title-info py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 px-3 ml-2">Mã số thuế</p>
                                </div>
                                <input readonly type="text" required placeholder="Nhập thông tin"
                                    name="provide_code" value="{{ old('provide_code') ?? $provide->provide_code }}"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="title-info py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 px-3 ml-2">Địa chỉ</p>
                                </div>
                                <input readonly type="text" required placeholder="Nhập thông tin"
                                    name="provide_address"
                                    value="{{ old('provide_address') ?? $provide->provide_address }}"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="title-info py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 px-3 ml-2">Tên viết tắt</p>
                                </div>
                                <input readonly type="text" placeholder="Nhập thông tin" name="key"
                                    value="{{ old('key') ?? $provide->key }}"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="title-info py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 px-3 ml-2">Tên đầy đủ</p>
                                </div>
                                <input readonly type="text" placeholder="Nhập thông tin" name="provide_name"
                                    value="{{ old('provide_name') ?? $provide->provide_name }}"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Thông tin đại diện --}}
        <div class="content-wrapper1 py-0 pl-0 px-0">
            <div class="container-fluided">
                <div class="tab-content">
                    <div id="info" class="content tab-pane in active">
                        <div class="bg-filter-search border-bottom-0 py-2 border-top-0">
                            <span class="font-weight-bold text-secondary text-nav ml-3">THÔNG TIN NGƯỜI ĐẠI DIỆN</span>
                        </div>
                        <div class="content-info">
                            <div class="d-flex align-items-center">
                                <table class="table table-hover bg-white rounded m-0" id="listrepesent">
                                    <thead>
                                        <tr>
                                            <th class="border-right" style="width:23%;">Người đại diện
                                            </th>
                                            <th class="border-right" style="width:23%;">Số điện thoại
                                            </th>
                                            <th class="border-right" style="width:23%;">Email</th>
                                            <th class="border-right" style="width:23%;">
                                                Địa chỉ nhận
                                            </th>
                                            {{-- <th class="border-right" style="width:8%;"></th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($repesent as $rp)
                                            <tr class="bg-white">
                                                <input type="hidden" name="repesent_id[]"
                                                    value="{{ $rp->id }}">
                                                <td class="border border-top-0 border-bottom-0 border-left-0">
                                                    <input readonly type="text" name="represent_name[]"
                                                        value="{{ $rp->represent_name }}"
                                                        class="border-0 px-2 py-1 w-100">
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 border-left-0">
                                                    <input readonly type="text" name="represent_phone[]"
                                                        value="{{ $rp->represent_phone }}"
                                                        class="border-0 px-2 py-1 w-100">
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 border-left-0">
                                                    <input readonly type="text" name="represent_email[]"
                                                        value="{{ $rp->represent_email }}"
                                                        class="border-0 px-2 py-1 w-100">
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 border-left-0">
                                                    <input readonly type="text" name="represent_address[]"
                                                        value="{{ $rp->represent_address }}"
                                                        class="border-0 px-2 py-1 w-100">
                                                </td>
                                                {{-- <td class="border border-top-0 border-bottom-0 border-left-0">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M10.5454 5C10.2442 5 9.99999 5.24421 9.99999 5.54545C9.99999 5.8467 10.2442 6.09091 10.5454 6.09091H13.4545C13.7558 6.09091 14 5.8467 14 5.54545C14 5.24421 13.7558 5 13.4545 5H10.5454ZM6 7.72726C6 7.42601 6.24421 7.18181 6.54545 7.18181H7.63637H16.3636H17.4545C17.7558 7.18181 18 7.42601 18 7.72726C18 8.02851 17.7558 8.27272 17.4545 8.27272H16.9091V17C16.9091 18.2113 15.9118 19.1818 14.7135 19.1818H9.25891C8.97278 19.1816 8.68906 19.1247 8.42499 19.0145C8.16092 18.9044 7.92126 18.7431 7.71979 18.5399C7.51833 18.3367 7.35905 18.0957 7.25112 17.8307C7.14347 17.5664 7.08903 17.2834 7.09091 16.9981V8.27272H6.54545C6.24421 8.27272 6 8.02851 6 7.72726ZM8.18182 17.0041V8.27272H15.8182V17C15.8182 17.5966 15.3216 18.0909 14.7135 18.0909H9.25938C9.11713 18.0908 8.97632 18.0625 8.84503 18.0077C8.71375 17.953 8.5946 17.8728 8.49444 17.7718C8.39429 17.6707 8.3151 17.5509 8.26144 17.4192C8.20779 17.2874 8.18074 17.1464 8.18182 17.0041ZM13.4545 10.0909C13.7558 10.0909 14 10.3351 14 10.6364V15.7273C14 16.0285 13.7558 16.2727 13.4545 16.2727C13.1533 16.2727 12.9091 16.0285 12.9091 15.7273V10.6364C12.9091 10.3351 13.1533 10.0909 13.4545 10.0909ZM11.0909 10.6364C11.0909 10.3351 10.8467 10.0909 10.5454 10.0909C10.2442 10.0909 9.99999 10.3351 9.99999 10.6364V15.7273C9.99999 16.0285 10.2442 16.2727 10.5454 16.2727C10.8467 16.2727 11.0909 16.0285 11.0909 15.7273V10.6364Z"
                                                            fill="#42526E"></path>
                                                    </svg>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Thông tin mua hàng --}}
        <div class="content-wrapper1 py-0 pl-0 px-0">
            <div class="container-fluided">
                <div class="tab-content">
                    <div id="info" class="content tab-pane in active">
                        <div class="bg-filter-search border-bottom-0 py-2 border-top-0">
                            <span class="font-weight-bold text-secondary text-nav ml-3">THÔNG TIN MUA HÀNG</span>
                        </div>
                        <div class="content-info">
                            <div class="d-flex align-items-center">
                                <table class="table table-hover" id="listrepesent">
                                    <thead>
                                        <tr>
                                            <th class="border-right" style="width:23%;">Tổng số đơn đã mua
                                            </th>
                                            <th class="border-right" style="width:23%;">Tổng số tiền đã
                                                mua</th>
                                            <th class="border-right" style="width:23%;">Tổng số tiền
                                                thanh toán</th>
                                            <th class="border-right" style="width:23%;">Dư nợ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-white">
                                            <td class="border border-top-0 border-bottom-0 border-left-0">
                                                <span class="ml-3">
                                                    @if ($provide->getAllDetail)
                                                        {{ $provide->getAllDetail->count() }}
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 border-left-0">
                                                @if ($provide->getAllDetail)
                                                    {{ number_format($provide->getAllDetail->where('status', 2)->sum('total_tax')) }}
                                                @endif
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 border-left-0">
                                                @if ($provide->getPayment && $provide->getPayment->getHistoryPayment)
                                                    {{ number_format($provide->getPayment->getHistoryPayment->sum('payment')) }}@else{{ 0 }}
                                                @endif
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 border-left-0">
                                                {{ number_format($provide->provide_debt) }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="history" class="tab-pane fade">
        <div class="content-wrapper1 py-0 pl-0 px-0">
            <div class="container-fluided">
                <table class="table table-hover bg-white rounded" id="inputcontent">
                    <thead>
                        <tr>
                            <th class="text-table text-secondary">Ngày mua hàng</th>
                            <th class="text-table text-secondary">Đơn mua hàng#</th>
                            <th class="text-table text-secondary">Số than chiếu#</th>
                            <th class="text-table text-secondary">Nhà cung cấp</th>
                            <th class="text-table text-secondary">Dự án</th>
                            <th class="text-table text-secondary">Trạng thái</th>
                            <th class="text-table text-secondary">Nhận hàng</th>
                            <th class="text-table text-secondary">Xuất hóa đơn</th>
                            <th class="text-table text-secondary">Thanh toán</th>
                            <th class="text-table text-secondary">Tổng tiền</th>
                            <th class="text-table text-secondary">Dư nợ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($provide->getAllDetail)
                            @foreach ($provide->getAllDetail as $detail)
                                <tr class="bg-white">
                                    <td>{{ date_format(new DateTime($detail->created_at), 'd/m/Y') }}</td>
                                    <td>{{ $detail->quotation_number }}</td>
                                    <td>{{ $detail->reference_number }}</td>
                                    <td>
                                        @if ($detail->getProvideName)
                                            {{ $detail->getProvideName->provide_name_display }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($detail->getProjectName)
                                            {{ $detail->getProjectName->project_name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($detail->status_receive == 2 && $detail->status_reciept == 2 && $detail->status_pay == 2)
                                            <span style="color: #08AA36">Close</span>
                                        @elseif($detail->status == 1)
                                            <span style="color: #858585">Draft</span>
                                        @else
                                            <span style="color: #0052CC">Approved</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($detail->status_receive == 0)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 18 18" fill="none">
                                                <path
                                                    d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                    fill="#D6D6D6" />
                                            </svg>
                                        @elseif ($detail->status_receive == 1)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 18 18" fill="none">
                                                <path
                                                    d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                    fill="#08AA36" />
                                                <path
                                                    d="M9 -1.90735e-06C10.1819 -1.90735e-06 11.3522 0.23279 12.4442 0.685081C13.5361 1.13737 14.5282 1.80031 15.364 2.63604C16.1997 3.47176 16.8626 4.46392 17.3149 5.55585C17.7672 6.64778 18 7.8181 18 9C18 10.1819 17.7672 11.3522 17.3149 12.4442C16.8626 13.5361 16.1997 14.5282 15.364 15.364C14.5282 16.1997 13.5361 16.8626 12.4442 17.3149C11.3522 17.7672 10.1819 18 9 18L9 9V-1.90735e-06Z"
                                                    fill="#D6D6D6" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 18 18" fill="none">
                                                <path
                                                    d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                    fill="#08AA36" />
                                            </svg>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($detail->status_reciept == 0)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 18 18" fill="none">
                                                <path
                                                    d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                    fill="#D6D6D6" />
                                            </svg>
                                        @elseif ($detail->status_reciept == 1)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 18 18" fill="none">
                                                <path
                                                    d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                    fill="#08AA36" />
                                                <path
                                                    d="M9 -1.90735e-06C10.1819 -1.90735e-06 11.3522 0.23279 12.4442 0.685081C13.5361 1.13737 14.5282 1.80031 15.364 2.63604C16.1997 3.47176 16.8626 4.46392 17.3149 5.55585C17.7672 6.64778 18 7.8181 18 9C18 10.1819 17.7672 11.3522 17.3149 12.4442C16.8626 13.5361 16.1997 14.5282 15.364 15.364C14.5282 16.1997 13.5361 16.8626 12.4442 17.3149C11.3522 17.7672 10.1819 18 9 18L9 9V-1.90735e-06Z"
                                                    fill="#D6D6D6" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 18 18" fill="none">
                                                <path
                                                    d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                    fill="#08AA36" />
                                            </svg>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($detail->status_pay == 0)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 18 18" fill="none">
                                                <path
                                                    d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                    fill="#D6D6D6" />
                                            </svg>
                                        @elseif ($detail->status_pay == 1)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 18 18" fill="none">
                                                <path
                                                    d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                    fill="#08AA36" />
                                                <path
                                                    d="M9 -1.90735e-06C10.1819 -1.90735e-06 11.3522 0.23279 12.4442 0.685081C13.5361 1.13737 14.5282 1.80031 15.364 2.63604C16.1997 3.47176 16.8626 4.46392 17.3149 5.55585C17.7672 6.64778 18 7.8181 18 9C18 10.1819 17.7672 11.3522 17.3149 12.4442C16.8626 13.5361 16.1997 14.5282 15.364 15.364C14.5282 16.1997 13.5361 16.8626 12.4442 17.3149C11.3522 17.7672 10.1819 18 9 18L9 9V-1.90735e-06Z"
                                                    fill="#D6D6D6" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 18 18" fill="none">
                                                <path
                                                    d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                    fill="#08AA36" />
                                            </svg>
                                        @endif
                                    </td>
                                    <td>{{ number_format($detail->total_tax) }}</td>
                                    <td>
                                        @if ($detail->getPayOrder && $detail->getPayOrder->getHistoryPayment)
                                            {{ number_format($detail->total_tax - $detail->getPayOrder->getHistoryPayment->sum('payment')) }}
                                        @else
                                            {{ number_format($detail->total_tax) }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="files" class="tab-pane fade">
        ádasdsadsa
    </div>
</div>

</form>
</div>
<script src="{{ asset('/dist/js/products.js') }}"></script>
