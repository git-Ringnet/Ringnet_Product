<x-navbar :title="$title" activeGroup="sell" activeName="quote" :workspacename="$workspacename"></x-navbar>
<form action="{{ route('detailExport.update', ['workspace' => $workspacename, 'detailExport' => $detailExport->maBG]) }}"
    method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" value="{{ $detailExport->maBG }}" name="detailexport_id">
    <div class="content-wrapper1 py-0 border-bottom px-4">
        <div class="d-flex justify-content-between align-items-center">
            <div class="container-fluided">
                <div class="mb-3">
                    <span class="font-weight-bold">Bán hàng</span>
                    <span class="mx-2"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="font-weight-bold">Đơn báo giá</span>
                    <span class="mx-2"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="font-weight-bold text-secondary">{{ $detailExport->quotation_number }}</span>
                </div>
            </div>
            <div class="container-fluided">
                <div class="row m-0 mb-1">
                    <div class="dropdown">
                        <a href="{{ route('detailExport.index', $workspacename) }}">
                            <button type="button" class="btn-save-print rounded d-flex align-items-center h-100"
                                style="margin-right:10px">
                                <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z"
                                        fill="#6D7075" />
                                </svg>
                                <span>Hủy</span>
                            </button>
                        </a>
                    </div>
                    <button type="submit" name="action1" value="action_1" onclick="kiemTraFormGiaoHang(event);"
                        class="custom-btn d-flex align-items-center h-100" id="btn-submit" style="margin-right:10px">
                        <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M3.75528 1.6875H5.99476H11.9948H12.123C12.3939 1.6875 12.6621 1.74088 12.9123 1.84459C13.1626 1.94829 13.3899 2.10029 13.5814 2.29189L15.7022 4.41269C16.089 4.79939 16.3064 5.32394 16.3065 5.87088V14.25C16.3065 14.797 16.0892 15.3216 15.7024 15.7084C15.3156 16.0952 14.791 16.3125 14.244 16.3125H12.75H5.25H3.83328C3.28894 16.3125 2.76666 16.0973 2.38031 15.7139C1.99396 15.3304 1.77486 14.8098 1.77078 14.2655L1.69278 3.76547C1.69074 3.49333 1.74258 3.22344 1.84531 2.97143C1.94805 2.71941 2.09965 2.49021 2.29137 2.29705C2.4831 2.10389 2.71115 1.95058 2.9624 1.84597C3.21364 1.74135 3.48312 1.68749 3.75528 1.6875ZM5.8125 15.1875H12.1875V9.9645C12.1875 9.74238 12.0071 9.5625 11.7862 9.5625H6.2145C5.99266 9.5625 5.8125 9.74266 5.8125 9.9645V15.1875ZM13.3125 15.1875V9.9645C13.3125 9.12163 12.6289 8.4375 11.7862 8.4375H6.2145C5.37134 8.4375 4.6875 9.12134 4.6875 9.9645V15.1875H3.83326C3.58582 15.1875 3.34842 15.0897 3.17281 14.9154C2.9972 14.7411 2.89761 14.5044 2.89574 14.257L2.81774 3.75703C2.81682 3.63333 2.84038 3.51066 2.88708 3.39611C2.93378 3.28155 3.00269 3.17737 3.08983 3.08957C3.17698 3.00177 3.28064 2.93208 3.39485 2.88453C3.50905 2.83698 3.63154 2.8125 3.75524 2.8125H5.43226V5.18175C5.43226 5.52985 5.57054 5.86369 5.81668 6.10983C6.06282 6.35597 6.39666 6.49425 6.74476 6.49425H11.2448C11.5929 6.49425 11.9267 6.35597 12.1728 6.10983C12.419 5.86369 12.5573 5.52985 12.5573 5.18175V2.91925C12.6414 2.96326 12.7185 3.01991 12.7858 3.08725L14.9068 5.20831C15.0826 5.38405 15.1814 5.62254 15.1815 5.87112V14.25C15.1815 14.4986 15.0827 14.7371 14.9069 14.9129C14.7311 15.0887 14.4926 15.1875 14.244 15.1875H13.3125ZM11.4323 5.18175V2.8125H6.55726V5.18175C6.55726 5.23148 6.57701 5.27917 6.61218 5.31433C6.64734 5.3495 6.69503 5.36925 6.74476 5.36925H11.2448C11.2945 5.36925 11.3422 5.3495 11.3773 5.31433C11.4125 5.27917 11.4323 5.23148 11.4323 5.18175Z"
                                fill="white" />
                        </svg>
                        <input type="hidden" id="hiddenAction" name="action" value="action_1">
                        <span>Lưu</span>
                    </button>
                    <div id="sideGuest">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="16" width="16" height="16" rx="5" transform="rotate(90 16 0)"
                                fill="#ECEEFA" />
                            <path
                                d="M15 11C15 13.2091 13.2091 15 11 15L5 15C2.7909 15 1 13.2091 1 11L1 5C1 2.79086 2.7909 1 5 1L11 1C13.2091 1 15 2.79086 15 5L15 11ZM10 13.5L10 2.5L5 2.5C3.6193 2.5 2.5 3.61929 2.5 5L2.5 11C2.5 12.3807 3.6193 13.5 5 13.5H10Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-wrapper1 py-0 pl-0 px-0" id="main">
        <div class="bg-filter-search border-top-0 text-center py-2">
            <span class="font-weight-bold text-secondary text-nav">THÔNG TIN SẢN PHẨM</span>
        </div>
        <section class="content">
            <div class="container-fluided">
                <div class="col-12">
                    <section class="content">
                        <div class="container-fluided order_content">
                            <section class="multiple_action" style="display: none;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="count_checkbox mr-5">Đã chọn 1</span>
                                    <div class="row action">
                                        <div class="btn-chotdon my-2 ml-3">
                                            <button type="button" id="btn-chot"
                                                class="btn-group btn-light d-flex align-items-center h-100">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
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
                                        <th class="border-right p-1" style="width: 15%;">
                                            <input class="ml-4 border-danger" id="checkall" type="checkbox">
                                            <span class="text-table text-secondary">Mã sản phẩm</span>
                                        </th>
                                        <th class="border-right p-1" style="width: 15%;">
                                            <span class="text-table text-secondary">Tên sản phẩm</span>
                                        </th>
                                        <th class="border-right p-1" style="width: 8%;">
                                            <span class="text-table text-secondary">Đơn vị</span>
                                        </th>
                                        <th class="border-right p-1" style="width: 8%;">
                                            <span class="text-table text-secondary">Số lượng</span>
                                        </th>
                                        <th class="border-right p-1" style="width: 10%;">
                                            <span class="text-table text-secondary">Đơn giá</span>
                                        </th>
                                        <th class="border-right p-1" style="width: 8%;">
                                            <span class="text-table text-secondary">Thuế</span>
                                        </th>
                                        <th class="border-right p-1" style="width: 10%;">
                                            <span class="text-table text-secondary">Thành
                                                tiền</span>
                                        </th>
                                        <th class="p-1 bg-secondary border-0 Daydu p-1" style="width:1%;"></th>
                                        <th class="border-right product_ratio p-1">
                                            <span class="text-table text-secondary">Hệ số nhân</span>
                                        </th>
                                        <th class="border-right price_import p-1">
                                            <span class="text-table text-secondary">Giá nhập</span>
                                        </th>
                                        <th class="border-right note p-1">
                                            <span class="text-table text-secondary">Ghi
                                                chú</span>
                                        </th>
                                        <th class=""></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quoteExport as $item_quote)
                                        <tr class="bg-white addProduct">
                                            <td
                                                class="border border-left-0 border-top-0 border-bottom-0 position-relative">
                                                <div class="d-flex w-100 justify-content-between align-items-center">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9 3C7.89543 3 7 3.89543 7 5C7 6.10457 7.89543 7 9 7C10.1046 7 11 6.10457 11 5C11 3.89543 10.1046 3 9 3Z"
                                                            fill="#42526E">
                                                        </path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9 10C7.89543 10 7 10.8954 7 12C7 13.1046 7.89543 14 9 14C10.1046 14 11 13.1046 11 12C11 10.8954 10.1046 10 9 10Z"
                                                            fill="#42526E">
                                                        </path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9 17C7.89543 17 7 17.8954 7 19C7 20.1046 7.89543 21 9 21C10.1046 21 11 20.1046 11 19C11 17.8954 10.1046 17 9 17Z"
                                                            fill="#42526E">
                                                        </path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M15 3C13.8954 3 13 3.89543 13 5C13 6.10457 13.8954 7 15 7C16.1046 7 17 6.10457 17 5C17 3.89543 16.1046 3 15 3Z"
                                                            fill="#42526E">
                                                        </path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M15 10C13.8954 10 13 10.8954 13 12C13 13.1046 13.8954 14 15 14C16.1046 14 17 13.1046 17 12C17 10.8954 16.1046 10 15 10Z"
                                                            fill="#42526E">
                                                        </path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M15 17C13.8954 17 13 17.8954 13 19C13 20.1046 13.8954 21 15 21C16.1046 21 17 20.1046 17 19C17 17.8954 16.1046 17 15 17Z"
                                                            fill="#42526E">
                                                        </path>
                                                    </svg>
                                                    <input type="checkbox" class="cb-element">
                                                    <input type="text" autocomplete="off"
                                                        value="{{ $item_quote->product_code }}"
                                                        class="border-0 px-2 py-1 w-75 product_code"
                                                        name="product_code[]">
                                                </div>
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 position-relative">
                                                <ul class="list_product bg-white position-absolute w-100 rounded shadow p-0 scroll-data"
                                                    style="z-index: 99; top: 75%; left: 10%; display: none;">
                                                    @foreach ($product as $product_value)
                                                        <li>
                                                            <a href="javascript:void(0);"
                                                                class="text-dark d-flex justify-content-between p-2 idProduct"
                                                                id="{{ $product_value->id }}" name="idProduct">
                                                                <span
                                                                    class="w-50">{{ $product_value->product_name }}</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <div class="d-flex align-items-center">
                                                    <input type="text" value="{{ $item_quote->product_name }}"
                                                        class="border-0 px-2 py-1 w-100 product_name"
                                                        autocomplete="off" required="" name="product_name[]">
                                                    <input type="hidden" class="product_id" autocomplete="off"
                                                        value="{{ $item_quote->product_id }}" name="product_id[]">
                                                    <div class="info-product" data-toggle="modal"
                                                        data-target="#productModal">
                                                        <svg width="18" height="18" viewBox="0 0 18 18"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                                <input type="text" autocomplete="off"
                                                    value="{{ $item_quote->product_unit }}"
                                                    class="border-0 px-2 py-1 w-100 product_unit" required=""
                                                    name="product_unit[]">
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 position-relative">
                                                <input type="text"
                                                    value="{{ is_int($item_quote->product_qty) ? $item_quote->product_qty : rtrim(rtrim(number_format($item_quote->product_qty, 4, '.', ''), '0'), '.') }}"
                                                    class="border-0 px-2 py-1 w-100 quantity-input" autocomplete="off"
                                                    required="" name="product_qty[]">
                                                <input type="hidden" class="tonkho">
                                                <p class="text-primary text-center position-absolute inventory"
                                                    style="top: 68%; display: none;">Tồn kho:
                                                    <span class="soTonKho">35</span>
                                                </p>
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 position-relative">
                                                <input type="text"
                                                    value="{{ number_format($item_quote->price_export) }}"
                                                    class="border-0 px-2 py-1 w-100 product_price" autocomplete="off"
                                                    name="product_price[]" required="" readonly>
                                                <p class="text-primary text-right position-absolute transaction"
                                                    style="top: 68%; right: 5%; display: none;">Giao dịch gần đây
                                                </p>
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 px-2">
                                                <select name="product_tax[]" class="border-0 text-center product_tax"
                                                    required="">
                                                    <option value="0" <?php if ($item_quote->product_tax == 0) {
                                                        echo 'selected';
                                                    } ?>>0%</option>
                                                    <option value="8" <?php if ($item_quote->product_tax == 8) {
                                                        echo 'selected';
                                                    } ?>>8%</option>
                                                    <option value="10" <?php if ($item_quote->product_tax == 10) {
                                                        echo 'selected';
                                                    } ?>>10%</option>
                                                    <option value="99" <?php if ($item_quote->product_tax == 99) {
                                                        echo 'selected';
                                                    } ?>>NOVAT</option>
                                                </select>
                                            </td>
                                            <td class="border border-top-0 border-bottom-0">
                                                <input type="text" readonly=""
                                                    value="{{ number_format($item_quote->product_total) }}"
                                                    class="border-0 px-2 py-1 w-100 total-amount">
                                            </td>
                                            <td class="border-top border-secondary p-0 bg-secondary Daydu"
                                                style="width:1%;"></td>
                                            <td
                                                class="border border-top-0 border-bottom-0 position-relative product_ratio">
                                                <input type="text" class="border-0 px-2 py-1 w-100 heSoNhan"
                                                    autocomplete="off" value="{{ $item_quote->product_ratio }}"
                                                    name="product_ratio[]">
                                            </td>
                                            <td
                                                class="border border-top-0 border-bottom-0 position-relative price_import">
                                                <input type="text" class="border-0 px-2 py-1 w-100 giaNhap"
                                                    autocomplete="off" required="required" name="price_import[]"
                                                    value="{{ number_format($item_quote->price_import) }}">
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 position-relative note p-1">
                                                <input type="text" class="border-0 py-1 w-100"
                                                    placeholder="Nhập ghi chú" name="product_note[]"
                                                    value="{{ $item_quote->product_note }}">
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 border-right-0 text-right">
                                                <svg width="17" height="17" viewBox="0 0 17 17"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M13.1417 6.90625C13.4351 6.90625 13.673 7.1441 13.673 7.4375C13.673 7.47847 13.6682 7.5193 13.6589 7.55918L12.073 14.2992C11.8471 15.2591 10.9906 15.9375 10.0045 15.9375H6.99553C6.00943 15.9375 5.15288 15.2591 4.92702 14.2992L3.34113 7.55918C3.27393 7.27358 3.45098 6.98757 3.73658 6.92037C3.77645 6.91099 3.81729 6.90625 3.85826 6.90625H13.1417ZM9.03125 1.0625C10.4983 1.0625 11.6875 2.25175 11.6875 3.71875H13.8125C14.3993 3.71875 14.875 4.19445 14.875 4.78125V5.3125C14.875 5.6059 14.6371 5.84375 14.3438 5.84375H2.65625C2.36285 5.84375 2.125 5.6059 2.125 5.3125V4.78125C2.125 4.19445 2.6007 3.71875 3.1875 3.71875H5.3125C5.3125 2.25175 6.50175 1.0625 7.96875 1.0625H9.03125ZM9.03125 2.65625H7.96875C7.38195 2.65625 6.90625 3.13195 6.90625 3.71875H10.0938C10.0938 3.13195 9.61805 2.65625 9.03125 2.65625Z"
                                                        fill="#6B6F76">
                                                    </path>
                                                </svg>
                                            </td>
                                            <td style="display:none;" class="">
                                                <input type="text" class="product_tax1">
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr id="dynamic-fields" class="bg-white"></tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                    <section class="content">
                        <div class="container-fluided">
                            <div class="d-flex">
                                <button type="button" data-toggle="dropdown" id="add-field-btn"
                                    class="btn-save-print d-flex align-items-center h-100 py-1 px-2 rounded"
                                    style="margin-right:10px">
                                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="14"
                                        height="14" viewBox="0 0 18 18" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                            fill="#42526E" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                            fill="#42526E" />
                                    </svg>
                                    <span class="text-table">Thêm sản phẩm</span>
                                </button>
                                <button type="button" data-toggle="dropdown" id="add-field-btn"
                                    class="btn-save-print d-flex align-items-center h-100 py-1 px-2 rounded"
                                    style="margin-right:10px">
                                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="14"
                                        height="14" viewBox="0 0 18 18" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                            fill="#42526E" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                            fill="#42526E" />
                                    </svg>
                                    <span class="text-table">Thêm đầu mục</span>
                                </button>
                                <button type="button" data-toggle="dropdown"
                                    class="btn-save-print d-flex align-items-center h-100 py-1 px-2 rounded"
                                    style="margin-right:10px">
                                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="14"
                                        height="14" viewBox="0 0 18 18" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                            fill="#42526E" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                            fill="#42526E" />
                                    </svg>
                                    <span class="text-table">Thêm hàng loạt</span>
                                </button>
                                <button type="button" class="btn-option py-1 px-2 bg-white border-0">
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
                                </button>
                            </div>
                        </div>
                    </section>
                    <div class="content">
                        <div class="container-fluided">
                            <div class="row position-relative footer-total">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6">
                                    <div class="mt-4 w-50" style="float: right;">
                                        <div class="d-flex justify-content-between">
                                            <span class="text-table"><b>Giá trị trước thuế:</b></span>
                                            <span id="total-amount-sum" class="text-table">0đ</span>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2 align-items-center">
                                            <span class="text-table"><b>Thuế VAT:</b></span>
                                            <span id="product-tax" class="text-table">0đ</span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <span class="text-primary text-table">Giảm giá:</span>
                                            <div class="w-50">
                                                <input type="text" class="form-control text-right border-0 p-0"
                                                    name="discount" id="voucher" value="0">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <span class="text-primary text-table">Phí vận chuyển:</span>
                                            <div class="w-50">
                                                <input type="text" class="form-control text-right border-0 p-0"
                                                    name="transport_fee" id="transport_fee" value="0">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <span class="text-lg"><b>Tổng cộng:</b></span>
                                            <span><b id="grand-total" data-value="0">0đ</b></span>
                                            <input type="text" hidden="" name="totalValue" value="0"
                                                id="total">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Thông tin khách hàng --}}
        <div class="content-wrapper2 px-0 py-0">
            <div id="mySidenav" class="sidenav border">
                <div id="show_info_Guest">
                    <div class="bg-filter-search border-0 py-2 text-center">
                        <span class="font-weight-bold text-secondary text-nav">THÔNG TIN KHÁCH HÀNG</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                        <span class="text-table mr-3">Khách hàng</span>
                        <input type="text" placeholder="Chọn thông tin"
                            value="{{ $detailExport->guest_name_display }}"
                            class="border-0 bg w-50 bg-input-guest py-0 nameGuest px-0" autocomplete="off"
                            id="myInput">
                        <input type="hidden" class="idGuest" autocomplete="off" name="guest_id"
                            value="{{ $detailExport->maKH }}">
                        <ul id="myUL"
                            class="bg-white position-absolute rounded shadow p-0 scroll-data list-guest"
                            style="z-index: 99;">
                            <div class="p-1">
                                <div class="position-relative">
                                    <input type="text" placeholder="Nhập công ty" class="pr-4 w-100 input-search"
                                        id="companyFilter">
                                    <span id="search-icon" class="search-icon"><i class="fas fa-search text-table"
                                            aria-hidden="true"></i></span>
                                </div>
                            </div>
                            @foreach ($guest as $guest_value)
                                <li>
                                    <a href="#"
                                        class="text-dark d-flex justify-content-between p-2 search-info w-100 border"
                                        id="{{ $guest_value->id }}" name="search-info">
                                        <span
                                            class="w-50 text-nav text-dark">{{ $guest_value->guest_name_display }}</span>
                                    </a>
                                </li>
                            @endforeach
                            <a type="button"
                                class="d-flex justify-content-center align-items-center p-2 position-sticky addGuestNew"
                                data-toggle="modal" data-target="#guestModal" style="bottom: 0;">
                                <span class="text-table text-center font-weight-bold">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                            fill="#282A30" />
                                    </svg>
                                    Thêm khách hàng
                                </span>
                            </a>
                        </ul>
                        <div class="">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
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
                    <div class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                        <span class="text-table mr-3">Số báo giá</span>
                        <input type="text" placeholder="Nhập thông tin" autocomplete="off"
                            value="{{ $detailExport->quotation_number }}" name="quotation_number"
                            class="border-0 bg w-50 bg-input-guest py-0 px-0">
                        <div class="">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
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
                    <div class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                        <span class="text-table mr-3">Số tham chiếu</span>
                        <input type="text" placeholder="Nhập thông tin"
                            value="{{ $detailExport->reference_number }}" name="reference_number"
                            class="border-0 bg w-50 bg-input-guest py-0 px-0">
                        <div class="">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
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
                    <div class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                        <span class="text-table mr-3">Ngày báo giá</span>
                        <input type="date" placeholder="Nhập thông tin" name="date_quote"
                            value="{{ date_format(new DateTime($detailExport->created_at), 'Y-m-d') }}"
                            class="border-0 bg w-50 bg-input-guest py-0 px-0">
                        <div class="">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
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
                    <div class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                        <span class="text-table mr-3">Hiệu lực báo giá</span>
                        <input type="text" placeholder="Nhập thông tin" name="price_effect"
                            value="{{ $detailExport->price_effect }}"
                            class="border-0 bg w-50 bg-input-guest py-0 px-0" autocomplete="off" id="myInput-quote"
                            value="{{ isset($dataForm['quote']) ? $dataForm['quote']->form_desc : '' }}">
                        <input type="hidden" class="idDateForm" autocomplete="off" name="idDate[quote]"
                            value="{{ isset($dataForm['quote']) ? $dataForm['quote']->id : '' }}">
                        <input type="hidden" class="nameDateForm" autocomplete="off" name="fieldDate[quote]"
                            value="{{ isset($dataForm['quote']) ? $dataForm['quote']->form_field : '' }}">
                        <ul id="myUL2" class="bg-white position-absolute w-50 rounded shadow p-0 scroll-data"
                            style="z-index: 99;">
                            @foreach ($date_form as $item)
                                @if ($item->form_field == 'quote')
                                    <li class="item-{{ $item->id }}">
                                        <a href="#"
                                            class="text-dark d-flex justify-content-between p-2 search-date-form"
                                            id="{{ $item->id }}" name="search-date-form" data-name="quote">
                                            <span class="w-50"
                                                id="{{ $item->form_field . $item->id }}">{{ $item->form_name }}</span>
                                        </a>
                                        <div class="dropdown">
                                            <button type="button" data-toggle="dropdown"
                                                class="btn-save-print d-flex align-items-center h-100"
                                                style="margin-right:10px">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </button>
                                            <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                                <a class="dropdown-item search-date-form" data-toggle="modal"
                                                    data-target="#formModalquote" data-name="quote"
                                                    data-id="{{ $item->id }}" id="{{ $item->id }}"><i
                                                        class="fa-regular fa-pen-to-square"></i></a>
                                                <a class="dropdown-item delete-item" href="#"
                                                    data-id="{{ $item->id }}"
                                                    data-name="{{ $item->form_field }}"><i
                                                        class="fa-solid fa-trash-can"></i></a>
                                                <a class="dropdown-item set-default default-id{{ $item->form_field }}"
                                                    id="default-id{{ $item->id }}" href="#"
                                                    data-name="{{ $item->form_field }}"
                                                    data-id="{{ $item->id }}">
                                                    @if ($item->default_form === 1)
                                                        <i class="fa-solid fa-link-slash"></i>
                                                    @else
                                                        <i class="fa-solid fa-link"></i>
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                            <a type="button"
                                class="bg-dark d-flex justify-content-between p-2 position-sticky addDateFormquote"
                                data-toggle="modal" data-target="#formModalquote" style="bottom: 0;">
                                <span class="w-50 text-white">Thêm mới</span>
                            </a>
                        </ul>
                        <div class="">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
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
                    <div class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                        <span class="text-table mr-3">Điều khoản</span>
                        <input type="text" placeholder="Nhập thông tin" name="terms_pay"
                            value="{{ $detailExport->terms_pay }}" class="border-0 bg w-50 bg-input-guest py-0 px-0"
                            autocomplete="off" id="myInput-payment"
                            value="{{ isset($dataForm['payment']) ? $dataForm['payment']->form_desc : '' }}">
                        <input type="hidden" class="idDateForm" autocomplete="off" name="idDate[payment]"
                            value="{{ isset($dataForm['payment']) ? $dataForm['payment']->id : '' }}">
                        <input type="hidden" class="nameDateForm" autocomplete="off" name="fieldDate[payment]"
                            value="{{ isset($dataForm['payment']) ? $dataForm['payment']->form_field : '' }}">
                        <ul id="myUL1" class="bg-white position-absolute w-50 rounded shadow p-0 scroll-data"
                            style="z-index: 99;">
                            @foreach ($date_form as $item)
                                @if ($item->form_field == 'payment')
                                    <li class="item-{{ $item->id }}">
                                        <a href="#"
                                            class="text-dark d-flex justify-content-between p-2 search-date-form"
                                            id="{{ $item->id }}" name="search-date-form" data-name="payment">
                                            <span class="w-50"
                                                id="{{ $item->form_field . $item->id }}">{{ $item->form_name }}</span>
                                        </a>
                                        <div class="dropdown">
                                            <button type="button" data-toggle="dropdown"
                                                class="btn-save-print d-flex align-items-center h-100"
                                                style="margin-right:10px">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </button>
                                            <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                                <a class="dropdown-item search-date-form" data-toggle="modal"
                                                    data-target="#formModalpayment" data-name="payment"
                                                    data-id="{{ $item->id }}" id="{{ $item->id }}"><i
                                                        class="fa-regular fa-pen-to-square"></i></a>
                                                <a class="dropdown-item delete-item" href="#"
                                                    data-id="{{ $item->id }}"
                                                    data-name="{{ $item->form_field }}"><i
                                                        class="fa-solid fa-trash-can"></i></a>
                                                <a class="dropdown-item set-default default-id{{ $item->form_field }}"
                                                    id="default-id{{ $item->id }}" href="#"
                                                    data-name="{{ $item->form_field }}"
                                                    data-id="{{ $item->id }}">
                                                    @if ($item->default_form === 1)
                                                        <i class="fa-solid fa-link-slash"></i>
                                                    @else
                                                        <i class="fa-solid fa-link"></i>
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                            <a type="button"
                                class="bg-dark d-flex justify-content-between p-2 position-sticky addDateFormpayment"
                                data-toggle="modal" data-target="#formModalpayment" style="bottom: 0;">
                                <span class="w-50 text-white">Thêm mới</span>
                            </a>
                        </ul>
                        <div class="">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
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
                    <div class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                        <span class="text-table mr-3">Dự án</span>
                        <input type="text" placeholder="Nhập thông tin"
                            class="border-0 bg w-50 bg-input-guest py-0 px-0">
                        <div class="">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
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
                    <div class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                        <span class="text-table mr-3">Hàng hóa</span>
                        <input type="text" placeholder="Nhập thông tin" name="goods"
                            value="{{ $detailExport->goods }}" class="border-0 bg w-50 bg-input-guest py-0 px-0"
                            autocomplete="off" id="myInput-goods"
                            value="{{ isset($dataForm['goods']) ? $dataForm['goods']->form_desc : '' }}">
                        <input type="hidden" class="idDateForm" autocomplete="off" name="idDate[goods]"
                            value="{{ isset($dataForm['goods']) ? $dataForm['goods']->id : '' }}">
                        <input type="hidden" class="nameDateForm" autocomplete="off" name="fieldDate[goods]"
                            value="{{ isset($dataForm['goods']) ? $dataForm['goods']->form_field : '' }}">
                        <ul id="myUL4" class="bg-white position-absolute w-50 rounded shadow p-0 scroll-data"
                            style="z-index: 99;">
                            @foreach ($date_form as $item)
                                @if ($item->form_field == 'goods')
                                    <li class="item-{{ $item->id }}">
                                        <a href="#"
                                            class="text-dark d-flex justify-content-between p-2 search-date-form"
                                            id="{{ $item->id }}" name="search-date-form" data-name="goods">
                                            <span class="w-50"
                                                id="{{ $item->form_field . $item->id }}">{{ $item->form_name }}</span>
                                        </a>
                                        <div class="dropdown">
                                            <button type="button" data-toggle="dropdown"
                                                class="btn-save-print d-flex align-items-center h-100"
                                                style="margin-right:10px">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </button>
                                            <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                                <a class="dropdown-item search-date-form" data-toggle="modal"
                                                    data-target="#formModalgoods" data-name="goods"
                                                    data-id="{{ $item->id }}" id="{{ $item->id }}"><i
                                                        class="fa-regular fa-pen-to-square"></i></a>
                                                <a class="dropdown-item delete-item" href="#"
                                                    data-id="{{ $item->id }}"
                                                    data-name="{{ $item->form_field }}"><i
                                                        class="fa-solid fa-trash-can"></i></a>
                                                <a class="dropdown-item set-default default-id{{ $item->form_field }}"
                                                    id="default-id{{ $item->id }}" href="#"
                                                    data-name="{{ $item->form_field }}"
                                                    data-id="{{ $item->id }}">
                                                    @if ($item->default_form === 1)
                                                        <i class="fa-solid fa-link-slash"></i>
                                                    @else
                                                        <i class="fa-solid fa-link"></i>
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                            <a type="button"
                                class="bg-dark d-flex justify-content-between p-2 position-sticky addDateFormgoods"
                                data-toggle="modal" data-target="#formModalgoods" style="bottom: 0;">
                                <span class="w-50 text-white">Thêm mới</span>
                            </a>
                        </ul>
                        <div class="">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
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
                    <div class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                        <span class="text-table mr-3">Giao hàng</span>
                        <input type="text" placeholder="Nhập thông tin" name="delivery"
                            value="{{ $detailExport->delivery }}" class="border-0 bg w-50 bg-input-guest py-0 px-0"
                            autocomplete="off" id="myInput-delivery"
                            value="{{ isset($dataForm['delivery']) ? $dataForm['delivery']->form_desc : '' }}">
                        <input type="hidden" class="idDateForm" autocomplete="off" name="idDate[delivery]"
                            value="{{ isset($dataForm['delivery']) ? $dataForm['delivery']->id : '' }}">
                        <input type="hidden" class="nameDateForm" autocomplete="off" name="fieldDate[delivery]"
                            value="{{ isset($dataForm['delivery']) ? $dataForm['delivery']->form_field : '' }}">
                        <ul id="myUL5" class="bg-white position-absolute w-50 rounded shadow p-0 scroll-data"
                            style="z-index: 99;">
                            @foreach ($date_form as $item)
                                @if ($item->form_field == 'delivery')
                                    <li class="item-{{ $item->id }}">
                                        <a href="#"
                                            class="text-dark d-flex justify-content-between p-2 search-date-form"
                                            id="{{ $item->id }}" name="search-date-form" data-name="delivery">
                                            <span class="w-50"
                                                id="{{ $item->form_field . $item->id }}">{{ $item->form_name }}</span>
                                        </a>
                                        <div class="dropdown">
                                            <button type="button" data-toggle="dropdown"
                                                class="btn-save-print d-flex align-items-center h-100"
                                                style="margin-right:10px">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </button>
                                            <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                                <a class="dropdown-item search-date-form" data-toggle="modal"
                                                    data-target="#formModaldelivery" data-name="delivery"
                                                    data-id="{{ $item->id }}" id="{{ $item->id }}"><i
                                                        class="fa-regular fa-pen-to-square"></i></a>
                                                <a class="dropdown-item delete-item" href="#"
                                                    data-id="{{ $item->id }}"
                                                    data-name="{{ $item->form_field }}"><i
                                                        class="fa-solid fa-trash-can"></i></a>
                                                <a class="dropdown-item set-default default-id{{ $item->form_field }}"
                                                    id="default-id{{ $item->id }}" href="#"
                                                    data-name="{{ $item->form_field }}"
                                                    data-id="{{ $item->id }}">
                                                    @if ($item->default_form === 1)
                                                        <i class="fa-solid fa-link-slash"></i>
                                                    @else
                                                        <i class="fa-solid fa-link"></i>
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                            <a type="button"
                                class="bg-dark d-flex justify-content-between p-2 position-sticky addDateFormdelivery"
                                data-toggle="modal" data-target="#formModaldelivery" style="bottom: 0;">
                                <span class="w-50 text-white">Thêm mới</span>
                            </a>
                        </ul>
                        <div class="">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
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
                    <div class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                        <span class="text-table mr-3">Địa điểm</span>
                        <input type="text" placeholder="Nhập thông tin" name="location"
                            value="{{ $detailExport->location }}" class="border-0 bg w-50 bg-input-guest py-0 px-0"
                            autocomplete="off" id="myInput-location"
                            value="{{ isset($dataForm['location']) ? $dataForm['location']->form_desc : '' }}">
                        <input type="hidden" class="idDateForm" autocomplete="off" name="idDate[location]"
                            value="{{ isset($dataForm['location']) ? $dataForm['location']->id : '' }}">
                        <input type="hidden" class="nameDateForm" autocomplete="off" name="fieldDate[location]"
                            value="{{ isset($dataForm['location']) ? $dataForm['location']->form_field : '' }}">
                        <ul id="myUL6" class="bg-white position-absolute w-50 rounded shadow p-0 scroll-data"
                            style="z-index: 99;">
                            @foreach ($date_form as $item)
                                @if ($item->form_field == 'location')
                                    <li class="item-{{ $item->id }}">
                                        <a href="#"
                                            class="text-dark d-flex justify-content-between p-2 search-date-form"
                                            id="{{ $item->id }}" name="search-date-form" data-name="location">
                                            <span class="w-50"
                                                id="{{ $item->form_field . $item->id }}">{{ $item->form_name }}</span>
                                        </a>
                                        <div class="dropdown">
                                            <button type="button" data-toggle="dropdown"
                                                class="btn-save-print d-flex align-items-center h-100"
                                                style="margin-right:10px">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </button>
                                            <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                                <a class="dropdown-item search-date-form" data-toggle="modal"
                                                    data-target="#formModallocation" data-name="location"
                                                    data-id="{{ $item->id }}" id="{{ $item->id }}"><i
                                                        class="fa-regular fa-pen-to-square"></i></a>
                                                <a class="dropdown-item delete-item" href="#"
                                                    data-id="{{ $item->id }}"
                                                    data-name="{{ $item->form_field }}"><i
                                                        class="fa-solid fa-trash-can"></i></a>
                                                <a class="dropdown-item set-default default-id{{ $item->form_field }}"
                                                    id="default-id{{ $item->id }}" href="#"
                                                    data-name="{{ $item->form_field }}"
                                                    data-id="{{ $item->id }}">
                                                    @if ($item->default_form === 1)
                                                        <i class="fa-solid fa-link-slash"></i>
                                                    @else
                                                        <i class="fa-solid fa-link"></i>
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                            <a type="button"
                                class="bg-dark d-flex justify-content-between p-2 position-sticky addDateFormlocation"
                                data-toggle="modal" data-target="#formModallocation" style="bottom: 0;">
                                <span class="w-50 text-white">Thêm mới</span>
                            </a>
                        </ul>
                        <div class="">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
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
        <div class="modal fade" id="guestModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productModalLabel">Thông tin khách hàng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="content-info">
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-left-0">
                                    <p class="p-0 m-0 px-3 required-label text-danger">
                                        Tên hiển thị
                                    </p>
                                </div>
                                <input name="guest_name_display" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-3"
                                    id="guest_name_display" autocomplete="off">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-left-0">
                                    <p class="p-0 m-0 px-3 required-label text-danger">
                                        Địa chỉ
                                    </p>
                                </div>
                                <input name="guest_address" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-3" id="guest_address"
                                    autocomplete="off">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-left-0">
                                    <p class="p-0 m-0 px-3 required-label text-danger">
                                        Mã số thuế
                                    </p>
                                </div>
                                <input name="guest_code" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-3" id="guest_code"
                                    autocomplete="off">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-left-0">
                                    <p class="p-0 m-0 px-3">
                                        Key
                                    </p>
                                </div>
                                <input name="key" type="text" placeholder="Nhập thông tin" id="key"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-3" autocomplete="off">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-left-0">
                                    <p class="p-0 m-0 px-3">
                                        Tên công ty
                                    </p>
                                </div>
                                <input name="guest_name" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-3" id="guest_name"
                                    autocomplete="off">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-left-0">
                                    <p class="p-0 m-0 px-3">
                                        Email
                                    </p>
                                </div>
                                <input name="guest_email" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-3" id="guest_email"
                                    autocomplete="off">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-left-0">
                                    <p class="p-0 m-0 px-3">
                                        Số điện thoại
                                    </p>
                                </div>
                                <input name="guest_phone" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-3" id="guest_phone"
                                    autocomplete="off">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-left-0">
                                    <p class="p-0 m-0 px-3">
                                        Người nhận hàng
                                    </p>
                                </div>
                                <input name="guest_receiver" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-3" id="guest_receiver"
                                    autocomplete="off">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-left-0">
                                    <p class="p-0 m-0 px-3">
                                        Email cá nhân
                                    </p>
                                </div>
                                <input name="guest_email_personal" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-3"
                                    id="guest_email_personal" autocomplete="off">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-left-0">
                                    <p class="p-0 m-0 px-3">
                                        SĐT người nhận
                                    </p>
                                </div>
                                <input name="guest_phone_receiver" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-3"
                                    id="guest_phone_receiver" autocomplete="off">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-left-0">
                                    <p class="p-0 m-0 px-3">
                                        Ghi chú
                                    </p>
                                </div>
                                <input name="guest_note" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-3" id="guest_note"
                                    autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary" id="addGuest">Thêm mới</button>
                    </div>
                </div>
            </div>
        </div>
