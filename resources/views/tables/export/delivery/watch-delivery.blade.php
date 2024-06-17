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
                    <span class="font-weight-bold last-span">{{ $delivery->code_delivery }}</span>
                    @if ($delivery->tinhTrang == 1)
                        <span style="color: #858585; font-size:13px;" class="btn-status">Chưa giao</span>
                    @else
                        <span style="color: #0052CC; font-size:13px;" class="btn-status">Đã giao</span>
                    @endif
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <a href="{{ route('delivery.index', ['workspace' => $workspacename]) }}" class="activity"
                            data-name1="GH" data-des="Trở về">
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
                                <a class="dropdown-item text-13-black activity" data-name1="GH" data-des="Xuất file pdf"
                                    href="{{ route('pdfdelivery', $delivery->soGiaoHang) }}">Xuất PDF</a>
                            </div>
                        </div>
                        <label class="btn-destroy btn-light d-flex align-items-center h-100 m-0 mx-1">
                            <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.30639 10.2061C9.57305 10.4727 9.59528 10.8913 9.37306 11.1832L9.30639 11.2595L6.84832 13.7176C5.58773 14.9782 3.54392 14.9782 2.28333 13.7176C1.06621 12.5005 1.02425 10.5532 2.15742 9.28574L2.28333 9.15261L4.7414 6.69453C5.03231 6.40363 5.50396 6.40363 5.79486 6.69453C6.06152 6.9612 6.08375 7.37973 5.86153 7.67171L5.79486 7.74799L3.33679 10.2061C2.65801 10.8848 2.65801 11.9854 3.33679 12.6641C3.98163 13.309 5.00709 13.3412 5.68999 12.7609L5.79486 12.6641L8.25293 10.2061C8.54384 9.91516 9.01549 9.91516 9.30639 10.2061ZM9.83063 6.17029C10.1215 6.46119 10.1215 6.93284 9.83063 7.22375L7.35002 9.70437C7.05911 9.99528 6.58746 9.99528 6.29656 9.70437C6.00565 9.41347 6.00565 8.94182 6.29656 8.65091L8.77718 6.17029C9.06808 5.87938 9.53973 5.87938 9.83063 6.17029ZM13.7183 2.2826C14.9354 3.49972 14.9774 5.44698 13.8442 6.71446L13.7183 6.84759L11.2602 9.30567C10.9693 9.59657 10.4977 9.59657 10.2068 9.30567C9.94012 9.03901 9.9179 8.62047 10.1401 8.32849L10.2068 8.25221L12.6648 5.79413C13.3436 5.11535 13.3436 4.01484 12.6648 3.33606C12.02 2.69122 10.9946 2.65898 10.3117 3.23933L10.2068 3.33606L7.74872 5.79413C7.45781 6.08504 6.98616 6.08504 6.69526 5.79413C6.4286 5.52747 6.40637 5.10893 6.62859 4.81696L6.69526 4.74067L9.15333 2.2826C10.4139 1.02201 12.4577 1.02201 13.7183 2.2826Z"
                                    fill="#6D7075"></path>
                            </svg>
                            <span>Đính kèm</span>
                            <input type="file" style="display: none;" id="file_restore" accept="*"
                                name="file">
                        </label>
                        @if ($delivery->tinhTrang !== 2)
                            <div class="dropdown">
                                <button type="submit" id="submitXacNhan" name="action" value="action_1"
                                    class="custom-btn btn-light mx-1 d-flex align-items-center h-100"
                                    onclick="kiemTraFormGiaoHang(event)">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    <span class="text-btnIner-primary ml-2">Xác nhận</span>
                                </button>
                            </div>
                        @endif
                        <div class="dropdown">
                            <button type="button" data-toggle="dropdown"
                                class="btn-save-print border-0 rounded d-flex align-items-center h-100 dropdown-toggle px-2 bg-click">
                                <span class="text-button">
                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M24 15C24 13.8954 23.1046 13 22 13C20.8954 13 20 13.8954 20 15C20 16.1046 20.8954 17 22 17C23.1046 17 24 16.1046 24 15Z"
                                            fill="#26273B" fill-opacity="0.8"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M17 15C17 13.8954 16.1046 13 15 13C13.8954 13 13 13.8954 13 15C13 16.1046 13.8954 17 15 17C16.1046 17 17 16.1046 17 15Z"
                                            fill="#26273B" fill-opacity="0.8"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M10 15C10 13.8954 9.10457 13 8 13C6.89543 13 6 13.8954 6 15C6 16.1046 6.89543 17 8 17C9.10457 17 10 16.1046 10 15Z"
                                            fill="#26273B" fill-opacity="0.8"></path>
                                    </svg>
                                </span>
                            </button>
                            <div class="dropdown-menu mt-1 p-0" style="z-index: 9999;width:180px!important;">
                                <ul class="m-0 p-0">
                                    <li class="p-1 w-100" style="border-radius:4px;">
                                        <a href="#">
                                            <button name="action" value="action_2" type="submit"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                class="btn-save-print border-0 p-2 d-flex mx-1 align-items-center h-100 w-100">
                                                <svg class="mr-2" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.3687 6.5C12.6448 6.5 12.8687 6.72386 12.8687 7C12.8687 7.03856 12.8642 7.07699 12.8554 7.11452L11.3628 13.4581C11.1502 14.3615 10.3441 15 9.41597 15H6.58403C5.65593 15 4.84977 14.3615 4.6372 13.4581L3.14459 7.11452C3.08135 6.84572 3.24798 6.57654 3.51678 6.51329C3.55431 6.50446 3.59274 6.5 3.6313 6.5H12.3687ZM8.5 1C9.88071 1 11 2.11929 11 3.5H13C13.5523 3.5 14 3.94772 14 4.5V5C14 5.27614 13.7761 5.5 13.5 5.5H2.5C2.22386 5.5 2 5.27614 2 5V4.5C2 3.94772 2.44772 3.5 3 3.5H5C5 2.11929 6.11929 1 7.5 1H8.5ZM8.5 2.5H7.5C6.94772 2.5 6.5 2.94772 6.5 3.5H9.5C9.5 2.94772 9.05228 2.5 8.5 2.5Z"
                                                        fill="#26273B" fill-opacity="0.8"></path>
                                                </svg>
                                                <span style="color: #282A30; font-size:14px">
                                                    Xóa
                                                </span>
                                            </button>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
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
            <section class="border-top" style="height:50px">
                <div class="d-flex justify-content-between align-items-center h-100">
                    <div class="content-header--options p-0 border-0">
                        <ul class="header-options--nav-1 nav nav-tabs margin-left32">
                            <li>
                                <a class="text-secondary active m-0 pl-3 activity" data-name1="GH"
                                    data-des="Xem thông tin sản phẩm giao hàng" data-toggle="tab" href="#info">
                                    Thông tin
                                </a>
                            </li>
                            <li>
                                <a class="text-secondary m-0 pr-3 activity" data-name1="GH"
                                    data-des="Xem file đính kèm giao hàng" data-toggle="tab" href="#files">File đính
                                    kèm</a>
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
                        <div id="title--fixed" class="content-title--fixed top-111 border-0">
                            <p class="font-weight-bold text-uppercase info-chung--heading text-center">
                                THÔNG TIN SẢN PHẨM
                            </p>
                        </div>
                        <section class="content margin-top-103">
                            <div class="container-fluided order_content">
                                <table class="table table-hover bg-white rounded">
                                    <thead>
                                        <tr style="height:44px;">
                                            <th class="border-right p-0 px-2 text-13" style="width:15%;">
                                                <span class="text-left ml-2">Mã sản phẩm</span>
                                            </th>
                                            <th class="border-right p-0 px-2 text-13" style="width:15%;">
                                                Tên sản phẩm
                                            </th>
                                            <th class="border-right p-0 px-2 text-13" style="width:7%;">Đơn vị</th>
                                            <th class="border-right p-0 px-2 text-right text-13" style="width:10%;">
                                                Số lượng</th>
                                            <th class="border-right p-0 px-2 text-center text-13" style="width:8%;">
                                                Quản lý SN</th>
                                            <th class="border-right p-0 px-2 text-right text-13" style="width:10%;">
                                                Đơn giá</th>
                                            <th class="border-right p-0 px-2 text-right text-13" style="width:15%;">
                                                %CK</th>
                                            <th class="border-right p-0 px-2 text-center text-13" style="width:10%;">
                                                Thuế</th>
                                            <th class="border-right p-0 px-1 text-center text-13"style="width:10%;">
                                                Thành tiền</th>
                                            <th class="p-0 px-2 text-center note text-13">Ghi chú sản phẩm
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product as $item_quote)
                                            <tr class="bg-white addProduct" style="height:80px;">
                                                <td class='border-right p-2 text-13 align-top border-bottom border-top-0'
                                                    style="padding-left: 2rem !important;">
                                                    <input type="text" autocomplete="off" readonly
                                                        value="{{ $item_quote->product_code }}"
                                                        class='border-0 pl-0 pr-2 py-1 w-75 product_code height-32'
                                                        name="product_code[]">
                                                </td>
                                                <td
                                                    class='border-right p-2 text-13 align-top position-relative border-bottom border-top-0'>
                                                    <div class="d-flex align-items-center">
                                                        <input type="text" value="{{ $item_quote->product_name }}"
                                                            class='border-0 pl-0 pr-2 py-1 w-100 product_name height-32'
                                                            readonly autocomplete="off" name="product_name[]">
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
                                                <td
                                                    class='border-right p-2 text-13 align-top border-bottom border-top-0'>
                                                    <input type="text" autocomplete="off" readonly
                                                        value="{{ $item_quote->product_unit }}"
                                                        class="border-0 px-2 py-1 w-100 product_unit height-32"
                                                        name="product_unit[]">
                                                </td>
                                                <td
                                                    class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                                    <div class="d-flex align-items-center">
                                                        <div class="">
                                                            <input type="text" readonly
                                                                data-row="row{{ $item_quote->product_id }}"
                                                                value="{{ is_int($item_quote->deliver_qty) ? $item_quote->deliver_qty : rtrim(rtrim(number_format($item_quote->deliver_qty, 4, '.', ''), '0'), '.') }}"
                                                                class='text-right border-0 pl-2 pr-0 py-1 w-100 quantity-input height-32'
                                                                autocomplete="off" name="product_qty[]">
                                                            <input type="hidden" class="tonkho">
                                                        </div>
                                                    </div>
                                                    @if ($item_quote->type != 2)
                                                        <div class='text-13-blue inventory text-right mt-3'>Tồn kho:
                                                            <span
                                                                class='pl-1 soTonKho'>{{ is_int($item_quote->product_inventory) ? $item_quote->product_inventory : rtrim(rtrim(number_format($item_quote->product_inventory, 4, '.', ''), '0'), '.') }}
                                                            </span>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td
                                                    class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        @if ($item_quote->check_seri == 1)
                                                            <a href="#" class="btn btn-primary sn1 activity"
                                                                data-name1="GH" data-des="Xem S/N sản phẩm"
                                                                data-row="row{{ $item_quote->product_id }}"
                                                                data-toggle="modal"
                                                                data-target="#exampleModal{{ $item_quote->product_id }}"
                                                                style="background:transparent; border:none;">
                                                                <div class="sn--modal pt-2">
                                                                    <span class="border-span--modal">SN</span>
                                                                </div>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td
                                                    class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                                    <input type="text"
                                                        value="{{ number_format($item_quote->price_export) }}"
                                                        class="text-right border-0 px-2 py-1 w-100 product_price height-32"
                                                        autocomplete="off" name="product_price[]" readonly>
                                                    <a href="#" class="activity" data-name1="GH"
                                                        data-des="Xem giao dịch gần đây">
                                                        <div class="mt-3 text-13-blue recentModal text-right"
                                                            data-toggle="modal" data-target="#recentModal"
                                                            style="">
                                                            Giao dịch gần đây
                                                        </div>
                                                    </a>
                                                </td>
                                                <td
                                                    class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                                    @php
                                                        $promotionArray = json_decode($item_quote->promotion, true);
                                                        $promotionValue = isset($promotionArray['value'])
                                                            ? $promotionArray['value']
                                                            : '';
                                                        $promotionOption = isset($promotionArray['type'])
                                                            ? $promotionArray['type']
                                                            : '';
                                                    @endphp
                                                    <div>
                                                        <input type="text"
                                                            class="border-0 px-2 py-1 w-100 text-right height-32 promotion"
                                                            name="promotion[]"
                                                            value="{{ $promotionValue ? number_format($promotionValue) : 0 }}">
                                                    </div>
                                                    <div class="mt-3 text-13-blue text-right">
                                                        <select class="border-0 promotion-option"
                                                            name="promotion-option[]">
                                                            <option value="1"
                                                                @if ($promotionOption == 1) selected @endif>
                                                                Nhập tiền </option>
                                                            <option value="2"
                                                                @if ($promotionOption == 2) selected @endif>
                                                                Nhập %</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td
                                                    class="border-right p-2 text-13 align-top text-center border-bottom border-top-0">
                                                    <select name="product_tax[]"
                                                        class="border-0 text-center product_tax height-32" disabled>
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
                                                <td
                                                    class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                                    <input type="text" readonly=""
                                                        value="{{ number_format($item_quote->product_total) }}"
                                                        class='text-right border-0 px-2 py-1 w-100 total-amount height-32'>
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
                                                <td class="p-2 note text-13 align-top border-bottom border-top-0">
                                                    <input type="text" class='border-0 py-1 w-100 height-32'
                                                        readonly name="product_note[]"
                                                        value="{{ $item_quote->product_note }}">
                                                </td>
                                                <td style="display:none;" class="">
                                                    <input type="text" class="product_tax1">
                                                </td>
                                                <td style="display:none;" class="">
                                                    <input type="text" class="type"
                                                        value="{{ $item_quote->type }}">
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
                                        @if ($delivery != '')
                                            @php
                                                $promotionArray = json_decode($delivery->promotion_delivery, true);
                                                $promotionValue = isset($promotionArray['value'])
                                                    ? $promotionArray['value']
                                                    : '';
                                                $promotionOption = isset($promotionArray['type'])
                                                    ? $promotionArray['type']
                                                    : '';
                                            @endphp
                                        @endif
                                        <div class="d-flex justify-content-between mt-2 align-items-center">
                                            <span class="text-13-black">Khuyến mãi</span>
                                            <input name="promotion-total" type="text"
                                                class="text-table border-0 text-right promotion-total"
                                                style="background-color:#F0F4FF "
                                                @if ($delivery != '') @php
        $promotionValue = is_numeric($promotionValue) ? (float) $promotionValue : 0;
    @endphp
    value="{{ $promotionValue ? number_format($promotionValue) : 0 }}" @endif>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2 align-items-center">
                                            <span class="text-13-black">Hình thức</span>
                                            <select name="promotion-option-total" id=""
                                                class="border-0 promotion-option-total">
                                                <option value="1"
                                                    @if ($delivery != '' && $promotionOption == 1) selected @endif>
                                                    Nhập tiền
                                                </option>
                                                <option value="2"
                                                    @if ($delivery != '' && $promotionOption == 2) selected @endif>
                                                    Nhập %
                                                </option>
                                            </select>
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
</form>
<div id="files" class="tab-pane fade">
    <div id="title--fixed" class="content-title--fixed top-111">
        <p class="font-weight-bold text-uppercase info-chung--heading text-center">FILE ĐÍNH KÈM</p>
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
                    <div class="modal-body px-0 pb-4 pt-0 m-0">
                        <table id="table_SNS" class="w-100">
                            <thead>
                                <tr>
                                    <th class="border border-right-0 pl-3 py-1 border-top-0 border-checkbox">
                                        <input type="checkbox">
                                    </th>
                                    <th class="border border-right-0 border-top-0 border-left-0 py-1 text-secondary">
                                        STT</th>
                                    <th class="border border-left-0 border-top-0 py-1 text-secondary">Serial
                                        number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $stt = 1;
                                @endphp
                                @foreach ($serinumber as $item_seri)
                                    @if ($item->product_id == $item_seri->product_id)
                                        <tr>
                                            <td class="border-bottom pl-3 border-checkbox">
                                                <input name="id_seri[]"
                                                    {{ $item_seri->detailexport_id == $delivery->detailexport_id ? 'checked' : '' }}
                                                    type="checkbox" class="check-item" disabled
                                                    data-product-id={{ $item_seri->product_id }}
                                                    value="{{ $item_seri->idSeri }}">
                                            </td>
                                            <td class="border-bottom">{{ $stt++ }}</td>
                                            <td class="border-bottom">
                                                <input readonly class="form-control w-100" type="text"
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
<div class="content">
    <div id="mySidenav" class="sidenav border top-109">
        <div id="show_info_Guest">
            <div class="bg-filter-search border-0 text-center" style="height: 55px">
                <p class="font-weight-bold text-uppercase info-chung--heading text-center">
                    THÔNG TIN KHÁCH HÀNG
                </p>
            </div>
            <div class="content-info">
                <div class="d-flex justify-content-between py-2 px-3 border-bottom border-top align-items-center text-left text-nowrap"
                    style="height:44px;" style="height:44px;">
                    <span class="text-13 btn-click" style="flex: 1.5;">Số báo giá</span>
                    <span class="mx-1 text-13" style="flex: 2;">
                        <input type="text" placeholder="Chọn thông tin" readonly
                            value="{{ $delivery->quotation_number }}"
                            class="border-0 w-100 bg-input-guest py-2 px-2 numberQute"
                            style="background-color:#F0F4FF; border-radius:4px;" id="myInput" autocomplete="off"
                            name="quotation_number">
                    </span>
                </div>
            </div>
            <div class="content-info--common" id="show-info-guest">
                <ul class="p-0 m-0 ">
                    <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                        style="height:44px;">
                        <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Khách hàng</span>
                        <input readonly class="text-13-black w-50 border-0 bg-input-guest"
                            value="{{ $delivery->guest_name }}" style="flex:2;" id="myInput">
                        <input type="hidden" class="idGuest" autocomplete="off" name="guest_id">
                    </li>
                    <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                        style="height:44px;">
                        <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Người đại diện</span>
                        <input class="text-13-black w-50 border-0 bg-input-guest" style="flex:2;"
                            value="{{ $delivery->represent_name }}" readonly />
                    </li>
                    <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                        style="height:44px;">
                        <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Mã giao hàng</span>
                        <input class="text-13-black w-50 border-0 bg-input-guest" style="flex:2;"
                            placeholder="Nhập thông tin" value="{{ $delivery->code_delivery }}" readonly />
                    </li>
                    <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                        style="height:44px;">
                        <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Đơn vị vận chuyển</span>
                        <input type="text" class="text-13-black w-50 border-0 bg-input-guest" <?php if ($delivery->tinhTrang == 2) {
                            echo 'readonly';
                        } ?>
                            placeholder="Nhập thông tin" name="shipping_unit" style="flex:2;"
                            value="{{ $delivery->shipping_unit }}" />
                    </li>
                    <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                        style="height:44px;">
                        <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Phí giao hàng</span>
                        <input type="text" class="text-13-black w-50 border-0 shipping_fee bg-input-guest"
                            style="flex:2;" placeholder="Nhập thông tin" name="shipping_fee"
                            placeholder="Nhập thông tin" value="{{ number_format($delivery->shipping_fee) }}" />
                    </li>
                    <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                        style="height:44px;">
                        <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày giao hàng</span>
                        <input type="text" readonly class="text-13-black w-50 border-0 bg-input-guest"
                            name="date_deliver" style="flex:2;"
                            value="{{ date_format(new DateTime($delivery->ngayGiao), 'd/m/Y') }}" />
                    </li>
                </ul>
            </div>
        </div>
        <div id="files" class="tab-pane fade">
            <div class="bg-filter-search border-bottom-0 text-center py-2 border-right-0">
                <span class="font-weight-bold text-secondary text-nav">FILE ĐÍNH KÈM</span>
            </div>
            <x-form-attachment :value="$delivery" name="GH"></x-form-attachment>
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
{{-- Modal giao dịch gần đây --}}
<div class="modal fade" id="recentModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-bold">Giao dịch gần đây</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="outer text-nowrap" style="scrollbar-width: inherit;">
                    <table id="example2" class="table table-hover bg-white rounded">
                        <thead>
                            <tr>
                                <th scope="col" class="height-52">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Tên sản phẩm
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                                <th scope="col" class="height-52">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Khách hàng
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                                <th scope="col" class="height-52">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Giá bán
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                                <th scope="col" class="height-52">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Thuế
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                                <th scope="col" class="height-52">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Ngày bán
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<x-user-flow></x-user-flow>
<script>
    $('#file_restore').on('change', function(e) {
        e.preventDefault();
        $('#deliveryForm').attr('action', '{{ route('addAttachment') }}');
        // $('#formSubmit').attr('method', 'HEAD');
        $('input[name="_method"]').remove();
        $('#deliveryForm')[0].submit();
        var name = 'GH';
        var des = 'Đính kèm file';
        $.ajax({
            url: '{{ route('addActivity') }}',
            type: 'GET',
            data: {
                name: name,
                des: des,
            },
            success: function(data) {}
        });
    })
    //Xem giao dịch gần đây
    $('.recentModal').click(function() {
        var idProduct = $(this).closest('tr').find('.product_id').val();
        $.ajax({
            url: '{{ route('getRecentTransaction') }}',
            type: 'GET',
            data: {
                idProduct: idProduct
            },
            success: function(data) {
                if (Array.isArray(data) && data.length > 0) {
                    $('#recentModal .modal-body tbody').empty();
                    data.forEach(function(productData) {
                        var newRow = $(
                            '<tr class="position-relative">' +
                            '<td class="text-13-black" id="productName"></td>' +
                            '<td class="text-13-black" id="guestName"></td>' +
                            '<td class="text-13-black" id="productPrice"></td>' +
                            '<td class="text-13-black" id="productTax"></td>' +
                            '<td class="text-13-black" id="dateProduct"></td>' +
                            '</tr>');
                        newRow.find('#productName').text(productData
                            .product_name);
                        newRow.find('#guestName').text(productData
                            .guest_name);
                        newRow.find('#productPrice').text(
                            formatCurrency(productData
                                .price_export));
                        newRow.find('#productTax').text(
                            productData.product_tax == 99 ?
                            'NOVAT' : productData.product_tax +
                            '%');
                        var formattedDate = new Date(productData
                            .created_at).toLocaleDateString(
                            'vi-VN');
                        newRow.find('#dateProduct').text(
                            formattedDate);
                        newRow.appendTo(
                            '#recentModal .modal-body tbody');
                    });
                } else {
                    $('#recentModal .modal-body tbody').empty();
                }
            }
        });
    });
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
        $('.addProduct').each(function() {
            var productQty = parseFloat($(this).find('.quantity-input').val());
            var productPriceElement = $(this).find('[name^="product_price"]');
            var productPrice = 0;
            var giaNhap = 0;
            var taxValue = parseFloat($(this).find('.product_tax option:selected').val());
            var heSoNhan = parseFloat($(this).find('.heSoNhan').val()) || 0;
            var giaNhapElement = $(this).find('.giaNhap');
            var discountInput = $(this).find('[name^="promotion[]"]').val().replace(/,/g, '') || 0;
            var discountOption = $(this).find('[name^="promotion-option[]"]').val() || 0;
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

            if (!isNaN(productQty) && !isNaN(taxValue) && !isNaN(productPrice)) {
                if (giaNhap > 0) {
                    var donGia = ((heSoNhan + 100) * giaNhap) / 100;
                } else {
                    var donGia = productPrice;
                }
                var rowTotal = productQty * donGia;
                // Apply discount
                if (discountOption == 1) {
                    rowTotal -= discountInput;
                } else if (discountOption == 2) {
                    rowTotal -= (rowTotal * discountInput) / 100;
                }
                var rowTax = (rowTotal * taxValue) / 100;
                // Round the tax
                rowTax = Math.round(rowTax);
                $(this).find('.product_tax1').val(formatCurrency(rowTax));
                // Display the results
                $(this).find('.total-amount').val(formatCurrency(Math.round(rowTotal)));
                $(this).find('.product_price').val(formatCurrency(donGia));
                // Accumulate into totalAmount and totalTax
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
        var promotionOption = $('select[name="promotion-option-total"]').val();
        var promotionTotal = parseFloat($('input[name="promotion-total"]').val().replace(/[^0-9.-]+/g, "")) || 0;
        if (!isNaN(totalAmount) || !isNaN(totalTax)) {
            var grandTotal = totalAmount + totalTax;
            if (promotionOption == 1) {
                grandTotal -= promotionTotal;
            } else if (promotionOption == 2) {
                grandTotal -= (grandTotal * promotionTotal) / 100;
            }
            grandTotal = Math.round(grandTotal); // Làm tròn thành số nguyên
            $('#grand-total').text(formatCurrency(Math.round(grandTotal)));
            // Cập nhật giá trị data-value
        }
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
            var type = row.querySelector('.type');

            // Kiểm tra xem phần tử có tồn tại không
            if (quantityInput && soTonKhoElement && productNameInput) {
                var quantityValue = parseInt(quantityInput.value);
                var soTonKho = parseInt(soTonKhoElement.innerText);
                var productName = productNameInput.value;
                var type = type.value;

                if (type != 2) {
                    if (quantityValue > soTonKho) {
                        invalidProducts.push(productName);
                    }
                }

                // Kiểm tra xem có thẻ tr nào có class addProduct không
                if (row.classList.contains('addProduct')) {
                    hasProducts = true;
                }
            }
        }

        // Hiển thị thông báo nếu không có sản phẩm
        if (!hasProducts) {
            showAutoToast("warning", "Không có sản phẩm để giao");
            event.preventDefault();
        }

        // Hiển thị thông báo cuối cùng nếu có sản phẩm không hợp lệ
        if (invalidProducts.length > 0) {
            showAutoToast("warning", "Không đủ số lượng tồn kho cho các sản phẩm:\n" + invalidProducts.join(', '));
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
    $('body').on('input', '.product_price, #transport_fee, .giaNhap, #voucher, .shipping_fee', function(event) {
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
