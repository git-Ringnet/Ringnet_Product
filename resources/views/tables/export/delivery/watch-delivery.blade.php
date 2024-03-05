<x-navbar :title="$title" activeGroup="sell" activeName="delivery" :workspacename="$workspacename"></x-navbar>
<form action="{{ route('delivery.update', ['workspace' => $workspacename, 'delivery' => $delivery->soGiaoHang]) }}"
    method="POST" id="deliveryForm" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="detail_id" value="{{ $delivery->soGiaoHang }}">
    <input type="hidden" name="table_name" value="GH">
    <input type="hidden" name="detailexport_id" id="detailexport_id" value="{{ $delivery->detailexport_id }}">
    <div class="content-wrapper--2Column m-0">
        <div class="content-header-fixed p-0 margin-250">
            <div class="content__header--inner margin-left32">
                <div class="content__heading--left">
                    <span>Bán hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="nearLast-span">Đơn giao hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="font-weight-bold last-span">{{ $delivery->quotation_number }}</span>
                    @if ($delivery->tinhTrang == 1)
                        <span style="color: #858585; font-size:13px;" class="btn-status">Chưa giao</span>
                    @else
                        <span style="color: #0052CC; font-size:13px;" class="btn-status">Đã giao</span>
                    @endif
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <a href="{{ route('delivery.index', ['workspace' => $workspacename]) }}">
                            <button type="button" class="btn-destroy btn-light mx-1 d-flex align-items-center h-100">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">
                                        <path
                                            d="M5.6738 11.4801C5.939 11.7983 6.41191 11.8413 6.73012 11.5761C7.04833 11.311 7.09132 10.838 6.82615 10.5198L5.3513 8.75H12.25C12.6642 8.75 13 8.41421 13 8C13 7.58579 12.6642 7.25 12.25 7.25L5.3512 7.25L6.82615 5.4801C7.09132 5.1619 7.04833 4.689 6.73012 4.4238C6.41191 4.1586 5.939 4.2016 5.6738 4.5198L3.1738 7.51984C2.942 7.79798 2.942 8.20198 3.1738 8.48012L5.6738 11.4801Z"
                                            fill="#6D7075" />
                                    </svg>
                                </span>
                                <span class="text-btnIner-primary ml-2">Trở về</span>
                            </button>
                        </a>
                        <label class="custom-btn d-flex align-items-center h-100 m-0 mx-1">
                            <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 14 14" fill="none">
                                <path
                                    d="M8.30541 9.20586C8.57207 9.47246 8.5943 9.89106 8.37208 10.183L8.30541 10.2593L5.84734 12.7174C4.58675 13.978 2.54294 13.978 1.28235 12.7174C0.0652319 11.5003 0.0232719 9.55296 1.15644 8.2855L1.28235 8.15237L3.74042 5.69429C4.03133 5.40339 4.50298 5.40339 4.79388 5.69429C5.06054 5.96096 5.08277 6.37949 4.86055 6.67147L4.79388 6.74775L2.33581 9.20586C1.65703 9.88456 1.65703 10.9852 2.33581 11.6639C2.98065 12.3088 4.00611 12.341 4.68901 11.7607L4.79388 11.6639L7.25195 9.20586C7.54286 8.91492 8.01451 8.91492 8.30541 9.20586ZM8.82965 5.17005C9.12053 5.46095 9.12053 5.9326 8.82965 6.22351L6.34904 8.70413C6.05813 8.99504 5.58648 8.99504 5.29558 8.70413C5.00467 8.41323 5.00467 7.94158 5.29558 7.65067L7.7762 5.17005C8.0671 4.87914 8.53875 4.87914 8.82965 5.17005ZM12.7173 1.28236C13.9344 2.49948 13.9764 4.44674 12.8432 5.71422L12.7173 5.84735L10.2592 8.30543C9.96833 8.59633 9.49673 8.59633 9.20583 8.30543C8.93914 8.03877 8.91692 7.62023 9.13913 7.32825L9.20583 7.25197L11.6638 4.79389C12.3426 4.11511 12.3426 3.0146 11.6638 2.33582C11.019 1.69098 9.99363 1.65874 9.31073 2.23909L9.20583 2.33582L6.74774 4.79389C6.45683 5.0848 5.98518 5.0848 5.69428 4.79389C5.42762 4.52723 5.40539 4.10869 5.62761 3.81672L5.69428 3.74043L8.15235 1.28236C9.41293 0.0217665 11.4567 0.0217665 12.7173 1.28236Z"
                                    fill="white" />
                            </svg>
                            <span>Đính kèm file</span>
                            <input type="file" style="display: none;" id="file_restore" accept="*"
                                name="file">
                        </label>
                        <div class="dropdown">
                            <button type="button" data-toggle="dropdown"
                                class="btn-destroy btn-light mx-1 d-flex align-items-center h-100 dropdown-toggle">
                                <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                        fill="#6D7075"></path>
                                </svg>
                                <span class="text-btnIner-primary ml-1">In</span>
                            </button>
                            <div class="dropdown-menu" style="z-index: 9999;">
                                <a class="dropdown-item text-13-black"
                                    href="{{ route('pdfdelivery', $delivery->soGiaoHang) }}">Xuất PDF</a>
                            </div>
                        </div>
                        @if ($delivery->tinhTrang !== 2)
                            <div class="dropdown">
                                <button type="submit" id="submitXacNhan" name="action" value="action_1"
                                    class="btn-destroy btn-light mx-1 d-flex align-items-center h-100"
                                    onclick="kiemTraFormGiaoHang(event)">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z"
                                                fill="#6D7075" />
                                        </svg>
                                    </span>
                                    <span class="text-btnIner-primary ml-2">Xác nhận</span>
                                </button>
                            </div>
                        @endif
                        <a href="#">
                            <button name="action" value="action_2" type="submit" id="xoaBtn"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                class="btn--remove d-flex align-items-center h-100 mx-1"
                                style="background-color:red;">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">
                                        <path
                                            d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z"
                                            fill="white" />
                                    </svg>
                                </span>
                                <span class="text-btnIner-primary ml-2">Xóa</span>
                            </button>
                        </a>
                        <button id="sideGuest" type="button" class="btn-option border-0 mx-1">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="16" width="16" height="16" rx="5"
                                    transform="rotate(90 16 0)" fill="#ECEEFA" />
                                <path
                                    d="M15 11C15 13.2091 13.2091 15 11 15L5 15C2.7909 15 1 13.2091 1 11L1 5C1 2.79086 2.7909 1 5 1L11 1C13.2091 1 15 2.79086 15 5L15 11ZM10 13.5L10 2.5L5 2.5C3.6193 2.5 2.5 3.61929 2.5 5L2.5 11C2.5 12.3807 3.6193 13.5 5 13.5H10Z"
                                    fill="#26273B" fill-opacity="0.8" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <section class="border-custom" style="height:50px">
                <div class="d-flex justify-content-between align-items-center h-100">
                    <div class="content-header--options p-0 border-0">
                        <ul class="header-options--nav nav nav-tabs margin-left32">
                            <li>
                                <a class="text-secondary active m-0 pl-3" data-toggle="tab" href="#info">Thông
                                    tin</a>
                            </li>
                            <li>
                                <a class="text-secondary m-0 pl-3 pr-3" data-toggle="tab" href="#history">Lịch sử
                                    giao dịch</a>
                            </li>
                            <li>
                                <a class="text-secondary m-0 pr-3" data-toggle="tab" href="#files">File đính kèm</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
        <div class="content margin-top-68" id="main">
            <div class="container-fluided margin-250">
                <div class="tab-content">
                    <div id="info" class="content tab-pane in active">
                        <div class="bg-filter-search border-top-0 text-center border-custom">
                            <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN SẢN
                                PHẨM</p>
                        </div>
                        <section class="content">
                            <div class="container-fluided order_content">
                                <table class="table table-hover bg-white rounded">
                                    <thead>
                                        <tr style="height:44px;">
                                            <th class="border-right p-0 px-2 text-13"
                                                style="width:15%; padding-left: 2rem !important;">
                                                <span>Mã sản phẩm</span>
                                            </th>
                                            <th class="border-right p-0 px-2 text-13" style="width:17%;">Tên sản phẩm
                                            </th>
                                            <th class="border-right p-0 px-2 text-13" style="width:7%;">Đơn vị</th>
                                            <th class="border-right p-0 px-2 text-center text-13" style="width:10%;">
                                                Số lượng</th>
                                            <th class="border-right p-0 px-2 text-right text-13" style="width:15%;">
                                                Đơn giá</th>
                                            <th class="border-right p-0 px-2 text-center text-13" style="width:10%;">
                                                Thuế</th>
                                            <th class="border-right p-0 px-1 text-center text-13"style="width:10%;">
                                                Thành tiền</th>
                                            <th class="border-right p-0 px-2 text-center note text-13">Ghi chú sản phẩm
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product as $item_quote)
                                            <tr class="bg-white addProduct" style="height:80px;">
                                                <td class='border-right p-2 text-13 align-top'
                                                    style="padding-left: 2rem !important;">
                                                    <input type="text" autocomplete="off" readonly
                                                        value="MSP-0001"
                                                        class='border-0 pl-0 pr-2 py-1 w-75 product_code'
                                                        name="product_code[]">
                                                </td>
                                                <td class='border-right p-2 text-13 align-top position-relative'>
                                                    <div class="d-flex align-items-center">
                                                        <input type="text" value="{{ $item_quote->product_name }}"
                                                            class='border-0 pl-0 pr-2 py-1 w-100 product_name' readonly
                                                            autocomplete="off" name="product_name[]">
                                                        <input type="hidden" class="product_id"
                                                            value="{{ $item_quote->product_id }}" autocomplete="off"
                                                            name="product_id[]">
                                                        <div class='info-product' data-toggle='modal'
                                                            data-target='#productModal'>
                                                            <svg xmlns='http://www.w3.org/2000/svg' width='14'
                                                                height='14' viewBox='0 0 14 14' fill='none'>
                                                                <g clip-path='url(#clip0_2559_39956)'>
                                                                    <path
                                                                        d='M6.99999 1.48362C5.53706 1.48362 4.13404 2.06477 3.09959 3.09922C2.06514 4.13367 1.48399 5.53669 1.48399 6.99963C1.48399 8.46256 2.06514 9.86558 3.09959 10.9C4.13404 11.9345 5.53706 12.5156 6.99999 12.5156C8.46292 12.5156 9.86594 11.9345 10.9004 10.9C11.9348 9.86558 12.516 8.46256 12.516 6.99963C12.516 5.53669 11.9348 4.13367 10.9004 3.09922C9.86594 2.06477 8.46292 1.48362 6.99999 1.48362ZM0.265991 6.99963C0.265991 5.21366 0.975464 3.50084 2.23833 2.23797C3.5012 0.975098 5.21402 0.265625 6.99999 0.265625C8.78596 0.265625 10.4988 0.975098 11.7616 2.23797C13.0245 3.50084 13.734 5.21366 13.734 6.99963C13.734 8.78559 13.0245 10.4984 11.7616 11.7613C10.4988 13.0242 8.78596 13.7336 6.99999 13.7336C5.21402 13.7336 3.5012 13.0242 2.23833 11.7613C0.975464 10.4984 0.265991 8.78559 0.265991 6.99963Z'
                                                                        fill='#282A30' />
                                                                    <path
                                                                        d='M7.07004 4.34488C6.92998 4.33528 6.78944 4.35459 6.65715 4.40161C6.52487 4.44863 6.40367 4.52236 6.30109 4.61821C6.19851 4.71406 6.11674 4.82999 6.06087 4.95878C6.00499 5.08757 5.9762 5.22648 5.97629 5.36688C5.97629 5.52851 5.91208 5.68352 5.79779 5.79781C5.6835 5.91211 5.52849 5.97631 5.36685 5.97631C5.20522 5.97631 5.05021 5.91211 4.93592 5.79781C4.82162 5.68352 4.75742 5.52851 4.75742 5.36688C4.75733 4.9557 4.87029 4.55241 5.08394 4.2011C5.2976 3.84979 5.60373 3.56398 5.96886 3.37492C6.33399 3.18585 6.74408 3.10081 7.15428 3.12909C7.56449 3.15737 7.95902 3.29788 8.29475 3.53526C8.63049 3.77265 8.8945 4.09776 9.05792 4.47507C9.22135 4.85237 9.2779 5.26735 9.22139 5.67462C9.16487 6.0819 8.99748 6.4658 8.7375 6.78436C8.47753 7.10292 8.13497 7.34387 7.74729 7.48088C7.70694 7.49534 7.67207 7.52196 7.64747 7.55706C7.62287 7.59216 7.60975 7.63402 7.60992 7.67688V8.22463C7.60992 8.38626 7.54571 8.54127 7.43142 8.65557C7.31712 8.76986 7.16211 8.83407 7.00048 8.83407C6.83885 8.83407 6.68383 8.76986 6.56954 8.65557C6.45525 8.54127 6.39104 8.38626 6.39104 8.22463V7.67688C6.39096 7.38197 6.48229 7.0943 6.65247 6.85345C6.82265 6.6126 7.0633 6.43042 7.34129 6.332C7.56313 6.25339 7.7511 6.10073 7.87356 5.89975C7.99603 5.69877 8.0455 5.46172 8.01366 5.22853C7.98181 4.99534 7.87059 4.78025 7.69872 4.61946C7.52685 4.45867 7.30483 4.36114 7.07004 4.34488Z'
                                                                        fill='#282A30' />
                                                                    <path
                                                                        d='M7.04382 10.1242C7.00228 10.1242 6.96245 10.1408 6.93307 10.1701C6.9037 10.1995 6.8872 10.2393 6.8872 10.2809C6.8872 10.3224 6.9037 10.3623 6.93307 10.3916C6.96245 10.421 7.00228 10.4375 7.04382 10.4375C7.08536 10.4375 7.1252 10.421 7.15457 10.3916C7.18395 10.3623 7.20045 10.3224 7.20045 10.2809C7.20045 10.2393 7.18395 10.1995 7.15457 10.1701C7.1252 10.1408 7.08536 10.1242 7.04382 10.1242ZM7.04382 10.9371C7.13 10.9371 7.21534 10.9201 7.29496 10.8872C7.37458 10.8542 7.44692 10.8059 7.50786 10.7449C7.5688 10.684 7.61714 10.6116 7.65012 10.532C7.6831 10.4524 7.70007 10.3671 7.70007 10.2809C7.70007 10.1947 7.6831 10.1094 7.65012 10.0297C7.61714 9.95012 7.5688 9.87777 7.50786 9.81684C7.44692 9.7559 7.37458 9.70756 7.29496 9.67458C7.21534 9.6416 7.13 9.62462 7.04382 9.62462C6.86977 9.62462 6.70286 9.69376 6.57978 9.81684C6.45671 9.93991 6.38757 10.1068 6.38757 10.2809C6.38757 10.4549 6.45671 10.6218 6.57978 10.7449C6.70286 10.868 6.86977 10.9371 7.04382 10.9371Z'
                                                                        fill='#282A30' />
                                                                </g>
                                                                <defs>
                                                                    <clipPath id='clip0_2559_39956'>
                                                                        <rect width='14' height='14'
                                                                            fill='white' />
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class='border-right p-2 text-13 align-top'>
                                                    <input type="text" autocomplete="off" readonly
                                                        value="{{ $item_quote->product_unit }}"
                                                        class="border-0 px-2 py-1 w-100 product_unit"
                                                        name="product_unit[]">
                                                </td>
                                                <td class="border-right p-2 text-13 align-top">
                                                    <div class="d-flex align-items-center">
                                                        <div class="">
                                                            <input type="text" readonly
                                                                data-row="row{{ $item_quote->product_id }}"
                                                                value="{{ is_int($item_quote->deliver_qty) ? $item_quote->deliver_qty : rtrim(rtrim(number_format($item_quote->deliver_qty, 4, '.', ''), '0'), '.') }}"
                                                                class='text-right border-0 pl-2 pr-0 py-1 w-100 quantity-input'
                                                                autocomplete="off" name="product_qty[]">
                                                            <input type="hidden" class="tonkho">
                                                            <div class='mt-3 text-13-blue inventory text-right'
                                                                tyle="top: 68%;">Tồn kho:
                                                                <span
                                                                    class='pl-1 soTonKho'>{{ is_int($item_quote->product_inventory) ? $item_quote->product_inventory : rtrim(rtrim(number_format($item_quote->product_inventory, 4, '.', ''), '0'), '.') }}</span>
                                                            </div>
                                                            <!-- <p class="text-primary text-center position-absolute inventory"
                                                                style="top: 68%;">Tồn kho:
                                                                <span
                                                                    class="soTonKho">{{ is_int($item_quote->product_inventory) ? $item_quote->product_inventory : rtrim(rtrim(number_format($item_quote->product_inventory, 4, '.', ''), '0'), '.') }}
                                                                </span>
                                                            </p> -->
                                                        </div>
                                                        <!-- <div class="">
                                                            <a href="#" class="btn btn-primary sn1"
                                                                data-row="row{{ $item_quote->product_id }}"
                                                                data-toggle="modal"
                                                                data-target="#exampleModal{{ $item_quote->product_id }}"
                                                                style="background:transparent; border:none;">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                                    height="32" viewBox="0 0 32 32" fill="none">
                                                                    <rect width="32" height="32" rx="4"
                                                                        fill="white">
                                                                    </rect>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M11.9062 10.643C11.9062 10.2092 12.258 9.85742 12.6919 9.85742H24.2189C24.6528 9.85742 25.0045 10.2092 25.0045 10.643C25.0045 11.0769 24.6528 11.4286 24.2189 11.4286H12.6919C12.258 11.4286 11.9062 11.0769 11.9062 10.643Z"
                                                                        fill="#0095F6"></path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M11.9062 16.4707C11.9062 16.0368 12.258 15.6851 12.6919 15.6851H24.2189C24.6528 15.6851 25.0045 16.0368 25.0045 16.4707C25.0045 16.9045 24.6528 17.2563 24.2189 17.2563H12.6919C12.258 17.2563 11.9062 16.9045 11.9062 16.4707Z"
                                                                        fill="#0095F6"></path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M11.9062 22.2978C11.9062 21.8639 12.258 21.5122 12.6919 21.5122H24.2189C24.6528 21.5122 25.0045 21.8639 25.0045 22.2978C25.0045 22.7317 24.6528 23.0834 24.2189 23.0834H12.6919C12.258 23.0834 11.9062 22.7317 11.9062 22.2978Z"
                                                                        fill="#0095F6"></path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M6.6665 10.6431C6.6665 9.91981 7.25282 9.3335 7.97607 9.3335C8.69932 9.3335 9.28563 9.91981 9.28563 10.6431C9.28563 11.3663 8.69932 11.9526 7.97607 11.9526C7.25282 11.9526 6.6665 11.3663 6.6665 10.6431ZM6.6665 16.4705C6.6665 15.7473 7.25282 15.161 7.97607 15.161C8.69932 15.161 9.28563 15.7473 9.28563 16.4705C9.28563 17.1938 8.69932 17.7801 7.97607 17.7801C7.25282 17.7801 6.6665 17.1938 6.6665 16.4705ZM7.97607 20.9884C7.25282 20.9884 6.6665 21.5747 6.6665 22.298C6.6665 23.0212 7.25282 23.6075 7.97607 23.6075C8.69932 23.6075 9.28563 23.0212 9.28563 22.298C9.28563 21.5747 8.69932 20.9884 7.97607 20.9884Z"
                                                                        fill="#0095F6"></path>
                                                                </svg>
                                                            </a>
                                                        </div> -->
                                                    </div>
                                                </td>
                                                <td class="border-right p-2 text-13 align-top">
                                                    <input type="text"
                                                        value="{{ number_format($item_quote->price_export) }}"
                                                        class="text-right border-0 px-2 py-1 w-100 product_price"
                                                        autocomplete="off" name="product_price[]" readonly>
                                                </td>
                                                <td class="border-right p-2 text-13 align-top">
                                                    <select name="product_tax[]"
                                                        class="border-0 text-center product_tax" disabled>
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
                                                        } ?>>NOVAT
                                                        </option>
                                                    </select>
                                                </td>
                                                <td class="border-right p-2 text-13 align-top">
                                                    <input type="text" readonly=""
                                                        value="{{ number_format($item_quote->product_total) }}"
                                                        class='text-right border-0 px-2 py-1 w-100 total-amount'>
                                                </td>

                                                <!-- <td class="border-top border-secondary p-0 bg-secondary Daydu d-none"
                                                    style="width:1%;">
                                                </td> -->
                                                <!-- <td
                                                    class="border border-top-0 border-bottom-0 position-relative product_ratio d-none">
                                                    <input type="text" class="border-0 px-2 py-1 w-100 heSoNhan"
                                                        autocomplete="off" required="required" readonly
                                                        value="{{ $item_quote->product_ratio }}" name="product_ratio[]">
                                                </td> -->
                                                <!-- <td
                                                    class="border border-top-0 border-bottom-0 position-relative price_import d-none">
                                                    <input type="text" class="border-0 px-2 py-1 w-100 giaNhap"
                                                        readonly autocomplete="off" required="required"
                                                        name="price_import[]"
                                                        value="{{ number_format($item_quote->price_import) }}">
                                                </td> -->
                                                <td class="border-right p-2 note text-13 align-top">
                                                    <input type="text" class='border-0 py-1 w-100'
                                                        placeholder='Nhập ghi chú' readonly name="product_note[]"
                                                        value="{{ $item_quote->product_note }}">
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
                            <div class="row" style="width:95%;">
                                <div class="position-relative col-lg-4 px-0"></div>
                                <div class="position-relative col-lg-5 col-md-7 col-sm-12 margin-left180">
                                    <div class="m-3">
                                        <div class="d-flex justify-content-between">
                                            <span class="text-13-black">Giá trị trước thuế: </span>
                                            <span id="total-amount-sum">0đ</span>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <span class="text-13-black">Thuế VAT: </span>
                                            <span id="product-tax">0đ</span>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <span class="text-13-bold text-lg font-weight-bold">Tổng cộng: </span>
                                            <span class="text-13-bold text-lg font-weight-bold text-right"
                                                id="grand-total" data-value="0">0đ</span>
                                            <input type="text" hidden="" name="totalValue" value="0"
                                                id="total">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="history" class="tab-pane fade">
                        <div class="bg-filter-search border-bottom-0 border-right-0 text-center py-2">
                            <span class="font-weight-bold text-secondary text-nav">LỊCH SỬ</span>
                        </div>
                        <section class="content">
                            <div class="container-fluided order_content">
                                <table class="table table-hover bg-white rounded">
                                    <thead>
                                        <tr>
                                            <th class="border-right text-table text-secondary">
                                                Mã sản phẩm
                                            </th>
                                            <th class="border-right text-table text-secondary">Tên sản phẩm</th>
                                            <th class="border-right text-table text-secondary">Đơn vị</th>
                                            <th class="border-right text-table text-secondary">Số lượng</th>
                                            <th class="border-right text-table text-secondary">Đơn giá</th>
                                            <th class="border-right text-table text-secondary">Thuế</th>
                                            <th class="border-right text-table text-secondary">Thành tiền</th>
                                            <th class="note text-table text-secondary">Ghi chú</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($quoteExport as $item_quote)
                                            <tr class="bg-white">
                                                <td
                                                    class="border border-left-0 border-top-0 border-bottom-0 position-relative">
                                                    <div
                                                        class="d-flex w-100 justify-content-between align-items-center">
                                                        <input type="text" autocomplete="off" readonly
                                                            value="{{ $item_quote->product_code }}"
                                                            class="border-0 px-2 py-1 w-75 product_code">
                                                    </div>
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 position-relative">
                                                    <div class="d-flex align-items-center">
                                                        <input type="text" value="{{ $item_quote->product_name }}"
                                                            class="border-0 px-2 py-1 w-100 product_name" readonly
                                                            autocomplete="off">
                                                        <input type="hidden" class="product_id"
                                                            value="{{ $item_quote->product_id }}" autocomplete="off">
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
                                                    <input type="text" autocomplete="off" readonly
                                                        value="{{ $item_quote->product_unit }}"
                                                        class="border-0 px-2 py-1 w-100 product_unit">
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 position-relative">
                                                    <input type="text" readonly
                                                        value="{{ is_int($item_quote->product_qty) ? $item_quote->product_qty : rtrim(rtrim(number_format($item_quote->product_qty, 4, '.', ''), '0'), '.') }}"
                                                        class="border-0 px-2 py-1 w-100 quantity-input"
                                                        autocomplete="off">
                                                    <input type="hidden" class="tonkho">
                                                    <p class="text-primary text-center position-absolute inventory"
                                                        style="top: 68%; display: none;">Tồn kho:
                                                        <span class="soTonKho">35</span>
                                                    </p>
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 position-relative">
                                                    <input type="text"
                                                        value="{{ number_format($item_quote->price_export) }}"
                                                        class="border-0 px-2 py-1 w-100 product_price"
                                                        autocomplete="off" readonly>
                                                    <p class="text-primary text-right position-absolute transaction"
                                                        style="top: 68%; right: 5%; display: none;">Giao dịch
                                                        gần đây
                                                    </p>
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 px-4">
                                                    <select class="border-0 text-center product_tax" disabled>
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
                                                        } ?>>NOVAT
                                                        </option>
                                                    </select>
                                                </td>
                                                <td class="border border-top-0 border-bottom-0">
                                                    <input type="text" readonly=""
                                                        value="{{ number_format($item_quote->product_total) }}"
                                                        class="border-0 px-2 py-1 w-100 total-amount">
                                                </td>
                                                <td
                                                    class="border border-top-0 border-bottom-0 border-right-0 position-relative note p-1">
                                                    <input type="text" class="border-0 py-1 w-100" readonly
                                                        value="{{ $item_quote->product_note }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