</form>
<x-date-form-modal title="Điều khoản thanh toán" name="payment" idModal="formModalpayment"></x-date-form-modal>
<x-date-form-modal title="Hiệu lực báo giá" name="quote" idModal="formModalquote"></x-date-form-modal>
<x-date-form-modal title="Hàng hóa" name="goods" idModal="formModalgoods"></x-date-form-modal>
<x-date-form-modal title="Giao hàng" name="delivery" idModal="formModaldelivery"></x-date-form-modal>
<x-date-form-modal title="Địa điểm" name="location" idModal="formModallocation"></x-date-form-modal>
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
<script src="{{ asset('/dist/js/export.js') }}"></script>

<script type="text/javascript">
    $("table tbody").sortable({
        axis: "y",
        handle: "td",
    });
    getKeyGuest($('#guest_name_display'));

    $("#myUL").hide();
    $("#myUL1").hide();
    $("#myUL2").hide();
    $("#myUL4").hide();
    $("#myUL5").hide();
    $("#myUL6").hide();
    $(document).ready(function() {
        function toggleList(input, list) {
            input.on("click", function() {
                list.show();
            });

            $(document).click(function(event) {
                if (!$(event.target).closest(input).length) {
                    list.hide();
                }
            });

            input.on("keyup", function() {
                var value = $(this).val().toUpperCase();
                list.find("li").each(function() {
                    var text = $(this).find("a").text().toUpperCase();
                    $(this).toggle(text.indexOf(value) > -1);
                });
            });
        }

        function toggleListGuest(input, list, filterInput) {
            input.on("click", function() {
                list.show();
            });
            $(document).click(function(event) {
                if (!$(event.target).closest(input).length && !$(event.target).closest(filterInput)
                    .length) {
                    list.hide();
                }
            });
            var applyFilter = function() {
                var value = filterInput.val().toUpperCase();
                list.find("li").each(function() {
                    var text = $(this).find("a").text().toUpperCase();
                    $(this).toggle(text.indexOf(value) > -1);
                });
            };
            input.on("keyup", applyFilter);
            filterInput.on("keyup", applyFilter);
        }
        toggleListGuest($("#myInput"), $("#myUL"), $("#companyFilter"));
        toggleList($("#myInput-payment"), $("#myUL1"));
        toggleList($("#myInput-quote"), $("#myUL2"));
        toggleList($("#myInput-goods"), $("#myUL4"));
        toggleList($("#myInput-delivery"), $("#myUL5"));
        toggleList($("#myInput-location"), $("#myUL6"));
    });

    $(document).ready(function() {
        $(document).on('click', '.search-date-form', function(e) {
            $('.modal').on('hidden.bs.modal', function() {
                $('#form-name-' + name).val('')
                $('#form-desc-' + name).val('')
                $('.btn-submit').attr('data-action', 'insert').text('Lưu');
                $('.title-dateform').text('Biểu mẫu mới');
            });
            var idDateForm = $(this).attr('id');
            var name = $(this).data('name');
            var dataid = $(this).data('id');
            // console.log(dataid);
            if (dataid) {
                $('.btn-submit').attr('data-action', 'update').text(
                    'Cập nhật');
                $('.title-dateform').text('Cập nhật');
            }
            $.ajax({
                url: '{{ route('searchDateForm') }}',
                type: 'GET',
                data: {
                    idDateForm: idDateForm
                },
                success: function(data) {
                    $('#myInput-' + name).val(data.form_desc);
                    $("input[name='idDate[" + data.form_field + "]']").val(data
                        .id);
                    $("input[name='fieldDate[" + data.form_field + "]']").val(data
                        .form_field);
                    if (dataid) {
                        $('#form-name-' + name).val(data.form_name)
                        $('#form-desc-' + name).val(data.form_desc)
                        $('.btn-submit').attr('data-id', dataid)
                    }
                    if (dataid) {
                        $('.btn-submit').attr('data-action', 'update').text(
                            'Cập nhật');
                        $('.title-dateform').text('Cập nhật');
                    }
                }
            });
        });
        // Xóa form date
        $(document).on('click', '.delete-item', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            console.log(id);
            if (confirm('Bạn có chắc chắn muốn xóa không?')) {
                $.ajax({
                    url: '{{ route('deleteDateForm') }}',
                    type: 'GET',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $(".item-" + id).remove();
                        $('#myInput-' + name).val('');
                        $("input[name='idDate[" + name + "]']").val(null);
                        $("input[name='fieldDate[" + data.form_field + "]']").val();
                    }
                });
            }
        });
        // Set mặc định có các dateForm
        $(document).on('click', '.set-default', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            console.log(id);
            $.ajax({
                url: '{{ route('setDefault') }}',
                type: 'GET',
                data: {
                    id: id,
                    name: name,
                },
                success: function(data) {
                    data.update_form.forEach(item => {
                        if (item.default_form === 1) {
                            $('#default-id' + item.id).html(
                                '<i class="fa-solid fa-link-slash"></i>');
                        } else {
                            $('#default-id' + item.id).html(
                                '<i class="fa-solid fa-link"></i>');
                        }
                    });
                }
            });
        });

        // submit thêm mới các trường
        $('.btn-submit').click(function(event) {
            event.preventDefault();
            var name = $(this).data('button-name');
            var inputName = $('#form-name-' + name).val();
            var inputDesc = $('#form-desc-' + name).val();
            var action = $(this).data('action');

            if ($('.btn-submit' + name).text() === 'Lưu') {
                console.log('Đây là thêm mới');
                $('#form-name-' + name).val('')
                $('#form-desc-' + name).val('')
                $.ajax({
                    url: '{{ route('addDateForm') }}',
                    type: 'GET',
                    data: {
                        name: name,
                        inputName: inputName,
                        inputDesc: inputDesc,
                    },
                    success: function(data) {
                        $('#myInput-' + name).val(data.new_date_form.form_desc);
                        alert(data.msg);
                        $("input[name='idDate[" + data.new_date_form.form_field + "]']")
                            .val(data.new_date_form
                                .id);
                        $("input[name='fieldDate[" + data.new_date_form.form_field + "]']")
                            .val(data.new_date_form
                                .form_field);
                        $('.modal [data-dismiss="modal"]').click();

                        // Đoạn html của set default
                        let originalHTML =
                            '<a class="dropdown-item set-default default-id' + data
                            .new_date_form.form_field + '"' +
                            'id="default-id' + data.new_date_form.id + '" href="#"' +
                            'data-name="' + data.new_date_form.form_field + '"' +
                            'data-id="' + data.new_date_form.id + '">' +
                            '<i class="fa-solid fa-link"></i>' +
                            '</a>';
                        // Thêm phần tử mới vào trong form tìm kiếm
                        var newListItem =
                            '<li class="item-' + data.new_date_form.id +
                            '"><a href="#" class="text-dark d-flex justify-content-between p-2 search-date-form" id="' +
                            data.new_date_form.id +
                            '" name="search-date-form" data-name="' +
                            name + '">' +
                            '<span class="w-50" id="' + data.new_date_form.form_field + data
                            .new_date_form.id + '">' + data.new_date_form.form_name +
                            '</span></a><div class="dropdown">' +
                            '<button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100" style="margin-right:10px">' +
                            '<i class="fa-solid fa-ellipsis"></i>' + '</button>' +
                            '<div class="dropdown-menu date-form-setting" style="z-index: 100;">' +
                            '<a class="dropdown-item search-date-form" data-toggle="modal" data-target="#formModal' +
                            name + '" data-name="' +
                            name + '" data-id="' + data.new_date_form.id +
                            '" id="' + data.new_date_form.id +
                            '"><i class="fa-regular fa-pen-to-square"></i></a>' +
                            '<a class="dropdown-item delete-item" href="#" data-id="' + data
                            .new_date_form.id +
                            '" data-name="' + data.new_date_form.form_field +
                            '"><i class="fa-solid fa-trash-can"></i></a>' + originalHTML +
                            '</div>' +
                            '</div></li>';
                        // Thêm mục mới vào danh sách
                        var addButton = $(".addDateForm" + name);
                        $(newListItem).insertBefore(addButton);
                        //clear
                        $('.search-date-form').click(function() {
                            $('.modal').on('hidden.bs.modal', function() {
                                $('#form-name-' + name).val('')
                                $('#form-desc-' + name).val('')
                                $('.btn-submit').attr('data-action',
                                    'insert').text('Lưu');
                                $('.title-dateform').text('Biểu mẫu mới');
                            });
                            var idDateForm = $(this).attr('id');
                            var name = $(this).data('name');
                            var dataid = $(this).data('id');
                            // console.log(name);
                            if (dataid) {
                                $('.btn-submit').attr('data-action', 'update').attr(
                                    'data-id', dataid).text(
                                    'Cập nhật');
                                $('.title-dateform').text('Cập nhật');
                            }
                            $.ajax({
                                url: '{{ route('searchDateForm') }}',
                                type: 'GET',
                                data: {
                                    idDateForm: idDateForm
                                },
                                success: function(data) {
                                    $("input[name='idDate[" + data
                                        .form_field + "]']").val(
                                        data
                                        .id);
                                    $("input[name='fieldDate[" + data
                                        .form_field + "]']").val(
                                        data
                                        .form_field);
                                    $('#myInput-' + name).val(data
                                        .form_desc);
                                    if (dataid) {
                                        $('#form-name-' + name).val(data
                                            .form_name)
                                        $('#form-desc-' + name).val(data
                                            .form_desc)
                                    }
                                }
                            });
                        });
                    }
                });
            }
            if ($('.btn-submit' + name).text() === 'Cập nhật') {
                console.log('Đây là update');
                var id = $(this).data('id');
                console.log(id);
                $.ajax({
                    url: '{{ route('updateDateForm') }}',
                    type: 'GET',
                    data: {
                        id: id,
                        name: name,
                        inputName: inputName,
                        inputDesc: inputDesc,
                    },
                    success: function(data) {
                        console.log(data);
                        $('.modal [data-dismiss="modal"]').click();
                        $("input[name='idDate[" + data.new_date_form.form_field + "]']")
                            .val(data.new_date_form
                                .id);
                        $("input[name='fieldDate[" + data.new_date_form.form_field + "]']")
                            .val(data.new_date_form
                                .form_field);
                        $("#" + name + id).text(data.new_date_form.form_name)
                        console.log(name, id);
                        $('#myInput-' + name).val(data.new_date_form.form_desc);
                        alert(data.msg);
                    }
                });
            }
        });


        let fieldCounter = 1;
        $("#add-field-btn").click(function() {
            let nextSoTT = $(".soTT").length + 1;
            // Tạo các phần tử HTML mới
            const newRow = $("<tr>", {
                "id": `dynamic-row-${fieldCounter}`,
                "class": `bg-white addProduct`,
            });
            const maSanPham = $(
                "<td class='border border-left-0 border-top-0 border-bottom-0 position-relative'>" +
                "<div class='d-flex w-100 justify-content-between align-items-center'>" +
                "<svg width='24' height='24' viewBox='0 0 24 24'" +
                "fill='none' xmlns='http://www.w3.org/2000/svg'>" +
                "<path fill-rule='evenodd' clip-rule='evenodd' d='M9 3C7.89543 3 7 3.89543 7 5C7 6.10457 7.89543 7 9 7C10.1046 7 11 6.10457 11 5C11 3.89543 10.1046 3 9 3Z' fill='#42526E'/>" +
                "<path fill-rule='evenodd' clip-rule='evenodd'" +
                "d='M9 10C7.89543 10 7 10.8954 7 12C7 13.1046 7.89543 14 9 14C10.1046 14 11 13.1046 11 12C11 10.8954 10.1046 10 9 10Z'" +
                "fill='#42526E' />" +
                "<path fill-rule='evenodd' clip-rule='evenodd'" +
                "d='M9 17C7.89543 17 7 17.8954 7 19C7 20.1046 7.89543 21 9 21C10.1046 21 11 20.1046 11 19C11 17.8954 10.1046 17 9 17Z'" +
                "fill='#42526E' />" +
                "<path fill-rule='evenodd' clip-rule='evenodd'" +
                "d='M15 3C13.8954 3 13 3.89543 13 5C13 6.10457 13.8954 7 15 7C16.1046 7 17 6.10457 17 5C17 3.89543 16.1046 3 15 3Z'" +
                "fill='#42526E' />" +
                "<path fill-rule='evenodd' clip-rule='evenodd'" +
                "d='M15 10C13.8954 10 13 10.8954 13 12C13 13.1046 13.8954 14 15 14C16.1046 14 17 13.1046 17 12C17 10.8954 16.1046 10 15 10Z'" +
                "fill='#42526E' />" +
                "<path fill-rule='evenodd' clip-rule='evenodd'" +
                "d='M15 17C13.8954 17 13 17.8954 13 19C13 20.1046 13.8954 21 15 21C16.1046 21 17 20.1046 17 19C17 17.8954 16.1046 17 15 17Z'" +
                "fill='#42526E' />" +
                "</svg>" +
                "<input type='checkbox' class='cb-element'>" +
                "<input type='text' autocomplete='off' class='border-0 px-2 py-1 w-75 product_code' name='product_code[]'>" +
                "</td>");
            const tenSanPham = $(
                "<td class='border border-top-0 border-bottom-0 position-relative'>" +
                "<ul class='list_product bg-white position-absolute w-100 rounded shadow p-0 scroll-data' style='z-index: 99;top: 75%;left: 10%;'>" +
                "@foreach ($product as $product_value)" +
                "<li>" +
                "<a href='javascript:void(0);' class='text-dark d-flex justify-content-between p-2 idProduct' id='{{ $product_value->id }}' name='idProduct'>" +
                "<span class='w-50'>{{ $product_value->product_name }}</span>" +
                "</a>" +
                "</li>" +
                "@endforeach" +
                "</a></ul>" +
                "<div class='d-flex align-items-center'>" +
                "<input type='text' class='border-0 px-2 py-1 w-100 product_name' autocomplete='off' required name='product_name[]'>" +
                "<input type='hidden' class='product_id' autocomplete='off' name='product_id[]'>" +
                "<div class='info-product' style='display: none;' data-toggle='modal' data-target='#productModal'>" +
                "<svg width='18' height='18' viewBox='0 0 18 18' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
                "<path d='M8.99998 4.5C8.45998 4.5 8.09998 4.86 8.09998 5.4C8.09998 5.94 8.45998 6.3 8.99998 6.3C9.53998 6.3 9.89998 5.94 9.89998 5.4C9.89998 4.86 9.53998 4.5 8.99998 4.5Z' fill='#42526E'/>" +
                "<path d='M9 0C4.05 0 0 4.05 0 9C0 13.95 4.05 18 9 18C13.95 18 18 13.95 18 9C18 4.05 13.95 0 9 0ZM9 16.2C5.04 16.2 1.8 12.96 1.8 9C1.8 5.04 5.04 1.8 9 1.8C12.96 1.8 16.2 5.04 16.2 9C16.2 12.96 12.96 16.2 9 16.2Z' fill='#42526E'/>" +
                "<path d='M8.99998 7.2002C8.45998 7.2002 8.09998 7.5602 8.09998 8.10019V12.6002C8.09998 13.1402 8.45998 13.5002 8.99998 13.5002C9.53998 13.5002 9.89998 13.1402 9.89998 12.6002V8.10019C9.89998 7.5602 9.53998 7.2002 8.99998 7.2002Z' fill='#42526E'/>" +
                "</svg></div></div></td>"
            );
            const dvTinh = $(
                "<td class='border border-top-0 border-bottom-0'><input type='text' autocomplete='off' class='border-0 px-2 py-1 w-100 product_unit' required name='product_unit[]'></td>"
            );
            const soLuong = $(
                "<td class='border border-top-0 border-bottom-0 position-relative'>" +
                "<input type='text' class='border-0 px-2 py-1 w-100 quantity-input' autocomplete='off' required name='product_qty[]'>" +
                "<input type='hidden' class='tonkho'>" +
                "<p class='text-primary text-center position-absolute inventory' style='top: 68%;display: none;'>Tồn kho: <span class='soTonKho'>35</span></p>" +
                "</td>"
            );
            const donGia = $(
                "<td class='border border-top-0 border-bottom-0 position-relative'>" +
                "<input type='text' class='border-0 px-2 py-1 w-100 product_price' autocomplete='off' name='product_price[]' required>" +
                "<p class='text-primary text-right position-absolute transaction d-none' style='top: 68%;right: 5%;'>Giao dịch gần đây</p>" +
                "</td>"
            );
            const thue = $(
                "<td class='border border-top-0 border-bottom-0 px-2'>" +
                "<select name='product_tax[]' class='border-0 text-center product_tax' required>" +
                "<option value='0'>0%</option>" +
                "<option value='8'>8%</option>" +
                "<option value='10'>10%</option>" +
                "<option value='99'>NOVAT</option>" +
                "</select>" +
                "</td>"
            );
            const thanhTien = $(
                "<td class='border border-top-0 border-bottom-0'><input type='text' readonly class='border-0 px-2 py-1 w-100 total-amount'>" +
                "</td><td class='border-top border-secondary p-0 bg-secondary Daydu' style='width:1%;'></td>"
            );
            const option = $(
                "<td class='border border-top-0 border-bottom-0 border-right-0 text-right'>" +
                "<svg width='17' height='17' viewBox='0 0 17 17' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
                "<path fill-rule='evenodd' clip-rule='evenodd' d='M13.1417 6.90625C13.4351 6.90625 13.673 7.1441 13.673 7.4375C13.673 7.47847 13.6682 7.5193 13.6589 7.55918L12.073 14.2992C11.8471 15.2591 10.9906 15.9375 10.0045 15.9375H6.99553C6.00943 15.9375 5.15288 15.2591 4.92702 14.2992L3.34113 7.55918C3.27393 7.27358 3.45098 6.98757 3.73658 6.92037C3.77645 6.91099 3.81729 6.90625 3.85826 6.90625H13.1417ZM9.03125 1.0625C10.4983 1.0625 11.6875 2.25175 11.6875 3.71875H13.8125C14.3993 3.71875 14.875 4.19445 14.875 4.78125V5.3125C14.875 5.6059 14.6371 5.84375 14.3438 5.84375H2.65625C2.36285 5.84375 2.125 5.6059 2.125 5.3125V4.78125C2.125 4.19445 2.6007 3.71875 3.1875 3.71875H5.3125C5.3125 2.25175 6.50175 1.0625 7.96875 1.0625H9.03125ZM9.03125 2.65625H7.96875C7.38195 2.65625 6.90625 3.13195 6.90625 3.71875H10.0938C10.0938 3.13195 9.61805 2.65625 9.03125 2.65625Z' fill='#6B6F76'/>" +
                "</svg>" +
                "</td>" +
                "<td style='display:none;'><input type='text' class='product_tax1'></td>"
            );
            const heSoNhan = $(
                "<td class='border border-top-0 border-bottom-0 position-relative product_ratio'>" +
                "<input type='text' class='border-0 px-2 py-1 w-100 heSoNhan' autocomplete='off' name='product_ratio[]'>" +
                "</td>"
            );
            const giaNhap = $(
                "<td class='border border-top-0 border-bottom-0 position-relative price_import'>" +
                "<input type='text' class='border-0 px-2 py-1 w-100 giaNhap' autocomplete='off' required name='price_import[]'>" +
                "</td>"
            );
            const ghiChu = $(
                "<td class='border border-top-0 border-bottom-0 position-relative note p-1'>" +
                "<input type='text' class='border-0 py-1 w-100' placeholder='Nhập ghi chú' name='product_note[]'>" +
                "</td>"
            );
            // Gắn các phần tử vào hàng mới
            newRow.append(maSanPham, tenSanPham, dvTinh,
                soLuong, donGia, thue, thanhTien, heSoNhan, giaNhap, ghiChu, option
            );
            $("#dynamic-fields").before(newRow);
            // Tăng giá trị fieldCounter
            fieldCounter++;
            //kéo thả vị trí sản phẩm
            $("table tbody").sortable({
                axis: "y",
                handle: "td",
            });
            //Xóa sản phẩm
            option.click(function() {
                $(this).closest("tr").remove();
                fieldCounter--;
                calculateTotalAmount();
                calculateGrandTotal();
                var productTaxText = $('#product-tax').text();
                var productTaxValue = parseFloat(productTaxText.replace(/,/g, ''));
                var taxAmount = parseFloat(('.product_tax1').text());
                var totalTax = productTaxValue - taxAmount;
                $('#product-tax').text(totalTax);
            });
            // Checkbox
            $('#checkall').change(function() {
                $('.cb-element').prop('checked', this.checked);
                updateMultipleActionVisibility();
            });
            $('.cb-element').change(function() {
                updateMultipleActionVisibility();
                if ($('.cb-element:checked').length === $('.cb-element').length) {
                    $('#checkall').prop('checked', true);
                } else {
                    $('#checkall').prop('checked', false);
                }
            });
            $(document).on('click', '.cancal_action', function(e) {
                e.preventDefault();
                $('.cb-element:checked').prop('checked', false);
                $('#checkall').prop('checked', false);
                updateMultipleActionVisibility()
            })

            function updateMultipleActionVisibility() {
                if ($('.cb-element:checked').length > 0) {
                    $('.multiple_action').show();
                    $('.count_checkbox').text('Đã chọn ' + $('.cb-element:checked').length);
                } else {
                    $('.multiple_action').hide();
                }
            }
            //Hiển thị danh sách mã sản phẩm
            // $(".list_code").hide();
            // $('.product_code').on("click", function(e) {
            //     e.stopPropagation();
            //     $(this).closest('tr').find(".list_code").show();
            // });
            // $(document).on("click", function(e) {
            //     if (!$(e.target).is(".product_code")) {
            //         $(".list_code").hide();
            //     }
            // });
            //Hiển thị danh sách tên sản phẩm
            $(".list_product").hide();
            $('.product_name').on("click", function(e) {
                e.stopPropagation();
                $(this).closest('tr').find(".list_product").show();
            });
            $(document).on("click", function(e) {
                if (!$(e.target).is(".product_name")) {
                    $(".list_product").hide();
                }
            });
            //search mã sản phẩm
            // $(".product_code").on("keyup", function() {
            //     var value = $(this).val().toUpperCase();
            //     var $tr = $(this).closest("tr");
            //     $tr.find(".list_code li").each(function() {
            //         var text = $(this).find("a").text().toUpperCase();
            //         $(this).toggle(text.indexOf(value) > -1);
            //     });
            // });
            //search tên sản phẩm
            $(".product_name").on("keyup", function() {
                var value = $(this).val().toUpperCase();
                var $tr = $(this).closest("tr");
                $tr.find(".list_product li").each(function() {
                    var text = $(this).find("a").text().toUpperCase();
                    $(this).toggle(text.indexOf(value) > -1);
                });
            });
            //lấy thông tin sản phẩm
            $(document).ready(function() {
                $('.idProduct').click(function() {
                    var productName = $(this).closest('tr').find('.product_name');
                    var productUnit = $(this).closest('tr').find('.product_unit');
                    var thue = $(this).closest('tr').find('.product_tax');
                    var product_id = $(this).closest('tr').find('.product_id');
                    var tonkho = $(this).closest('tr').find('.tonkho');
                    var idProduct = $(this).attr('id');
                    var soTonKho = $(this).closest('tr').find('.soTonKho');
                    var infoProduct = $(this).closest('tr').find('.info-product');
                    var inventory = $(this).closest('tr').find('.inventory');

                    $.ajax({
                        url: '{{ route('getProduct') }}',
                        type: 'GET',
                        data: {
                            idProduct: idProduct
                        },
                        success: function(data) {
                            productName.val(data.product_name);
                            productUnit.val(data.product_unit);
                            thue.val(data.product_tax);
                            product_id.val(data.id);
                            tonkho.val(data.product_inventory)
                            soTonKho.text(parseFloat(data
                                .product_inventory == null ? 0 :
                                data.product_inventory));
                            infoProduct.show();

                            if (data.product_inventory > 0) {
                                inventory.show();
                            }
                        }
                    });
                });
            });
            //lấy thông tin mã sản phẩm
            // $(document).ready(function() {
            //     $('.maSP').click(function() {
            //         var idCode = $(this).attr('id');
            //         var productCode = $(this).closest('tr').find('.product_code');
            //         $.ajax({
            //             url: '{{ route('getProductCode') }}',
            //             type: 'GET',
            //             data: {
            //                 idCode: idCode
            //             },
            //             success: function(data) {
            //                 productCode.val(data.product_code);
            //             }
            //         });
            //     });
            // });
            //Xem thông tin sản phẩm
            $('.info-product').click(function() {
                var productName = $(this).closest('tr').find('.product_name').val();
                var dvt = $(this).closest('tr').find('.product_unit').val();
                var thue = $(this).closest('tr').find('.product_tax').val();
                var tonKho = $(this).closest('tr').find('.tonkho').val();
                $('#productModal').find('.modal-body').html('<b>Tên sản phẩm: </b> ' +
                    productName + '<br>' +
                    '<b>Đơn vị: </b>' + dvt + '<br>' + '<b>Tồn kho: </b>' + tonKho +
                    '<br>' + '<b>Thuế: </b>' +
                    (thue == 99 || thue == null ? "NOVAT" : thue + '%'));
            });
            //Mở rộng
            if (status_form == 1) {
                $('.change_colum').text('Tối giản');
                $('.product_price').attr('readonly', false);
                // Xóa dữ liệu trường hệ số nhân, giá nhập
                $(this).closest("tr").find('.product_ratio').val('')
                $(this).closest("tr").find('.price_import').val('')
                // Xóa required
                $('tbody .giaNhap').removeAttr('required');
                $('.product-ratio').hide();
                $('.product_ratio').hide()
                $('.price_import').hide();
                $('.note').hide();
                $('.Daydu').hide();
                $('.heSoNhan').val('')
                $('.giaNhap').val('')
            } else {
                $('.change_colum').text('Đầy đủ');
                $('.product_price').attr('readonly', true);
                $(this).closest("tr").find('.product_price').val('');
                // Xóa dữ liệu trương đơn giá
                $(this).closest("tr").find('.price_export').val('')
                // Thêm required
                $('tbody .giaNhap').attr('required', true);
                $('.product_ratio').show()
                $('.price_import').show();
                $('.note').show();
                $('.Daydu').show();
                $(this).closest("tr").find('.heSoNhan').val('');
                $(this).closest("tr").find('.giaNhap').val('');
            }
        });
    });
    //Lấy thông tin khách hàng
    $(document).ready(function() {
        $(document).on('click', '.search-info', function(e) {
            var idGuest = $(this).attr('id');
            $.ajax({
                url: '{{ route('searchExport') }}',
                type: 'GET',
                data: {
                    idGuest: idGuest
                },
                success: function(data) {
                    if (data.key) {
                        quotation = getQuotation(data.key, data['count'], data['date']);
                    } else {
                        quotation = getQuotation(data['provide'].provide_name_display, data[
                            'count'], data['date']);
                    }
                    $('input[name="quotation_number"]').val(quotation);
                    $('.nameGuest').val(data['guest'].guest_name_display);
                    $('.idGuest').val(data['guest'].id);
                    $.ajax({
                        url: '{{ route('searchFormByGuestId') }}',
                        type: 'GET',
                        data: {
                            idGuest: idGuest
                        },
                        success: function(data) {
                            Object.keys(data).forEach(function(key) {
                                var formField = data[key].form
                                    .form_field;
                                var dateFormId = data[key].date_form_id;
                                var formDesc = data[key].form.form_desc;
                                $("input[name='fieldDate[" + key +
                                        "]']")
                                    .val(key);
                                $("input[name='idDate[" + key +
                                        "]']")
                                    .val(dateFormId);
                                $('#myInput-' + key).val(formDesc);
                            });
                        }
                    });

                }
            });
        });
    });

    //Thêm thông tin khách hàng
    $(document).on('click', '#addGuest', function(e) {
        var guest_name_display = $('input[name="guest_name_display"]').val();
        var guest_name = $('#guest_name').val();
        var guest_address = $('#guest_address').val();
        var guest_code = $('#guest_code').val();
        var guest_email = $('#guest_email').val();
        var guest_phone = $('#guest_phone').val();
        var guest_receiver = $('#guest_receiver').val();
        var guest_email_personal = $('#guest_email_personal').val();
        var guest_phone_receiver = $('#guest_phone_receiver').val();
        var guest_note = $('#guest_note').val();
        var key = $("input[name='key']").val().trim();
        $('.nameGuest').val(null);
        $('.idGuest').val(null);
        $.ajax({
            url: "{{ route('addGuest') }}",
            type: "get",
            data: {
                guest_name_display: guest_name_display,
                guest_name: guest_name,
                guest_address: guest_address,
                guest_code: guest_code,
                guest_email: guest_email,
                guest_phone: guest_phone,
                guest_receiver: guest_receiver,
                guest_email_personal: guest_email_personal,
                guest_phone_receiver: guest_phone_receiver,
                guest_note: guest_note,
                key: key,
            },
            success: function(data) {
                if (data.success) {
                    quotation = getQuotation(data.key, '1')
                    $('input[name="quotation_number"]').val(quotation);
                    $('.nameGuest').val(data.guest_name_display);
                    alert(data.msg);
                    $('.idGuest').val(data.id);
                    $('.modal [data-dismiss="modal"]').click();
                    // Nếu thành công, tạo một mục mới
                    var newGuestInfo = data;
                    var guestList = $('#myUL'); // Danh sách hiện có
                    var newListItem =
                        '<li><a href="#" class="text-dark d-flex justify-content-between p-2 search-info" id="' +
                        newGuestInfo.id + '" name="search-info">' +
                        '<span class="w-50">' + newGuestInfo.guest_name_display +
                        '</span></a></li>';
                    // Thêm mục mới vào danh sách
                    var addButton = $(".addGuestNew");
                    $(newListItem).insertBefore(addButton);
                    //clear
                    $('#guest_name_display').val('');
                    $("input[name='key']").val('');
                    $('#guest_address').val(null);
                    $('#guest_code').val(null);
                } else {
                    alert(data.msg);
                }
            }
        });
    });

    //Mở rộng
    var status_form = 0;
    $('.change_colum').off('click').on('click', function() {
        if (status_form == 0) {
            $(this).text('Tối giản');
            $('.product_price').attr('readonly', false);
            // Xóa dữ liệu trường hệ số nhân, giá nhập
            $('.product_ratio').val('')
            $('.price_import').val('')
            // Xóa required
            $('tbody .heSoNhan').removeAttr('required');
            $('tbody .giaNhap').removeAttr('required');
            $('.product-ratio').hide();
            $('.product_ratio').hide()
            $('.price_import').hide();
            $('.note').hide();
            $('.Daydu').hide();
            $('.heSoNhan').val('');
            $('.giaNhap').val('');
            status_form = 1;
        } else {
            $(this).text('Đầy đủ');
            $('.product_price').attr('readonly', true);
            // Xóa dữ liệu trương đơn giá
            $('.product_price').val('');
            $('.total-amount').val('');
            $('#total-amount-sum').text('0đ');
            $('#grand-total').text('0đ');
            $('#product-tax').text('0đ');
            // Thêm required
            $('tbody .heSoNhan').attr('required', true);
            $('tbody .giaNhap').attr('required', true);
            $('.product_ratio').show();
            $('.price_import').show();
            $('.note').show();
            $('.Daydu').show();
            status_form = 0;
        }
    });

    //format giá
    $('body').on('input', '.product_price, #transport_fee, .giaNhap, #voucher', function(event) {
        // Lấy giá trị đã nhập
        var value = event.target.value;

        // Xóa các ký tự không phải số và dấu phân thập phân từ giá trị
        var formattedValue = value.replace(/[^0-9.]/g, '');

        // Định dạng số với dấu phân cách hàng nghìn và giữ nguyên số thập phân
        var formattedNumber = numberWithCommas(formattedValue);

        event.target.value = formattedNumber;
    });

    function numberWithCommas(number) {
        // Chia số thành phần nguyên và phần thập phân
        var parts = number.split('.');
        var integerPart = parts[0];
        var decimalPart = parts[1];

        // Định dạng phần nguyên số với dấu phân cách hàng nghìn
        var formattedIntegerPart = integerPart.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

        // Kết hợp phần nguyên và phần thập phân (nếu có)
        var formattedNumber = decimalPart !== undefined ? formattedIntegerPart + '.' + decimalPart :
            formattedIntegerPart;

        return formattedNumber;
    }

    //xóa sản phẩm
    $('.delete-product').click(function() {
        $(this).closest("tr").remove();
        calculateTotals();
        calculateGrandTotal();
        var productTaxText = $('#product-tax').text();
        var productTaxValue = parseFloat(productTaxText.replace(/,/g, ''));
        var taxAmount = parseFloat(('.product_tax1').text());
        var totalTax = productTaxValue - taxAmount;
        $('#product-tax').text(totalTax);
    });

    //Hiển thị danh sách tên sản phẩm
    // $(".list_product").hide();
    $('.product_name').on("click", function(e) {
        e.stopPropagation();
        $(this).closest('tr').find(".list_product").show();
    });
    $(document).on("click", function(e) {
        if (!$(e.target).is(".product_name")) {
            $(".list_product").hide();
        }
    });
    //search tên sản phẩm
    $(".product_name").on("keyup", function() {
        var value = $(this).val().toUpperCase();
        var $tr = $(this).closest("tr");
        $tr.find(".list_product li").each(function() {
            var text = $(this).find("a").text().toUpperCase();
            $(this).toggle(text.indexOf(value) > -1);
        });
    });
    //lấy thông tin sản phẩm
    $(document).ready(function() {
        $('.idProduct').click(function() {
            var productName = $(this).closest('tr').find('.product_name');
            var productUnit = $(this).closest('tr').find('.product_unit');
            var thue = $(this).closest('tr').find('.product_tax');
            var product_id = $(this).closest('tr').find('.product_id');
            var tonkho = $(this).closest('tr').find('.tonkho');
            var idProduct = $(this).attr('id');
            var soTonKho = $(this).closest('tr').find('.soTonKho');
            $.ajax({
                url: '{{ route('getProduct') }}',
                type: 'GET',
                data: {
                    idProduct: idProduct
                },
                success: function(data) {
                    productName.val(data.product_name);
                    productUnit.val(data.product_unit);
                    thue.val(data.product_tax);
                    product_id.val(data.id);
                    tonkho.val(data.product_inventory)
                    $('.info-product').show();
                    soTonKho.text(parseFloat(data
                        .product_inventory));
                    if (data.product_inventory !== null) {
                        $('.inventory').show();
                        $('.transaction').show();
                    }
                }
            });
        });
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
    //
    var productNameInputs = document.querySelectorAll('.product_name');

    productNameInputs.forEach(function(input) {
        input.addEventListener('input', function() {
            var productIdInput = this.parentElement.querySelector('.product_id');
            productIdInput.value = '';
        });
    });

    function kiemTraFormGiaoHang(event) {
        event.preventDefault();

        var rows = document.querySelectorAll('tr');
        var hasProducts = false;

        for (var i = 1; i < rows.length; i++) {
            if (rows[i].classList.contains('addProduct')) {
                var inputs = rows[i].querySelectorAll('input[required]');
                for (var j = 0; j < inputs.length; j++) {
                    if (inputs[j].value.trim() === '') {
                        alert('Vui lòng điền đủ thông tin sản phẩm');
                        return;
                    }
                }
                hasProducts = true;
            }
        }

        // Tiếp tục với các kiểm tra khác và xử lý submit nếu cần
        var inputValue = $('.idGuest').val();
        var shouldSubmit = true;

        if ($.trim(inputValue) === '') {
            alert('Vui lòng chọn khách hàng từ danh sách hoặc thêm mới khách hàng!');
            shouldSubmit = false;
        } else if (!hasProducts) {
            alert("Không có sản phẩm để báo giá");
            shouldSubmit = false;
        }

        // Kiểm tra số báo giá tồn tại bằng Ajax
        if (hasProducts && shouldSubmit) {
            var quotetion_number = $('input[name="quotation_number"]').val();
            var detailexport_id = $('input[name="detailexport_id"]').val();
            console.log(quotetion_number);
            $.ajax({
                url: "{{ route('checkQuotetionExportEdit') }}",
                type: "get",
                data: {
                    quotetion_number: quotetion_number,
                    detailexport_id: detailexport_id,
                },
                success: function(data) {
                    if (!data['status']) {
                        alert('Số báo giá đã tồn tại');
                    } else {
                        // Nếu số báo giá không tồn tại, thực hiện submit form
                        $('form')[0].submit();
                    }
                }
            });
        }
    }
    //xem thông tin sản phẩm
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
