<x-navbar :title="$title" activeGroup="sell" activeName="guest">
</x-navbar>
<div class="content-wrapper editGuest" style="background: none;">
    <!-- Content Header (Page header) -->
    <section class="content-header-fixed p-0 margin-250">
            <div class="content__header--inner margin-left32">
                <div class="content__heading--left text-long-special">
                    <span>Bán hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z" fill="#26273B" fill-opacity="0.8"/>
                        </svg>
                    </span>
                    <span>
                        <a class="text-dark" href="{{ route('guests.index', ['workspace' => $workspacename]) }}">Khách hàng
                        </a>
                    </span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z" fill="#26273B" fill-opacity="0.8"/>
                        </svg>
                    </span>
                    <span class="font-weight-bold">{{ $title }}</span>
                </div>
                <div class="d-flex content__heading--right">
                    <a href="#">
                        <button type="reset" class="btn-destroy btn-light mx-2 d-flex align-items-center h-100" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path d="M5.6738 11.4801C5.939 11.7983 6.41191 11.8413 6.73012 11.5761C7.04833 11.311 7.09132 10.838 6.82615 10.5198L5.3513 8.75H12.25C12.6642 8.75 13 8.41421 13 8C13 7.58579 12.6642 7.25 12.25 7.25L5.3512 7.25L6.82615 5.4801C7.09132 5.1619 7.04833 4.689 6.73012 4.4238C6.41191 4.1586 5.939 4.2016 5.6738 4.5198L3.1738 7.51984C2.942 7.79798 2.942 8.20198 3.1738 8.48012L5.6738 11.4801Z" fill="#6D7075"/>
                            </svg>
                            <span class="text-btnIner-primary">Trở về</span>
                        </button>
                    </a>
                    <a href="{{ route('guests.edit', ['workspace' => $workspacename, 'guest' => $guest->id]) }}">
                        <button type="button" class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path d="M4.75 2.00007C2.67893 2.00007 1 3.679 1 5.75007V11.25C1 13.3211 2.67893 15 4.75 15H10.2501C12.3212 15 14.0001 13.3211 14.0001 11.25V8.00007C14.0001 7.58586 13.6643 7.25007 13.2501 7.25007C12.8359 7.25007 12.5001 7.58586 12.5001 8.00007V11.25C12.5001 12.4927 11.4927 13.5 10.2501 13.5H4.75C3.50736 13.5 2.5 12.4927 2.5 11.25V5.75007C2.5 4.50743 3.50736 3.50007 4.75 3.50007H7C7.41421 3.50007 7.75 3.16428 7.75 2.75007C7.75 2.33586 7.41421 2.00007 7 2.00007H4.75Z" fill="white"/>
                                <path d="M12.1339 5.19461L10.7197 3.7804L6.52812 7.97196C5.77185 8.72823 5.25635 9.69144 5.0466 10.7402C5.03144 10.816 5.09828 10.8828 5.17409 10.8677C6.22285 10.6579 7.18606 10.1424 7.94233 9.38618L12.1339 5.19461Z" fill="white"/>
                                <path d="M13.4559 1.45679C13.2663 1.39356 13.0571 1.44293 12.9158 1.58431L11.7803 2.71974L13.1945 4.13395L14.33 2.99852C14.4714 2.85714 14.5207 2.64802 14.4575 2.45834C14.2999 1.98547 13.9288 1.61441 13.4559 1.45679Z" fill="white"/>
                            </svg>
                            <span class="text-btnIner-primary ml-1">Sửa</span>
                        </button>
                    </a>
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
            <section class="content-header--options p-0">
                <ul class="header-options--nav nav nav-tabs margin-left32">
                    <li>
                        <a class="text-secondary active m-0 pl-3" data-toggle="tab" href="#info">Thông tin</a>
                    </li>
                    <li>
                        <a class="text-secondary m-0 pl-3 pr-3" data-toggle="tab" href="#history">Lịch sử giao dịch</a>
                    </li>
                    <li>
                        <a class="text-secondary m-0 pr-3" data-toggle="tab" href="#">File đính kèm</a>
                    </li>
                </ul>
            </section>
        </section>
        <!-- /.container-fluided -->
    <div class="tab-content margin-top-fixed5">
        <div id="info" class="content tab-pane in active">
            <section class="content-header--TopNone border border-top-1 border-left-0 border-right-0 border-bottom-0">
                <div class="container-fluided">
                    <div class="row">
                        <div class="col-12 padding-none">
                            <div class="info-chung">
                                <p class="font-weight-bold text-uppercase info-chung--heading">Thông tin chung</p>
                                <div class="content-info">
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-left-0 height-100">
                                            <p class="p-0 m-0 required-label margin-left32 text-13">Tên khách hàng</p>
                                        </div>
                                        <input type="text" required readonly
                                            name="guest_name_display" value="{{ $guest->guest_name_display }}"
                                            class="border w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                    </div>
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                            <p class="p-0 m-0  margin-left32 text-13">Tên hiển thị</p>
                                        </div>
                                        <input type="text" name="key"
                                            value="{{ $guest->key }}" readonly
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                    </div>
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                            <p class="p-0 m-0  margin-left32 text-13">Địa chỉ</p>
                                        </div>
                                        <input type="text" required name="guest_address"
                                            value="{{ $guest->guest_address }}" readonly
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                    </div>
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                            <p class="p-0 m-0  margin-left32 text-13">Email khách hàng</p>
                                        </div>
                                        <input type="text" required name="guest_email"
                                            value="{{ $guest->guest_email }}" readonly
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                    </div>
                                    <div class="d-flex align-items-center height-60-mobile">
                                        <div class="title-info py-2 border border-top-0 border-left-0 height-100">
                                            <p class="p-0 m-0  margin-left32 text-13">Mã số thuế</p>
                                        </div>
                                        <input type="text" name="guest_code"
                                            value="{{ $guest->guest_code }}" readonly
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                                    </div>
                                </div>
                            </div>
                            <div class="info-chung">
                                <p class="font-weight-bold text-uppercase info-chung--heading">Thông tin người đại diện</p>
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
                                    <table class="table table-hover bg-white rounded mb-0">
                                        <thead>
                                            <tr> 
                                                <th class="border-right text-13 px-0 py-2 padding-left35 height-52" style="width: 18%;">Người đại diện</th>
                                                <th class="border-right text-13 px-0 py-2 padding-left35 height-52" style="width: 20%;">Số điện thoại</th>
                                                <th class="border-right text-13 px-0 py-2 padding-left35 height-52" style="width: 20%;">Email</th>
                                                <th class="border-right text-13 px-0 py-2 padding-left35 height-52" style="width: 20%;">Địa chỉ nhận</th>
                                            </tr> 
                                        </thead>
                                        <tbody>
                                            @foreach ($representGuest as $itemRepresent)
                                                <tr id="dynamic-row-1" class="bg-white addProduct">
                                                    <td class="border-right text-13-black px-0 py-2 padding-left35 height-52" style="width: 18%;">
                                                        <input type="text" autocomplete="off"
                                                            value="{{ $itemRepresent->represent_name }}" readonly
                                                            class="border-0  py-1 w-100 represent_name"
                                                            required="" name="represent_name[]">
                                                    </td>
                                                    <td class="border-right text-13-black px-0 py-2 padding-left35 height-52" style="width: 20%;">
                                                        <input type="text" autocomplete="off"
                                                            value="{{ $itemRepresent->represent_phone }}" readonly
                                                            class="border-0 py-1 w-100 represent_phone"
                                                            name="represent_phone[]">
                                                    </td>
                                                    <td class="border-right text-13-black px-0 py-2 padding-left35 height-52" style="width: 20%;">
                                                        <input type="text" autocomplete="off"
                                                            value="{{ $itemRepresent->represent_email }}" readonly
                                                            class="border-0 py-1 w-100 represent_email"
                                                            name="represent_email[]">
                                                    </td>
                                                    <td class="border-right text-13-black px-0 py-2 padding-left35 height-52" style="width: 20%;">
                                                        <input type="text" autocomplete="off" readonly
                                                            value="{{ $itemRepresent->represent_address }}"
                                                            class="border-0 py-1 w-100 represent_address"
                                                            name="represent_address[]">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="info-chung">
                                <p class="font-weight-bold text-uppercase info-chung--heading">Thông tin bán hàng</p>
                                <div class="container-fluided order_content">
                                <table class="table table-hover bg-white rounded mb-0">
                                        <thead>
                                            <tr>
                                                <th class="border-right text-13 px-0 py-2 padding-left35 height-52" style="width: 18%;">Tổng số đơn đã bán</th>
                                                <th class="border-right text-13 px-0 py-2 padding-left35 height-52" style="width: 20%;">Tổng số tiền đã bán</th>
                                                <th class="border-right text-13 px-0 py-2 padding-left35 height-52" style="width: 20%;">Tổng số dự án đã thanh toán</th>
                                                <th class="border-right text-13 px-0 py-2 padding-left35 height-52" style="width: 20%;">Dư nợ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border-right text-13-black px-0 py-2 padding-left35" style="width: 18%;">
                                                    <span class="px-1">{{ $countDetail }}</span>
                                                </td>
                                                <td class="border-right text-13-black px-0 py-2 padding-left35" style="width: 20%;">
                                                    <span class="px-1">{{ number_format($sumSell) }}</span>
                                                </td>
                                                <td class="border-right text-13-black px-0 py-2 padding-left35" style="width: 20%;">
                                                    <span class="px-1">{{ number_format($sumSell) }}</span>
                                                </td>
                                                <td class="border-right text-13-black px-0 py-2 padding-left35" style="width: 20%;">
                                                    <span class="px-1">{{ number_format($sumSell) }}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- <div class="content-info">
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
                                </div> -->
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
                            <div class="row m-auto filter pt-2 pb-4 height-50 content__heading--searchFixed margin-250">
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
                                            <div class="dropdown ml-3">
                                                <button class="btn-filter_searh" type="button" id="dropdownMenuButton"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                                <path d="M12.9548 3H10.0457C9.74445 3 9.50024 3.24421 9.50024 3.54545V6.45455C9.50024 6.75579 9.74445 7 10.0457 7H12.9548C13.256 7 13.5002 6.75579 13.5002 6.45455V3.54545C13.5002 3.24421 13.256 3 12.9548 3Z" fill="#6D7075"/>
                                                                <path d="M6.45455 3H3.54545C3.24421 3 3 3.24421 3 3.54545V6.45455C3 6.75579 3.24421 7 3.54545 7H6.45455C6.75579 7 7 6.75579 7 6.45455V3.54545C7 3.24421 6.75579 3 6.45455 3Z" fill="#6D7075"/>
                                                                <path d="M6.45455 9.50024H3.54545C3.24421 9.50024 3 9.74445 3 10.0457V12.9548C3 13.256 3.24421 13.5002 3.54545 13.5002H6.45455C6.75579 13.5002 7 13.256 7 12.9548V10.0457C7 9.74445 6.75579 9.50024 6.45455 9.50024Z" fill="#6D7075"/>
                                                                <path d="M12.9548 9.50024H10.0457C9.74445 9.50024 9.50024 9.74445 9.50024 10.0457V12.9548C9.50024 13.256 9.74445 13.5002 10.0457 13.5002H12.9548C13.256 13.5002 13.5002 13.256 13.5002 12.9548V10.0457C13.5002 9.74445 13.256 9.50024 12.9548 9.50024Z" fill="#6D7075"/>
                                                            </svg>
                                                            <span class="text-btnIner">Bộc lọc</span>
                                                            <svg width="16" height="16" viewBox="0 0 16 16"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                                                    fill="#6B6F76" />
                                                            </svg>
                                                        </span>
                                                </button>
                                                <div class="dropdown-menu" id="dropdown-menu"
                                                    aria-labelledby="dropdownMenuButton">
                                                    <div class="search-container px-2">
                                                        <input type="text" placeholder="Tìm kiếm" id="myInput"
                                                            onkeyup="filterFunction()">
                                                        <span class="search-icon">
                                                            <i class="fas fa-search"></i>
                                                        </span>
                                                    </div>
                                                    <div class="scrollbar">
                                                        <button class="dropdown-item btndropdown" id=""
                                                            data-button="name" type="button">Ngày báo giá
                                                        </button>
                                                        <button class="dropdown-item btndropdown" id=""
                                                            data-button="company" type="button">Số báo giá
                                                        </button>
                                                        <button class="dropdown-item btndropdown" id=""
                                                            data-button="email" type="button">Số tham chiếu
                                                        </button>
                                                        <button class="dropdown-item btndropdown" id=""
                                                            data-button="phone" type="button">Người đại diện
                                                        </button>
                                                        <button class="dropdown-item btndropdown" id=""
                                                            data-button="debt" type="button">Dự án
                                                        </button>
                                                        <button class="dropdown-item btndropdown" id=""
                                                            data-button="phone" type="button">Trạng thái
                                                        </button>
                                                        <button class="dropdown-item btndropdown" id=""
                                                            data-button="debt" type="button">Tổng tiền
                                                        </button>
                                                    </div>
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
            <section class="content margin-top-fixed3">
                <div class="container-fluided table-responsive">
                    <table class="table table-hover bg-white rounded" id="inputcontent">
                        <thead>
                            <tr>
                                <th scope="col" class="text-13 text-nowrap padding-left35">
                                    <span>Ngày báo giá</span>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16' fill='none'>
                                        <path d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z' fill='#6B6F76'/>
                                    </svg>
                                </th>
                                <th scope="col" class="text-13 text-nowrap">
                                    <span>Số báo giá</span>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16' fill='none'>
                                        <path d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z' fill='#6B6F76'/>
                                    </svg>
                                </th>
                                <th scope="col" class="text-13 text-nowrap">
                                    <span>Trạng thái</span>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16' fill='none'>
                                        <path d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z' fill='#6B6F76'/>
                                    </svg>
                                </th>
                                <th scope="col" class="text-13 text-nowrap text-center">
                                    <span>Giao hàng</span>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16' fill='none'>
                                        <path d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z' fill='#6B6F76'/>
                                    </svg>
                                </th>
                                <th scope="col" class="text-13 text-nowrap text-center">
                                   <span> Xuất hóa đơn</span>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16' fill='none'>
                                        <path d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z' fill='#6B6F76'/>
                                    </svg>
                                </th>
                                <th scope="col" class="text-13 text-nowrap text-center">
                                    <span>Thanh toán</span>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16' fill='none'>
                                        <path d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z' fill='#6B6F76'/>
                                    </svg>
                                </th>
                                <th scope="col" class="text-13 text-nowrap">
                                    <span>Tổng tiền</span>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16' fill='none'>
                                        <path d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z' fill='#6B6F76'/>
                                    </svg>
                                </th>
                                <th scope="col" class="text-13 text-nowrap">
                                    <span>Dư nợ</span>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16' fill='none'>
                                        <path d='M4.51988 5.6738C4.20167 5.939 4.15868 6.41191 4.42385 6.73012C4.68903 7.04833 5.16195 7.09132 5.48016 6.82615L7.25 5.3513V12.25C7.25 12.6642 7.58579 13 8 13C8.41421 13 8.75 12.6642 8.75 12.25V5.3512L10.5199 6.82615C10.8381 7.09132 11.311 7.04833 11.5762 6.73012C11.8414 6.41191 11.7984 5.939 11.4802 5.6738L8.48016 3.1738C8.20202 2.942 7.79802 2.942 7.51988 3.1738L4.51988 5.6738Z' fill='#6B6F76'/>
                                    </svg>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($historyGuest as $itemGuest)
                                <tr>
                                    <td class="text-13-black padding-left35">{{ date_format(new DateTime($itemGuest->created_at), 'd/m/Y') }}</td>
                                    <td class="text-13-blue text-nowrap">{{ $itemGuest->quotation_number }}</td>
                                    <td class="text-13-black">
                                        @if ($itemGuest->status === 1)
                                            <span class="text-secondary">Draft</span>
                                        @elseif($itemGuest->status === 2)
                                            <span class="text-warning">Approved</span>
                                        @elseif($itemGuest->status === 3)
                                            <span class="text-success">Close</span>
                                        @endif
                                    </td>
                                    <td class="text-13-black text-center">
                                        @if ($itemGuest->status_receive === 1)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 3C5.23858 3 3 5.23858 3 8C3 10.7614 5.23858 13 8 13C10.7614 13 13 10.7614 13 8C13 5.23858 10.7614 3 8 3ZM1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8Z" fill="#858585"/>
                                            </svg>
                                        @elseif ($itemGuest->status_receive === 3)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <g clip-path="url(#clip0_2466_23134)">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.99694 13.8636C11.237 13.8636 13.8636 11.237 13.8636 7.99694C13.8636 4.75687 11.237 2.13027 7.99694 2.13027C4.75687 2.13027 2.13027 4.75687 2.13027 7.99694C2.13027 11.237 4.75687 13.8636 7.99694 13.8636ZM7.99694 15.4636C12.1207 15.4636 15.4636 12.1207 15.4636 7.99694C15.4636 3.87322 12.1207 0.530273 7.99694 0.530273C3.87322 0.530273 0.530273 3.87322 0.530273 7.99694C0.530273 12.1207 3.87322 15.4636 7.99694 15.4636Z" fill="#E8B600"/>
                                                    <path d="M11.8065 7.99694C11.8065 10.1009 10.1009 11.8064 7.99697 11.8064L7.9967 4.18742C10.1007 4.18742 11.8065 5.89299 11.8065 7.99694Z" fill="#E8B600"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_2466_23134">
                                                    <rect width="16" height="16" fill="white"/>
                                                </clipPath>
                                                </defs>
                                            </svg>
                                        @elseif($itemGuest->status_receive === 2)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z" fill="#08AA36" fill-opacity="0.75"/>
                                            </svg>
                                        @endif
                                    </td>
                                    <td class="text-13-black text-center">
                                        @if ($itemGuest->status_reciept === 1)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 3C5.23858 3 3 5.23858 3 8C3 10.7614 5.23858 13 8 13C10.7614 13 13 10.7614 13 8C13 5.23858 10.7614 3 8 3ZM1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8Z" fill="#858585"/>
                                            </svg>
                                        @elseif ($itemGuest->status_reciept === 3)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <g clip-path="url(#clip0_2466_23134)">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.99694 13.8636C11.237 13.8636 13.8636 11.237 13.8636 7.99694C13.8636 4.75687 11.237 2.13027 7.99694 2.13027C4.75687 2.13027 2.13027 4.75687 2.13027 7.99694C2.13027 11.237 4.75687 13.8636 7.99694 13.8636ZM7.99694 15.4636C12.1207 15.4636 15.4636 12.1207 15.4636 7.99694C15.4636 3.87322 12.1207 0.530273 7.99694 0.530273C3.87322 0.530273 0.530273 3.87322 0.530273 7.99694C0.530273 12.1207 3.87322 15.4636 7.99694 15.4636Z" fill="#E8B600"/>
                                                    <path d="M11.8065 7.99694C11.8065 10.1009 10.1009 11.8064 7.99697 11.8064L7.9967 4.18742C10.1007 4.18742 11.8065 5.89299 11.8065 7.99694Z" fill="#E8B600"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_2466_23134">
                                                    <rect width="16" height="16" fill="white"/>
                                                </clipPath>
                                                </defs>
                                            </svg>
                                        @elseif($itemGuest->status_reciept === 2)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z" fill="#08AA36" fill-opacity="0.75"/>
                                            </svg>
                                        @endif
                                    </td>
                                    <td class="text-13-black text-center">
                                        @if ($itemGuest->status_pay === 1)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 3C5.23858 3 3 5.23858 3 8C3 10.7614 5.23858 13 8 13C10.7614 13 13 10.7614 13 8C13 5.23858 10.7614 3 8 3ZM1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8Z" fill="#858585"/>
                                            </svg>
                                        @elseif ($itemGuest->status_pay === 3)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <g clip-path="url(#clip0_2466_23134)">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.99694 13.8636C11.237 13.8636 13.8636 11.237 13.8636 7.99694C13.8636 4.75687 11.237 2.13027 7.99694 2.13027C4.75687 2.13027 2.13027 4.75687 2.13027 7.99694C2.13027 11.237 4.75687 13.8636 7.99694 13.8636ZM7.99694 15.4636C12.1207 15.4636 15.4636 12.1207 15.4636 7.99694C15.4636 3.87322 12.1207 0.530273 7.99694 0.530273C3.87322 0.530273 0.530273 3.87322 0.530273 7.99694C0.530273 12.1207 3.87322 15.4636 7.99694 15.4636Z" fill="#E8B600"/>
                                                    <path d="M11.8065 7.99694C11.8065 10.1009 10.1009 11.8064 7.99697 11.8064L7.9967 4.18742C10.1007 4.18742 11.8065 5.89299 11.8065 7.99694Z" fill="#E8B600"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_2466_23134">
                                                    <rect width="16" height="16" fill="white"/>
                                                </clipPath>
                                                </defs>
                                            </svg>
                                        @elseif($itemGuest->status_pay === 2)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z" fill="#08AA36" fill-opacity="0.75"/>
                                            </svg>
                                        @endif
                                    </td>
                                    <td class="text-13-black text-nowrap">{{ number_format($itemGuest->total_price + $itemGuest->total_tax) }}</td>
                                    <td class="text-13-black text-nowrap">{{ number_format($itemGuest->amount_owed) }}</td>
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
