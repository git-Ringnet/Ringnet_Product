<x-navbar :title="$title" activeGroup="buy" activeName="receive"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<form action="{{ route('receive.update', ['workspace' => $workspacename, 'receive' => $receive->id]) }}" method="POST"
    id="formSubmit" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="content-wrapper--2Column m-0">
        <!-- Content Header (Page header) -->
        <input type="hidden" name="detailimport_id" id="detailimport_id">
        <input type="hidden" value="" name="action" id="getAction">
        <input type="hidden" name="detail_id" value="{{ $receive->id }}">
        <input type="hidden" name="table_name" value="DNH">

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
                    <span class="nearLast-span">Đơn nhận hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="last-span">{{ $receive->delivery_code }}</span>
                    @if ($receive->status == 1)
                        <span style="color: #858585; font-size:13px;" class="btn-status">Chưa nhận </span>
                    @else
                        <span style="color: #0052CC; font-size:13px;" class="btn-status">Đã nhận</span>
                    @endif
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <a href="{{ route('receive.index', $workspacename) }}" class="user_flow" data-type="DNH"
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

                        @if ($receive->status == 1)
                            <a href="#" onclick="getAction(this)">
                                <button value="2" type="submit"
                                    class="custom-btn mx-1 d-flex align-items-center h-100">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 14 14" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    <span class="text-btnIner-primary ml-2">Xác nhận</span>
                                </button>
                            </a>
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
                                            <button type="submit" id="delete_receive"
                                                class="btn-save-print border-0 p-2 d-flex mx-1 align-items-center h-100 w-100"
                                                style="background: none;">
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
                        <ul class="header-options--nav-1 nav nav-tabs margin-left32">
                            <li class="user_flow" data-type="DNH" data-des="Xem thông tin">
                                <a class="text-secondary active m-0 pl-3" data-toggle="tab" href="#info">
                                    Thông tin
                                </a>
                            </li>
                            <li class="user_flow" data-type="DNH" data-des="File đính kèm">
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
                        <div id="title--fixed" class="content-title--fixed top-111 border-0">
                            <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN SẢN
                                PHẨM</p>
                        </div>
                        <section class="content margin-top-103">
                            <div class="content-info position-relative table-responsive text-nowrap">
                                <table id="inputcontent" class="table table-hover bg-white rounded">
                                    <thead>
                                        <tr style="height:48px;">
                                            <th class="border-right border-bottom"
                                                style="width: 15%;padding-left:2rem;">
                                                <span class="text-table text-secondary">Mã sản phẩm</span>
                                            </th>
                                            <th scope="col" class="border-right border-bottom">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link" data-sort-by="created_at"
                                                        data-sort-type="">
                                                        <button class="btn-sort text-13" type="submit">Tên sản
                                                            phẩm</button>
                                                    </a>
                                                    <div class="icon" id="icon-created_at"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="border-right border-bottom">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link" data-sort-by="created_at"
                                                        data-sort-type=""><button class="btn-sort text-13"
                                                            type="submit">Đơn vị</button>
                                                    </a>
                                                    <div class="icon" id="icon-created_at"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="border-right border-bottom">
                                                <span class="d-flex justify-content-end">
                                                    <a href="#" class="sort-link" data-sort-by="total"
                                                        data-sort-type=""><button class="btn-sort text-13"
                                                            type="submit">Số lượng</button>
                                                    </a>
                                                    <div class="icon" id="icon-total"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="border-right border-bottom">
                                                <span class="d-flex justify-content-end">
                                                    <a href="#" class="sort-link" data-sort-by="total"
                                                        data-sort-type=""><button class="btn-sort text-13"
                                                            type="submit">Đơn giá</button>
                                                    </a>
                                                    <div class="icon" id="icon-total"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="border-right border-bottom">
                                                <span class="d-flex justify-content-end">
                                                    <a href="#" class="sort-link" data-sort-by="total"
                                                        data-sort-type=""><button class="btn-sort text-13"
                                                            type="submit">KM</button>
                                                    </a>
                                                    <div class="icon" id="icon-total"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="border-right border-bottom">
                                                <span class="d-flex justify-content-end">
                                                    <a href="#" class="sort-link" data-sort-by="total"
                                                        data-sort-type=""><button class="btn-sort text-13"
                                                            type="submit">Thuế</button>
                                                    </a>
                                                    <div class="icon" id="icon-total"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="border-right border-bottom">
                                                <span class="d-flex justify-content-end">
                                                    <a href="#" class="sort-link" data-sort-by="total"
                                                        data-sort-type=""><button class="btn-sort text-13"
                                                            type="submit">Thành tiền</button>
                                                    </a>
                                                    <div class="icon" id="icon-total"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="border-right border-bottom">
                                                <span class="d-flex justify-content-start">
                                                    <a href="#" class="sort-link" data-sort-by="total"
                                                        data-sort-type=""><button class="btn-sort text-13"
                                                            type="submit">Kho hàng</button>
                                                    </a>
                                                    <div class="icon" id="icon-total"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="border-right border-bottom">
                                                <span class="d-flex justify-content-center">
                                                    <a href="#" class="sort-link" data-sort-by="total"
                                                        data-sort-type=""><button class="btn-sort text-13"
                                                            type="submit">Quản lý SN</button>
                                                    </a>
                                                    <div class="icon" id="icon-total"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="border-right border-bottom">
                                                <span class="d-flex justify-content-start">
                                                    <a href="#" class="sort-link" data-sort-by="total"
                                                        data-sort-type=""><button class="btn-sort text-13"
                                                            type="submit">Bảo hành</button>
                                                    </a>
                                                    <div class="icon" id="icon-total"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="border-right border-bottom">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link" data-sort-by="total"
                                                        data-sort-type=""><button class="btn-sort text-13"
                                                            type="submit">Ghi chú</button>
                                                    </a>
                                                    <div class="icon" id="icon-total"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="border-bottom"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $st = 0; ?>
                                        @foreach ($product as $item)
                                            <tr class="bg-white" style="height:80px;">
                                                <td class="bg-white align-top text-13-black border-top-0 border-bottom border-right"
                                                    style="width:5%;padding-left: 2rem !important;">
                                                    <input readonly type="text" name="product_code[]"
                                                        id="" class="border-0 py-1 w-75 searchProduct"
                                                        value="{{ $item->product_code }}">
                                                </td>
                                                <td class="bg-white align-top text-13-black border-top-0 border-bottom border-right"
                                                    style="width:15%">
                                                    <div class="d-flex align-items-center">
                                                        <input type="text"
                                                            class="searchProductName w-100 border-0 px-2 py-1"
                                                            name="product_name[]" value="{{ $item->product_name }}"
                                                            readonly>
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
                                                    class="bg-white align-top text-13-black border-top-0 border-bottom border-right">
                                                    <input type="text" autocomplete="off" readonly
                                                        value="{{ $item->product_unit }}"
                                                        class="border-0 px-2 py-1 w-100 product_unit"
                                                        name="product_unit[]">
                                                </td>

                                                <td
                                                    class="bg-white align-top text-13-black border-top-0 border-bottom border-right">
                                                    <div>
                                                        <input @if ($receive->status == 2) readonly @endif
                                                            type="text"
                                                            class="border-0 px-2 py-1 w-100 quantity-input text-right"
                                                            name="product_qty[]" {{-- oninput="checkQty(this,{{ $item->product_qty }})"  --}} readonly
                                                            value="{{ number_format($item->product_qty) }}">
                                                        <div class="mt-3 text-13-blue inventory text-right"
                                                            tyle="top: 68%;">Tồn kho:
                                                            <span class="pl-1 soTonKho">
                                                                {{ number_format($item->inventory) }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td
                                                    class="bg-white align-top text-13-black border-top-0 border-bottom border-right">
                                                    <div>
                                                        <input type="text" required=""
                                                            class="border-0 px-2 py-1 w-100 price_export text-right height-32"
                                                            name="price_export[]"
                                                            value="{{ number_format($item->price_export) }}" readonly>
                                                    </div>
                                                </td>
                                                <td
                                                    class="bg-white align-top text-13-black border-top-0 border-bottom border-right">
                                                    @php
                                                        $promotionArray = json_decode($item->promotion, true);
                                                        $promotionValue = isset($promotionArray['value'])
                                                            ? $promotionArray['value']
                                                            : 0;
                                                        $promotionOption = isset($promotionArray['type'])
                                                            ? $promotionArray['type']
                                                        : ''; @endphp
                                                    <div>
                                                        <input type="text"
                                                            class="border-0 px-2 py-1 w-100 text-right height-32 promotion"
                                                            name="promotion[]"
                                                            value="{{ number_format($promotionValue) }}" readonly>
                                                    </div>
                                                    <div class="mt-3 text-13-blue text-right">
                                                        <select class="border-0 promotion-option"
                                                            name="promotion-option[]" disabled>
                                                            <option value="1"
                                                                @if ($promotionOption == 1) selected @endif>Nhập
                                                                tiền </option>
                                                            <option value="2"
                                                                @if ($promotionOption == 2) selected @endif>Nhập %
                                                            </option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td
                                                    class="bg-white align-top text-13-black border-top-0 border-bottom border-right">
                                                    <select class="product_tax border-0 w-100 text-center height-32"
                                                        name="product_tax[]" disabled>
                                                        <option value="0"
                                                            @if ($item->product_tax == 0) selected @endif>0%
                                                        </option>
                                                        <option value="8"
                                                            @if ($item->product_tax == 8) selected @endif>8%
                                                        </option>
                                                        <option value="10"
                                                            @if ($item->product_tax == 10) selected @endif>10%
                                                        </option>
                                                        <option value="99"
                                                            @if ($item->product_tax == 99) selected @endif>NOVAT
                                                        </option>
                                                    </select>
                                                </td>
                                                {{-- Tổng tiền --}}
                                                <td
                                                    class="bg-white align-top text-13-black border-top-0 border-bottom border-right">
                                                    <input type="text"
                                                        class="border-0 px-2 py-1 w-100 total_price text-right height-32"
                                                        readonly="" name="total_price[]"
                                                        value="{{ fmod($item->product_total, 2) > 0 && fmod($item->product_total, 1) > 0 ? number_format(($promotionOption == 1 ? $item->product_total - $promotionValue : $item->product_total * $promotionValue / 100), 2, '.', ',') : number_format($promotionOption == 1 ? $item->product_total - $promotionValue : $item->product_total * $promotionValue / 100) }}">
                                                </td>
                                                <td
                                                    class="bg-white align-top text-13-black border-top-0 border-bottom border-right">
                                                    <input id="searchWarehouse" type="text" placeholder="Chọn kho"
                                                        class="border-0 py-1 w-100 height-32 text-13-black searchWarehouse"
                                                        name="warehouse[]" readonly value="{{$item->nameHouse}}">
                                                </td>
                                                <td
                                                    class="align-top text-center border-top-0 border-bottom border-right">
                                                    <div style="margin-top: 6px;">
                                                        <input type="checkbox" name="cbSeri[]" disabled
                                                            value="{{ $item->cbSN }}" class="mt-1 checkall-btn"
                                                            @if ($item->cbSN == 1) {{ 'checked' }} @endif>

                                                        @if ($item->cbSN == 1)
                                                            <a href="" class="duongdan" data-toggle="modal"
                                                                data-target="#exampleModal{{ $st }}">
                                                                <div class="sn--modal mt-3">
                                                                    <span class="border-span--modal">SN</span>
                                                                </div>
                                                            </a>
                                                        @endif
                                                    </div>

                                                </td>
                                                <td
                                                    class="align-top text-center border-top-0 border-bottom border-right">
                                                    <input class="border-0 px-2 py-1 w-100 price_export"
                                                        type="text" value="{{ $item->product_guarantee }}"
                                                        readonly>
                                                </td>
                                                <td
                                                    class="bg-white align-top text-13-black d-none border-top-0 border-bottom border-right">
                                                    <div>
                                                        <input type="text"
                                                            class="border-0 px-2 py-1 w-100 price_export text-right"
                                                            name="price_export[]"
                                                            value="{{ fmod($item->price_export, 1) > 0 ? number_format($item->price_export, 2, '.', ',') : number_format($item->price_export) }}"
                                                            readonly>
                                                    </div>
                                                    <div class='mt-3 text-13-blue transaction text-right'>Giao dịch gần
                                                        đây</div>
                                                </td>
                                                <td
                                                    class="bg-white align-top d-none border-top-0 border-bottom border-right">
                                                    <input type="text" class="border-0 px-2 py-1 w-100 product_tax"
                                                        name="product_tax[]" value="{{ $item->product_tax }}"
                                                        readonly>
                                                    <select name="product_tax[]"
                                                        class="border-0 text-center product_tax text-13-black"
                                                        disabled>
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
                                                <input type="hidden" class="product_tax1">
                                                <td
                                                    class="text-center bg-white align-top text-13-black border-top-0 border-bottom border-right">
                                                    <input type="text" class="border-0 py-1 w-100" readonly
                                                        name="product_note[]" placeholder='Nhập ghi chú'
                                                        value="{{ $item->product_note }}">
                                                </td>
                                                <td
                                                    class="text-center bg-white align-top text-13-black @if ($receive->status == 3) deleteRow @endif border-top-0 border-bottom">
                                                    <svg width="17" height="17" viewBox="0 0 17 17"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M13.1417 6.90625C13.4351 6.90625 13.673 7.1441 13.673 7.4375C13.673 7.47847 13.6682 7.5193 13.6589 7.55918L12.073 14.2992C11.8471 15.2591 10.9906 15.9375 10.0045 15.9375H6.99553C6.00943 15.9375 5.15288 15.2591 4.92702 14.2992L3.34113 7.55918C3.27393 7.27358 3.45098 6.98757 3.73658 6.92037C3.77645 6.91099 3.81729 6.90625 3.85826 6.90625H13.1417ZM9.03125 1.0625C10.4983 1.0625 11.6875 2.25175 11.6875 3.71875H13.8125C14.3993 3.71875 14.875 4.19445 14.875 4.78125V5.3125C14.875 5.6059 14.6371 5.84375 14.3438 5.84375H2.65625C2.36285 5.84375 2.125 5.6059 2.125 5.3125V4.78125C2.125 4.19445 2.6007 3.71875 3.1875 3.71875H5.3125C5.3125 2.25175 6.50175 1.0625 7.96875 1.0625H9.03125ZM9.03125 2.65625H7.96875C7.38195 2.65625 6.90625 3.13195 6.90625 3.71875H10.0938C10.0938 3.13195 9.61805 2.65625 9.03125 2.65625Z"
                                                            fill="#6B6F76"></path>
                                                    </svg>
                                                </td>
                                            </tr>
                                            <?php $st++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </section>
                        <?php $import = $detail; ?>
                        <x-formsynthetic :import="$receive"></x-formsynthetic>
                    </div>
                    <div id="files" class="tab-pane fade">
                        <div id="title--fixed" class="content-title--fixed top-111">
                            <p class="font-weight-bold text-uppercase info-chung--heading text-center">FILE ĐÍNH KÈM
                            </p>
                        </div>
                        <x-form-attachment :value="$receive" name="DNH"></x-form-attachment>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div id="mySidenav" class="sidenav border top-109">
                <div id="show_info_Guest">
                    <div class="bg-filter-search text-center">
                        <p class="font-weight-bold text-uppercase info-chung--heading text-center">
                            THÔNG TIN NHÀ CUNG CÂP
                        </p>
                    </div>

                    <div class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left text-nowrap"
                        style="height:48px;">
                        <span class="text-13 btn-click" style="flex: 1.5;">Đặt hàng NCC
                        </span>
                        <span class="mx-1 text-13" style="flex: 2;">
                            <input type="text" placeholder="Chọn thông tin"
                                class="border-0 w-100 bg-input-guest py-2 px-2 nameGuest " id="search_quotation"
                                style="background-color:#F0F4FF; border-radius:4px;" name="quotation_number"
                                autocomplete="off" required
                                value="@if ($receive->getQuotation) {{ $receive->getQuotation->quotation_number }}@else{{ $receive->id }} @endif"
                                readonly>
                        </span>
                        <!-- <div class="d-flex align-items-center justify-content-between border-0">
                            <ul id="myUL"
                                class="bg-white position-absolute rounded shadow p-1 scroll-data list-guest z-index-block"
                                style="z-index: 99;display: none;">
                                <div class="p-1">
                                    <div class="position-relative">
                                        <input type="text" placeholder="Nhập công ty"
                                            class="pr-4 w-100 input-search bg-input-guest" id="companyFilter">
                                        <span id="search-icon" class="search-icon"><i
                                                class="fas fa-search text-table" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                    <li class="p-2 align-items-center" style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                        <a href="#" title="" id="" name="search-info" class="search-info">
                                                <span class="text-13-black"></span>
                                        </a>
                                        <a type="button" data-toggle="modal" data-target="#guestModalEdit" >
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                    <path d="M4.15625 1.75006C2.34406 1.75006 0.875 3.21912 0.875 5.03131V9.84377C0.875 11.656 2.34406 13.125 4.15625 13.125H8.96884C10.781 13.125 12.2501 11.656 12.2501 9.84377V7.00006C12.2501 6.63763 11.9563 6.34381 11.5938 6.34381C11.2314 6.34381 10.9376 6.63763 10.9376 7.00006V9.84377C10.9376 10.9311 10.0561 11.8125 8.96884 11.8125H4.15625C3.06894 11.8125 2.1875 10.9311 2.1875 9.84377V5.03131C2.1875 3.944 3.06894 3.06256 4.15625 3.06256H6.125C6.48743 3.06256 6.78125 2.76874 6.78125 2.40631C6.78125 2.04388 6.48743 1.75006 6.125 1.75006H4.15625Z" fill="black"/>
                                                    <path d="M10.6172 4.54529L9.37974 3.30785L5.7121 6.97547C5.05037 7.6372 4.5993 8.48001 4.41577 9.3977C4.40251 9.46402 4.46099 9.52247 4.52733 9.50926C5.44499 9.32568 6.2878 8.87462 6.94954 8.21291L10.6172 4.54529Z" fill="black"/>
                                                    <path d="M11.7739 1.27469C11.608 1.21937 11.4249 1.26257 11.3013 1.38627L10.3077 2.37977L11.5452 3.61721L12.5387 2.62371C12.6625 2.5 12.7056 2.31702 12.6503 2.15105C12.5124 1.73729 12.1877 1.41261 11.7739 1.27469Z" fill="black"/>
                                                </svg>
                                             </span>
                                        </a>
                                    </li>
                                <a type="button"
                                    class="d-flex align-items-center p-2 position-sticky addGuestNew mt-2"
                                    data-toggle="modal" data-target="#guestModal" style="bottom: 0;border-radius:4px;background-color:#F2F2F2;">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z" fill="#282A30"/>
                                        </svg>
                                    </span>
                                    <span class="text-13-black pl-3 pt-1" style="font-weight: 600 !important;">Thêm đơn mua hàng</span>
                                </a>
                            </ul>
                        </div> -->
                    </div>
                    <div class="">
                        <div class="">
                            <ul class="p-0 m-0">
                                <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                    style="height:48px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Nhà cung cấp</span>
                                    <input type="text"
                                        class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                        style="flex:2;" readonly placeholder="Chọn thông tin" id="provide_name"
                                        {{-- value="{{ $receive->getNameProvide->provide_name_display }}"  --}}
                                        @if ($receive->detailimport_id == 0) @if ($receive->getNameProvide)
                                            value="{{ $receive->getNameProvide->provide_name_display }}" @endif
                                    @else
                                        @if ($receive->getQuotation) value="{{ $receive->getQuotation->provide_name }}" @endif
                                        @endif>
                                </li>

                                <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                    style="height:48px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Người đại diện</span>
                                    <input type="text"
                                        class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                        style="flex:2;" id="represent" placeholder="Chọn thông tin" readonly
                                        @if ($nameRepresent) value="{{ $nameRepresent }}" @endif />
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                    style="height:48px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Mã nhận hàng</span>
                                    <input type="text" placeholder="Chọn thông tin" name="delivery_code" readonly
                                        class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                        style="flex:2; background-color:#F0F4FF; border-radius:4px;"
                                        value="{{ $receive->delivery_code }}" />
                                </li>

                                <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                    style="height:48px;">
                                    <span class="text-13 text-nowrap mr-1" style="flex: 1.5;">Đơn vị vận chuyển</span>
                                    <input type="text" placeholder="Chọn thông tin"
                                        class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                        style="flex:2; background-color:#F0F4FF; border-radius:4px;"
                                        name="shipping_unit" value="{{ $receive->shipping_unit }}"
                                        @if ($receive->status == 2) readonly @endif />
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                    style="height:48px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Phí vận chuyển</span>
                                    <input type="text" placeholder="Nhập thông tin" name="delivery_charges"
                                        class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2"
                                        style="flex:2; background-color:#F0F4FF; border-radius:4px;"
                                        value="{{ number_format($receive->delivery_charges) }}"
                                        @if ($receive->status == 2) readonly @endif>
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                    style="height:48px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày nhận hàng</span>
                                    <input type="text" placeholder="Nhập thông tin"
                                        class="text-13-black w-50 border-0 bg-input-guest nameGuest px-2 py-2 flatpickr-input"
                                        style="flex:2;" id="datePicker"
                                        value="{{ date_format(new DateTime($receive->created_at), 'd/m/Y') }}"
                                        @if ($receive->status == 2) readonly @endif>
                                    <input type="hidden" name="received_date" id="hiddenDateInput"
                                        value="{{ $receive->created_at->toDateString() }}">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                </section>
            </div>
        </div>
        <x-formmodalseri :product="$product" :receive="$receive"></x-formmodalseri>
</form>

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


<script src="{{ asset('/dist/js/products.js') }}"></script>
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


    flatpickr("#datePicker", {
        locale: "vn",
        dateFormat: "d/m/Y",
        onChange: function(selectedDates, dateStr, instance) {
            // Cập nhật giá trị của trường ẩn khi người dùng chọn ngày
            document.getElementById("hiddenDateInput").value = instance.formatDate(selectedDates[0],
                "Y-m-d");
        }
    });

    function getAction(e) {
        $('#getAction').val($(e).find('button').val());
    }
    $('#listReceive').hide();
    $('.search_quotation').on('click', function() {
        $('#listReceive').show();
    })
    // Xóa đơn hàng
    deleteImport('#delete_receive',
        '{{ route('receive.destroy', ['workspace' => $workspacename, 'receive' => $receive->id]) }}')

    // Tạo INPUT SERI
    createRowInput('seri');
    $('#file_restore').on('change', function(e) {
        e.preventDefault();
        $('#formSubmit').attr('action', '{{ route('addAttachment') }}');
        $('input[name="_method"]').remove();
        $.ajax({
            url: "{{ route('addUserFlow') }}",
            type: "get",
            data: {
                type: "DNH",
                des: "Đính kèm file"
            },
            success: function(data) {}
        })
        $('#formSubmit')[0].submit();
    })


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
</script>
