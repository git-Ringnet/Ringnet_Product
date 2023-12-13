<x-navbar :title="$title" activeGroup="sell" activeName="guest">
</x-navbar>
<div class="content-wrapper editGuest" style="background: none;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluided">
            <div class="mb-3">
                <span>Bán hàng</span>
                <span>/</span>
                <span><a class="text-dark" href="{{ route('guests.index') }}">Khách hàng</a></span>
                <span>/</span>
                <span>Chỉnh sửa khách hàng</span>
                <span class="font-weight-bold">{{ $title }}</span>
            </div>
        </div><!-- /.container-fluided -->
    </section>
    <form action="{{ route('guests.update', $guest->id) }}" method="POST">
        @csrf
        @method('PUT')
        <section class="content-header p-0">
            <div class="container-fluided">
                <button type="submit" class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                    <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                            fill="white"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                            fill="white"></path>
                    </svg>
                    <span>Cập nhật</span>
                </button>
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
                                            <input type="text" required placeholder="Nhập thông tin"
                                                name="guest_name_display" value="{{ $guest->guest_name_display }}"
                                                class="border w-100 py-2 border-left-0 border-right-0 px-3">
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 px-3">Tên viết tắt</p>
                                            </div>
                                            <input type="text" placeholder="Nhập thông tin" name="key"
                                                value="{{ $guest->key }}"
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 px-3 required-label text-danger">Mã số thuế</p>
                                            </div>
                                            <input type="text" required placeholder="Nhập thông tin"
                                                name="guest_code" value="{{ $guest->guest_code }}"
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 px-3 required-label text-danger">Địa chỉ</p>
                                            </div>
                                            <input type="text" required placeholder="Nhập thông tin"
                                                name="guest_address" value="{{ $guest->guest_address }}"
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 px-3">Tên đầy đủ</p>
                                            </div>
                                            <input type="text" placeholder="Nhập thông tin" name="guest_name"
                                                value="{{ $guest->guest_name }}"
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none">
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
                                                    <th style="width: 8%;"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($representGuest as $itemRepresent)
                                                    <tr id="dynamic-row-1" class="bg-white addProduct">
                                                        <td class="border border-top-0 border-bottom-0 border-left-0">
                                                            <input type="text" autocomplete="off"
                                                                value="{{ $itemRepresent->represent_name }}"
                                                                class="border-0 px-2 py-1 w-100 represent_name"
                                                                required="" name="represent_name[]">
                                                        </td>
                                                        <td class="border border-top-0 border-bottom-0">
                                                            <input type="text" autocomplete="off"
                                                                value="{{ $itemRepresent->represent_email }}"
                                                                class="border-0 px-2 py-1 w-100 represent_email"
                                                                name="represent_email[]">
                                                        </td>
                                                        <td class="border border-top-0 border-bottom-0">
                                                            <input type="text" autocomplete="off"
                                                                value="{{ $itemRepresent->represent_phone }}"
                                                                class="border-0 px-2 py-1 w-100 represent_phone"
                                                                name="represent_phone[]">
                                                        </td>
                                                        <td class="border border-top-0 border-bottom-0">
                                                            <input type="text" autocomplete="off"
                                                                value="{{ $itemRepresent->represent_address }}"
                                                                class="border-0 px-2 py-1 w-100 represent_address"
                                                                name="represent_address[]">
                                                        </td>
                                                        <td
                                                            class="border border-top-0 border-bottom-0 border-right-0 text-right deleteProduct">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M10.5454 5C10.2442 5 9.99999 5.24421 9.99999 5.54545C9.99999 5.8467 10.2442 6.09091 10.5454 6.09091H13.4545C13.7558 6.09091 14 5.8467 14 5.54545C14 5.24421 13.7558 5 13.4545 5H10.5454ZM6 7.72726C6 7.42601 6.24421 7.18181 6.54545 7.18181H7.63637H16.3636H17.4545C17.7558 7.18181 18 7.42601 18 7.72726C18 8.02851 17.7558 8.27272 17.4545 8.27272H16.9091V17C16.9091 18.2113 15.9118 19.1818 14.7135 19.1818H9.25891C8.97278 19.1816 8.68906 19.1247 8.42499 19.0145C8.16092 18.9044 7.92126 18.7431 7.71979 18.5399C7.51833 18.3367 7.35905 18.0957 7.25112 17.8307C7.14347 17.5664 7.08903 17.2834 7.09091 16.9981V8.27272H6.54545C6.24421 8.27272 6 8.02851 6 7.72726ZM8.18182 17.0041V8.27272H15.8182V17C15.8182 17.5966 15.3216 18.0909 14.7135 18.0909H9.25938C9.11713 18.0908 8.97632 18.0625 8.84503 18.0077C8.71375 17.953 8.5946 17.8728 8.49444 17.7718C8.39429 17.6707 8.3151 17.5509 8.26144 17.4192C8.20779 17.2874 8.18074 17.1464 8.18182 17.0041ZM13.4545 10.0909C13.7558 10.0909 14 10.3351 14 10.6364V15.7273C14 16.0285 13.7558 16.2727 13.4545 16.2727C13.1533 16.2727 12.9091 16.0285 12.9091 15.7273V10.6364C12.9091 10.3351 13.1533 10.0909 13.4545 10.0909ZM11.0909 10.6364C11.0909 10.3351 10.8467 10.0909 10.5454 10.0909C10.2442 10.0909 9.99999 10.3351 9.99999 10.6364V15.7273C9.99999 16.0285 10.2442 16.2727 10.5454 16.2727C10.8467 16.2727 11.0909 16.0285 11.0909 15.7273V10.6364Z"
                                                                    fill="#42526E">
                                                                </path>
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
                                                <button type="button" data-toggle="dropdown" id="add-field-btn"
                                                    class="btn-save-print d-flex align-items-center h-100 py-1 px-2"
                                                    style="margin-right:10px">
                                                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg"
                                                        width="18" height="18" viewBox="0 0 18 18"
                                                        fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                                            fill="#42526E"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                                            fill="#42526E"></path>
                                                    </svg>
                                                    <span>Thêm dòng</span>
                                                </button>
                                                <button type="button" data-toggle="dropdown"
                                                    class="btn-save-print d-flex align-items-center h-100 py-1 px-2"
                                                    style="margin-right:10px">
                                                    <svg class="mr-2" width="18" height="18"
                                                        viewBox="0 0 18 18" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M3.75528 1.6875H5.99476H11.9948H12.123C12.3939 1.6875 12.6621 1.74088 12.9123 1.84459C13.1626 1.94829 13.3899 2.10029 13.5814 2.29189L15.7022 4.41269C16.089 4.79939 16.3064 5.32394 16.3065 5.87088V14.25C16.3065 14.797 16.0892 15.3216 15.7024 15.7084C15.3156 16.0952 14.791 16.3125 14.244 16.3125H12.75H5.25H3.83328C3.28894 16.3125 2.76666 16.0973 2.38031 15.7139C1.99396 15.3304 1.77486 14.8098 1.77078 14.2655L1.69278 3.76547C1.69074 3.49333 1.74258 3.22344 1.84531 2.97143C1.94805 2.71941 2.09965 2.49021 2.29137 2.29705C2.4831 2.10389 2.71115 1.95058 2.9624 1.84597C3.21364 1.74135 3.48312 1.68749 3.75528 1.6875ZM5.8125 15.1875H12.1875V9.9645C12.1875 9.74238 12.0071 9.5625 11.7862 9.5625H6.2145C5.99266 9.5625 5.8125 9.74266 5.8125 9.9645V15.1875ZM13.3125 15.1875V9.9645C13.3125 9.12163 12.6289 8.4375 11.7862 8.4375H6.2145C5.37134 8.4375 4.6875 9.12134 4.6875 9.9645V15.1875H3.83326C3.58582 15.1875 3.34842 15.0897 3.17281 14.9154C2.9972 14.7411 2.89761 14.5044 2.89574 14.257L2.81774 3.75703C2.81682 3.63333 2.84038 3.51066 2.88708 3.39611C2.93378 3.28155 3.00269 3.17737 3.08983 3.08957C3.17698 3.00177 3.28064 2.93208 3.39485 2.88453C3.50905 2.83698 3.63154 2.8125 3.75524 2.8125H5.43226V5.18175C5.43226 5.52985 5.57054 5.86369 5.81668 6.10983C6.06282 6.35597 6.39666 6.49425 6.74476 6.49425H11.2448C11.5929 6.49425 11.9267 6.35597 12.1728 6.10983C12.419 5.86369 12.5573 5.52985 12.5573 5.18175V2.91925C12.6414 2.96326 12.7185 3.01991 12.7858 3.08725L14.9068 5.20831C15.0826 5.38405 15.1814 5.62254 15.1815 5.87112V14.25C15.1815 14.4986 15.0827 14.7371 14.9069 14.9129C14.7311 15.0887 14.4926 15.1875 14.244 15.1875H13.3125ZM11.4323 5.18175V2.8125H6.55726V5.18175C6.55726 5.23148 6.57701 5.27917 6.61218 5.31433C6.64734 5.3495 6.69503 5.36925 6.74476 5.36925H11.2448C11.2945 5.36925 11.3422 5.3495 11.3773 5.31433C11.4125 5.27917 11.4323 5.23148 11.4323 5.18175Z"
                                                            fill="white"></path>
                                                    </svg>
                                                    <span>Thêm hàng loạt</span>
                                                </button>
                                                <button class="btn-option py-1 px-2">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                                </button>
                                            </div>
                                        </div>
                                    </section>
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
                                                <p class="p-0 m-0 px-3">Tổng số tiền đã thanh toán</p>
                                            </div>
                                            <input type="text" value="{{ number_format($sumPay) }}" readonly
                                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 px-3">Dư nợ</p>
                                            </div>
                                            <input type="text" value="{{ number_format($sumDebt) }}" readonly
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
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                        fill="#D6D6D6" />
                                                </svg>
                                            @elseif ($itemGuest->status_receive === 3)
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                        fill="#08AA36" />
                                                    <path
                                                        d="M9 -1.90735e-06C10.1819 -1.90735e-06 11.3522 0.23279 12.4442 0.685081C13.5361 1.13737 14.5282 1.80031 15.364 2.63604C16.1997 3.47176 16.8626 4.46392 17.3149 5.55585C17.7672 6.64778 18 7.8181 18 9C18 10.1819 17.7672 11.3522 17.3149 12.4442C16.8626 13.5361 16.1997 14.5282 15.364 15.364C14.5282 16.1997 13.5361 16.8626 12.4442 17.3149C11.3522 17.7672 10.1819 18 9 18L9 9V-1.90735e-06Z"
                                                        fill="#D6D6D6" />
                                                </svg>
                                            @elseif($itemGuest->status_receive === 2)
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                        fill="#08AA36" />
                                                </svg>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($itemGuest->status_reciept === 1)
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                        fill="#D6D6D6" />
                                                </svg>
                                            @elseif ($itemGuest->status_reciept === 3)
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                        fill="#08AA36" />
                                                    <path
                                                        d="M9 -1.90735e-06C10.1819 -1.90735e-06 11.3522 0.23279 12.4442 0.685081C13.5361 1.13737 14.5282 1.80031 15.364 2.63604C16.1997 3.47176 16.8626 4.46392 17.3149 5.55585C17.7672 6.64778 18 7.8181 18 9C18 10.1819 17.7672 11.3522 17.3149 12.4442C16.8626 13.5361 16.1997 14.5282 15.364 15.364C14.5282 16.1997 13.5361 16.8626 12.4442 17.3149C11.3522 17.7672 10.1819 18 9 18L9 9V-1.90735e-06Z"
                                                        fill="#D6D6D6" />
                                                </svg>
                                            @elseif($itemGuest->status_reciept === 2)
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                        fill="#08AA36" />
                                                </svg>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($itemGuest->status_pay === 1)
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                        fill="#D6D6D6" />
                                                </svg>
                                            @elseif ($itemGuest->status_pay === 3)
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9Z"
                                                        fill="#08AA36" />
                                                    <path
                                                        d="M9 -1.90735e-06C10.1819 -1.90735e-06 11.3522 0.23279 12.4442 0.685081C13.5361 1.13737 14.5282 1.80031 15.364 2.63604C16.1997 3.47176 16.8626 4.46392 17.3149 5.55585C17.7672 6.64778 18 7.8181 18 9C18 10.1819 17.7672 11.3522 17.3149 12.4442C16.8626 13.5361 16.1997 14.5282 15.364 15.364C14.5282 16.1997 13.5361 16.8626 12.4442 17.3149C11.3522 17.7672 10.1819 18 9 18L9 9V-1.90735e-06Z"
                                                        fill="#D6D6D6" />
                                                </svg>
                                            @elseif($itemGuest->status_pay === 2)
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
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
    </form>
