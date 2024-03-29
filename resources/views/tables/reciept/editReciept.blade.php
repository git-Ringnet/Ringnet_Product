<x-navbar :title="$title" activeGroup="buy" activeName="reciept"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<form action="{{ route('reciept.update', ['workspace' => $workspacename, 'reciept' => $reciept->id]) }}" method="POST"
    id="formSubmit" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="content-wrapper--2Column m-0">
        <!-- Content Header (Page header) -->

        <input type="hidden" name="detailimport_id" id="detailimport_id" value="{{ $reciept->detailimport_id }}">
        <input type="hidden" name="detail_id" value="{{ $reciept->id }}">
        <input type="hidden" name="table_name" value="HDMH">
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
                    <span class="nearLast-span">Hóa đơn mua hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="last-span">{{ $reciept->number_bill }} </span>
                    @if ($reciept->status == 1)
                        <span style="color: #858585; font-size:13px;" class="btn-status">Nháp</span>
                    @else
                        <span style="color: #0052CC; font-size:13px;" class="btn-status">Chính thức</span>
                    @endif
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <a href="{{ route('reciept.index', $workspacename) }}" class="user_flow" data-type="HDMH"
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

                        {{-- <div class="dropdown">
                            <button type="button" data-toggle="dropdown"
                                class="btn-destroy btn-light mx-1 d-flex align-items-center h-100 dropdown-toggle">
                                <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                        fill="#6D7075"></path>
                                </svg>
                                <span class="text-btnIner-primary ml-2">In</span>
                            </button>
                            <div class="dropdown-menu" style="z-index: 9999;">
                                <a class="dropdown-item text-btnIner" href="http://127.0.0.1:8000/excel/4">
                                    Xuất Excel
                                </a>
                                <a class="dropdown-item text-btnIner border-top" href="http://127.0.0.1:8000/pdf/4">
                                    Xuất PDF
                                </a>
                            </div>
                        </div> --}}

                        @if ($reciept->status == 1)
                            <a href="#">
                                <button type="submit"
                                    class="btn-destroy btn-light mx-1 d-flex align-items-center h-100">
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
                            </a>
                        @endif

                        <label class="custom-btn d-flex align-items-center h-100 m-0 mx-1">
                            <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.30639 10.2061C9.57305 10.4727 9.59528 10.8913 9.37306 11.1832L9.30639 11.2595L6.84832 13.7176C5.58773 14.9782 3.54392 14.9782 2.28333 13.7176C1.06621 12.5005 1.02425 10.5532 2.15742 9.28574L2.28333 9.15261L4.7414 6.69453C5.03231 6.40363 5.50396 6.40363 5.79486 6.69453C6.06152 6.9612 6.08375 7.37973 5.86153 7.67171L5.79486 7.74799L3.33679 10.2061C2.65801 10.8848 2.65801 11.9854 3.33679 12.6641C3.98163 13.309 5.00709 13.3412 5.68999 12.7609L5.79486 12.6641L8.25293 10.2061C8.54384 9.91516 9.01549 9.91516 9.30639 10.2061ZM9.83063 6.17029C10.1215 6.46119 10.1215 6.93284 9.83063 7.22375L7.35002 9.70437C7.05911 9.99528 6.58746 9.99528 6.29656 9.70437C6.00565 9.41347 6.00565 8.94182 6.29656 8.65091L8.77718 6.17029C9.06808 5.87938 9.53973 5.87938 9.83063 6.17029ZM13.7183 2.2826C14.9354 3.49972 14.9774 5.44698 13.8442 6.71446L13.7183 6.84759L11.2602 9.30567C10.9693 9.59657 10.4977 9.59657 10.2068 9.30567C9.94012 9.03901 9.9179 8.62047 10.1401 8.32849L10.2068 8.25221L12.6648 5.79413C13.3436 5.11535 13.3436 4.01484 12.6648 3.33606C12.02 2.69122 10.9946 2.65898 10.3117 3.23933L10.2068 3.33606L7.74872 5.79413C7.45781 6.08504 6.98616 6.08504 6.69526 5.79413C6.4286 5.52747 6.40637 5.10893 6.62859 4.81696L6.69526 4.74067L9.15333 2.2826C10.4139 1.02201 12.4577 1.02201 13.7183 2.2826Z"
                                    fill="white"></path>
                            </svg>
                            <span>Đính kèm file</span>
                            <input type="file" style="display: none;" id="file_restore" accept="*"
                                name="file">
                        </label>


                        <a href="#" id="delete_reciept">
                            <button type="submit" class="btn--remove d-flex align-items-center h-100 mx-1"
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

            <section class="border-custom" style="height:50px">
                <div class="d-flex justify-content-between align-items-center h-100">
                    <div class="content-header--options p-0 border-0">
                        <ul class="header-options--nav-1 nav nav-tabs margin-left32">
                            <li class="user_flow" data-type="HDMH" data-des="Xem thông tin">
                                <a class="text-secondary m-0 pl-3 active" data-toggle="tab" href="#info">
                                    Thông tin
                                </a>
                            </li>
                            <li class="user_flow" data-type="HDMH" data-des="File đính kèm">
                                <a class="text-secondary m-0 pr-3" data-toggle="tab" href="#files">File đính
                                    kèm</a>
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
                        <div id="title--fixed"
                            class="content-title--fixed top-109 bg-filter-search border-top-0 text-center border-custom">
                            <p class="font-weight-bold text-uppercase info-chung--heading text-center">
                                THÔNG TIN SẢN PHẨM
                            </p>
                        </div>
                        <section class="content margin-top-103">
                            <div class="content-info position-relative table-responsive text-nowrap">
                                <table id="inputcontent" class="table table-hover bg-white rounded">
                                    <thead>
                                        <tr style="height:44px;">
                                            <th class="border-right" style="width: 15%;padding-left:2rem;">
                                                <span class="text-table text-secondary">Mã sản phẩm</span>
                                            </th>
                                            <th scope="col" class="border">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link" data-sort-by="created_at"
                                                        data-sort-type="">
                                                        <button class="btn-sort text-13" type="submit">Tên sản
                                                            phẩm</button>
                                                    </a>
                                                    <div class="icon" id="icon-created_at"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="border">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link" data-sort-by="created_at"
                                                        data-sort-type=""><button class="btn-sort text-13"
                                                            type="submit">Đơn vị</button>
                                                    </a>
                                                    <div class="icon" id="icon-created_at"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="border">
                                                <span class="d-flex justify-content-start">
                                                    <a href="#" class="sort-link" data-sort-by="total"
                                                        data-sort-type=""><button class="btn-sort text-13"
                                                            type="submit">Số lượng</button>
                                                    </a>
                                                    <div class="icon" id="icon-total"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="border">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link" data-sort-by="total"
                                                        data-sort-type=""><button class="btn-sort text-13"
                                                            type="submit">Đơn giá</button>
                                                    </a>
                                                    <div class="icon" id="icon-total"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="border">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link" data-sort-by="total"
                                                        data-sort-type=""><button class="btn-sort text-13"
                                                            type="submit">Thuế</button>
                                                    </a>
                                                    <div class="icon" id="icon-total"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="border">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link" data-sort-by="total"
                                                        data-sort-type=""><button class="btn-sort text-13"
                                                            type="submit">Thành tiền</button>
                                                    </a>
                                                    <div class="icon" id="icon-total"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="border">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link" data-sort-by="total"
                                                        data-sort-type=""><button class="btn-sort text-13"
                                                            type="submit">Ghi chú sản phẩm</button>
                                                    </a>
                                                    <div class="icon" id="icon-total"></div>
                                                </span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product as $item)
                                            <tr class="bg-white" style="height:80px;">
                                                <td class="border bg-white align-top text-13-black"
                                                    style="width:5%;padding-left: 2rem !important;">
                                                    <input readonly type="text" id=""
                                                        class="border-0 py-1 w-75 searchProduct"
                                                        value="{{ $item->product_code }}">
                                                </td>
                                                <td class="border bg-white align-top text-13-black" style="width:15%">
                                                    <div class="d-flex align-items-center">
                                                        <input type="text"
                                                            class="searchProductName w-100 border-0 px-2 py-1"
                                                            value="{{ $item->product_name }}" readonly>
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
                                                <td class="border bg-white align-top text-13-black">
                                                    <input type="text" autocomplete="off" readonly
                                                        value="{{ $item->product_unit }}"
                                                        class="border-0 px-2 py-1 w-100 product_unit">
                                                </td>
                                                <td class="border bg-white align-top text-13-black">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <input type="text"
                                                            class="border-0 px-2 py-1 w-100 quantity-input text-right"
                                                            value="{{ number_format($item->product_qty) }}">
                                                    </div>
                                                    {{-- <div class='mt-3 text-13-blue inventory text-right'>Tồn kho: <span
                                                            class='pl-1 soTonKho'>35</span>
                                                    </div> --}}
                                                </td>
                                                <td class="border bg-white align-top text-13-black" style="width:12%">
                                                    <div>
                                                        <input readonly type="text" name="price_export[]"
                                                            class="border-0 px-2 py-1 w-100 price_export text-right"
                                                            value="{{ number_format($item->price_export) }}">
                                                    </div>
                                                    <div class='mt-3 text-13-blue transaction text-right'
                                                        id="transaction" data-toggle="modal"
                                                        data-target="#recentModal">Giao dịch gần
                                                        đây</div>
                                                </td>
                                                <td class="border bg-white align-top">
                                                    <input readonly type="text"
                                                        class="border-0 px-2 py-1 w-100 product_tax" disabled
                                                        value="{{ $item->product_tax == 99 ? 'NOVAT' : $item->product_tax }} %">
                                                </td>
                                                <input type="hidden" class="product_tax1">

                                                <td class="border bg-white align-top text-13-black text-left">
                                                    <input readonly type="text" name="" id=""
                                                        class="border-0 px-2 py-1 w-100 total_price"
                                                        value="{{ number_format($item->product_total) }}">
                                                </td>
                                                <td class="text-center border bg-white align-top text-13-black">
                                                    <input readonly type="text" class="border-0 px-2 py-1 w-100"
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

                    <div id="files" class="tab-pane fade">
                        <div id="title--fixed"
                            class="content-title--fixed top-109 bg-filter-search border-top-0 text-center border-custom">
                            <p class="font-weight-bold text-uppercase info-chung--heading text-center">FILE ĐÍNH KÈM
                            </p>
                        </div>
                        <x-form-attachment :value="$reciept" name="HDMH"></x-form-attachment>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div id="mySidenav" class="sidenav border top-109">
                <div id="show_info_Guest">
                    <div class="bg-filter-search border-top-0 text-center border-custom">
                        <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN NHÀ CUNG
                            CẤP</p>
                    </div>

                    <div class="d-flex justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative"
                        style="height:49px;">
                        <span class="text-13 btn-click" style="flex: 1.5;">Đơn mua hàng</span>
                        <span class="mx-1 text-13" style="flex: 2;">

                            <input type="text" placeholder="Chọn thông tin" id="myInput"
                                class="border-0 w-100 bg-input-guest py-0 py-2 px-2 nameGuest search_quotation"
                                style="background-color:#F0F4FF; border-radius:4px;" name="quotation_number"
                                autocomplete="off" readonly @if ($reciept->status == 2) readonly @endif
                                value="{{ $reciept->getQuotation->quotation_number == null ? $reciept->getQuotation->id : $reciept->getQuotation->quotation_number }}">
                        </span>
                    </div>

                    <div class="">
                        <ul class="p-0 m-0">
                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Nhà cung cấp</span>
                                <input type="text" class="text-13-black w-50 border-0 bg-input-guest nameGuest"
                                    style="flex:2;" readonly id="provide_name"
                                    {{-- value="{{ $reciept->getProvideName->provide_name_display }}" --}}
                                    value="{{$reciept->getQuotation->provide_name}}"
                                    placeholder="Chọn thông tin" />
                            </li>

                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Người đại diện</span>
                                <input type="text" class="text-13-black w-50 border-0 bg-input-guest nameGuest"
                                    style="flex:2;" id="represent" readonly name="represent"
                                    placeholder="Chọn thông tin"
                                    @if ($nameRepresent) value="{{ $nameRepresent }}" @endif />
                            </li>

                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Số hóa đơn</span>
                                <input type="text" placeholder="Chọn thông tin" name="number_bill" required
                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest" style="flex:2;"
                                    @if ($reciept->status == 2) readonly @endif
                                    value="{{ $reciept->number_bill }}" />
                            </li>

                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày hóa đơn</span>
                                <input id="datePicker" type="text" placeholder="Chọn thông tin"
                                    class="text-13-black w-50 border-0 bg-input-guest nameGuest" style="flex:2;"
                                    @if ($reciept->status == 2) readonly @endif
                                    value="{{ date_format(new DateTime($reciept->date_bill), 'd/m/Y') }}" />
                                <input type="hidden" name="date_bill" id="hiddenDateInput"
                                    value="{{ Carbon\Carbon::parse($reciept->date_bill)->toDateString() }}">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            </section>
        </div>
    </div>
