<x-navbar :title="$title" activeGroup="sell" activeName="guest">
</x-navbar>
<div class="content-wrapper editGuest" style="background: none;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluided">
            <div class="mb-3">
                <span>Bán hàng</span>
                <span>/</span>
                <span><a class="text-dark" href="{{ route('guests.index', ['workspace' => $workspacename]) }}">Khách
                        hàng</a>
                </span>
                <span>/</span>
                <span>Chỉnh sửa khách hàng</span>
                <span class="font-weight-bold">{{ $title }}</span>
            </div>
        </div><!-- /.container-fluided -->
    </section>

    <section class="content-header p-0">
        <div class="container-fluided">
            <a href="{{ route('guests.edit', ['workspace' => $workspacename, 'guest' => $guest->id]) }}">
                <button type="button" class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M11.6511 0.123503C11.8471 0.0419682 12.0573 0 12.2695 0C12.4818 0 12.6919 0.0419682 12.888 0.123503C13.084 0.205038 13.2621 0.32454 13.4121 0.475171L14.7065 1.77321C14.8567 1.92366 14.9758 2.10232 15.0571 2.29897C15.1384 2.49564 15.1803 2.70643 15.1803 2.91931C15.1803 3.13219 15.1384 3.34299 15.0571 3.53965C14.9758 3.73631 14.8567 3.91497 14.7065 4.06542L13.0911 5.68531C13.0818 5.69595 13.072 5.70637 13.0618 5.71655C13.0517 5.72673 13.0413 5.73653 13.0307 5.74594L4.70614 14.094C4.57631 14.2241 4.40022 14.2973 4.21661 14.2973H1.61538C1.23302 14.2973 0.923067 13.9865 0.923067 13.603V10.9945C0.923067 10.8103 0.996015 10.6337 1.12586 10.5035L9.44489 2.16183C9.45594 2.149 9.46754 2.13648 9.47969 2.1243C9.49185 2.11211 9.50435 2.10046 9.51716 2.08936L11.127 0.475171C11.2768 0.324749 11.4552 0.20496 11.6511 0.123503ZM9.97051 3.59834L2.30768 11.2821V12.9088H3.92984L11.5923 5.22471L9.97051 3.59834ZM12.5714 4.24288L10.9496 2.61656L12.1069 1.45617C12.1282 1.43472 12.1536 1.41771 12.1815 1.4061C12.2094 1.39449 12.2393 1.38852 12.2695 1.38852C12.2997 1.38852 12.3297 1.39449 12.3576 1.4061C12.3855 1.41771 12.4113 1.43514 12.4326 1.45658L13.7277 2.75531C13.7491 2.77681 13.7664 2.8026 13.778 2.83069C13.7897 2.85878 13.7956 2.8889 13.7956 2.91931C13.7956 2.94973 13.7897 2.97985 13.778 3.00793C13.7664 3.03603 13.7491 3.06182 13.7277 3.08332L12.5714 4.24288ZM0 17.3057C0 16.9223 0.309957 16.6115 0.692308 16.6115H17.3077C17.69 16.6115 18 16.9223 18 17.3057C18 17.6892 17.69 18 17.3077 18H0.692308C0.309957 18 0 17.6892 0 17.3057Z"
                            fill="white" />
                    </svg>
                    <span>Sửa</span>
                </button>
            </a>
        </div>
    </section>
    <hr>
    <section class="content-header p-0">
        <ul class="nav nav-tabs">
            <li class="mr-2 mb-3">
                <a class="text-secondary active m-0" data-toggle="tab" href="#info">Thông tin</a>
            </li>
            <li class="mr-2 mb-3">
                <a class="text-secondary m-0" data-toggle="tab" href="#history">Lịch sử giao dịch</a>
            </li>
        </ul>
    </section>
    <div class="tab-content mt-3">
        <div id="info" class="content tab-pane in active">
            <section class="content">
                <div class="container-fluided">
                    <div class="row">
                        <div class="col-12">
                            <div class="info-chung">
                                <p class="font-weight-bold ml-2">Thông tin công ty</p>
                                <div class="content-info">
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-left-0">
                                            <p class="p-0 m-0 px-3 required-label text-danger">Tên hiển thị</p>
                                        </div>
                                        <input type="text" required readonly
                                            name="guest_name_display" value="{{ $guest->guest_name_display }}"
                                            class="border w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Tên viết tắt</p>
                                        </div>
                                        <input type="text" name="key"
                                            value="{{ $guest->key }}" readonly
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3 required-label text-danger">Mã số thuế</p>
                                        </div>
                                        <input type="text" required name="guest_code"
                                            value="{{ $guest->guest_code }}" readonly
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3 required-label text-danger">Địa chỉ</p>
                                        </div>
                                        <input type="text" required name="guest_address"
                                            value="{{ $guest->guest_address }}" readonly
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Tên đầy đủ</p>
                                        </div>
                                        <input type="text" name="guest_name"
                                            value="{{ $guest->guest_name }}" readonly
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                </div>
                            </div>
                            <div class="info-chung">
                                <p class="font-weight-bold ml-2 mt-5">Thông tin người đại diện</p>
                                <div class="container-fluided order_content">
                                    <section class="multiple_action" style="display: none;">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="count_checkbox mr-5">Đã chọn 1</span>
                                            <div class="row action">
                                                <div class="btn-chotdon my-2 ml-3">
                                                    <button type="button" id="btn-chot"
                                                        class="btn-group btn-light d-flex align-items-center h-100">
                                                        <svg width="18" height="18" viewBox="0 0 18 18"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M11.6511 0.123503C11.8471 0.0419682 12.0573 0 12.2695 0C12.4818 0 12.6919 0.0419682 12.888 0.123503C13.084 0.205038 13.2621 0.32454 13.4121 0.475171L14.7065 1.77321C14.8567 1.92366 14.9758 2.10232 15.0571 2.29897C15.1384 2.49564 15.1803 2.70643 15.1803 2.91931C15.1803 3.13219 15.1384 3.34299 15.0571 3.53965C14.9758 3.73631 14.8567 3.91497 14.7065 4.06542L13.0911 5.68531C13.0818 5.69595 13.072 5.70637 13.0618 5.71655C13.0517 5.72673 13.0413 5.73653 13.0307 5.74594L4.70614 14.094C4.57631 14.2241 4.40022 14.2973 4.21661 14.2973H1.61538C1.23302 14.2973 0.923067 13.9865 0.923067 13.603V10.9945C0.923067 10.8103 0.996015 10.6337 1.12586 10.5035L9.44489 2.16183C9.45594 2.149 9.46754 2.13648 9.47969 2.1243C9.49185 2.11211 9.50435 2.10046 9.51716 2.08936L11.127 0.475171C11.2768 0.324749 11.4552 0.20496 11.6511 0.123503ZM9.97051 3.59834L2.30768 11.2821V12.9088H3.92984L11.5923 5.22471L9.97051 3.59834ZM12.5714 4.24288L10.9496 2.61656L12.1069 1.45617C12.1282 1.43472 12.1536 1.41771 12.1815 1.4061C12.2094 1.39449 12.2393 1.38852 12.2695 1.38852C12.2997 1.38852 12.3297 1.39449 12.3576 1.4061C12.3855 1.41771 12.4113 1.43514 12.4326 1.45658L13.7277 2.75531C13.7491 2.77681 13.7664 2.8026 13.778 2.83069C13.7897 2.85878 13.7956 2.8889 13.7956 2.91931C13.7956 2.94973 13.7897 2.97985 13.778 3.00793C13.7664 3.03603 13.7491 3.06182 13.7277 3.08332L12.5714 4.24288ZM0 17.3057C0 16.9223 0.309957 16.6115 0.692308 16.6115H17.3077C17.69 16.6115 18 16.9223 18 17.3057C18 17.6892 17.69 18 17.3077 18H0.692308C0.309957 18 0 17.6892 0 17.3057Z"
                                                                fill="#42526E"></path>
                                                        </svg>
                                                        <span class="px-1">Nhân hệ số</span>
                                                    </button>
                                                </div>
                                                <div class="btn-xoahang my-2 ml-1">
                                                    <button id="deleteExports" type="button"
                                                        class="btn-group btn-light d-flex align-items-center h-100">
                                                        <svg width="18" height="18" viewBox="0 0 18 18"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M11.6511 0.123503C11.8471 0.0419682 12.0573 0 12.2695 0C12.4818 0 12.6919 0.0419682 12.888 0.123503C13.084 0.205038 13.2621 0.32454 13.4121 0.475171L14.7065 1.77321C14.8567 1.92366 14.9758 2.10232 15.0571 2.29897C15.1384 2.49564 15.1803 2.70643 15.1803 2.91931C15.1803 3.13219 15.1384 3.34299 15.0571 3.53965C14.9758 3.73631 14.8567 3.91497 14.7065 4.06542L13.0911 5.68531C13.0818 5.69595 13.072 5.70637 13.0618 5.71655C13.0517 5.72673 13.0413 5.73653 13.0307 5.74594L4.70614 14.094C4.57631 14.2241 4.40022 14.2973 4.21661 14.2973H1.61538C1.23302 14.2973 0.923067 13.9865 0.923067 13.603V10.9945C0.923067 10.8103 0.996015 10.6337 1.12586 10.5035L9.44489 2.16183C9.45594 2.149 9.46754 2.13648 9.47969 2.1243C9.49185 2.11211 9.50435 2.10046 9.51716 2.08936L11.127 0.475171C11.2768 0.324749 11.4552 0.20496 11.6511 0.123503ZM9.97051 3.59834L2.30768 11.2821V12.9088H3.92984L11.5923 5.22471L9.97051 3.59834ZM12.5714 4.24288L10.9496 2.61656L12.1069 1.45617C12.1282 1.43472 12.1536 1.41771 12.1815 1.4061C12.2094 1.39449 12.2393 1.38852 12.2695 1.38852C12.2997 1.38852 12.3297 1.39449 12.3576 1.4061C12.3855 1.41771 12.4113 1.43514 12.4326 1.45658L13.7277 2.75531C13.7491 2.77681 13.7664 2.8026 13.778 2.83069C13.7897 2.85878 13.7956 2.8889 13.7956 2.91931C13.7956 2.94973 13.7897 2.97985 13.778 3.00793C13.7664 3.03603 13.7491 3.06182 13.7277 3.08332L12.5714 4.24288ZM0 17.3057C0 16.9223 0.309957 16.6115 0.692308 16.6115H17.3077C17.69 16.6115 18 16.9223 18 17.3057C18 17.6892 17.69 18 17.3077 18H0.692308C0.309957 18 0 17.6892 0 17.3057Z"
                                                                fill="#42526E"></path>
                                                        </svg>
                                                        <span class="px-1">Thuế</span>
                                                    </button>
                                                </div>
                                                <div class="btn-huy my-2 ml-3">
                                                    <button id="cancelBillExport"
                                                        class="btn-group btn-light d-flex align-items-center h-100">
                                                        <svg width="18" height="18" viewBox="0 0 18 18"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15.75 15.75L2.25 2.25" stroke="#42526E"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path d="M15.75 2.25L2.25 15.75" stroke="#42526E"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </svg>
                                                        <span class="px-1">Xóa</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="btn ml-auto cancal_action">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path d="M18 18L6 6" stroke="white" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M18 6L6 18" stroke="white" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </section>
                                    <table class="table table-hover bg-white rounded">
                                        <thead>
                                            <tr>
                                                <th class="border-right" style="width: 23%;">Họ tên</th>
                                                <th class="border-right" style="width: 23%;">Email</th>
                                                <th class="border-right" style="width: 23%;">Số điện thoại</th>
                                                <th class="border-right" style="width: 23%;">Địa chỉ nhận</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($representGuest as $itemRepresent)
                                                <tr id="dynamic-row-1" class="bg-white addProduct">
                                                    <td class="border border-top-0 border-bottom-0 border-left-0">
                                                        <input type="text" autocomplete="off"
                                                            value="{{ $itemRepresent->represent_name }}" readonly
                                                            class="border-0 px-2 py-1 w-100 represent_name"
                                                            required="" name="represent_name[]">
                                                    </td>
                                                    <td class="border border-top-0 border-bottom-0">
                                                        <input type="text" autocomplete="off"
                                                            value="{{ $itemRepresent->represent_email }}" readonly
                                                            class="border-0 px-2 py-1 w-100 represent_email"
                                                            name="represent_email[]">
                                                    </td>
                                                    <td class="border border-top-0 border-bottom-0">
                                                        <input type="text" autocomplete="off"
                                                            value="{{ $itemRepresent->represent_phone }}" readonly
                                                            class="border-0 px-2 py-1 w-100 represent_phone"
                                                            name="represent_phone[]">
                                                    </td>
                                                    <td class="border border-top-0 border-bottom-0">
                                                        <input type="text" autocomplete="off" readonly
                                                            value="{{ $itemRepresent->represent_address }}"
                                                            class="border-0 px-2 py-1 w-100 represent_address"
                                                            name="represent_address[]">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="info-chung">
                                <p class="font-weight-bold ml-2 mt-5">Thông tin bán hàng</p>
                                <div class="content-info">
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Tổng số đơn đã bán</p>
                                        </div>
                                        <input type="text" value="{{ $countDetail }}" readonly
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Tổng số tiền đã bán</p>
                                        </div>
                                        <input type="text" value="{{ number_format($sumSell) }} vnd" readonly
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Tổng số tiền đã thanh toán</p>
                                        </div>
                                        <input type="text" value="{{ number_format($sumPay) }} vnd" readonly
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                    <div class="d-flex ml-2 align-items-center">
                                        <div class="title-info py-2 border border-top-0 border-left-0">
                                            <p class="p-0 m-0 px-3">Dư nợ</p>
                                        </div>
                                        <input type="text" value="{{ number_format($sumDebt) }} vnd" readonly
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div id="history" class="tab-pane fade">
            <section class="content">
                <div class="container-fluided">
                    <div class="row">
                        <div class="col-12">
                            <div class="row m-auto filter pt-2 pb-4">
                                <div class="w-100">
                                    <div class="row mr-0">
                                        <div class="col-md-5 d-flex">
                                            <form action="" method="get" id="search-filter">
                                                <div class="position-relative">
                                                    <input type="text" placeholder="Tìm kiếm" name="keywords"
                                                        class="pr-4 w-100 input-search" value="">
                                                    <span id="search-icon" class="search-icon"><i
                                                            class="fas fa-search" aria-hidden="true"></i></span>
                                                </div>
                                            </form>
                                            <div class="dropdown">
                                                <button class="filter-btn ml-2" data-toggle="dropdown">Bộ lọc
                                                    <svg width="18" height="18" viewBox="0 0 18 18"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                                            fill="white"></path>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else
                                                        here</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content mt-2">
                <div class="container-fluided">
                    <table class="table table-hover bg-white rounded" id="inputcontent">
                        <thead>
                            <tr>
                                <th><input type="checkbox"></th>
                                <th>Ngày báo giá</th>
                                <th>Số báo giá#</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center">Giao hàng</th>
                                <th class="text-center">Xuất hóa đơn</th>
                                <th class="text-center">Thanh toán</th>
                                <th>Tổng tiền</th>
                                <th>Dư nợ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($historyGuest as $itemGuest)
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>{{ date_format(new DateTime($itemGuest->created_at), 'd/m/Y') }}</td>
                                    <td>{{ $itemGuest->quotation_number }}</td>
                                    <td class="text-center">
                                        @if ($itemGuest->status === 1)
                                            <span class="text-secondary">Draft</span>
                                        @elseif($itemGuest->status === 2)
                                            <span class="text-primary">Approved</span>
                                        @elseif($itemGuest->status === 3)
                                            <span class="text-success">Close</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($itemGuest->status_receive === 1)
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                    fill="#D6D6D6" />
                                            </svg>
                                        @elseif ($itemGuest->status_receive === 3)
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                    fill="#08AA36" />
                                                <path
                                                    d="M9 -1.90735e-06C10.1819 -1.90735e-06 11.3522 0.23279 12.4442 0.685081C13.5361 1.13737 14.5282 1.80031 15.364 2.63604C16.1997 3.47176 16.8626 4.46392 17.3149 5.55585C17.7672 6.64778 18 7.8181 18 9C18 10.1819 17.7672 11.3522 17.3149 12.4442C16.8626 13.5361 16.1997 14.5282 15.364 15.364C14.5282 16.1997 13.5361 16.8626 12.4442 17.3149C11.3522 17.7672 10.1819 18 9 18L9 9V-1.90735e-06Z"
                                                    fill="#D6D6D6" />
                                            </svg>
                                        @elseif($itemGuest->status_receive === 2)
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                    fill="#08AA36" />
                                            </svg>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($itemGuest->status_reciept === 1)
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                    fill="#D6D6D6" />
                                            </svg>
                                        @elseif ($itemGuest->status_reciept === 3)
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                    fill="#08AA36" />
                                                <path
                                                    d="M9 -1.90735e-06C10.1819 -1.90735e-06 11.3522 0.23279 12.4442 0.685081C13.5361 1.13737 14.5282 1.80031 15.364 2.63604C16.1997 3.47176 16.8626 4.46392 17.3149 5.55585C17.7672 6.64778 18 7.8181 18 9C18 10.1819 17.7672 11.3522 17.3149 12.4442C16.8626 13.5361 16.1997 14.5282 15.364 15.364C14.5282 16.1997 13.5361 16.8626 12.4442 17.3149C11.3522 17.7672 10.1819 18 9 18L9 9V-1.90735e-06Z"
                                                    fill="#D6D6D6" />
                                            </svg>
                                        @elseif($itemGuest->status_reciept === 2)
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                    fill="#08AA36" />
                                            </svg>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($itemGuest->status_pay === 1)
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                    fill="#D6D6D6" />
                                            </svg>
                                        @elseif ($itemGuest->status_pay === 3)
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                    fill="#08AA36" />
                                                <path
                                                    d="M9 -1.90735e-06C10.1819 -1.90735e-06 11.3522 0.23279 12.4442 0.685081C13.5361 1.13737 14.5282 1.80031 15.364 2.63604C16.1997 3.47176 16.8626 4.46392 17.3149 5.55585C17.7672 6.64778 18 7.8181 18 9C18 10.1819 17.7672 11.3522 17.3149 12.4442C16.8626 13.5361 16.1997 14.5282 15.364 15.364C14.5282 16.1997 13.5361 16.8626 12.4442 17.3149C11.3522 17.7672 10.1819 18 9 18L9 9V-1.90735e-06Z"
                                                    fill="#D6D6D6" />
                                            </svg>
                                        @elseif($itemGuest->status_pay === 2)
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                    fill="#08AA36" />
                                            </svg>
                                        @endif
                                    </td>
                                    <td>{{ number_format($itemGuest->total_price + $itemGuest->total_tax) }}</td>
                                    <td>{{ number_format($itemGuest->amount_owed) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</div>
<script src="{{ asset('/dist/js/export.js') }}"></script>
<script>
    getKeyGuest($('input[name="guest_name_display"]'))
    let fieldCounter = 1;
</script>
