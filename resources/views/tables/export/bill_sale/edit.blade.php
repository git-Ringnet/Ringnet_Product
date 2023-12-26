<x-navbar :title="$title" activeGroup="sell" activeName="billsale" :workspacename="$workspacename"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <form action="{{ route('billSale.update', ['workspace' => $workspacename, 'billSale' => $billSale->idHD]) }}"
        method="POST" id="formSubmit" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="detail_id" value="{{ $billSale->idHD }}">
        <input type="hidden" name="table_name" value="HDBH">
        <input type="hidden" name="detailexport_id" id="detailexport_id">
        <input type="hidden" name="delivery_id" id="delivery_id">
        <!-- Content Header (Page header) -->
        <section class="content-header p-0">
            <div class="container-fluided">
                <div class="mb-3">
                    <span>Bán hàng</span>
                    <span>/</span>
                    <span>Hóa đơn bán hàng</span>
                    <span>/</span>
                    <span class="font-weight-bold">Hóa đơn bán hàng</span>
                </div>
                <div class="row m-0 mb-1">
                    @if ($billSale->tinhTrang != 2)
                        <button type="submit" name="action" value="action_1"
                            class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                            <span>Xác nhận hóa đơn</span>
                        </button>
                    @endif
                    <div class="dropdown">
                        <button type="button" data-toggle="dropdown"
                            class="btn-save-print d-flex align-items-center h-100 dropdown-toggle"
                            style="margin-right:10px">
                            <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.75528 1.6875H5.99476H11.9948H12.123C12.3939 1.6875 12.6621 1.74088 12.9123 1.84459C13.1626 1.94829 13.3899 2.10029 13.5814 2.29189L15.7022 4.41269C16.089 4.79939 16.3064 5.32394 16.3065 5.87088V14.25C16.3065 14.797 16.0892 15.3216 15.7024 15.7084C15.3156 16.0952 14.791 16.3125 14.244 16.3125H12.75H5.25H3.83328C3.28894 16.3125 2.76666 16.0973 2.38031 15.7139C1.99396 15.3304 1.77486 14.8098 1.77078 14.2655L1.69278 3.76547C1.69074 3.49333 1.74258 3.22344 1.84531 2.97143C1.94805 2.71941 2.09965 2.49021 2.29137 2.29705C2.4831 2.10389 2.71115 1.95058 2.9624 1.84597C3.21364 1.74135 3.48312 1.68749 3.75528 1.6875ZM5.8125 15.1875H12.1875V9.9645C12.1875 9.74238 12.0071 9.5625 11.7862 9.5625H6.2145C5.99266 9.5625 5.8125 9.74266 5.8125 9.9645V15.1875ZM13.3125 15.1875V9.9645C13.3125 9.12163 12.6289 8.4375 11.7862 8.4375H6.2145C5.37134 8.4375 4.6875 9.12134 4.6875 9.9645V15.1875H3.83326C3.58582 15.1875 3.34842 15.0897 3.17281 14.9154C2.9972 14.7411 2.89761 14.5044 2.89574 14.257L2.81774 3.75703C2.81682 3.63333 2.84038 3.51066 2.88708 3.39611C2.93378 3.28155 3.00269 3.17737 3.08983 3.08957C3.17698 3.00177 3.28064 2.93208 3.39485 2.88453C3.50905 2.83698 3.63154 2.8125 3.75524 2.8125H5.43226V5.18175C5.43226 5.52985 5.57054 5.86369 5.81668 6.10983C6.06282 6.35597 6.39666 6.49425 6.74476 6.49425H11.2448C11.5929 6.49425 11.9267 6.35597 12.1728 6.10983C12.419 5.86369 12.5573 5.52985 12.5573 5.18175V2.91925C12.6414 2.96326 12.7185 3.01991 12.7858 3.08725L14.9068 5.20831C15.0826 5.38405 15.1814 5.62254 15.1815 5.87112V14.25C15.1815 14.4986 15.0827 14.7371 14.9069 14.9129C14.7311 15.0887 14.4926 15.1875 14.244 15.1875H13.3125ZM11.4323 5.18175V2.8125H6.55726V5.18175C6.55726 5.23148 6.57701 5.27917 6.61218 5.31433C6.64734 5.3495 6.69503 5.36925 6.74476 5.36925H11.2448C11.2945 5.36925 11.3422 5.3495 11.3773 5.31433C11.4125 5.27917 11.4323 5.23148 11.4323 5.18175Z"
                                    fill="white" />
                            </svg>
                            <span>In</span>
                        </button>
                        <div class="dropdown-menu" style="z-index: 9999;">
                            <a class="dropdown-item" href="{{ route('pdfdelivery', $billSale->idHD) }}">Xuất
                                PDF</a>
                        </div>
                    </div>
                    <label class="custom-btn d-flex align-items-center h-100 m-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" class="mr-1">
                            <path
                                d="M6.78565 11.9915C7.26909 11.9915 7.71035 11.9915 8.1516 11.9915C8.23486 11.9915 8.31812 11.9899 8.40082 11.9926C8.5923 11.9987 8.72995 12.0903 8.80599 12.2657C8.88425 12.445 8.84429 12.6071 8.71108 12.7425C8.40082 13.0589 8.08666 13.3713 7.77362 13.6855C7.28519 14.1762 6.79731 14.6679 6.30721 15.1569C6.03135 15.4322 5.81489 15.4322 5.54125 15.158C4.75809 14.3737 3.97771 13.5873 3.19344 12.8047C3.03969 12.6509 2.94423 12.4861 3.03581 12.2679C3.13016 12.0431 3.31666 11.9871 3.54367 11.9899C4.02822 11.996 4.51221 11.9915 5.01619 11.9915C5.03173 11.7812 5.04227 11.5769 5.0617 11.3732C5.33145 8.55805 6.6752 6.39617 9.13957 5.02744C14.0156 2.31941 19.6492 5.27333 20.8021 10.2814C21.7784 14.5225 19.0442 18.8202 14.7788 19.7643C12.3693 20.2977 10.1664 19.8015 8.1838 18.3334C7.74531 18.0087 7.65762 17.4681 7.964 17.0546C8.26983 16.6422 8.80821 16.5761 9.25003 16.9114C10.4556 17.825 11.811 18.2396 13.3223 18.1885C16.042 18.0969 18.502 16.0228 19.0726 13.3219C19.8113 9.82465 17.4652 6.4217 13.9246 5.85334C10.641 5.32605 7.4134 7.66055 6.89777 10.9414C6.84504 11.28 6.8245 11.6241 6.78565 11.9915Z"
                                fill="#0095F6" />
                            <path
                                d="M12.129 10.7643C12.129 10.2315 12.1274 9.69806 12.1296 9.16522C12.1312 8.74062 12.406 8.44811 12.7945 8.44922C13.183 8.45033 13.4567 8.74339 13.4578 9.17022C13.4606 10.091 13.4617 11.0118 13.4556 11.9326C13.4545 12.0675 13.4955 12.143 13.6132 12.2118C14.4075 12.6758 15.1973 13.1476 15.9876 13.6183C16.238 13.7676 16.3568 13.9952 16.3246 14.281C16.2935 14.5602 16.1342 14.7733 15.8572 14.8244C15.6868 14.8555 15.4692 14.8433 15.3238 14.7606C14.398 14.2344 13.485 13.6855 12.5714 13.1382C12.2767 12.9611 12.1279 12.6925 12.129 12.3434C12.1301 11.8166 12.129 11.2905 12.129 10.7643Z"
                                fill="#0095F6" />
                        </svg>
                        Attachment<input type="file" style="display: none;" id="file_restore" accept="*"
                            name="file">
                    </label>
                    <button name="action" value="action_2" type="submit"
                        class="d-flex align-items-center h-100 btn-danger ml-2 border-0" style="padding: 3px 16px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34"
                            fill="none">
                            <path
                                d="M22.981 10.9603C26.3005 14.2798 26.3005 19.6617 22.981 22.9811C19.6615 26.3006 14.2796 26.3006 10.9602 22.9811C7.64073 19.6617 7.64073 14.2798 10.9602 10.9603C14.2796 7.64084 19.6615 7.64084 22.981 10.9603Z"
                                stroke="#E4E4E4"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.728 12.7281C13.0023 12.4538 13.447 12.4538 13.7213 12.7281L21.2133 20.22C21.4876 20.4943 21.4876 20.9391 21.2133 21.2133C20.939 21.4876 20.4943 21.4876 20.22 21.2133L12.728 13.7214C12.4537 13.4471 12.4537 13.0024 12.728 12.7281Z"
                                fill="#E4E4E4"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M21.2133 12.7281C21.4876 13.0024 21.4876 13.4471 21.2133 13.7214L13.7213 21.2133C13.447 21.4876 13.0023 21.4876 12.728 21.2133C12.4537 20.9391 12.4537 20.4943 12.728 20.22L20.22 12.7281C20.4943 12.4538 20.939 12.4538 21.2133 12.7281Z"
                                fill="#E4E4E4"></path>
                        </svg>
                        <span>Xóa hóa đơn bán hàng</span>
                    </button>
                </div>
            </div>
        </section>
        <hr class="mt-3">
        <section class="content-header p-0">
            <ul class="nav nav-tabs">
                <li class="active mr-2 mb-3"><a data-toggle="tab" href="#info">Thông tin</a></li>
                <li class="mr-2 mb-3"><a data-toggle="tab" href="#history">Lịch sử sản phẩm</a></li>
                <li class="mr-2 mb-3"><a data-toggle="tab" href="#files">Attachment</a></li>
            </ul>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluided">
                <div class="tab-content">
                    <div id="info" class="content tab-pane in active">
                        <div class="row">
                            <div class="col-12">
                                <div class="info-chung">
                                    <div class="content-info">
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-left-0">
                                                <p class="p-0 m-0 px-3 required-label text-danger">Số báo giá</p>
                                            </div>
                                            <div class="w-100">
                                                <input type="text" readonly
                                                    value="{{ $billSale->quotation_number }}"
                                                    class="border w-100 py-2 border-left-0 border-right-0 px-3 numberQute"
                                                    id="myInput" autocomplete="off" name="quotation_number">
                                            </div>
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-left-0">
                                                <p class="p-0 m-0 px-3">Khách hàng</p>
                                            </div>
                                            <div class="w-100">
                                                <input type="text" readonly
                                                    value="{{ $billSale->guest_name_display }}"
                                                    class="border w-100 py-2 border-left-0 border-right-0 px-3 nameGuest"
                                                    id="myInput" autocomplete="off">
                                                <input type="hidden" class="idGuest" autocomplete="off"
                                                    name="guest_id">
                                            </div>
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 px-3 required-label text-danger">Ngày hóa đơn</p>
                                            </div>
                                            <div class="w-100">
                                                <input type="text" readonly
                                                    value="{{ date_format(new DateTime($billSale->ngayHD), 'd/m/Y') }}"
                                                    name="date_bill"
                                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                            </div>
                                        </div>
                                        <div class="d-flex ml-2 align-items-center">
                                            <div class="title-info py-2 border border-top-0 border-left-0">
                                                <p class="p-0 m-0 px-3 required-label text-danger">Số hóa đơn</p>
                                            </div>
                                            <div class="w-100">
                                                <input type="text" name="number_bill" readonly
                                                    value="{{ $billSale->number_bill }}"
                                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <section class="content mt-5">
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
                                                                    fill="#42526E" />
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
                                                                    fill="#42526E" />
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
                                                                    stroke-linejoin="round" />
                                                                <path d="M15.75 2.25L2.25 15.75" stroke="#42526E"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
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
                                                    <th class="border-right">
                                                        <input class="ml-4" id="checkall" type="checkbox"> Mã sản
                                                        phẩm
                                                    </th>
                                                    <th class="border-right">Tên sản phẩm</th>
                                                    <th class="border-right">Đơn vị</th>
                                                    <th class="border-right">Số lượng</th>
                                                    <th class="border-right">Đơn giá</th>
                                                    <th class="border-right">Thuế</th>
                                                    <th class="border-right">Thành tiền</th>
                                                    <th class="p-0 bg-secondary border-0 Daydu" style="width:1%;">
                                                    </th>
                                                    <th class="border-right note">Ghi chú</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($product as $item)
                                                    <tr class="bg-white">
                                                        <td
                                                            class="border border-left-0 border-top-0 border-bottom-0 position-relative">
                                                            <div
                                                                class="d-flex w-100 justify-content-between align-items-center">
                                                                <input type="text" autocomplete="off"
                                                                    readonly="" value="{{ $item->product_code }}"
                                                                    class="border-0 px-2 py-1 w-75 product_code w-100"
                                                                    name="product_code[]">
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="border border-top-0 border-bottom-0 position-relative">
                                                            <div class="d-flex align-items-center">
                                                                <input type="text"
                                                                    value="{{ $item->product_name }}"
                                                                    class="border-0 px-2 py-1 w-100 product_name"
                                                                    readonly="" autocomplete="off"
                                                                    name="product_name[]">
                                                                <input type="hidden" class="product_id"
                                                                    value="{{ $item->product_id }}" autocomplete="off"
                                                                    name="product_id[]">
                                                                <div class="info-product" data-toggle="modal"
                                                                    data-target="#productModal">
                                                                    <svg width="18" height="18"
                                                                        viewBox="0 0 18 18" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M8.99998 4.5C8.45998 4.5 8.09998 4.86 8.09998 5.4C8.09998 5.94 8.45998 6.3 8.99998 6.3C9.53998 6.3 9.89998 5.94 9.89998 5.4C9.89998 4.86 9.53998 4.5 8.99998 4.5Z"
                                                                            fill="#42526E">
                                                                        </path>
                                                                        <path
                                                                            d="M9 0C4.05 0 0 4.05 0 9C0 13.95 4.05 18 9 18C13.95 18 18 13.95 18 9C18 4.05 13.95 0 9 0ZM9 16.2C5.04 16.2 1.8 12.96 1.8 9C1.8 5.04 5.04 1.8 9 1.8C12.96 1.8 16.2 5.04 16.2 9C16.2 12.96 12.96 16.2 9 16.2Z"
                                                                            fill="#42526E">
                                                                        </path>
                                                                        <path
                                                                            d="M8.99998 7.2002C8.45998 7.2002 8.09998 7.5602 8.09998 8.10019V12.6002C8.09998 13.1402 8.45998 13.5002 8.99998 13.5002C9.53998 13.5002 9.89998 13.1402 9.89998 12.6002V8.10019C9.89998 7.5602 9.53998 7.2002 8.99998 7.2002Z"
                                                                            fill="#42526E">
                                                                        </path>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="border border-top-0 border-bottom-0">
                                                            <input type="text" autocomplete="off" readonly=""
                                                                value="{{ $item->product_unit }}"
                                                                class="border-0 px-2 py-1 w-100 product_unit"
                                                                name="product_unit[]">
                                                        </td>
                                                        <td
                                                            class="border border-top-0 border-bottom-0 position-relative">
                                                            <input type="text" readonly=""
                                                                value="{{ is_int($item->billSale_qty) ? $item->billSale_qty : rtrim(rtrim(number_format($item->billSale_qty, 4, '.', ''), '0'), '.') }}"
                                                                class="border-0 px-2 py-1 w-100 quantity-input"
                                                                autocomplete="off" name="product_qty[]">
                                                            <input type="hidden" class="tonkho">
                                                            <p class="text-primary text-center position-absolute inventory"
                                                                style="top: 68%; display: none;">Tồn kho:
                                                                <span class="soTonKho">35</span>
                                                            </p>
                                                        </td>
                                                        <td
                                                            class="border border-top-0 border-bottom-0 position-relative">
                                                            <input type="text"
                                                                value="{{ number_format($item->price_export) }}"
                                                                class="border-0 px-2 py-1 w-100 product_price"
                                                                autocomplete="off" name="product_price[]"
                                                                readonly="">
                                                            <p class="text-primary text-right position-absolute transaction"
                                                                style="top: 68%; right: 5%; display: none;">Giao dịch
                                                                gần đây
                                                            </p>
                                                        </td>
                                                        <td class="border border-top-0 border-bottom-0 px-4">
                                                            <select name="product_tax[]"
                                                                class="border-0 text-center product_tax"
                                                                disabled="">
                                                                <option value="0" <?php if ($item->product_tax == 0) {
                                                                    echo 'selected';
                                                                } ?>>0%</option>
                                                                <option value="8" <?php if ($item->product_tax == 8) {
                                                                    echo 'selected';
                                                                } ?>>8%</option>
                                                                <option value="10" <?php if ($item->product_tax == 10) {
                                                                    echo 'selected';
                                                                } ?>>10%</option>
                                                                <option value="99" <?php if ($item->product_tax == 99) {
                                                                    echo 'selected';
                                                                } ?>>NOVAT
                                                                </option>
                                                            </select>
                                                        </td>
                                                        <td class="border border-top-0 border-bottom-0">
                                                            <input type="text" readonly="" value=""
                                                                class="border-0 px-2 py-1 w-100 total-amount">
                                                        </td>
                                                        <td class="border-top border-secondary p-0 bg-secondary Daydu"
                                                            style="width:1%;"></td>
                                                        <td
                                                            class="border border-top-0 border-bottom-0 position-relative product_ratio d-none">
                                                            <input type="text"
                                                                class="border-0 px-2 py-1 w-100 heSoNhan"
                                                                autocomplete="off" required="required" readonly=""
                                                                value="{{ $item->product_ratio }}"
                                                                name="product_ratio[]">
                                                        </td>
                                                        <td
                                                            class="border border-top-0 border-bottom-0 position-relative price_import d-none">
                                                            <input type="text"
                                                                class="border-0 px-2 py-1 w-100 giaNhap"
                                                                readonly="" autocomplete="off" required="required"
                                                                name="price_import[]"
                                                                value="{{ $item->price_import }}">
                                                        </td>
                                                        <td
                                                            class="border border-top-0 border-bottom-0 position-relative note p-1">
                                                            <input type="text" class="border-0 py-1 w-100"
                                                                readonly="" value="{{ $item->product_note }}"
                                                                name="product_note[]" value="">
                                                        </td>
                                                        <td style="display:none;" class="">
                                                            <input type="text" class="product_tax1">
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </section>
                                <div class="content">
                                    <div class="container-fluided">
                                        <div class="row position-relative footer-total">
                                            <div class="col-sm-6"></div>
                                            <div class="col-sm-6">
                                                <div class="mt-4 w-50" style="float: right;">
                                                    <div class="d-flex justify-content-between">
                                                        <span><b>Giá trị trước thuế:</b></span>
                                                        <span id="total-amount-sum">0đ</span>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-between mt-2 align-items-center">
                                                        <span><b>Thuế VAT:</b></span>
                                                        <span id="product-tax">0đ</span>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-between align-items-center mt-2">
                                                        <span class="text-primary">Giảm giá:</span>
                                                        <div class="w-50">
                                                            <input type="text"
                                                                class="form-control text-right border-0 p-0"
                                                                name="discount" id="voucher" value="0">
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-between align-items-center mt-2">
                                                        <span class="text-primary">Phí vận chuyển:</span>
                                                        <div class="w-50">
                                                            <input type="text"
                                                                class="form-control text-right border-0 p-0"
                                                                name="transport_fee" id="transport_fee"
                                                                value="0">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between mt-2">
                                                        <span class="text-lg"><b>Tổng cộng:</b></span>
                                                        <span><b id="grand-total" data-value="0">0đ</b></span>
                                                        <input type="text" hidden="" name="totalValue"
                                                            value="0" id="total">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="history" class="tab-pane fade">
                    </div>
    </form>
    <div id="files" class="tab-pane fade">
        <x-form-attachment :value="$billSale" name="HDBH"></x-form-attachment>
    </div>