</div>
<script src="{{ asset('/dist/js/export.js') }}"></script>
<script>
    getKeyGuest($('input[name="guest_name_display"]'))
    let fieldCounter = 1;
    $("#add-field-btn").click(function() {
        let nextSoTT = $(".soTT").length + 1;
        // Tạo các phần tử HTML mới
        const newRow = $("<tr>", {
            "id": `dynamic-row-${fieldCounter}`,
            "class": `bg-white addProduct`,
        });
        const hoTen = $(
            "<td class='border border-top-0 border-bottom-0 border-left-0'><input type='text' autocomplete='off' class='border-0 px-2 py-1 w-100 represent_name' required name='represent_name[]'></td>"
        );
        const email = $(
            "<td class='border border-top-0 border-bottom-0'><input type='text' autocomplete='off' class='border-0 px-2 py-1 w-100 represent_email' name='represent_email[]'></td>"
        );
        const soDT = $(
            "<td class='border border-top-0 border-bottom-0'><input type='text' autocomplete='off' class='border-0 px-2 py-1 w-100 represent_phone' name='represent_phone[]'></td>"
        );
        const diaChi = $(
            "<td class='border border-top-0 border-bottom-0'><input type='text' autocomplete='off' class='border-0 px-2 py-1 w-100 represent_address' name='represent_address[]'></td>"
        );
        const option = $(
            "<td class='border border-top-0 border-bottom-0 border-right-0 text-right'>" +
            "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
            "<path fill-rule='evenodd' clip-rule='evenodd' d='M10.5454 5C10.2442 5 9.99999 5.24421 9.99999 5.54545C9.99999 5.8467 10.2442 6.09091 10.5454 6.09091H13.4545C13.7558 6.09091 14 5.8467 14 5.54545C14 5.24421 13.7558 5 13.4545 5H10.5454ZM6 7.72726C6 7.42601 6.24421 7.18181 6.54545 7.18181H7.63637H16.3636H17.4545C17.7558 7.18181 18 7.42601 18 7.72726C18 8.02851 17.7558 8.27272 17.4545 8.27272H16.9091V17C16.9091 18.2113 15.9118 19.1818 14.7135 19.1818H9.25891C8.97278 19.1816 8.68906 19.1247 8.42499 19.0145C8.16092 18.9044 7.92126 18.7431 7.71979 18.5399C7.51833 18.3367 7.35905 18.0957 7.25112 17.8307C7.14347 17.5664 7.08903 17.2834 7.09091 16.9981V8.27272H6.54545C6.24421 8.27272 6 8.02851 6 7.72726ZM8.18182 17.0041V8.27272H15.8182V17C15.8182 17.5966 15.3216 18.0909 14.7135 18.0909H9.25938C9.11713 18.0908 8.97632 18.0625 8.84503 18.0077C8.71375 17.953 8.5946 17.8728 8.49444 17.7718C8.39429 17.6707 8.3151 17.5509 8.26144 17.4192C8.20779 17.2874 8.18074 17.1464 8.18182 17.0041ZM13.4545 10.0909C13.7558 10.0909 14 10.3351 14 10.6364V15.7273C14 16.0285 13.7558 16.2727 13.4545 16.2727C13.1533 16.2727 12.9091 16.0285 12.9091 15.7273V10.6364C12.9091 10.3351 13.1533 10.0909 13.4545 10.0909ZM11.0909 10.6364C11.0909 10.3351 10.8467 10.0909 10.5454 10.0909C10.2442 10.0909 9.99999 10.3351 9.99999 10.6364V15.7273C9.99999 16.0285 10.2442 16.2727 10.5454 16.2727C10.8467 16.2727 11.0909 16.0285 11.0909 15.7273V10.6364Z' fill='#42526E'/>" +
            "</svg>" +
            "</td>"
        );
        // Gắn các phần tử vào hàng mới
        newRow.append(hoTen, email, soDT, diaChi, option);
        $("#dynamic-fields").before(newRow);
        // Tăng giá trị fieldCounter
        fieldCounter++;
        //Xóa người đại diệnF
        option.click(function() {
            $(this).closest("tr").remove();
            fieldCounter--;
        });
    });
    $(".deleteProduct").click(function() {
        $(this).closest("tr").remove();
        fieldCounter--;
    });
</script>
