<x-navbar :title="$title" activeGroup="buy" activeName="provide">
</x-navbar>
<div class="content-wrapper1 py-0 border-bottom px-4">
    <!-- Content Header (Page header) -->
    <div class="d-flex justify-content-between align-items-center">
        <div class="container-fluided">
            <div class="mb-3">
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
                <span>{{ $title }}</span>
            </div>
        </div>
        <div class="container-fluided">
            <div class="row m-0 mb-3">
                <div class="container-fluided">
                    <a href="{{ route('provides.edit', ['workspace' => $workspacename, 'provide' => $provide->id]) }}">
                        <button type="button" class="custom-btn d-flex align-items-center h-100"
                            style="margin-right:10px">
                            <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                    fill="white"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                    fill="white"></path>
                            </svg>
                            <span>Chỉnh sửa</span>
                        </button>
                    </a>
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
                <a data-toggle="tab" href="#history" class="text-secondary">Lịch sử</a>
            </li>
            <li class="text-nav">
                <a data-toggle="tab" href="#files" class="text-secondary">File đính kèm</a>
            </li>
        </ul>
        <div class="d-flex position-sticky" style="right: 10px; top: 80px;">
        </div>
    </div>
</section>

<div class="tab-content">
    <div id="info" class="content tab-pane in active">
        <div class="content-wrapper1 py-0 pl-0 px-0">
            <div class="container-fluided">
                <div class="tab-content">
                    <div id="info" class="content tab-pane in active">
                        <div class="bg-filter-search border-bottom-0 text-left py-2">
                            <span class="font-weight-bold text-secondary text-nav ml-4">THÔNG TIN SẢN PHẨM</span>
                        </div>
                        <div class="content-info">
                            <div class="d-flex align-items-center">
                                <div class="title-info py-2 border border-left-0">
                                    <p class="p-0 m-0 px-4 btn-sort text-secondary text-nav">Tên hiển thị</p>
                                </div>
                                <input readonly type="text" required placeholder="Nhập thông tin"
                                    name="provide_name_display"
                                    value="{{ old('provide_name_display') ?? $provide->provide_name_display }}"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-3">
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="title-info py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 px-4 btn-sort text-secondary text-nav">Mã số thuế</p>
                                </div>
                                <input readonly type="text" required placeholder="Nhập thông tin" name="provide_code"
                                    value="{{ old('provide_code') ?? $provide->provide_code }}"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="title-info py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 px-4 btn-sort text-secondary text-nav">Địa chỉ</p>
                                </div>
                                <input readonly type="text" required placeholder="Nhập thông tin"
                                    name="provide_address"
                                    value="{{ old('provide_address') ?? $provide->provide_address }}"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="title-info py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 px-4 btn-sort text-secondary text-nav">Tên viết tắt</p>
                                </div>
                                <input readonly type="text" placeholder="Nhập thông tin" name="key"
                                    value="{{ old('key') ?? $provide->key }}"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="title-info py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 px-4 btn-sort text-secondary text-nav">Tên đầy đủ</p>
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
                        <div class="bg-filter-search border-bottom-0 text-left py-2">
                            <span class="font-weight-bold text-secondary text-nav ml-4">THÔNG TIN NGƯỜI ĐẠI DIỆN</span>
                        </div>
                        <div class="content-info">
                            <div class="d-flex align-items-center">
                                <table class="table table-hover" id="listrepesent">
                                    <thead>
                                        <tr>
                                            <th class="border-right border-left btn-sort text-secondary text-nav"
                                                style="width:23%;">Người đại diện
                                            </th>
                                            <th class="border-right btn-sort text-secondary text-nav"
                                            style="width:15%;">Số điện thoại
                                            </th>
                                            <th class="border-right btn-sort text-secondary text-nav"
                                            style="width:20%;">Email</th>

                                            <th class="border-right btn-sort text-secondary text-nav"
                                            style="">Địa chỉ nhận
                                            </th>
                                            <th class="border-right btn-sort text-secondary text-nav"
                                            style="width:5%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($repesent as $rp)
                                            <tr class="bg-white">
                                                <input type="hidden" name="repesent_id[]"
                                                    value="{{ $rp->id }}">
                                                <td class="border border-top-0">
                                                    <input readonly type="text" name="represent_name[]"
                                                        value="{{ $rp->represent_name }}"
                                                        class="border-0 px-3 py-2 w-75 w-100">
                                                </td>
                                                <td class="border border-top-0">
                                                    <input readonly type="text" name="represent_phone[]"
                                                        value="{{ $rp->represent_phone }}"
                                                        class="border-0 px-3 py-2 w-75 w-100">
                                                </td>
                                                <td class="border border-top-0">
                                                    <input readonly type="text" name="represent_email[]"
                                                        value="{{ $rp->represent_email }}"
                                                        class="border-0 px-3 py-2 w-75 w-100">
                                                </td>
                                                <td>
                                                    <input readonly type="text" name="represent_address[]"
                                                        value="{{ $rp->represent_address }}"
                                                        class="border-0 px-3 py-2 w-75 w-100">
                                                </td>
                                                <td class="border border-top-0 deleteRepesent">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M10.5454 5C10.2442 5 9.99999 5.24421 9.99999 5.54545C9.99999 5.8467 10.2442 6.09091 10.5454 6.09091H13.4545C13.7558 6.09091 14 5.8467 14 5.54545C14 5.24421 13.7558 5 13.4545 5H10.5454ZM6 7.72726C6 7.42601 6.24421 7.18181 6.54545 7.18181H7.63637H16.3636H17.4545C17.7558 7.18181 18 7.42601 18 7.72726C18 8.02851 17.7558 8.27272 17.4545 8.27272H16.9091V17C16.9091 18.2113 15.9118 19.1818 14.7135 19.1818H9.25891C8.97278 19.1816 8.68906 19.1247 8.42499 19.0145C8.16092 18.9044 7.92126 18.7431 7.71979 18.5399C7.51833 18.3367 7.35905 18.0957 7.25112 17.8307C7.14347 17.5664 7.08903 17.2834 7.09091 16.9981V8.27272H6.54545C6.24421 8.27272 6 8.02851 6 7.72726ZM8.18182 17.0041V8.27272H15.8182V17C15.8182 17.5966 15.3216 18.0909 14.7135 18.0909H9.25938C9.11713 18.0908 8.97632 18.0625 8.84503 18.0077C8.71375 17.953 8.5946 17.8728 8.49444 17.7718C8.39429 17.6707 8.3151 17.5509 8.26144 17.4192C8.20779 17.2874 8.18074 17.1464 8.18182 17.0041ZM13.4545 10.0909C13.7558 10.0909 14 10.3351 14 10.6364V15.7273C14 16.0285 13.7558 16.2727 13.4545 16.2727C13.1533 16.2727 12.9091 16.0285 12.9091 15.7273V10.6364C12.9091 10.3351 13.1533 10.0909 13.4545 10.0909ZM11.0909 10.6364C11.0909 10.3351 10.8467 10.0909 10.5454 10.0909C10.2442 10.0909 9.99999 10.3351 9.99999 10.6364V15.7273C9.99999 16.0285 10.2442 16.2727 10.5454 16.2727C10.8467 16.2727 11.0909 16.0285 11.0909 15.7273V10.6364Z"
                                                            fill="#42526E"></path>
                                                    </svg>
                                                </td>
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
                        <div class="bg-filter-search border-bottom-0 text-left py-2">
                            <span class="font-weight-bold text-secondary text-nav ml-4">THÔNG TIN MUA HÀNG</span>
                        </div>
                        <div class="content-info">
                            <div class="d-flex align-items-center">
                                <table class="table table-hover" id="listrepesent">
                                    <thead>
                                        <tr>
                                            <th class="border-right border-left btn-sort text-secondary text-nav"
                                                style="width:23%;">Tổng số đơn đã mua
                                            </th>
                                            <th class="border-right btn-sort text-secondary text-nav"
                                            style="width:15%;">Tổng số tiền đã
                                                mua</th>
                                            <th class="border-right btn-sort text-secondary text-nav"
                                            style="width:20%;">Tổng số tiền
                                                thanh toán</th>
                                            <th class="border-right btn-sort text-secondary text-nav">Dư nợ</th>
                                            <th class="border-right btn-sort text-secondary text-nav"
                                            style="width:5%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-white">
                                            <td class="border border-top-0">
                                                @if ($provide->getAllDetail)
                                                    {{ $provide->getAllDetail->count() }}
                                                @endif
                                            </td>
                                            <td class="border border-top-0">
                                                @if ($provide->getAllDetail)
                                                    {{ number_format($provide->getAllDetail->where('status', 2)->sum('total_tax')) }}
                                                @endif
                                            </td>
                                            <td class="border border-top-0">
                                                @if ($provide->getPayment && $provide->getPayment->getHistoryPayment)
                                                    {{ number_format($provide->getPayment->getHistoryPayment->sum('payment')) }}@else{{ 0 }}
                                                @endif
                                            </td>
                                            <td class="border border-top-0">
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
                            <th>Ngày mua hàng</th>
                            <th>Đơn mua hàng#</th>
                            <th>Số than chiếu#</th>
                            <th>Nhà cung cấp</th>
                            <th>Dự án</th>
                            <th>Trạng thái</th>
                            <th>Nhận hàng</th>
                            <th>Xuất hóa đơn</th>
                            <th>Thanh toán</th>
                            <th>Tổng tiền</th>
                            <th>Dư nợ</th>
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
