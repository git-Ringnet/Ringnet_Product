<x-navbar :title="$title" activeGroup="buy" activeName="paymentorder"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<form action="{{ route('paymentOrder.update', ['workspace' => $workspacename, 'paymentOrder' => $payment->id]) }}"
    method="POST" id="formSubmit" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="content-wrapper--2Column m-0">
        <!-- Content Header (Page header) -->
        <input type="hidden" name="detailimport_id" id="detailimport_id" value="{{ $payment->detailimport_id }}">
        <input type="hidden" name="detail_id" value="{{ $payment->id }}">
        <input type="hidden" name="table_name" value="TTMH">
        <div class="content-header-fixed p-0 margin-250">
            <div class="content__header--inner margin-left32">
                <div class="content__heading--left">
                    <span>Mua hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="nearLast-span">Thanh toán mua hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="last-span">{{ $payment->payment_code }} </span>
                    @if ($payment->status == 1)
                        @if ($payment->payment > 0)
                            <span style="color: #858585; font-size:13px;" class="btn-status">Thanh toán một phần</span>
                        @else
                            <span style="color: #858585; font-size:13px;" class="btn-status">Chưa thanh toán</span>
                        @endif
                    @elseif($payment->status == 2)
                        <span style="color: #08AA36; font-size:13px;" class="btn-status">Thanh toán đủ</span>
                    @elseif($payment->status == 3)
                        <span style="color: #0052CC; font-size:13px;" class="btn-status">Đến hạn</span>
                    @elseif($payment->status == 4)
                        <span style="color:#EC212D; font-size:13px;" class="btn-status">Quá hạn</span>
                    @elseif($payment->status == 5)
                        <span style="color: #0052CC; font-size:13px;" class="btn-status">Đến hạn</span>
                    @else
                        <span style="color: #0052CC; font-size:13px;" class="btn-status">Đặt cọc</span>
                    @endif

                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <a href="{{ route('paymentOrder.index', $workspacename) }}" class="user_flow" data-type="TTMH"
                            data-des="Trở về">
                            <button class="btn-destroy btn-light mx-1 d-flex align-items-center h-100" type="button">
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

                        <label class="btn-destroy btn-light d-flex align-items-center h-100 m-0 mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                fill="none">
                                <path
                                    d="M9.30639 10.2059C9.57305 10.4725 9.59528 10.8911 9.37306 11.183L9.30639 11.2593L6.84832 13.7174C5.58773 14.978 3.54392 14.978 2.28333 13.7174C1.06621 12.5003 1.02425 10.553 2.15742 9.2855L2.28333 9.15237L4.7414 6.69429C5.03231 6.40339 5.50396 6.40339 5.79486 6.69429C6.06152 6.96096 6.08375 7.37949 5.86153 7.67147L5.79486 7.74775L3.33679 10.2059C2.65801 10.8846 2.65801 11.9852 3.33679 12.6639C3.98163 13.3088 5.00709 13.341 5.68999 12.7607L5.79486 12.6639L8.25293 10.2059C8.54384 9.91492 9.01549 9.91492 9.30639 10.2059ZM9.83063 6.17005C10.1215 6.46095 10.1215 6.9326 9.83063 7.22351L7.35002 9.70413C7.05911 9.99504 6.58746 9.99504 6.29656 9.70413C6.00565 9.41323 6.00565 8.94158 6.29656 8.65067L8.77718 6.17005C9.06808 5.87914 9.53973 5.87914 9.83063 6.17005ZM13.7183 2.28236C14.9354 3.49948 14.9774 5.44674 13.8442 6.71422L13.7183 6.84735L11.2602 9.30543C10.9693 9.59633 10.4977 9.59633 10.2068 9.30543C9.94012 9.03877 9.9179 8.62023 10.1401 8.32825L10.2068 8.25197L12.6648 5.79389C13.3436 5.11511 13.3436 4.0146 12.6648 3.33582C12.02 2.69098 10.9946 2.65874 10.3117 3.23909L10.2068 3.33582L7.74872 5.79389C7.45781 6.0848 6.98616 6.0848 6.69526 5.79389C6.4286 5.52723 6.40637 5.10869 6.62859 4.81672L6.69526 4.74043L9.15333 2.28236C10.4139 1.02177 12.4577 1.02177 13.7183 2.28236Z"
                                    fill="#6D7075"></path>
                            </svg>
                            <span class="text-btnIner-primary ml-2">Đính kèm</span>
                            <input type="file" style="display: none;" id="file_restore" accept="*"
                                name="file">
                        </label>


                        <a href="#">
                            <button type="submit"
                                class="custom-btn btn-light rounded mx-1 d-flex align-items-center h-100">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        viewBox="0 0 14 14" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                            fill="white"></path>
                                    </svg>
                                </span>
                                <span class="text-btnIner-primary ml-2">Xác nhận</span>
                            </button>
                        </a>

                        {{-- <div class="dropdown">
                            <button type="button"
                                class="btn-destroy btn-light d-flex align-items-center h-100 mx-1 bg-click"
                                id="btnCreateFast">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="4"
                                        viewBox="0 0 18 4" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M18 2C18 0.89543 17.1046 0 16 0C14.8954 0 14 0.89543 14 2C14 3.10457 14.8954 4 16 4C17.1046 4 18 3.10457 18 2Z"
                                            fill="#26273B" fill-opacity="0.8"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11 2C11 0.89543 10.1046 0 9 0C7.89543 0 7 0.89543 7 2C7 3.10457 7.89543 4 9 4C10.1046 4 11 3.10457 11 2Z"
                                            fill="#26273B" fill-opacity="0.8"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4 2C4 0.89543 3.10457 0 2 0C0.895431 0 0 0.89543 0 2C0 3.10457 0.895431 4 2 4C3.10457 4 4 3.10457 4 2Z"
                                            fill="#26273B" fill-opacity="0.8"></path>
                                    </svg>
                                </span>
                            </button>
                            <div class="bg-white position-absolute rounded shadow p-2 z-index-block"
                                style="z-index:99;width: 160px;top: 20px;right: 4px; display:none;"
                                id="listBtnCreateFast">
                                <ul class="m-0 p-0 scroll-data">
                                    <li class="p-1 align-items-left text-wrap w-100" style="border-radius:4px;">
                                        <button type="submit" id="delete_payment" class="border-0 w-100 text-left"
                                            style="background: none;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M12.3687 6.5C12.6448 6.5 12.8687 6.72386 12.8687 7C12.8687 7.03856 12.8642 7.07699 12.8554 7.11452L11.3628 13.4581C11.1502 14.3615 10.3441 15 9.41597 15H6.58403C5.65593 15 4.84977 14.3615 4.6372 13.4581L3.14459 7.11452C3.08135 6.84572 3.24798 6.57654 3.51678 6.51329C3.55431 6.50446 3.59274 6.5 3.6313 6.5H12.3687ZM8.5 1C9.88071 1 11 2.11929 11 3.5H13C13.5523 3.5 14 3.94772 14 4.5V5C14 5.27614 13.7761 5.5 13.5 5.5H2.5C2.22386 5.5 2 5.27614 2 5V4.5C2 3.94772 2.44772 3.5 3 3.5H5C5 2.11929 6.11929 1 7.5 1H8.5ZM8.5 2.5H7.5C6.94772 2.5 6.5 2.94772 6.5 3.5H9.5C9.5 2.94772 9.05228 2.5 8.5 2.5Z"
                                                    fill="#26273B" fill-opacity="0.8"></path>
                                            </svg>
                                            <span class="text-btnIner-primary ml-2"
                                                style="font-weight: 600;color: #000; font-size:13px">Xóa</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
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
                                            <button type="submit" id="delete_payment"
                                                class="btn-save-print border-0 p-2 d-flex mx-1 align-items-center h-100 w-100"
                                                style="background: none;">
                                                <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" viewBox="0 0 16 16" fill="none">
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

                        <button id="sideProvide" type="button" class="btn-option border-0 mx-1">
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
                        <ul class="header-options--nav nav nav-tabs margin-left32">
                            <li class="user_flow" data-type="TTMH" data-des="Xem thông tin">
                                <a class="text-secondary active m-0 pl-3" data-toggle="tab" href="#info">Thông
                                    tin</a>
                            </li>
                            <li class="user_flow" data-type="TTMH" data-des="Lịch sử thanh toán">
                                <a class="text-secondary m-0 pl-3 pr-3" data-toggle="tab" href="#history">Lịch sử
                                    thanh toán</a>
                            </li>
                            <li class="user_flow" data-type="TTMH" data-des="File đính kèm">
                                <a class="text-secondary m-0 pr-3" data-toggle="tab" href="#files">File đính kèm</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

        </div>
        <div class="content margin-top-38" id="main">
            <div class="container-fluided margin-250">
                <div class="tab-content">
                    <div id="info" class="content tab-pane in active">
                        <div id="title--fixed" class="content-title--fixed top-111 text-center">
                            <p class="font-weight-bold text-uppercase info-chung--heading text-center">
                                THÔNG TIN SẢN PHẨM</p>
                        </div>
                        <section class="content margin-top-103">
                            <div class="content-info position-relative table-responsive text-nowrap">
                                <table id="inputcontent" class="table table-hover bg-white rounded">
                                    <thead>
                                        <tr style="height:44px;">
                                            <th class="border-right p-2" style="width: 15%;">
                                                <input class="checkall-btn ml-4 mr-1" id="checkall" type="checkbox">
                                                <span class="text-13 "> Mã sản phẩm</span>
                                            </th>
                                            <th class="border-right p-2" style="width: 16%;">
                                                <span class="text-13">Tên sản phẩm</span>
                                            </th>
                                            <th class="border-right p-2" style="width: 10%;">
                                                <span class="text-13"> Đơn vị</span>
                                            </th>
                                            <th class="border-right p-2 text-right" style="width: 10%;">
                                                <span class="text-13"> Số lượng</span>
                                            </th>
                                            <th class="border-right p-2 text-right" style="width: 15%;">
                                                <span class="text-13">Đơn giá</span>
                                            </th>
                                            <th class="border-right p-2 text-center" style="width: 10%;">
                                                <span class="text-13">Thuế</span>
                                            </th>
                                            <th class="border-right p-2 text-right" style="width: 12%;">
                                                <span class="text-13">Thành tiền</span>
                                            </th>
                                            <th class="note p-2">
                                                <span class="text-13">Ghi chú</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product as $item)
                                            <tr class="bg-white" style="height:80px;">
                                                <td
                                                    class="border border-left-0 border-top-0 p-2 align-top position-relative">
                                                    <div
                                                        class="d-flex w-100 justify-content-between align-items-center">
                                                        <input class="checkall-btn ml-4 mr-1" id="checkall"
                                                            type="checkbox">
                                                        <input type="text" autocomplete="off" readonly
                                                            value="{{ $item->product_code }}"
                                                            class="height-32 border-0 px-2 py-1 w-75 product_code w-100 text-13-black "
                                                            name="product_code[]">
                                                </td>
                                                <td
                                                    class="border-right p-2 text-13 align-top position-relative border-bottom border-top-0">
                                                    <div class="d-flex align-items-center">
                                                        <input type="text"
                                                            class="searchProductName w-100 border-0 px-2 py-1 height-32"
                                                            value="{{ $item->product_name }}" readonly
                                                            name="product_name[]">
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
                                                    class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                                    <input type="text" autocomplete="off" readonly
                                                        value="{{ $item->product_unit }}"
                                                        class="border-0 px-2 py-1 w-100 product_unit height-32">
                                                </td>
                                                <td
                                                    class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <input type="text"
                                                            class="border-0 px-2 py-1 w-100 quantity-input text-right height-32"
                                                            value="{{ number_format($item->product_qty) }}" readonly>
                                                    </div>
                                                    <div class="mt-3 text-13-blue inventory text-right">Tồn kho: <span
                                                            class="pl-1 soTonKho">{{ number_format($item->inventory) }}</span>
                                                    </div>
                                                </td>
                                                <td
                                                    class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                                    <div>
                                                        <input readonly type="text" name="price_export[]"
                                                            class="border-0 px-2 py-1 w-100 price_export text-right height-32"
                                                            value="{{ number_format($item->price_export) }}">
                                                    </div>
                                                    <div class='mt-3 text-13-blue transaction text-right'
                                                        id="transaction" data-toggle="modal"
                                                        data-target="#recentModal">Giao dịch gần
                                                        đây</div>
                                                </td>
                                                <td
                                                    class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                                    <input readonly type="text"
                                                        class="border-0 px-2 py-1 w-100 product_tax text-center height-32"
                                                        disabled
                                                        value="{{ $item->product_tax == 99 ? 'NOVAT' : $item->product_tax }} %">
                                                </td>
                                                <input type="hidden" class="product_tax1">

                                                <td
                                                    class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                                    <input readonly type="text" name="" id=""
                                                        class="border-0 px-2 py-1 w-100 total_price text-right height-32"
                                                        value="{{ number_format($item->product_total) }}">
                                                </td>
                                                <td
                                                    class="text-center bg-white align-top text-13-black border-bottom border-top-0">
                                                    <input readonly type="text"
                                                        class="border-0 px-2 py-1 w-100 height-32"
                                                        value="{{ $item->product_note }}" placeholder='Nhập ghi chú'>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </section>
                        <?php $import = '123'; ?>
                        <x-formsynthetic :import="$import"></x-formsynthetic>
                    </div>

                    <div id="history" class="tab-pane fade">
                        <div id="title--fixed" class="content-title--fixed top-111">
                            <p class="font-weight-bold text-uppercase info-chung--heading text-center">Lịch sử thanh
                                toán</p>
                        </div>
                        <section class="content margin-top-103">
                            <div class="outer container-fluided">
                                <table class="table table-hover bg-white rounded" id="inputcontent">
                                    <thead>
                                        <tr style="height:44px;">
                                            <th class="text-table text-secondary p-2 border-right border-bottom"
                                                style="padding-left: 2rem !important;">Mã thanh toán</th>
                                            <th class="text-table text-secondary p-2 border-right border-bottom">Ngày
                                                thanh toán</th>
                                            <th
                                                class="text-table text-secondary p-2 border-right border-bottom text-right">
                                                Tổng tiền
                                            </th>
                                            <th
                                                class="text-table text-secondary p-2 border-right border-bottom text-right">
                                                Thanh
                                                toán</th>
                                            <th class="text-table text-secondary p-2 text-right border-bottom">Dư nợ
                                            </th>
                                            <th class="text-table text-secondary p-2 border-left border-bottom">Hình
                                                thức</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($history as $htr)
                                            <tr class="bg-white">
                                                <td class="border-right text-13-black border-bottom border-top-0"
                                                    style="padding-left: 2rem !important;">{{ $htr->payment_code }}
                                                </td>
                                                <td class="border-right text-13-black border-bottom border-top-0">
                                                    {{ date_format(new DateTime($htr->created_at), 'd-m-Y H:i:s') }}
                                                </td>
                                                <td
                                                    class="border-right text-13-black border-bottom border-top-0 text-right">
                                                    {{ fmod($htr->total, 2) > 0 && fmod($htr->total, 1) > 0 ? number_format($htr->total, 2, '.', ',') : number_format($htr->total) }}
                                                </td>
                                                <td
                                                    class="border-right text-13-black border-bottom border-top-0 text-right">
                                                    {{ fmod($htr->payment, 2) > 0 && fmod($htr->payment, 1) > 0 ? number_format($htr->payment, 2, '.', ',') : number_format($htr->payment) }}
                                                </td>
                                                <td class="text-13-black border-bottom text-right border-top-0">
                                                    {{ fmod($htr->debt, 2) > 0 && fmod($htr->debt, 1) > 0 ? number_format($htr->debt, 2, '.', ',') : number_format($htr->debt) }}
                                                </td>
                                                <td class="text-13-black border-bottom border-left border-top-0">
                                                    {{ $htr->payment_type }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>

                    <div id="files" class="tab-pane fade">
                        <div class="content-title--fixed top-111">
                            <p class="font-weight-bold text-uppercase info-chung--heading text-center">FILE ĐÍNH KÈM
                            </p>
                        </div>
                        <x-form-attachment :value="$payment" name="TTMH"></x-form-attachment>
                    </div>

                </div>
            </div>
        </div>
        <div class="content-wrapper2 px-0 py-0">
            <div id="mySidenav" class="sidenav border top-109">
                <div id="show_info_Guest">
                    <div class="bg-filter-search border-0 text-center">
                        <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN NHÀ CUNG
                            CẤP</p>
                    </div>

                    <div class="d-flex justify-content-between py-2 px-3 border-top border-bottom align-items-center text-left text-nowrap position-relative"
                        style="height:45px;">
                        <span class="text-13 btn-click" style="flex: 1.5;">Đơn mua hàng</span>
                        <span class="mx-1 text-13" style="flex: 2;">

                            <input type="text" placeholder="Chọn thông tin" id="search_quotation"
                                class="border-0 w-100 bg-input-guest py-2 px-2 nameGuest search_quotation"
                                style="background-color:#F0F4FF; border-radius:4px;" name="quotation_number"
                                autocomplete="off" readonly value="{{ $payment->getQuotation->quotation_number }}">
                        </span>
                    </div>

                    <div class="">
                        <ul class="p-0 m-0">
                            <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Nhà cung cấp</span>
                                <input type="text"
                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                    style="flex:2;" readonly id="provide_name" {{-- value="{{ $payment->getProvideName->provide_name_display }}" --}}
                                    value="@if ($payment->getQuotation) {{ $payment->getQuotation->provide_name }} @endif"
                                    placeholder="Chọn thông tin" />
                            </li>

                            <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Người đại diện</span>
                                <input type="text"
                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                    style="flex:2;" id="represent" readonly placeholder="Chọn thông tin"
                                    @if ($nameRepresent) value="{{ $nameRepresent }}" @endif />
                            </li>

                            <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Mã thanh toán</span>
                                <input type="text" placeholder="Chọn thông tin" required
                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                    style="flex:2; background-color:#F0F4FF; border-radius:4px;"
                                    value="{{ $payment->payment_code }}" name="payment_code" />
                            </li>

                            <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Hạn thanh toán</span>

                                <input id="datePicker" type="text" placeholder="Chọn thông tin"
                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                    style="flex:2;"
                                    value="{{ date_format(new DateTime($payment->payment_date), 'd/m/Y') }}" />

                                <input type="hidden" name="payment_date" id="hiddenDateInput"
                                    value="{{ $payment->formatDate($payment->payment_date)->format('Y-m-d') }}">
                            </li>

                            <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày thanh toán</span>

                                <input id="datePickerDay" type="text" placeholder="Chọn thông tin"
                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                    style="flex:2;"
                                    value="{{ date_format(new DateTime($payment->payment_day), 'd/m/Y') }}" />

                                <input type="hidden" name="payment_day" id="hiddenDateInputDay"
                                    value="{{ $payment->formatDate($payment->payment_day)->format('Y-m-d') }}">
                            </li>

                            <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap" style="flex: 1.5;">Hình thức t.toán</span>
                                <select name="payment_type" id="" class="border-0 text-13"
                                    style="width:55%;">
                                    <option value="Tiền mặt" @if ($payment->payment_type == 'Tiền mặt') selected @endif>Tiền mặt
                                    </option>
                                    <option value="UNC" @if ($payment->payment_type == 'UNC') selected @endif>UNC
                                    </option>
                                </select>

                            </li>


                            <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left border-top-0"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Tổng tiền</span>
                                <input type="text" placeholder="Chọn thông tin" name="delivery_charges" readonly
                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                    style="flex:2;" value="{{ number_format($payment->total) }}" />
                            </li>

                            <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left bordr-top-0"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Đã thanh toán</span>
                                <input id="text" type="text" placeholder="Chọn thông tin"
                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                    style="flex:2;" value="{{ number_format($payment->payment) }}" name="payment" />
                            </li>

                            <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left border-top-0"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Dư nợ</span>
                                <input type="text" placeholder="Chọn thông tin" name="debt" required
                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                    style="flex:2;" value="{{ number_format($payment->debt) }}" />
                            </li>
                            {{-- @dd($payment->debt) --}}
                            <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left border-top-0"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Thanh toán</span>
                                <input id="prepayment" type="text" placeholder="Chọn thông tin" name="payment"
                                    oninput="checkQty(this,{{ $payment->debt }})"
                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2 payment_input bg-input-guest-blue"
                                    style="flex:2;" />
                            </li>


                            <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left border-top-0"
                                style="height:44px;">
                                <span class="mx-1 text-13 d-flex align-items-center" style="flex: 2;">
                                    <input type="checkbox" name="payment_all" onclick="cbPayment(this)"
                                        @if ($payment->debt == 0) disabled @endif>
                                    <span class="text-13 btn-click">Thanh toán đủ : <span
                                            class="payment_all">{{ number_format($payment->debt) }}</span></span>
                                </span>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="modal fade" id="recentModal" tabindex="-1" aria-labelledby="productModalLabel" style="display: none;"
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
                <div class="outer text-nowrap">
                    <table id="example2" class="table table-hover bg-white rounded">
                        <thead>
                            <tr>
                                <th scope="col" class="height-52 border-top">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Tên sản phẩm
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                                <th scope="col" class="height-52 border-top">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Nhà cung cấp
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                                <th scope="col" class="height-52 border-top">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Giá mua
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                                <th scope="col" class="height-52 border-top">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Thuế
                                            </button>
                                        </a>
                                        <div class="icon" id="icon-id"></div>
                                    </span>
                                </th>
                                <th scope="col" class="height-52 border-top">
                                    <span class="d-flex">
                                        <a href="#" class="sort-link" data-sort-by="id" data-sort-type="#">
                                            <button class="btn-sort text-13" type="submit">
                                                Ngày mua
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
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div> --}}
        </div>
    </div>