</div>
</div>
</section>

{{-- Thông tin sản phẩm --}}
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thông tin sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $('#file_restore').on('change', function(e) {
        e.preventDefault();
        $('#formSubmit').attr('action', '{{ route('addAttachment') }}');
        // $('#formSubmit').attr('method', 'HEAD');
        $('input[name="_method"]').remove();
        $('#formSubmit')[0].submit();
    })
    //hiện danh sách số báo giá khi click trường tìm kiếm
    $("#myUL").hide();
    $("#myInput").on("click", function() {
        $("#myUL").show();
    });
    //ẩn danh sách số báo giá
    $(document).click(function(event) {
        if (!$(event.target).closest("#myInput").length) {
            $("#myUL").hide();
        }
    });
    //search thông tin số báo giá
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toUpperCase();
            $("#myUL li").each(function() {
                var text = $(this).find("a").text().toUpperCase();
                $(this).toggle(text.indexOf(value) > -1);
            });
        });
    });
    //Lấy thông tin từ số báo giá
    $(document).ready(function() {
        $('.search-info').click(function() {
            var idQuote = parseInt($(this).attr('id'), 10);
            $.ajax({
                url: '{{ route('getInfoDelivery') }}',
                type: 'GET',
                data: {
                    idQuote: idQuote
                },
                success: function(data) {
                    console.log(data);
                    $("#delivery_id").val(data.maGiaoHang);
                    $('.numberQute').val(data.quotation_number)
                    $('.nameGuest').val(data.guest_name_display)
                    $.ajax({
                        url: '{{ route('getProductDelivery') }}',
                        type: 'GET',
                        data: {
                            idQuote: idQuote
                        },
                        success: function(data) {
                            $(".sanPhamGiao").remove();
                            $.each(data, function(index, item) {
                                var totalTax = parseFloat(item
                                    .total_tax) || 0;
                                var totalPrice = parseFloat(item
                                    .total_price) || 0;
                                var grandTotal = totalTax + totalPrice;
                                $(".idGuest").val(item.guest_id);
                                $("#detailexport_id").val(item
                                    .detailexport_id);
                                $("#total-amount-sum").text(
                                    formatCurrency(totalPrice));
                                $("#product-tax").text(formatCurrency(
                                    totalTax));
                                $("#grand-total").text(formatCurrency(
                                    grandTotal));
                                $("#voucher").val(formatCurrency(item
                                    .discount == null ? 0 : item
                                    .discount));
                                $("#transport_fee").val(formatCurrency(
                                    item.transfer_fee == null ?
                                    0 : item.transfer_fee));
                                var newRow = `
                                <tr id="dynamic-row-${item.id}" class="bg-white sanPhamGiao">
                            <td class="border border-left-0 border-top-0 border-bottom-0 position-relative">
                                <div class="d-flex w-100 justify-content-between align-items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9 3C7.89543 3 7 3.89543 7 5C7 6.10457 7.89543 7 9 7C10.1046 7 11 6.10457 11 5C11 3.89543 10.1046 3 9 3Z" fill="#42526E"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9 10C7.89543 10 7 10.8954 7 12C7 13.1046 7.89543 14 9 14C10.1046 14 11 13.1046 11 12C11 10.8954 10.1046 10 9 10Z" fill="#42526E"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9 17C7.89543 17 7 17.8954 7 19C7 20.1046 7.89543 21 9 21C10.1046 21 11 20.1046 11 19C11 17.8954 10.1046 17 9 17Z" fill="#42526E"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 3C13.8954 3 13 3.89543 13 5C13 6.10457 13.8954 7 15 7C16.1046 7 17 6.10457 17 5C17 3.89543 16.1046 3 15 3Z" fill="#42526E"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 10C13.8954 10 13 10.8954 13 12C13 13.1046 13.8954 14 15 14C16.1046 14 17 13.1046 17 12C17 10.8954 16.1046 10 15 10Z" fill="#42526E"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 17C13.8954 17 13 17.8954 13 19C13 20.1046 13.8954 21 15 21C16.1046 21 17 20.1046 17 19C17 17.8954 16.1046 17 15 17Z" fill="#42526E"></path>
                                    </svg>
                                    <input type="checkbox" class="cb-element">
                                    <input type="text" readonly value="${item.product_code == null ? '' : item.product_code}" autocomplete="off" class="border-0 px-2 py-1 w-75 product_code w-100" name="product_code[]">
                                </div>
                            </td>
                            <td class="border border-top-0 border-bottom-0 position-relative">
                                <div class="d-flex align-items-center">
                                    <input type="text" readonly value="${item.product_name}" class="border-0 px-2 py-1 w-100 product_name" autocomplete="off" required="" name="product_name[]">
                                    <input type="hidden" class="product_id" value="${item.product_id}" autocomplete="off" name="product_id[]">
                                    <div class="info-product" data-toggle="modal" data-target="#productModal" style="display: none;">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.99998 4.5C8.45998 4.5 8.09998 4.86 8.09998 5.4C8.09998 5.94 8.45998 6.3 8.99998 6.3C9.53998 6.3 9.89998 5.94 9.89998 5.4C9.89998 4.86 9.53998 4.5 8.99998 4.5Z" fill="#42526E"></path>
                                        <path d="M9 0C4.05 0 0 4.05 0 9C0 13.95 4.05 18 9 18C13.95 18 18 13.95 18 9C18 4.05 13.95 0 9 0ZM9 16.2C5.04 16.2 1.8 12.96 1.8 9C1.8 5.04 5.04 1.8 9 1.8C12.96 1.8 16.2 5.04 16.2 9C16.2 12.96 12.96 16.2 9 16.2Z" fill="#42526E"></path>
                                        <path d="M8.99998 7.2002C8.45998 7.2002 8.09998 7.5602 8.09998 8.10019V12.6002C8.09998 13.1402 8.45998 13.5002 8.99998 13.5002C9.53998 13.5002 9.89998 13.1402 9.89998 12.6002V8.10019C9.89998 7.5602 9.53998 7.2002 8.99998 7.2002Z" fill="#42526E"></path>
                                    </svg>
                                    </div>
                                </div>
                            </td>
                            <td class="border border-top-0 border-bottom-0">
                                <input type="text" readonly value="${item.product_unit}" autocomplete="off" class="border-0 px-2 py-1 w-100 product_unit" required="" name="product_unit[]">
                            </td>
                            <td class="border border-top-0 border-bottom-0 position-relative">
                                <input type="text" readonly value="${item.soLuongHoaDon}" class="border-0 px-2 py-1 w-100 quantity-input" autocomplete="off" required="" name="product_qty[]">
                                <input type="hidden" class="tonkho">
                                <p class="text-primary text-center position-absolute inventory" style="top: 68%; display: none;">Tồn kho: 35</p>
                            </td>
                            <td class="border border-top-0 border-bottom-0 position-relative">
                                <input type="text" readonly value="${formatCurrency(item.price_export)}" class="border-0 px-2 py-1 w-100 product_price" autocomplete="off" name="product_price[]" required="" readonly="readonly">
                                <p class="text-primary text-right position-absolute transaction" style="top: 68%; right: 5%; display: none;">Giao dịch gần đây</p>
                            </td>
                            <td class="border border-top-0 border-bottom-0 px-4">
                                <select class="border-0 text-center product_tax" disabled>
                                    <option value="0" ${(item.product_tax == 0) ? 'selected' : ''}>0%</option>
                                    <option value="8" ${(item.product_tax == 8) ? 'selected' : ''}>8%</option>
                                    <option value="10" ${(item.product_tax == 10) ? 'selected' : ''}>10%</option>
                                    <option value="99" ${(item.product_tax == 99) ? 'selected' : ''}>NOVAT</option>
                                </select>
                                <input type="hidden" class="product_tax" value="${(item.product_tax)}" name="product_tax[]">
                            </td>
                            <td class="border border-top-0 border-bottom-0">
                                <input type="text" value="${formatCurrency(item.product_total)}" readonly="" class="border-0 px-2 py-1 w-100 total-amount">
                            </td>
                            <td class="border-top border-secondary p-0 bg-secondary Daydu" style="width:1%;"></td>
                            <td class="border border-top-0 border-bottom-0 position-relative product_ratio d-none">
                                <input type="text" readonly value="${item.product_ratio}" class="border-0 px-2 py-1 w-100 heSoNhan" autocomplete="off" required="required" name="product_ratio[]">
                            </td>
                            <td class="border border-top-0 border-bottom-0 position-relative price_import d-none">
                                <input type="text" readonly value="${formatCurrency(item.price_import)}" class="border-0 px-2 py-1 w-100 giaNhap" autocomplete="off" required="required" name="price_import[]">
                            </td>
                            <td class="border border-top-0 border-bottom-0 position-relative note p-1">
                                <input type="text" readonly value="${(item.product_note == null) ? '' : item.product_note}" class="border-0 py-1 w-100" name="product_note[]">
                            </td>
                            <td class="border border-top-0 border-bottom-0 border-right-0 text-right deleteProduct">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5454 5C10.2442 5 9.99999 5.24421 9.99999 5.54545C9.99999 5.8467 10.2442 6.09091 10.5454 6.09091H13.4545C13.7558 6.09091 14 5.8467 14 5.54545C14 5.24421 13.7558 5 13.4545 5H10.5454ZM6 7.72726C6 7.42601 6.24421 7.18181 6.54545 7.18181H7.63637H16.3636H17.4545C17.7558 7.18181 18 7.42601 18 7.72726C18 8.02851 17.7558 8.27272 17.4545 8.27272H16.9091V17C16.9091 18.2113 15.9118 19.1818 14.7135 19.1818H9.25891C8.97278 19.1816 8.68906 19.1247 8.42499 19.0145C8.16092 18.9044 7.92126 18.7431 7.71979 18.5399C7.51833 18.3367 7.35905 18.0957 7.25112 17.8307C7.14347 17.5664 7.08903 17.2834 7.09091 16.9981V8.27272H6.54545C6.24421 8.27272 6 8.02851 6 7.72726ZM8.18182 17.0041V8.27272H15.8182V17C15.8182 17.5966 15.3216 18.0909 14.7135 18.0909H9.25938C9.11713 18.0908 8.97632 18.0625 8.84503 18.0077C8.71375 17.953 8.5946 17.8728 8.49444 17.7718C8.39429 17.6707 8.3151 17.5509 8.26144 17.4192C8.20779 17.2874 8.18074 17.1464 8.18182 17.0041ZM13.4545 10.0909C13.7558 10.0909 14 10.3351 14 10.6364V15.7273C14 16.0285 13.7558 16.2727 13.4545 16.2727C13.1533 16.2727 12.9091 16.0285 12.9091 15.7273V10.6364C12.9091 10.3351 13.1533 10.0909 13.4545 10.0909ZM11.0909 10.6364C11.0909 10.3351 10.8467 10.0909 10.5454 10.0909C10.2442 10.0909 9.99999 10.3351 9.99999 10.6364V15.7273C9.99999 16.0285 10.2442 16.2727 10.5454 16.2727C10.8467 16.2727 11.0909 16.0285 11.0909 15.7273V10.6364Z" fill="#42526E"></path>
                                </svg>
                            </td>
                            <td style="display:none;" class="><input type="text" class="product_tax1"></td>
                            <td style="display:none;"><input type="text" class="product_tax1"></td>
                            </tr>`;
                                $("#dynamic-fields").before(newRow);
                                //kéo thả vị trí sản phẩm
                                $("table tbody").sortable({
                                    axis: "y",
                                    handle: "td",
                                });
                                //Xóa sản phẩm
                                $('.deleteProduct').click(function() {
                                    $(this).closest("tr")
                                        .remove();
                                    fieldCounter--;
                                    calculateTotalAmount();
                                    calculateGrandTotal();
                                    var productTaxText = $(
                                            '#product-tax')
                                        .text();
                                    var productTaxValue =
                                        parseFloat(
                                            productTaxText
                                            .replace(/,/g, ''));
                                    var taxAmount = parseFloat((
                                            '.product_tax1')
                                        .text());
                                    var totalTax =
                                        productTaxValue -
                                        taxAmount;
                                    $('#product-tax').text(
                                        totalTax);
                                });
                                // Checkbox
                                $('#checkall').change(function() {
                                    $('.cb-element').prop(
                                        'checked', this
                                        .checked);
                                    updateMultipleActionVisibility
                                        ();
                                });
                                $('.cb-element').change(function() {
                                    updateMultipleActionVisibility
                                        ();
                                    if ($('.cb-element:checked')
                                        .length === $(
                                            '.cb-element')
                                        .length) {
                                        $('#checkall').prop(
                                            'checked', true);
                                    } else {
                                        $('#checkall').prop(
                                            'checked', false
                                        );
                                    }
                                });
                                $(document).on('click',
                                    '.cancal_action',
                                    function(e) {
                                        e.preventDefault();
                                        $('.cb-element:checked')
                                            .prop('checked', false);
                                        $('#checkall').prop(
                                            'checked', false);
                                        updateMultipleActionVisibility
                                            ()
                                    })

                                function updateMultipleActionVisibility() {
                                    if ($('.cb-element:checked')
                                        .length > 0) {
                                        $('.multiple_action').show();
                                        $('.count_checkbox').text(
                                            'Đã chọn ' + $(
                                                '.cb-element:checked'
                                            ).length);
                                    } else {
                                        $('.multiple_action').hide();
                                    }
                                }
                                //Hiển thị danh sách tên sản phẩm
                                $(".list_product").hide();
                                $('.product_name').on("click", function(
                                    e) {
                                    e.stopPropagation();
                                    $(this).closest('tr').find(
                                            ".list_product")
                                        .show();
                                });
                                $(document).on("click", function(e) {
                                    if (!$(e.target).is(
                                            ".product_name")) {
                                        $(".list_product")
                                            .hide();
                                    }
                                });
                                //search tên sản phẩm
                                $(".product_name").on("keyup",
                                    function() {
                                        var value = $(this).val()
                                            .toUpperCase();
                                        var $tr = $(this).closest(
                                            "tr");
                                        $tr.find(".list_product li")
                                            .each(function() {
                                                var text = $(
                                                        this)
                                                    .find("a")
                                                    .text()
                                                    .toUpperCase();
                                                $(this).toggle(
                                                    text
                                                    .indexOf(
                                                        value
                                                    ) >
                                                    -1);
                                            });
                                    });
                                //lấy thông tin sản phẩm
                                $(document).ready(function() {
                                    $('.inventory').hide();
                                    $('.transaction').hide();
                                    $('.info-product').hide();
                                    $('.idProduct').click(
                                        function() {
                                            var productName =
                                                $(this)
                                                .closest(
                                                    'tr')
                                                .find(
                                                    '.product_name'
                                                );
                                            var productUnit =
                                                $(this)
                                                .closest(
                                                    'tr')
                                                .find(
                                                    '.product_unit'
                                                );
                                            var thue = $(
                                                    this)
                                                .closest(
                                                    'tr')
                                                .find(
                                                    '.product_tax'
                                                );
                                            var product_id =
                                                $(this)
                                                .closest(
                                                    'tr')
                                                .find(
                                                    '.product_id'
                                                );
                                            var tonkho = $(
                                                    this)
                                                .closest(
                                                    'tr')
                                                .find(
                                                    '.tonkho'
                                                );
                                            var idProduct =
                                                $(this)
                                                .attr('id');
                                            $.ajax({
                                                url: '{{ route('getProductFromQuote') }}',
                                                type: 'GET',
                                                data: {
                                                    idProduct: idProduct
                                                },
                                                success: function(
                                                    data
                                                ) {
                                                    productName
                                                        .val(
                                                            data
                                                            .product_name
                                                        );
                                                    productUnit
                                                        .val(
                                                            data
                                                            .product_unit
                                                        );
                                                    thue.val(
                                                        data
                                                        .product_tax
                                                    );
                                                    product_id
                                                        .val(
                                                            data
                                                            .id
                                                        );
                                                    tonkho
                                                        .val(
                                                            data
                                                            .product_inventory
                                                        )
                                                    $('.info-product')
                                                        .show();
                                                    if (data
                                                        .product_inventory !==
                                                        null
                                                    ) {
                                                        $('.inventory')
                                                            .show();
                                                        $('.transaction')
                                                            .show();
                                                    }
                                                }
                                            });
                                        });
                                });
                                //Xem thông tin sản phẩm
                                $('.info-product').click(function() {
                                    var productName = $(this)
                                        .closest('tr').find(
                                            '.product_name')
                                        .val();
                                    var dvt = $(this).closest(
                                            'tr').find(
                                            '.product_unit')
                                        .val();
                                    var thue = $(this).closest(
                                            'tr').find(
                                            '.product_tax')
                                        .val();
                                    var tonKho = $(this)
                                        .closest('tr').find(
                                            '.tonkho').val();
                                    $('#productModal').find(
                                        '.modal-body').html(
                                        '<b>Tên sản phẩm: </b> ' +
                                        productName +
                                        '<br>' +
                                        '<b>Đơn vị: </b>' +
                                        dvt + '<br>' +
                                        '<b>Tồn kho: </b>' +
                                        tonKho +
                                        '<br>' +
                                        '<b>Thuế: </b>' +
                                        (thue == 99 ||
                                            thue == null ?
                                            "NOVAT" : thue +
                                            '%'));
                                });
                                //Mở rộng
                                if (status_form == 1) {
                                    $('.change_colum').text('Tối giản');
                                    $('.product_price').attr('readonly',
                                        false);
                                    // Xóa dữ liệu trường hệ số nhân, giá nhập
                                    $(this).closest("tr").find(
                                        '.product_ratio').val('')
                                    $(this).closest("tr").find(
                                        '.price_import').val('')
                                    // Xóa required
                                    $('tbody .heSoNhan').removeAttr(
                                        'required');
                                    $('tbody .giaNhap').removeAttr(
                                        'required');
                                    $('.product-ratio').hide();
                                    $('.product_ratio').hide()
                                    $('.price_import').hide();
                                    $('.note').hide();
                                    $('.Daydu').hide();
                                    $('.heSoNhan').val('')
                                    $('.giaNhap').val('')
                                } else {
                                    $('.change_colum').text('Đầy đủ');
                                    $('.product_price').attr('readonly',
                                        true);
                                    $(this).closest("tr").find(
                                        '.product_price').val('');
                                    // Xóa dữ liệu trương đơn giá
                                    $(this).closest("tr").find(
                                        '.price_export').val('')
                                    // Thêm required
                                    $('tbody .heSoNhan').attr(
                                        'required', true);
                                    $('tbody .giaNhap').attr('required',
                                        true);
                                    $('.product_ratio').show()
                                    $('.price_import').show();
                                    $('.note').show();
                                    $('.Daydu').show();
                                    $(this).closest("tr").find(
                                        '.heSoNhan').val('');
                                    $(this).closest("tr").find(
                                        '.giaNhap').val('');
                                }
                            });
                        }
                    });
                }
            });
        });
    });

    //Mở rộng
    var status_form = 0;
    $('.change_colum').off('click').on('click', function() {
        if (status_form == 0) {
            $(this).text('Tối giản');
            $('.product_price').attr('readonly', false);
            // Xóa required
            $('.product-ratio').hide();
            $('.product_ratio').hide()
            $('.price_import').hide();
            $('.note').hide();
            $('.Daydu').hide();
            status_form = 1;
        } else {
            $(this).text('Đầy đủ');
            $('.product_price').attr('readonly', true);
            $('.product_ratio').show();
            $('.price_import').show();
            $('.note').show();
            $('.Daydu').show();
            status_form = 0;
        }
    });
    //tính thành tiền của sản phẩm
    $(document).ready(function() {
        calculateTotals();
    });

    $(document).on('input', '.quantity-input, [name^="product_price"], .product_tax, .heSoNhan, .giaNhap', function() {
        calculateTotals();
    });

    function calculateTotals() {
        var totalAmount = 0;
        var totalTax = 0;

        // Lặp qua từng hàng
        $('tr').each(function() {
            var productQty = parseFloat($(this).find('.quantity-input').val());
            var productPriceElement = $(this).find('[name^="product_price"]');
            var productPrice = 0;
            var giaNhap = 0;
            var taxValue = parseFloat($(this).find('.product_tax option:selected').val());
            var heSoNhan = parseFloat($(this).find('.heSoNhan').val()) || 0;
            var giaNhapElement = $(this).find('.giaNhap');
            if (taxValue == 99) {
                taxValue = 0;
            }
            if (productPriceElement.length > 0) {
                var rawPrice = productPriceElement.val();
                if (rawPrice !== "") {
                    productPrice = parseFloat(rawPrice.replace(/,/g, ''));
                }
            }
            if (giaNhapElement.length > 0) {
                var rawGiaNhap = giaNhapElement.val();
                if (rawGiaNhap !== "") {
                    giaNhap = parseFloat(rawGiaNhap.replace(/,/g, ''));
                }
            }

            if (!isNaN(productQty) && !isNaN(taxValue)) {
                if (giaNhap > 0) {
                    var donGia = ((heSoNhan + 100) * giaNhap) / 100;
                } else {
                    var donGia = productPrice;
                }
                var rowTotal = productQty * donGia;
                var rowTax = (rowTotal * taxValue) / 100;

                // Làm tròn từng thuế
                rowTax = Math.round(rowTax);
                $(this).find('.product_tax1').val(formatCurrency(rowTax));

                // Hiển thị kết quả
                $(this).find('.total-amount').val(formatCurrency(Math.round(rowTotal)));

                if (status_form == 0) {
                    // Đơn giá
                    $(this).find('.product_price').val(formatCurrency(donGia));
                }

                // Cộng dồn vào tổng totalAmount và totalTax
                totalAmount += rowTotal;
                totalTax += rowTax;
            }
        });

        // Hiển thị tổng totalAmount và totalTax
        $('#total-amount-sum').text(formatCurrency(Math.round(totalAmount)));
        $('#product-tax').text(formatCurrency(Math.round(totalTax)));

        // Tính tổng thành tiền và thuế
        calculateGrandTotal(totalAmount, totalTax);
    }

    function calculateGrandTotal(totalAmount, totalTax) {
        if (!isNaN(totalAmount) || !isNaN(totalTax)) {
            var grandTotal = totalAmount + totalTax;
            $('#grand-total').text(formatCurrency(Math.round(grandTotal)));
        }

        // Cập nhật giá trị data-value
        $('#grand-total').attr('data-value', grandTotal);
        $('#total').val(totalAmount);
    }

    function formatCurrency(value) {
        // Làm tròn đến 2 chữ số thập phân
        value = Math.round(value * 100) / 100;

        // Xử lý phần nguyên
        var parts = value.toString().split(".");
        var integerPart = parts[0];
        var formattedValue = "";

        // Định dạng phần nguyên
        var count = 0;
        for (var i = integerPart.length - 1; i >= 0; i--) {
            formattedValue = integerPart.charAt(i) + formattedValue;
            count++;
            if (count % 3 === 0 && i !== 0) {
                formattedValue = "," + formattedValue;
            }
        }

        // Nếu có phần thập phân, thêm vào sau phần nguyên
        if (parts.length > 1) {
            formattedValue += "." + parts[1];
        }

        return formattedValue;
    }
    $('.info-product').click(function() {
        var idProduct = $(this).closest('tr').find('.product_id').val();

        $.ajax({
            url: '{{ route('getProductFromQuote') }}',
            type: 'GET',
            data: {
                idProduct: idProduct
            },
            success: function(data) {
                if (Array.isArray(data) && data.length > 0) {
                    var productData = data[0];
                    $('#productModal').find('.modal-body').html('<b>Tên sản phẩm: </b> ' +
                        productData.product_name + '<br>' + '<b>Đơn vị: </b>' + productData
                        .product_unit + '<br>' + '<b>Tồn kho: </b>' + (productData
                            .product_inventory == null ? 0 : productData
                            .product_inventory) + '<br>' + '<b>Thuế: </b>' + (productData
                            .product_tax == 99 || productData.product_tax == null ? "NOVAT" :
                            productData.product_tax + '%'
                        ));
                }
            }
        });
    });
</script>
</body>

</html>