</form>
<div id="files" class="tab-pane fade">
    <div class="bg-filter-search border-bottom-0 text-center py-2 border-right-0">
        <span class="font-weight-bold text-secondary text-nav">FILE ĐÍNH KÈM</span>
    </div>
    <x-form-attachment :value="$delivery" name="GH"></x-form-attachment>
</div>
{{-- Modal seri --}}
@foreach ($product as $item)
    <div id="list_modal">
        <div class="modal fade my-custom-modal" id="exampleModal{{ $item->product_id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thông tin Serial Number
                        </h5>
                        <a href="#" class="close btnclose" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </a>
                    </div>
                    <div class="modal-body">
                        <table id="table_SNS">
                            <thead>
                                <tr>
                                    <td style="width:2%"></td>
                                    <th style="width:5%">STT</th>
                                    <th style="width:100%">Serial number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $stt = 1;
                                @endphp
                                @foreach ($serinumber as $item_seri)
                                    @if ($item->product_id == $item_seri->product_id)
                                        <tr>
                                            <td>
                                                <input name="id_seri[]"
                                                    {{ $item_seri->detailexport_id == $delivery->detailexport_id ? 'checked' : '' }}
                                                    type="checkbox" class="check-item" disabled
                                                    data-product-id={{ $item_seri->product_id }}
                                                    value="{{ $item_seri->idSeri }}">
                                            </td>
                                            <td>{{ $stt++ }}</td>
                                            <td>
                                                <input readonly class="form-control w-25" type="text"
                                                    value="{{ $item_seri->serinumber }}">
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="modal-footer">
                                <a href="#" class="btn btn-primary check-seri" data-dismiss=""
                                    data-row="row{{ $item->product_id }}"
                                    data-target="#exampleModal{{ $item->product_id }}">
                                    Save changes
                                </a>
                            </div> --}}
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
</div>
</div>
{{-- Thông tin khách hàng --}}
<div class="content-wrapper px-0 py-0">
    <div id="mySidenav" class="sidenav border top-109">
        <div id="show_info_Guest">
            <p class="font-weight-bold text-uppercase info-chung--heading text-center">Thông tin nhà cung cấp
            </p>
            <div class="content-info">
                <div class="d-flex justify-content-between py-2 px-3 border align-items-center text-left text-nowrap"
                    style="height:44px;" style="height:44px;">
                    <span class="text-13 btn-click" style="flex: 1.5;">Số báo giá</span>
                    <span class="mx-1 text-13" style="flex: 2;">
                        <input type="text" placeholder="Chọn thông tin" readonly
                            value="{{ $delivery->quotation_number }}"
                            class="border-0 w-100 bg-input-guest py-0 py-2 px-2 numberQute"
                            style="background-color:#F0F4FF; border-radius:4px;" id="myInput" autocomplete="off"
                            name="quotation_number">
                    </span>
                </div>
            </div>
            <div class="content-info--common" id="show-info-guest">
                <ul class="p-0 m-0 ">
                    <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                        style="height:44px;">
                        <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Khách hàng</span>
                        <input class="text-13-black w-50 border-0 bg-input-guest"
                            value="{{ $delivery->guest_name_display }}" style="flex:2;" id="myInput">
                        <input type="hidden" class="idGuest" autocomplete="off" name="guest_id">
                    </li>
                    <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                        style="height:44px;">
                        <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Người đại diện</span>
                        <input class="text-13-black w-50 border-0" style="flex:2;" placeholder="Nhập thông tin"
                            value="{{ $delivery->represent_name }}" readonly />
                    </li>
                    <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                        style="height:44px;">
                        <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Mã giao hàng</span>
                        <input class="text-13-black w-50 border-0" style="flex:2;" placeholder="Nhập thông tin"
                            value="{{ $delivery->code_delivery }}" readonly />
                    </li>
                    <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                        style="height:44px;">
                        <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Đơn vị vận chuyển</span>
                        <input type="text" class="text-13-black w-50 border-0" placeholder="Nhập thông tin"
                            name="shipping_unit" style="flex:2;" value="{{ $delivery->shipping_unit }}" />
                    </li>
                    <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                        style="height:44px;">
                        <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Phí giao hàng</span>
                        <input type="text" class="text-13-black w-50 border-0" style="flex:2;"
                            placeholder="Nhập thông tin" name="shipping_fee" placeholder="Nhập thông tin"
                            value="{{ number_format($delivery->shipping_fee) }}" />
                    </li>
                    <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                        style="height:44px;">
                        <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày giao hàng</span>
                        <input type="text" readonly class="text-13-black w-50 border-0" name="date_deliver"
                            style="flex:2;" value="{{ date_format(new DateTime($delivery->ngayGiao), 'd/m/Y') }}" />
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>

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
<script>
    $('#file_restore').on('change', function(e) {
        e.preventDefault();
        $('#deliveryForm').attr('action', '{{ route('addAttachment') }}');
        // $('#formSubmit').attr('method', 'HEAD');
        $('input[name="_method"]').remove();
        $('#deliveryForm')[0].submit();
    })
    //Kiểm tra số lượng SN được checked
    // $('.check-seri').on('click', function() {
    //     // Lấy giá trị của data-target và data-row từ button
    //     const dataTarget = $(this).data('target');
    //     const rowID = $(this).data('row');

    //     // Lấy giá trị từ input số lượng
    //     const quantityInputValue = parseInt($(`.${rowID} .quantity-input`).val());

    //     // Lấy số lượng checkbox được chọn trong modal
    //     const checkedCheckboxCount = $(`${dataTarget} .check-item:checked`).length;

    //     // Kiểm tra xem số lượng checkbox có bằng với giá trị từ input không
    //     if (checkedCheckboxCount !== quantityInputValue) {
    //         alert('Vui lòng chọn đủ serinumber.');
    //     }
    // });

    //
    $('.ml-1.btn-sm').on('click', function(event) {
        $('input[name="_method"][value="put"]').remove();
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
            var taxValue = parseFloat($(this).find('.product_tax option:selected').val());
            if (taxValue == 99) {
                taxValue = 0;
            }
            if (productPriceElement.length > 0) {
                var rawPrice = productPriceElement.val();
                if (rawPrice !== "") {
                    productPrice = parseFloat(rawPrice.replace(/,/g, ''));
                }
            }

            if (!isNaN(productQty) && !isNaN(taxValue)) {
                var donGia = productPrice;
                var rowTotal = productQty * donGia;
                var rowTax = (rowTotal * taxValue) / 100;

                // Làm tròn từng thuế
                rowTax = Math.round(rowTax);
                $(this).find('.product_tax1').val(formatCurrency(rowTax));

                // Hiển thị kết quả
                $(this).find('.total-amount').val(formatCurrency(Math.round(rowTotal)));
                $(this).find('.product_price').val(formatCurrency(donGia));

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

    function kiemTraFormGiaoHang(event) {
        var rows = document.querySelectorAll('tr');
        var invalidProducts = [];
        var hasProducts = false;

        for (var i = 1; i < rows.length; i++) {
            var row = rows[i];
            var quantityInput = row.querySelector('.quantity-input');
            var soTonKhoElement = row.querySelector('.soTonKho');
            var productNameInput = row.querySelector('.product_name');

            // Kiểm tra xem phần tử có tồn tại không
            if (quantityInput && soTonKhoElement && productNameInput) {
                var quantityValue = parseInt(quantityInput.value);
                var soTonKho = parseInt(soTonKhoElement.innerText);
                var productName = productNameInput.value;

                if (quantityValue > soTonKho) {
                    invalidProducts.push(productName);
                }

                // Kiểm tra xem có thẻ tr nào có class addProduct không
                if (row.classList.contains('addProduct')) {
                    hasProducts = true;
                }
            }
        }

        // Hiển thị thông báo nếu không có sản phẩm
        if (!hasProducts) {
            alert("Không có sản phẩm để giao");
            event.preventDefault();
        }

        // Hiển thị thông báo cuối cùng nếu có sản phẩm không hợp lệ
        if (invalidProducts.length > 0) {
            alert("Không đủ số lượng tồn kho cho các sản phẩm:\n" + invalidProducts.join(', '));
            event.preventDefault();
        } else if (hasProducts) {
            var hiddenInputsToRemove = document.querySelectorAll(
                'input[type="hidden"][name="_method"][value="delete"]');
            hiddenInputsToRemove.forEach(function(hiddenInput) {
                hiddenInput.remove();
            });
            $('.check-item').prop('disabled', false);
            // Nếu không có lỗi và có sản phẩm, tiếp tục submit form
            document.getElementById('deliveryForm').submit();
        }
    }
    $('#xoaBtn').on('click', function(event) {
        var hiddenInputsToRemove = document.querySelectorAll(
            'input[type="hidden"][name="_method"][value="delete"]');
        hiddenInputsToRemove.forEach(function(hiddenInput) {
            hiddenInput.remove();
        });
    })
    $('body').on('input', '.product_price, #transport_fee, .giaNhap, #voucher, .fee_ship', function(event) {
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
                        .product_unit + '<br>' + '<b>Tồn kho: </b>' + (formatNumber(productData
                            .product_inventory == null ? 0 : productData
                            .product_inventory)) + '<br>' + '<b>Thuế: </b>' + (productData
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