</div>


</div>
</div>

<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thông tin sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body product_show">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('/dist/js/import.js') }}"></script>
<script>
    // Hiển thị sản phẩm
    $(document).on('click', '.info-product', function() {
        $('#productModal .product_show').empty()
        var nameProduct = $(this).closest('td').find('input[name^="product_name"]').val()
        $.ajax({
            url: "{{ route('getHistoryImport') }}",
            type: 'GET',
            data: {
                product_name: nameProduct,
                type: "product"
            },
            success: function(data) {
                var modal_body = `
                <b>Tên sản phẩm: </b> ` + data['product'].product_name + `<br> 
                <b>Đơn vị: </b> ` + data['product'].product_unit + ` <br>
                <b>Tồn kho: </b> ` + formatCurrency(data['product'].product_inventory) + ` <br>
                <b>Thuế: </b> ` + (data['product'].product_tax == 99 ? "NOVAT" : data['product'].product_tax + '%') + `
                `;
                $('.product_show').append(modal_body)
            },
        });
    })


    $(document).on('click', '.transaction', function() {
        nameProduct = $(this).closest('tr').find('.searchProductName').val()
        $.ajax({
            url: "{{ route('getHistoryImport') }}",
            type: "get",
            data: {
                product_name: nameProduct,
            },
            success: function(data) {
                $('#recentModal .modal-body tbody').empty()
                if (data['history']) {
                    data['history'].forEach(
                        element => {
                            var tr = `
                                <tr>
                                    <td class="border-bottom">` + element.product_name + `</td>
                                    <td class="border-bottom">` + element.nameProvide + `</td>
                                    <td class="border-bottom">` + formatCurrency(element.price_export) + `</td>
                                    <td class="border-bottom">` + (element.product_tax == 99 ? "NOVAT" : element
                                .product_tax + "%") + `</td>
                                    <td class="border-bottom">` + new Date(element.created_at).toLocaleDateString(
                                'vi-VN'); + `</td>
                                </tr> `;
                            $('#recentModal .modal-body tbody').append(tr);
                        })
                }
            }
        })
    })

    flatpickr("#datePicker", {
        locale: "vn",
        dateFormat: "d/m/Y",
        onChange: function(selectedDates, dateStr, instance) {
            // Cập nhật giá trị của trường ẩn khi người dùng chọn ngày
            updateHiddenInput(selectedDates[0], instance, "hiddenDateInput");
        },
        onReady: function(selectedDates, dateStr, instance) {
            // Cập nhật giá trị của trường ẩn khi mở date picker
            updateHiddenInput(selectedDates[0], instance, "hiddenDateInput");
        },
    });

    flatpickr("#datePickerDay", {
        locale: "vn",
        dateFormat: "d/m/Y",
        onChange: function(selectedDates, dateStr, instance) {
            // Cập nhật giá trị của trường ẩn khi người dùng chọn ngày
            updateHiddenInput(selectedDates[0], instance, "hiddenDateInputDay");
        },
        onReady: function(selectedDates, dateStr, instance) {
            // Cập nhật giá trị của trường ẩn khi mở date picker
            updateHiddenInput(selectedDates[0], instance, "hiddenDateInputDay");
        }
    });

    function updateHiddenInput(selectedDate, instance, hiddenInputId) {
        // Lấy thời gian hiện tại
        var currentTime = new Date();

        // Cập nhật giá trị của trường ẩn với thời gian hiện tại và ngày đã chọn
        var selectedDateTime = new Date(selectedDate);
        selectedDateTime.setHours(currentTime.getHours());
        selectedDateTime.setMinutes(currentTime.getMinutes());
        selectedDateTime.setSeconds(currentTime.getSeconds());

        document.getElementById(hiddenInputId).value = instance.formatDate(selectedDateTime, "Y-m-d H:i:S");
    }

    // Xóa đơn hàng
    deleteImport('#delete_payment',
        '{{ route('paymentOrder.destroy', ['workspace' => $workspacename, 'paymentOrder' => $payment->id]) }}')
    $('#file_restore').on('change', function(e) {
        e.preventDefault();
        $('#formSubmit').attr('action', '{{ route('addAttachment') }}');
        $('input[name="_method"]').remove();
        $.ajax({
            url: "{{ route('addUserFlow') }}",
            type: "get",
            data: {
                type: "TTMH",
                des: "Đính kèm file"
            },
            success: function(data) {}
        })
        $('#formSubmit')[0].submit();
    })

    $('#listReceive').hide();
    $('.search_quotation').on('click', function() {
        $('#listReceive').show();
    })

    // $('.search-receive').on('click', function() {
    //     detail_id = $(this).attr('id');
    //     $.ajax({
    //         url: "{{ route('show_receive') }}",
    //         type: "get",
    //         data: {
    //             detail_id: detail_id
    //         },
    //         success: function(data) {
    //             $('#search_quotation').val(data.quotation_number);
    //             $('#provide_name').val(data.provide_name);
    //             $('#detailimport_id').val(data.id)
    //             $('#listReceive').hide();
    //             $.ajax({
    //                 url: "{{ route('getProduct') }}",
    //                 type: "get",
    //                 data: {
    //                     id: data.id
    //                 },
    //                 success: function(product) {
    //                     $('#inputcontent tbody').empty();
    //                     product.forEach(function(element) {
    //                         var tr =
    //                             `
    //                             <tr class="bg-white">
    //                                 <td class="border border-left-0 border-top-0 border-bottom-0">
    //                                 <input type="hidden" readonly= value="` + element.id +
    //                             `" name="listProduct[]">
    //                                 <div class="d-flex w-100 justify-content-between align-items-center position-relative">
    //                                     <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    //                                         <path fill-rule="evenodd" clip-rule="evenodd" d="M9 3C7.89543 3 7 3.89543 7 5C7 6.10457 7.89543 7 9 7C10.1046 7 11 6.10457 11 5C11 3.89543 10.1046 3 9 3Z" fill="#42526E"></path>
    //                                         <path fill-rule="evenodd" clip-rule="evenodd" d="M9 10C7.89543 10 7 10.8954 7 12C7 13.1046 7.89543 14 9 14C10.1046 14 11 13.1046 11 12C11 10.8954 10.1046 10 9 10Z" fill="#42526E"></path>
    //                                         <path fill-rule="evenodd" clip-rule="evenodd" d="M9 17C7.89543 17 7 17.8954 7 19C7 20.1046 7.89543 21 9 21C10.1046 21 11 20.1046 11 19C11 17.8954 10.1046 17 9 17Z" fill="#42526E"></path>
    //                                         <path fill-rule="evenodd" clip-rule="evenodd" d="M15 3C13.8954 3 13 3.89543 13 5C13 6.10457 13.8954 7 15 7C16.1046 7 17 6.10457 17 5C17 3.89543 16.1046 3 15 3Z" fill="#42526E"></path>
    //                                         <path fill-rule="evenodd" clip-rule="evenodd" d="M15 10C13.8954 10 13 10.8954 13 12C13 13.1046 13.8954 14 15 14C16.1046 14 17 13.1046 17 12C17 10.8954 16.1046 10 15 10Z" fill="#42526E"></path>
    //                                         <path fill-rule="evenodd" clip-rule="evenodd" d="M15 17C13.8954 17 13 17.8954 13 19C13 20.1046 13.8954 21 15 21C16.1046 21 17 20.1046 17 19C17 17.8954 16.1046 17 15 17Z" fill="#42526E"></path>
    //                                     </svg>
    //                                     <input type="checkbox">
    //                                     <input type="text" readonly name="product_code[]" class="border-0 px-2 py-1 w-75 searchProduct" value="">
    //                                     <ul id="listProductCode" class="listProductCode bg-white position-absolute w-100 rounded shadow p-0 scroll-data" style="z-index: 99; left: 24%; top: 75%;">
    //                                     </ul>
    //                                 </div>
    //                             </td> 
    //                             <td class="border border-top-0 border-bottom-0 position-relative">
    //                                 <input readonly id="searchProductName" type="text" name="product_name[]" class="searchProductName border-0 px-2 py-1 w-100" value="` +
    //                             element.product_name +
    //                             `">
    //                             </td>   
    //                             <td> 
    //                                 <input readonly type="text" name="product_unit[]" class="border-0 px-2 py-1 w-100 product_unit" value="` +
    //                             element
    //                             .product_unit +
    //                             `">
    //                             </td>
    //                             <td class="border border-top-0 border-bottom-0 border-right-0">
    //                                 <input readonly type="text" name="product_qty[]" class="border-0 px-2 py-1 w-100 quantity-input" value="` +
    //                             formatCurrency(element.product_qty) +
    //                             `">
    //                             </td>
    //                             <td class="border border-top-0 border-bottom-0 border-right-0">
    //                                 <input readonly type="text" name="price_export[]" class="border-0 px-2 py-1 w-100 price_export" value="` +
    //                             formatCurrency(element
    //                                 .price_export) +
    //                             `">
    //                             </td>
    //                             <td class="border border-top-0 border-bottom-0 border-right-0">
    //                                 <input readonly type="text" name="product_tax[]" class="border-0 px-2 py-1 w-100 product_tax" value="` +
    //                             element.product_tax +
    //                             `%">
    //                             </td>
    //                             <td class="border border-top-0 border-bottom-0 border-right-0">
    //                                 <input readonly type="text" name="total_price[]" class="border-0 px-2 py-1 w-100 total_price" readonly="" value="` +
    //                             formatCurrency(element.product_total) +
    //                             `">
    //                             </td>
    //                             <td class="border border-bottom-0 p-0 bg-secondary"></td>
    //                             <td class="border border-top-0 border-bottom-0 product-ratio">
    //                                 <input readonly required="" type="text" name="product_ratio[]" class="border-0 px-2 py-1 w-100 product_ratio" value="` +
    //                             element.product_ratio +
    //                             `">
    //                             </td>
    //                             <td class="border border-top-0 border-bottom-0 price_import">
    //                                 <input readonly required="" type="text" name="price_import[]" class="border-0 px-2 py-1 w-100 price_import" value="` +
    //                             formatCurrency(element.price_import) +
    //                             `">
    //                             </td>
    //                             <td class="border border-top-0 border-bottom-0">
    //                                 <input readonly type="text" name="product_note[]" class="border-0 px-2 py-1 w-100" value="` +
    //                             (element.product_note == null ? "" : element
    //                                 .product_note) + `">
    //                             </td>
    //                             <td class="border border-top-0 border deleteRow"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    //                                     <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5454 5C10.2442 5 9.99999 5.24421 9.99999 5.54545C9.99999 5.8467 10.2442 6.09091 10.5454 6.09091H13.4545C13.7558 6.09091 14 5.8467 14 5.54545C14 5.24421 13.7558 5 13.4545 5H10.5454ZM6 7.72726C6 7.42601 6.24421 7.18181 6.54545 7.18181H7.63637H16.3636H17.4545C17.7558 7.18181 18 7.42601 18 7.72726C18 8.02851 17.7558 8.27272 17.4545 8.27272H16.9091V17C16.9091 18.2113 15.9118 19.1818 14.7135 19.1818H9.25891C8.97278 19.1816 8.68906 19.1247 8.42499 19.0145C8.16092 18.9044 7.92126 18.7431 7.71979 18.5399C7.51833 18.3367 7.35905 18.0957 7.25112 17.8307C7.14347 17.5664 7.08903 17.2834 7.09091 16.9981V8.27272H6.54545C6.24421 8.27272 6 8.02851 6 7.72726ZM8.18182 17.0041V8.27272H15.8182V17C15.8182 17.5966 15.3216 18.0909 14.7135 18.0909H9.25938C9.11713 18.0908 8.97632 18.0625 8.84503 18.0077C8.71375 17.953 8.5946 17.8728 8.49444 17.7718C8.39429 17.6707 8.3151 17.5509 8.26144 17.4192C8.20779 17.2874 8.18074 17.1464 8.18182 17.0041ZM13.4545 10.0909C13.7558 10.0909 14 10.3351 14 10.6364V15.7273C14 16.0285 13.7558 16.2727 13.4545 16.2727C13.1533 16.2727 12.9091 16.0285 12.9091 15.7273V10.6364C12.9091 10.3351 13.1533 10.0909 13.4545 10.0909ZM11.0909 10.6364C11.0909 10.3351 10.8467 10.0909 10.5454 10.0909C10.2442 10.0909 9.99999 10.3351 9.99999 10.6364V15.7273C9.99999 16.0285 10.2442 16.2727 10.5454 16.2727C10.8467 16.2727 11.0909 16.0285 11.0909 15.7273V10.6364Z" fill="#42526E"></path>
    //                                 </svg>
    //                             </td>
    //                             </tr>
    //                         `;
    //                         $('#inputcontent tbody').append(tr);
    //                         deleteRow()
    //                     })
    //                 }
    //             })
    //         }
    //     })
    // })

    $(document).on('click', '.user_flow', function(e) {
        var type = $(this).attr('data-type')
        var des = $(this).attr('data-des');
        $.ajax({
            url: "{{ route('addUserFlow') }}",
            type: "get",
            data: {
                type: type,
                des: des
            },
            success: function(data) {}
        })
    })

    toggleList($("#btnCreateFast"), $("#listBtnCreateFast"));
</script>