</form>

<div id="files" class="tab-pane fade">
    <x-form-attachment :value="$reciept" name="HDMH"></x-form-attachment>
</div>

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
                                                Giá mua
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>
<script src="{{ asset('/dist/js/products.js') }}"></script>
<script src="{{ asset('/dist/js/import.js') }}"></script>
<script>
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
                                    <td>` + element.product_name + `</td>
                                    <td>` + formatCurrency(element.price_export) + `</td>
                                    <td>` + (element.product_tax == 99 ? "NOVAT" : element.product_tax + "%") + `</td>
                                    <td>` + new Date(element.created_at).toLocaleDateString('vi-VN'); + `</td>
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
            document.getElementById("hiddenDateInput").value = instance.formatDate(selectedDates[0],
                "Y-m-d");
        }
    });
    // Xóa đơn hàng
    deleteImport('#delete_reciept',
        '{{ route('reciept.destroy', ['workspace' => $workspacename, 'reciept' => $reciept->id]) }}')
    $('#listReceive').hide();
    $('.search_quotation').on('click', function() {
        $('#listReceive').show();
    })

    $('#file_restore').on('change', function(e) {
        e.preventDefault();
        $('#formSubmit').attr('action', '{{ route('addAttachment') }}');
        $('input[name="_method"]').remove();
        $.ajax({
            url: "{{ route('addUserFlow') }}",
            type: "get",
            data: {
                type: "HDMH",
                des: "Đính kèm file"
            },
            success: function(data) {
                console.log(data);
            }
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
            success: function(data) {
            }
        })
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
    //                                     <input type="text" readonly name="product_code[]" class="border-0 px-3 py-2 w-75 searchProduct" value="">
    //                                     <ul id="listProductCode" class="listProductCode bg-white position-absolute w-100 rounded shadow p-0 scroll-data" style="z-index: 99; left: 24%; top: 75%;">
    //                                     </ul>
    //                                 </div>
    //                             </td> 
    //                             <td class="border border-top-0 border-bottom-0 position-relative">
    //                                 <input readonly id="searchProductName" type="text" name="product_name[]" class="searchProductName border-0 px-3 py-2 w-100" value="` +
    //                             element.product_name +
    //                             `">
    //                             </td>   
    //                             <td> 
    //                                 <input readonly type="text" name="product_unit[]" class="border-0 px-3 py-2 w-100 product_unit" value="` +
    //                             element
    //                             .product_unit +
    //                             `">
    //                             </td>
    //                             <td class="border border-top-0 border-bottom-0 border-right-0">
    //                                 <input readonly type="text" name="product_qty[]" class="border-0 px-3 py-2 w-100 quantity-input" value="` +
    //                             formatCurrency(element.product_qty) +
    //                             `">
    //                             </td>
    //                             <td class="border border-top-0 border-bottom-0 border-right-0">
    //                                 <input readonly type="text" name="price_export[]" class="border-0 px-3 py-2 w-100 price_export" value="` +
    //                             formatCurrency(element
    //                                 .price_export) +
    //                             `">
    //                             </td>
    //                             <td class="border border-top-0 border-bottom-0 border-right-0">
    //                                 <input readonly type="text" name="product_tax[]" class="border-0 px-3 py-2 w-100 product_tax" value="` +
    //                             element.product_tax +
    //                             `%">
    //                             </td>
    //                             <td class="border border-top-0 border-bottom-0 border-right-0">
    //                                 <input readonly type="text" name="total_price[]" class="border-0 px-3 py-2 w-100 total_price" readonly="" value="` +
    //                             formatCurrency(element.product_total) +
    //                             `">
    //                             </td>
    //                             <td class="border border-bottom-0 p-0 bg-secondary"></td>
    //                             <td class="border border-top-0 border-bottom-0 product-ratio">
    //                                 <input readonly required="" type="text" name="product_ratio[]" class="border-0 px-3 py-2 w-100 product_ratio" value="` +
    //                             element.product_ratio +
    //                             `">
    //                             </td>
    //                             <td class="border border-top-0 border-bottom-0 price_import">
    //                                 <input readonly required="" type="text" name="price_import[]" class="border-0 px-3 py-2 w-100 price_import" value="` +
    //                             formatCurrency(element.price_import) +
    //                             `">
    //                             </td>
    //                             <td class="border border-top-0 border-bottom-0">
    //                                 <input readonly type="text" name="product_note[]" class="border-0 px-3 py-2 w-100" value="` +
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
</script>
