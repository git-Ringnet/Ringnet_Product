<x-navbar :title="$title" activeGroup="sell" activeName="quote" :workspacename="$workspacename"></x-navbar>
<form action="{{ route('detailExport.update', ['workspace' => $workspacename, 'detailExport' => $detailExport->maBG]) }}"
    method="POST" id="formSubmit" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="detail_id" value="{{ $detailExport->maBG }}">
    <input type="hidden" name="table_name" value="BG">
    <input type="hidden" value="{{ $detailExport->maBG }}" name="detailexport_id">
    <div class="content-wrapper--2Column m-0">
        <div class="content-header-fixed p-0 margin-250">
            <div class="content__header--inner margin-left32">
                <div class="content__heading--left">
                    <span class="font-weight-bold">Bán hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="nearLast-span">Đơn báo giá</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="last-span">{{ $detailExport->quotation_number }}</span>
                    @if ($detailExport->tinhTrang == 1)
                        <span style="color: #858585; font-size:13px;" class="btn-status">Nháp</span>
                    @else
                        <span style="color: #0052CC; font-size:13px;" class="btn-status">Chính thức</span>
                    @endif
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <div class="dropdown">
                            <a href="{{ route('detailExport.index', $workspacename) }}" class="activity" data-name1="BG"
                                data-des="Hủy xem đơn báo giá">
                                <button type="button"
                                    class="btn-save-print rounded mx-1 d-flex align-items-center h-100">
                                    <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z"
                                            fill="#6D7075" />
                                    </svg>
                                    <span class="text-button">Hủy</span>
                                </button>
                            </a>
                        </div>
                        <div class="dropdown">
                            <button type="button" data-toggle="dropdown"
                                class="btn-save-print rounded mx-1 d-flex align-items-center h-100 dropdown-toggle px-2">
                                <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                        fill="#6D7075"></path>
                                </svg>
                                <span class="text-button">In</span>
                            </button>
                            <div class="dropdown-menu" style="z-index: 9999;">
                                <a class="dropdown-item text-nav activity" data-name1="BG" data-des="Xuất excel"
                                    href="{{ route('excel', $detailExport->maBG) }}">
                                    Xuất Excel
                                </a>
                                <a class="dropdown-item text-nav border-top activity" data-name1="BG"
                                    data-des="Xuất pdf" href="{{ route('pdf', $detailExport->maBG) }}">Xuất PDF
                                </a>
                            </div>
                        </div>
                        <a href="{{ route('detailExport.edit', ['workspace' => $workspacename, 'detailExport' => $detailExport->maBG]) }}"
                            class="activity" data-name1="BG" data-des="Xem trang sửa">
                            <button type="button" class="custom-btn mx-1 d-flex align-items-center h-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none">
                                    <path
                                        d="M4.75 2.00007C2.67893 2.00007 1 3.679 1 5.75007V11.25C1 13.3211 2.67893 15 4.75 15H10.2501C12.3212 15 14.0001 13.3211 14.0001 11.25V8.00007C14.0001 7.58586 13.6643 7.25007 13.2501 7.25007C12.8359 7.25007 12.5001 7.58586 12.5001 8.00007V11.25C12.5001 12.4927 11.4927 13.5 10.2501 13.5H4.75C3.50736 13.5 2.5 12.4927 2.5 11.25V5.75007C2.5 4.50743 3.50736 3.50007 4.75 3.50007H7C7.41421 3.50007 7.75 3.16428 7.75 2.75007C7.75 2.33586 7.41421 2.00007 7 2.00007H4.75Z"
                                        fill="white" />
                                    <path
                                        d="M12.1339 5.19461L10.7197 3.7804L6.52812 7.97196C5.77185 8.72823 5.25635 9.69144 5.0466 10.7402C5.03144 10.816 5.09828 10.8828 5.17409 10.8677C6.22285 10.6579 7.18606 10.1424 7.94233 9.38618L12.1339 5.19461Z"
                                        fill="white" />
                                    <path
                                        d="M13.4559 1.45679C13.2663 1.39356 13.0571 1.44293 12.9158 1.58431L11.7803 2.71974L13.1945 4.13395L14.33 2.99852C14.4714 2.85714 14.5207 2.64802 14.4575 2.45834C14.2999 1.98547 13.9288 1.61441 13.4559 1.45679Z"
                                        fill="white" />
                                </svg>
                                <span class="text-btnIner-primary ml-1">Sửa</span>
                            </button>
                        </a>
                        <div class="dropdown">
                            <button type="button" data-toggle="dropdown"
                                class="custom-btn rounded d-flex mx-1 align-items-center h-100 dropdown-toggle px-2">
                                <svg class="mr-1" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.82017 6.15415C5.02571 5.94862 5.35895 5.94862 5.56449 6.15415L7.99935 8.58901L10.4342 6.15415C10.6397 5.94862 10.973 5.94862 11.1785 6.15415C11.3841 6.35969 11.3841 6.69294 11.1785 6.89848L8.37151 9.70549C8.16597 9.91103 7.83273 9.91103 7.62719 9.70549L4.82017 6.89848C4.61463 6.69294 4.61463 6.35969 4.82017 6.15415Z"
                                        fill="white" />
                                </svg>
                                <span class="text-button">Tạo nhanh</span>
                            </button>
                            <div class="dropdown-menu" style="z-index: 9999;width:165px!important;">
                                <ul class="m-0 p-0 scroll-data">
                                    <li class="p-2 align-items-left text-wrap"
                                        style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                        <a href="#" onclick="getAction(this)" id="btnThanhToan">
                                            <button name="action" value="action_4" type="submit"
                                                style="background-color: transparent;"
                                                class="align-items-left h-100 border-0 w-100 rounded hover-button">
                                                <span style="font-weight: 600;color: #000; font-size:13px">Tạo đơn
                                                    thanh toán</span>
                                            </button>
                                        </a>
                                    </li>
                                    <li class="p-2 align-items-left text-wrap"
                                        style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                        <a href="#" onclick="getAction(this)" id="btnHoaDon">
                                            <button name="action" value="action_3" type="submit"
                                                style="background-color: transparent;"
                                                class="align-items-left h-100 border-0 w-100 rounded hover-button">
                                                <span style="font-weight: 600;color: #000; font-size:13px">Tạo hóa
                                                    đơn</span>
                                            </button>
                                        </a>
                                    </li>
                                    <li class="p-2 align-items-left text-wrap"
                                        style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                        <a href="#" onclick="getAction(this)" id="btnNhan">
                                            <button name="action" value="action_2" type="submit"
                                                style="background-color: transparent;"
                                                class="align-items-left h-100 border-0 w-100 rounded hover-button">
                                                <span style="font-weight: 600;color: #000; font-size:13px">Tạo đơn giao
                                                    hàng</span>
                                            </button>
                                        </a>
                                    </li>
                                    <li class="p-2 align-items-left text-wrap"
                                        style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                        <a href="#" onclick="getAction(this)" id="btnMuaHang">
                                            <button name="action" value="action_6" type="submit"
                                                style="background-color: transparent;"
                                                class="align-items-left h-100 border-0 w-100 rounded">
                                                <span style="font-weight: 600;color: #000; font-size:13px">Tạo đơn mua
                                                    hàng</span>
                                            </button>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <label class="custom-btn d-flex align-items-center h-100 m-0 mx-1">
                            <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.30639 10.2061C9.57305 10.4727 9.59528 10.8913 9.37306 11.1832L9.30639 11.2595L6.84832 13.7176C5.58773 14.9782 3.54392 14.9782 2.28333 13.7176C1.06621 12.5005 1.02425 10.5532 2.15742 9.28574L2.28333 9.15261L4.7414 6.69453C5.03231 6.40363 5.50396 6.40363 5.79486 6.69453C6.06152 6.9612 6.08375 7.37973 5.86153 7.67171L5.79486 7.74799L3.33679 10.2061C2.65801 10.8848 2.65801 11.9854 3.33679 12.6641C3.98163 13.309 5.00709 13.3412 5.68999 12.7609L5.79486 12.6641L8.25293 10.2061C8.54384 9.91516 9.01549 9.91516 9.30639 10.2061ZM9.83063 6.17029C10.1215 6.46119 10.1215 6.93284 9.83063 7.22375L7.35002 9.70437C7.05911 9.99528 6.58746 9.99528 6.29656 9.70437C6.00565 9.41347 6.00565 8.94182 6.29656 8.65091L8.77718 6.17029C9.06808 5.87938 9.53973 5.87938 9.83063 6.17029ZM13.7183 2.2826C14.9354 3.49972 14.9774 5.44698 13.8442 6.71446L13.7183 6.84759L11.2602 9.30567C10.9693 9.59657 10.4977 9.59657 10.2068 9.30567C9.94012 9.03901 9.9179 8.62047 10.1401 8.32849L10.2068 8.25221L12.6648 5.79413C13.3436 5.11535 13.3436 4.01484 12.6648 3.33606C12.02 2.69122 10.9946 2.65898 10.3117 3.23933L10.2068 3.33606L7.74872 5.79413C7.45781 6.08504 6.98616 6.08504 6.69526 5.79413C6.4286 5.52747 6.40637 5.10893 6.62859 4.81696L6.69526 4.74067L9.15333 2.2826C10.4139 1.02201 12.4577 1.02201 13.7183 2.2826Z"
                                    fill="white" />
                            </svg>
                            <span>Đính kèm file</span>
                            <input type="file" style="display: none;" id="file_restore" accept="*"
                                name="file">
                        </label>
                        <a href="#">
                            <button name="action" value="action_5" type="submit"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                class="btn--remove d-flex mx-1 align-items-center h-100">
                                <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z"
                                        fill="white"></path>
                                </svg>
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
                                <a class="text-secondary active m-0 pl-3 activity" data-name1="BG"
                                    data-des="Xem thông tin sản phẩm báo giá" data-toggle="tab" href="#info">
                                    Thông tin
                                </a>
                            </li>
                            <li>
                                <a class="text-secondary m-0 pl-3 pr-3 activity" data-name1="BG"
                                    data-des="Xem lịch sử chỉnh sửa báo giá" data-toggle="tab" href="#history">
                                    Lịch sử chỉnh sửa
                                </a>
                            </li>
                            <li>
                                <a class="text-secondary m-0 pr-3 activity" data-name1="BG"
                                    data-des="Xem file đính kèm báo giá" data-toggle="tab" href="#files">
                                    File đính kèm
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex position-fixed" style="right: 10px; top: 70px;">
                        @if ($detailExport->status_receive == 1)
                            <div class="border text-secondary p-1 rounded">
                                <span>
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 3C5.23858 3 3 5.23858 3 8C3 10.7614 5.23858 13 8 13C10.7614 13 13 10.7614 13 8C13 5.23858 10.7614 3 8 3ZM1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8Z"
                                            fill="#858585" />
                                    </svg>
                                </span>
                                <span class="text-table">Giao hàng: Chưa giao</span>
                            </div>
                        @elseif($detailExport->status_receive == 2)
                            <div class="border text-success p-1 rounded">
                                <span>
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z"
                                            fill="#08AA36" fill-opacity="0.75" />
                                    </svg>
                                </span>
                                <span class="text-table">Giao hàng: Đã giao</span>
                            </div>
                        @else
                            <div class="border text-warning p-1 rounded">
                                <span>
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1699_20021)">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.99694 13.8634C11.237 13.8634 13.8636 11.2368 13.8636 7.9967C13.8636 4.75662 11.237 2.13003 7.99694 2.13003C4.75687 2.13003 2.13027 4.75662 2.13027 7.9967C2.13027 11.2368 4.75687 13.8634 7.99694 13.8634ZM7.99694 15.4634C12.1207 15.4634 15.4636 12.1204 15.4636 7.9967C15.4636 3.87297 12.1207 0.530029 7.99694 0.530029C3.87322 0.530029 0.530273 3.87297 0.530273 7.9967C0.530273 12.1204 3.87322 15.4634 7.99694 15.4634Z"
                                                fill="#E8B600" />
                                            <path
                                                d="M11.8065 7.9967C11.8065 10.1006 10.1009 11.8062 7.99697 11.8062L7.9967 4.18717C10.1007 4.18717 11.8065 5.89275 11.8065 7.9967Z"
                                                fill="#E8B600" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1699_20021">
                                                <rect width="16" height="16" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </span>
                                <span class="text-table">Giao hàng: Một phần</span>
                            </div>
                        @endif
                        <div class="line-vertical mx-2 my-1"></div>
                        @if ($detailExport->status_reciept == 1)
                            <div class="border text-secondary p-1 rounded">
                                <span>
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 3C5.23858 3 3 5.23858 3 8C3 10.7614 5.23858 13 8 13C10.7614 13 13 10.7614 13 8C13 5.23858 10.7614 3 8 3ZM1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8Z"
                                            fill="#858585" />
                                    </svg>
                                </span>
                                <span class="text-table">Hóa đơn: Chưa chính thức</span>
                            </div>
                        @elseif($detailExport->status_reciept == 2)
                            <div class="border text-success p-1 rounded">
                                <span>
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z"
                                            fill="#08AA36" fill-opacity="0.75" />
                                    </svg>
                                </span>
                                <span class="text-table">Hóa đơn: Chính thức</span>
                            </div>
                        @else
                            <div class="border text-warning p-1 rounded">
                                <span>
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1699_20021)">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.99694 13.8634C11.237 13.8634 13.8636 11.2368 13.8636 7.9967C13.8636 4.75662 11.237 2.13003 7.99694 2.13003C4.75687 2.13003 2.13027 4.75662 2.13027 7.9967C2.13027 11.2368 4.75687 13.8634 7.99694 13.8634ZM7.99694 15.4634C12.1207 15.4634 15.4636 12.1204 15.4636 7.9967C15.4636 3.87297 12.1207 0.530029 7.99694 0.530029C3.87322 0.530029 0.530273 3.87297 0.530273 7.9967C0.530273 12.1204 3.87322 15.4634 7.99694 15.4634Z"
                                                fill="#E8B600" />
                                            <path
                                                d="M11.8065 7.9967C11.8065 10.1006 10.1009 11.8062 7.99697 11.8062L7.9967 4.18717C10.1007 4.18717 11.8065 5.89275 11.8065 7.9967Z"
                                                fill="#E8B600" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1699_20021">
                                                <rect width="16" height="16" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </span>
                                <span class="text-table">Hóa đơn: Một phần</span>
                            </div>
                        @endif
                        <div class="line-vertical mx-2 my-1"></div>
                        @if ($detailExport->status_pay == 1)
                            <div class="border text-secondary p-1 rounded">
                                <span>
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 3C5.23858 3 3 5.23858 3 8C3 10.7614 5.23858 13 8 13C10.7614 13 13 10.7614 13 8C13 5.23858 10.7614 3 8 3ZM1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8Z"
                                            fill="#858585" />
                                    </svg>
                                </span>
                                <span class="text-table">Thanh toán: Chưa thanh toán</span>
                            </div>
                        @elseif($detailExport->status_pay == 2)
                            <div class="border text-success p-1 rounded">
                                <span>
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z"
                                            fill="#08AA36" fill-opacity="0.75" />
                                    </svg>
                                </span>
                                <span class="text-table">Thanh toán: Đã thanh toán</span>
                            </div>
                        @else
                            <div class="border text-warning p-1 rounded">
                                <span>
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1699_20021)">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.99694 13.8634C11.237 13.8634 13.8636 11.2368 13.8636 7.9967C13.8636 4.75662 11.237 2.13003 7.99694 2.13003C4.75687 2.13003 2.13027 4.75662 2.13027 7.9967C2.13027 11.2368 4.75687 13.8634 7.99694 13.8634ZM7.99694 15.4634C12.1207 15.4634 15.4636 12.1204 15.4636 7.9967C15.4636 3.87297 12.1207 0.530029 7.99694 0.530029C3.87322 0.530029 0.530273 3.87297 0.530273 7.9967C0.530273 12.1204 3.87322 15.4634 7.99694 15.4634Z"
                                                fill="#E8B600" />
                                            <path
                                                d="M11.8065 7.9967C11.8065 10.1006 10.1009 11.8062 7.99697 11.8062L7.9967 4.18717C10.1007 4.18717 11.8065 5.89275 11.8065 7.9967Z"
                                                fill="#E8B600" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1699_20021">
                                                <rect width="16" height="16" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </span>
                                <span class="text-table">Thanh toán: Một phần</span>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        </div>
        {{-- Thông tin sản phẩm --}}
        <div class="content margin-top-68" id="main">
            <section class="content margin-250">
                <div class="container-fluided">
                    <div class="tab-content">
                        <div id="info" class="content tab-pane in active ">
                            <div id="title--fixed" class="content-title--fixed top-109 ">
                                <p
                                    class="font-weight-bold text-uppercase info-chung--heading text-center  border-custom">
                                    THÔNG TIN SẢN PHẨM
                                </p>
                            </div>
                            <div class="content margin-top-103">
                                <section class="card mb-0">
                                    <div class="text-nowrap order_content">
                                        <table class="table table-hover bg-white rounded m-0">
                                            <thead>
                                                <tr style="height:44px;">
                                                    <th scope="col" class="border" style="padding-left: 2rem;">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link" data-sort-by="id"
                                                                data-sort-type="#">
                                                                <button class="btn-sort text-13" type="submit">Mã sản
                                                                    phẩm</button>
                                                            </a>
                                                            <div class="icon" id="icon-id"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="border">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="created_at" data-sort-type="">
                                                                <button class="btn-sort text-13" type="submit">Tên
                                                                    sản phẩm</button>
                                                            </a>
                                                            <div class="icon" id="icon-created_at"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="border">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="created_at" data-sort-type=""><button
                                                                    class="btn-sort text-13" type="submit">Đơn
                                                                    vị</button>
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
                                                @foreach ($quoteExport as $item_quote)
                                                    <tr class="bg-white" style="height:80px;">

                                                        <td class="border bg-white align-top text-13-black"
                                                            style="padding-left: 2rem !important;">
                                                            <input type="text" autocomplete="off" readonly
                                                                value="{{ $item_quote->product_code }}"
                                                                class="border-0 py-1 w-100 product_code"
                                                                name="product_code[]">
                                                        </td>

                                                        <td
                                                            class="border bg-white align-top text-13-black position-relative">
                                                            <div class="d-flex align-items-center">
                                                                <input type="text"
                                                                    value="{{ $item_quote->product_name }}"
                                                                    class="border-0 px-2 py-1 w-100 product_name"
                                                                    readonly autocomplete="off" name="product_name[]">
                                                                <input type="hidden" class="product_id"
                                                                    value="{{ $item_quote->product_id }}"
                                                                    autocomplete="off" name="product_id[]">
                                                                <div class="info-product" data-toggle="modal"
                                                                    data-target="#productModal">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="14" height="14"
                                                                        viewBox="0 0 14 14" fill="none">
                                                                        <g clip-path="url(#clip0_2559_39956)">
                                                                            <path
                                                                                d="M6.99999 1.48362C5.53706 1.48362 4.13404 2.06477 3.09959 3.09922C2.06514 4.13367 1.48399 5.53669 1.48399 6.99963C1.48399 8.46256 2.06514 9.86558 3.09959 10.9C4.13404 11.9345 5.53706 12.5156 6.99999 12.5156C8.46292 12.5156 9.86594 11.9345 10.9004 10.9C11.9348 9.86558 12.516 8.46256 12.516 6.99963C12.516 5.53669 11.9348 4.13367 10.9004 3.09922C9.86594 2.06477 8.46292 1.48362 6.99999 1.48362ZM0.265991 6.99963C0.265991 5.21366 0.975464 3.50084 2.23833 2.23797C3.5012 0.975098 5.21402 0.265625 6.99999 0.265625C8.78596 0.265625 10.4988 0.975098 11.7616 2.23797C13.0245 3.50084 13.734 5.21366 13.734 6.99963C13.734 8.78559 13.0245 10.4984 11.7616 11.7613C10.4988 13.0242 8.78596 13.7336 6.99999 13.7336C5.21402 13.7336 3.5012 13.0242 2.23833 11.7613C0.975464 10.4984 0.265991 8.78559 0.265991 6.99963Z"
                                                                                fill="#282A30"></path>
                                                                            <path
                                                                                d="M7.07004 4.34488C6.92998 4.33528 6.78944 4.35459 6.65715 4.40161C6.52487 4.44863 6.40367 4.52236 6.30109 4.61821C6.19851 4.71406 6.11674 4.82999 6.06087 4.95878C6.00499 5.08757 5.9762 5.22648 5.97629 5.36688C5.97629 5.52851 5.91208 5.68352 5.79779 5.79781C5.6835 5.91211 5.52849 5.97631 5.36685 5.97631C5.20522 5.97631 5.05021 5.91211 4.93592 5.79781C4.82162 5.68352 4.75742 5.52851 4.75742 5.36688C4.75733 4.9557 4.87029 4.55241 5.08394 4.2011C5.2976 3.84979 5.60373 3.56398 5.96886 3.37492C6.33399 3.18585 6.74408 3.10081 7.15428 3.12909C7.56449 3.15737 7.95902 3.29788 8.29475 3.53526C8.63049 3.77265 8.8945 4.09776 9.05792 4.47507C9.22135 4.85237 9.2779 5.26735 9.22139 5.67462C9.16487 6.0819 8.99748 6.4658 8.7375 6.78436C8.47753 7.10292 8.13497 7.34387 7.74729 7.48088C7.70694 7.49534 7.67207 7.52196 7.64747 7.55706C7.62287 7.59216 7.60975 7.63402 7.60992 7.67688V8.22463C7.60992 8.38626 7.54571 8.54127 7.43142 8.65557C7.31712 8.76986 7.16211 8.83407 7.00048 8.83407C6.83885 8.83407 6.68383 8.76986 6.56954 8.65557C6.45525 8.54127 6.39104 8.38626 6.39104 8.22463V7.67688C6.39096 7.38197 6.48229 7.0943 6.65247 6.85345C6.82265 6.6126 7.0633 6.43042 7.34129 6.332C7.56313 6.25339 7.7511 6.10073 7.87356 5.89975C7.99603 5.69877 8.0455 5.46172 8.01366 5.22853C7.98181 4.99534 7.87059 4.78025 7.69872 4.61946C7.52685 4.45867 7.30483 4.36114 7.07004 4.34488Z"
                                                                                fill="#282A30"></path>
                                                                            <path
                                                                                d="M7.04382 10.1242C7.00228 10.1242 6.96245 10.1408 6.93307 10.1701C6.9037 10.1995 6.8872 10.2393 6.8872 10.2809C6.8872 10.3224 6.9037 10.3623 6.93307 10.3916C6.96245 10.421 7.00228 10.4375 7.04382 10.4375C7.08536 10.4375 7.1252 10.421 7.15457 10.3916C7.18395 10.3623 7.20045 10.3224 7.20045 10.2809C7.20045 10.2393 7.18395 10.1995 7.15457 10.1701C7.1252 10.1408 7.08536 10.1242 7.04382 10.1242ZM7.04382 10.9371C7.13 10.9371 7.21534 10.9201 7.29496 10.8872C7.37458 10.8542 7.44692 10.8059 7.50786 10.7449C7.5688 10.684 7.61714 10.6116 7.65012 10.532C7.6831 10.4524 7.70007 10.3671 7.70007 10.2809C7.70007 10.1947 7.6831 10.1094 7.65012 10.0297C7.61714 9.95012 7.5688 9.87777 7.50786 9.81684C7.44692 9.7559 7.37458 9.70756 7.29496 9.67458C7.21534 9.6416 7.13 9.62462 7.04382 9.62462C6.86977 9.62462 6.70286 9.69376 6.57978 9.81684C6.45671 9.93991 6.38757 10.1068 6.38757 10.2809C6.38757 10.4549 6.45671 10.6218 6.57978 10.7449C6.70286 10.868 6.86977 10.9371 7.04382 10.9371Z"
                                                                                fill="#282A30"></path>
                                                                        </g>
                                                                        <defs>
                                                                            <clipPath id="clip0_2559_39956">
                                                                                <rect width="14" height="14"
                                                                                    fill="white"></rect>
                                                                            </clipPath>
                                                                        </defs>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td class="border bg-white align-top text-13-black">
                                                            <input type="text" autocomplete="off" readonly
                                                                value="{{ $item_quote->product_unit }}"
                                                                class="border-0 px-2 py-1 w-100 product_unit"
                                                                name="product_unit[]">
                                                        </td>
                                                        <td
                                                            class="border bg-white align-top text-13-black position-relative">
                                                            <input type="text" readonly
                                                                value="{{ is_int($item_quote->product_qty) ? $item_quote->product_qty : rtrim(rtrim(number_format($item_quote->product_qty, 4, '.', ''), '0'), '.') }}"
                                                                class="border-0 px-2 py-1 w-100 quantity-input"
                                                                autocomplete="off" name="product_qty[]">
                                                            <input type="hidden" class="tonkho">
                                                            <p class="text-primary text-center position-absolute inventory"
                                                                style="top: 68%; display: none;">Tồn kho:
                                                                <span class="soTonKho">35</span>
                                                            </p>
                                                        </td>
                                                        <td
                                                            class="border bg-white align-top text-13-black position-relative">
                                                            <input type="text"
                                                                value="{{ number_format($item_quote->price_export) }}"
                                                                class="border-0 px-2 py-1 w-100 product_price"
                                                                autocomplete="off" name="product_price[]" readonly>
                                                            <a href="#" class="activity" data-name1="BG"
                                                                data-des="Xem giao dịch gần đây">
                                                                <p class="mt-3 text-13-blue recentModal"
                                                                    data-toggle="modal" data-target="#recentModal"
                                                                    style="top: 68%; right: 5%;">Giao dịch
                                                                    gần đây
                                                                </p>
                                                            </a>
                                                        </td>
                                                        <td class="border bg-white align-top text-13-black px-4">
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
                                                            <input type="hidden"
                                                                value="{{ $item_quote->product_tax }}"
                                                                name="product_tax[]">
                                                        </td>
                                                        <td class="border bg-white align-top text-13-black">
                                                            <input type="text" readonly=""
                                                                value="{{ number_format($item_quote->product_total) }}"
                                                                class="border-0 px-2 py-1 w-100 total-amount">
                                                        </td>
                                                        <td
                                                            class="text-center border bg-white align-top text-13-black">
                                                            <input type="text" class="border-0 py-1 w-100" readonly
                                                                name="product_note[]"
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
                            </div>
                            {{-- <div class="content">
                                <p
                                    class="font-weight-bold text-uppercase info-chung--heading text-left  border-custom">
                                    Hệ thống ACCESS POINT</p>
                                <section class="card scroll-custom mb-0">
                                    <div class="table-responsive text-nowrap order_content">
                                        <table class="table table-hover bg-white rounded m-0">
                                            <thead>
                                                <tr style="height:44px;">
                                                    <th scope="col" class="border" style="padding-left: 2rem;">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link" data-sort-by="id"
                                                                data-sort-type="#">
                                                                <button class="btn-sort text-13" type="submit">Mã sản
                                                                    phẩm</button>
                                                            </a>
                                                            <div class="icon" id="icon-id"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="border">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="created_at" data-sort-type="">
                                                                <button class="btn-sort text-13" type="submit">Tên
                                                                    sản phẩm</button>
                                                            </a>
                                                            <div class="icon" id="icon-created_at"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="border">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="created_at" data-sort-type=""><button
                                                                    class="btn-sort text-13" type="submit">Đơn
                                                                    vị</button>
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
                                                @foreach ($quoteExport as $item_quote)
                                                    <tr class="bg-white" style="height:80px;">
                                                        <td class="border bg-white align-top text-13-black"
                                                            style="padding-left: 2rem !important;">
                                                            <input type="text" autocomplete="off" readonly
                                                                value="{{ $item_quote->product_code }}"
                                                                class="border-0 py-1 w-75 product_code"
                                                                name="product_code[]">
                                                        </td>
                                                        <td
                                                            class="border bg-white align-top text-13-black position-relative">
                                                            <div class="d-flex align-items-center">
                                                                <input type="text"
                                                                    value="{{ $item_quote->product_name }}"
                                                                    class="border-0 px-2 py-1 w-100 product_name"
                                                                    readonly autocomplete="off" name="product_name[]">
                                                                <input type="hidden" class="product_id"
                                                                    value="{{ $item_quote->product_id }}"
                                                                    autocomplete="off" name="product_id[]">
                                                                <div class="info-product" data-toggle="modal"
                                                                    data-target="#productModal">
                                                                    <svg width="16" height="16"
                                                                        viewBox="0 0 16 16" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <g clip-path="url(#clip0_1704_35239)">
                                                                            <path
                                                                                d="M7.99996 1.69596C6.32803 1.69596 4.72458 2.36012 3.54235 3.54235C2.36012 4.72458 1.69596 6.32803 1.69596 7.99996C1.69596 9.67188 2.36012 11.2753 3.54235 12.4576C4.72458 13.6398 6.32803 14.304 7.99996 14.304C9.67188 14.304 11.2753 13.6398 12.4576 12.4576C13.6398 11.2753 14.304 9.67188 14.304 7.99996C14.304 6.32803 13.6398 4.72458 12.4576 3.54235C11.2753 2.36012 9.67188 1.69596 7.99996 1.69596ZM0.303955 7.99996C0.303955 5.95885 1.11478 4.00134 2.55806 2.55806C4.00134 1.11478 5.95885 0.303955 7.99996 0.303955C10.0411 0.303955 11.9986 1.11478 13.4418 2.55806C14.8851 4.00134 15.696 5.95885 15.696 7.99996C15.696 10.0411 14.8851 11.9986 13.4418 13.4418C11.9986 14.8851 10.0411 15.696 7.99996 15.696C5.95885 15.696 4.00134 14.8851 2.55806 13.4418C1.11478 11.9986 0.303955 10.0411 0.303955 7.99996Z"
                                                                                fill="#282A30" />
                                                                            <path
                                                                                d="M8.08001 4.96596C7.91994 4.95499 7.75932 4.97706 7.60814 5.0308C7.45696 5.08454 7.31845 5.1688 7.20121 5.27834C7.08398 5.38788 6.99053 5.52037 6.92667 5.66756C6.86281 5.81475 6.82991 5.97351 6.83001 6.13396C6.83001 6.31868 6.75663 6.49584 6.62601 6.62646C6.49539 6.75708 6.31824 6.83046 6.13351 6.83046C5.94879 6.83046 5.77163 6.75708 5.64101 6.62646C5.51039 6.49584 5.43701 6.31868 5.43701 6.13396C5.43691 5.66404 5.56601 5.20314 5.81019 4.80164C6.05436 4.40014 6.40422 4.0735 6.82152 3.85743C7.23881 3.64136 7.70748 3.54417 8.17629 3.57649C8.64509 3.60881 9.09599 3.76939 9.47968 4.04069C9.86338 4.31198 10.1651 4.68354 10.3519 5.11475C10.5386 5.54595 10.6033 6.02021 10.5387 6.48567C10.4741 6.95113 10.2828 7.38987 9.98568 7.75394C9.68857 8.11801 9.29708 8.39338 8.85401 8.54996C8.8079 8.56649 8.76805 8.59691 8.73993 8.63702C8.71182 8.67713 8.69682 8.72497 8.69701 8.77396V9.39996C8.69701 9.58468 8.62363 9.76184 8.49301 9.89246C8.36239 10.0231 8.18524 10.0965 8.00051 10.0965C7.81579 10.0965 7.63863 10.0231 7.50801 9.89246C7.37739 9.76184 7.30401 9.58468 7.30401 9.39996V8.77396C7.30392 8.43693 7.4083 8.10815 7.60279 7.83289C7.79727 7.55764 8.0723 7.34944 8.39001 7.23696C8.64354 7.14711 8.85837 6.97265 8.99832 6.74296C9.13828 6.51326 9.19482 6.24235 9.15843 5.97585C9.12203 5.70935 8.99492 5.46352 8.7985 5.27977C8.60208 5.09601 8.34835 4.98454 8.08001 4.96596Z"
                                                                                fill="#282A30" />
                                                                            <path
                                                                                d="M8.05005 11.571C8.00257 11.571 7.95705 11.5898 7.92348 11.6234C7.88991 11.657 7.87105 11.7025 7.87105 11.75C7.87105 11.7974 7.88991 11.843 7.92348 11.8765C7.95705 11.9101 8.00257 11.929 8.05005 11.929C8.09752 11.929 8.14305 11.9101 8.17662 11.8765C8.21019 11.843 8.22905 11.7974 8.22905 11.75C8.22905 11.7025 8.21019 11.657 8.17662 11.6234C8.14305 11.5898 8.09752 11.571 8.05005 11.571ZM8.05005 12.5C8.14854 12.5 8.24607 12.4806 8.33706 12.4429C8.42805 12.4052 8.51073 12.3499 8.58038 12.2803C8.65002 12.2106 8.70527 12.128 8.74296 12.037C8.78065 11.946 8.80005 11.8484 8.80005 11.75C8.80005 11.6515 8.78065 11.5539 8.74296 11.4629C8.70527 11.3719 8.65002 11.2893 8.58038 11.2196C8.51073 11.15 8.42805 11.0947 8.33706 11.057C8.24607 11.0194 8.14854 11 8.05005 11C7.85114 11 7.66037 11.079 7.51972 11.2196C7.37907 11.3603 7.30005 11.551 7.30005 11.75C7.30005 11.9489 7.37907 12.1396 7.51972 12.2803C7.66037 12.4209 7.85114 12.5 8.05005 12.5Z"
                                                                                fill="#282A30" />
                                                                        </g>
                                                                        <defs>
                                                                            <clipPath id="clip0_1704_35239">
                                                                                <rect width="16" height="16"
                                                                                    fill="white" />
                                                                            </clipPath>
                                                                        </defs>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="border bg-white align-top text-13-black">
                                                            <input type="text" autocomplete="off" readonly
                                                                value="{{ $item_quote->product_unit }}"
                                                                class="border-0 px-2 py-1 w-100 product_unit"
                                                                name="product_unit[]">
                                                        </td>
                                                        <td
                                                            class="border bg-white align-top text-13-black position-relative">
                                                            <input type="text" readonly
                                                                value="{{ is_int($item_quote->product_qty) ? $item_quote->product_qty : rtrim(rtrim(number_format($item_quote->product_qty, 4, '.', ''), '0'), '.') }}"
                                                                class="border-0 px-2 py-1 w-100 quantity-input"
                                                                autocomplete="off" name="product_qty[]">
                                                            <input type="hidden" class="tonkho">
                                                            <p class="text-primary text-center position-absolute inventory"
                                                                style="top: 68%; display: none;">Tồn kho:
                                                                <span class="soTonKho">35</span>
                                                            </p>
                                                        </td>
                                                        <td
                                                            class="border bg-white align-top text-13-black position-relative">
                                                            <input type="text"
                                                                value="{{ number_format($item_quote->price_export) }}"
                                                                class="border-0 px-2 py-1 w-100 product_price"
                                                                autocomplete="off" name="product_price[]" readonly>
                                                            <p class="text-primary text-right position-absolute transaction"
                                                                style="top: 68%; right: 5%; display: none;">Giao dịch
                                                                gần đây
                                                            </p>
                                                        </td>
                                                        <td class="border bg-white align-top text-13-black px-4">
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
                                                        <td class="border bg-white align-top text-13-black">
                                                            <input type="text" readonly=""
                                                                value="{{ number_format($item_quote->product_total) }}"
                                                                class="border-0 px-2 py-1 w-100 total-amount">
                                                        </td>
                                                        <td
                                                            class="text-center border bg-white align-top text-13-black">
                                                            <input type="text" class="border-0 py-1 w-100" readonly
                                                                name="product_note[]"
                                                                placeholder="Nhập ghi chú sản phẩm"
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
                            </div> --}}
                            <div class="content">
                                <div class="row " style="width:95%;">
                                    <div class="position-relative col-lg-4 px-0"></div>
                                    <div class="position-relative col-lg-5 col-md-7 col-sm-12 margin-left180">
                                        <div class="m-3 ">
                                            <div class="d-flex justify-content-between">
                                                <span class="text-13-black">
                                                    Giá trị trước thuế:
                                                </span>
                                                <span id="total-amount-sum" class="text-13-black text-right">0đ</span>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                <span class="text-13-black">
                                                    Thuế VAT:
                                                </span>
                                                <span id="product-tax" class="text-13-black text-right">0đ</span>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                <span class="text-13-bold text-lg font-weight-bold">
                                                    Tổng cộng:
                                                </span>
                                                <span class="text-13-bold text-lg font-weight-bold text-right"
                                                    id="grand-total" data-value="0">0đ</span>
                                                <input type="text" hidden="" name="totalValue"
                                                    value="0" id="total" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="history" class="tab-pane fade">
                            <div id="title--fixed" class="content-title--fixed top-109 ">
                                <p
                                    class="font-weight-bold text-uppercase info-chung--heading text-center  border-custom">
                                    Lịch sử chỉnh sửa
                                </p>
                            </div>
                            <section class="content margin-top-103">
                                <div class="container-fluided order_content">
                                    <table class="table table-hover bg-white rounded">
                                        <thead>
                                            <tr style="height:44px;">
                                                <th scope="col" class="border" style="padding-left: 2rem;">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="id"
                                                            data-sort-type="#">
                                                            <button class="btn-sort text-13" type="submit">Mã sản
                                                                phẩm</button>
                                                        </a>
                                                        <div class="icon" id="icon-id"></div>
                                                    </span>
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
                                                <th scope="col" class="border p-1">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="total"
                                                            data-sort-type=""><button class="btn-sort text-13"
                                                                type="submit">Ghi chú sản phẩm</button>
                                                        </a>
                                                        <div class="icon" id="icon-total"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="border">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="total"
                                                            data-sort-type=""><button class="btn-sort text-13"
                                                                type="submit">Thời gian chỉnh sửa</button>
                                                        </a>
                                                        <div class="icon" id="icon-total"></div>
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($history as $item_history)
                                                <tr style="height:80px;">
                                                    <td class="border bg-white align-top text-13-black p-1"
                                                        style="padding-left: 2rem !important;">
                                                        <input type="text" autocomplete="off" readonly
                                                            value="{{ $item_history->product_code }}"
                                                            class="border-0 py-1 w-75 product_code"
                                                            name="product_code[]">
                                                    </td>
                                                    <td class="border bg-white align-top text-13-black p-1">
                                                        <div class="d-flex align-items-center">
                                                            <input type="text"
                                                                value="{{ $item_history->product_name }}"
                                                                class="border-0 px-2 py-1 w-100 product_name" readonly
                                                                autocomplete="off" name="product_name[]">
                                                            <input type="hidden" class="product_id"
                                                                value="{{ $item_history->product_id }}"
                                                                autocomplete="off">
                                                            <div class='info-product' data-toggle='modal'
                                                                data-target='#productModal'>
                                                                <svg xmlns='http://www.w3.org/2000/svg' width='14'
                                                                    height='14' viewBox='0 0 14 14'
                                                                    fill='none'>
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
                                                    <td class="border bg-white align-top text-13-black p-1"
                                                        style="width:8%">
                                                        <input type="text" autocomplete="off" readonly
                                                            value="{{ $item_history->product_unit }}"
                                                            class="border-0 px-2 py-1 w-100 product_unit"
                                                            name="product_unit[]">
                                                    </td>
                                                    <td class="border bg-white align-top text-13-black p-1"
                                                        style="width:11%">
                                                        <div>
                                                            <input type='text'
                                                                value="{{ is_int($item_history->product_qty) ? $item_history->product_qty : rtrim(rtrim(number_format($item_history->product_qty, 4, '.', ''), '0'), '.') }}"
                                                                class='text-right border-0 py-1 w-100' readonly
                                                                autocomplete='off' required>
                                                            <input type='hidden' class='tonkho'>
                                                        </div>
                                                    </td>
                                                    <td class="border bg-white align-top text-13-black p-1"
                                                        style="width:12%">
                                                        <div>
                                                            <input type="text"
                                                                value="{{ number_format($item_history->price_export) }}"
                                                                class="border-0 px-2 py-1 w-100 text-right"
                                                                autocomplete="off" readonly>
                                                            <a href="#" class="activity" data-name1="BG"
                                                                data-des="Xem giao dịch gần đây">
                                                                <p class="mt-3 text-13-blue recentModal"
                                                                    data-toggle="modal" data-target="#recentModal"
                                                                    style="top: 68%; right: 5%;">Giao dịch
                                                                    gần đây
                                                                </p>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="border bg-white align-top p-2">
                                                        <select name="product_tax[]" class="border-0 text-center"
                                                            disabled>
                                                            <option value="0" <?php if ($item_history->product_tax == 0) {
                                                                echo 'selected';
                                                            } ?>>0%</option>
                                                            <option value="8" <?php if ($item_history->product_tax == 8) {
                                                                echo 'selected';
                                                            } ?>>8%</option>
                                                            <option value="10" <?php if ($item_history->product_tax == 10) {
                                                                echo 'selected';
                                                            } ?>>10%</option>
                                                            <option value="99" <?php if ($item_history->product_tax == 99) {
                                                                echo 'selected';
                                                            } ?>>NOVAT
                                                            </option>
                                                        </select>
                                                    </td>
                                                    <td class="border bg-white align-top text-13-black text-left p-1">
                                                        <input type="text" readonly=""
                                                            value="{{ number_format($item_history->product_total) }}"
                                                            class="border-0 px-2 py-1 w-100">
                                                    </td>
                                                    <td
                                                        class="text-center border bg-white align-top text-13-black p-1">
                                                        <input type="text" class="border-0 py-1 w-100" readonly
                                                            name="product_note[]"
                                                            value="{{ $item_history->product_note }}">
                                                    </td>
                                                    <td style="display:none;" class="">
                                                        <input type="text" class="product_tax1">
                                                    </td>
                                                    <td class="border bg-white align-top text-13-black text-left p-1">
                                                        {{ date_format(new DateTime($item_history->ngayChinhSua), 'd-m-Y H:i:s') }}
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
    <div id="title--fixed" class="content-title--fixed top-109 bg-filter-search border-top-0 text-center">
        <p class="font-weight-bold text-uppercase info-chung--heading text-center">File đính kèm</p>
    </div>
    <x-form-attachment :value="$detailExport" name="BG"></x-form-attachment>
</div>
</div>
</div>
</section>
</div>
{{-- Thông tin khách hàng --}}
<div class="content">
    <div id="mySidenav" class="sidenav border top-109">
        <div id="show_info_Guest">
            <div class="bg-filter-search border-0 text-center border-custom">
                <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN KHÁCH HÀNG
                </p>
            </div>
            <div class="d-flex justify-content-between py-2 px-3 border align-items-center text-left text-nowrap"
                style="height:44px;" style="height:44px;">
                <span class="text-13 btn-click" style="flex: 1.5;"> Khách hàng
                </span>
                <span class="mx-1 text-13" style="flex: 2;">
                    <input type="text" class="border-0 w-100 bg-input-guest py-0 py-2 px-2 nameGuest"
                        id="myInput" style="background-color:#F0F4FF; border-radius:4px;" readonly
                        autocomplete="off" required value="{{ $detailExport->guest_name_display }}">
                    <input type="hidden" class="idGuest" autocomplete="off" name="guest_id"
                        value="{{ $detailExport->maKH }}">
                </span>
            </div>
            <div class="">
                <div class="d-flex align-items-center justify-content-between border-0">
                    <ul id="myUL"
                        class="bg-white position-absolute rounded shadow p-1 scroll-data list-guest z-index-block"
                        style="z-index: 99;display: none;">
                        <div class="p-1">
                            <div class="position-relative">
                                <input type="text" placeholder="Nhập công ty"
                                    class="pr-4 w-100 input-search bg-input-guest" id="companyFilter">
                                <span id="search-icon" class="search-icon"><i class="fas fa-search text-table"
                                        aria-hidden="true"></i></span>
                            </div>
                        </div>
                        @foreach ($guest as $guest_value)
                            <li class="p-2 align-items-center"
                                style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                <a href="#" title="{{ $guest_value->guest_name_display }}"
                                    id="{{ $guest_value->id }}" name="search-info" class="search-info">
                                    <span class="text-13-black">{{ $guest_value->guest_name_display }}</span>
                                </a>
                                <a type="button" data-toggle="modal" data-target="#guestModalEdit">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 14 14" fill="none">
                                            <path
                                                d="M4.15625 1.75006C2.34406 1.75006 0.875 3.21912 0.875 5.03131V9.84377C0.875 11.656 2.34406 13.125 4.15625 13.125H8.96884C10.781 13.125 12.2501 11.656 12.2501 9.84377V7.00006C12.2501 6.63763 11.9563 6.34381 11.5938 6.34381C11.2314 6.34381 10.9376 6.63763 10.9376 7.00006V9.84377C10.9376 10.9311 10.0561 11.8125 8.96884 11.8125H4.15625C3.06894 11.8125 2.1875 10.9311 2.1875 9.84377V5.03131C2.1875 3.944 3.06894 3.06256 4.15625 3.06256H6.125C6.48743 3.06256 6.78125 2.76874 6.78125 2.40631C6.78125 2.04388 6.48743 1.75006 6.125 1.75006H4.15625Z"
                                                fill="black" />
                                            <path
                                                d="M10.6172 4.54529L9.37974 3.30785L5.7121 6.97547C5.05037 7.6372 4.5993 8.48001 4.41577 9.3977C4.40251 9.46402 4.46099 9.52247 4.52733 9.50926C5.44499 9.32568 6.2878 8.87462 6.94954 8.21291L10.6172 4.54529Z"
                                                fill="black" />
                                            <path
                                                d="M11.7739 1.27469C11.608 1.21937 11.4249 1.26257 11.3013 1.38627L10.3077 2.37977L11.5452 3.61721L12.5387 2.62371C12.6625 2.5 12.7056 2.31702 12.6503 2.15105C12.5124 1.73729 12.1877 1.41261 11.7739 1.27469Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                </a>
                            </li>
                        @endforeach
                        <a type="button" class="d-flex align-items-center p-2 position-sticky addGuestNew mt-2"
                            data-toggle="modal" data-target="#guestModal"
                            style="bottom: 0;border-radius:4px;background-color:#F2F2F2;">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none">
                                    <path
                                        d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                        fill="#282A30" />
                                </svg>
                            </span>
                            <span class="text-13-black pl-3 pt-1" style="font-weight: 600 !important;">Thêm
                                khách hàng</span>
                        </a>
                    </ul>
                </div>
                <div class="content-info--common" id="show-info-guest">
                    <ul class="p-0 m-0">
                        <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                            style="height:44px;">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Người đại diện</span>
                            <input class="text-13-black w-50 border-0 bg-input-guest" readonly
                                value="{{ $detailExport->represent_name }}" id="represent_guest" style="flex:2;">
                            <input type="hidden" class="represent_guest_id" name="represent_guest_id"
                                autocomplete="off">
                        </li>
                        <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                            style="height:44px;">
                            <span class="text-13 text-nowrap mr-3"style="flex: 1.5;">Số báo giá</span>
                            <input class="text-13-black w-50 border-0 bg-input-guest" style="flex:2;" readonly
                                name="quotation_number" value="{{ $detailExport->quotation_number }}" />
                        </li>
                        <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                            style="height:44px;">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Số tham chiếu</span>
                            <input class="text-13-black w-50 border-0 bg-input-guest" style="flex:2;" readonly
                                name="reference_number" value="{{ $detailExport->reference_number }}" />
                        </li>
                        <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                            style="height:44px;">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày báo giá</span>
                            <input class="text-13-black w-50 border-0 bg-input-guest " id="customDateInput"
                                name="date_quote" style="flex:2;" readonly
                                value="{{ date_format(new DateTime($detailExport->ngayBG), 'd/m/Y') }}" />
                        </li>
                        <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                            style="height:44px;">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Hiệu lực báo
                                giá</span>
                            <input class="text-13-black w-50 border-0 bg-input-guest" name="price_effect" readonly
                                id="myInput" style="flex:2;" value="{{ $detailExport->price_effect }}" />

                        </li>
                        <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                            style="height:44px;">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Điều khoản</span>
                            <input class="text-13-black w-50 border-0 bg-input-guest" id="myInput" style="flex:2;"
                                readonly name="terms_pay" value="{{ $detailExport->terms_pay }}" />
                        </li>
                        <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                            style="height:44px;">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Dự án</span>
                            <input class="text-13-black w-50 border-0 bg-input-guest" style="flex:2;" readonly
                                id="ProjectInput" value="{{ $detailExport->project_name }}" />

                        </li>
                        <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                            style="height:44px;">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Hàng hóa</span>
                            <input class="text-13-black w-50 border-0 bg-input-guest" style="flex:2;" id="myInput"
                                readonly name="goods" value="{{ $detailExport->goods }}" />

                        </li>
                        <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                            style="height:44px;">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Giao hàng</span>
                            <input class="text-13-black w-50 border-0 bg-input-guest" style="flex:2;" readonly
                                name="delivery" id="myInput" value="{{ $detailExport->delivery }}" />
                        </li>
                        <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                            style="height:44px;">
                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Địa điểm</span>
                            <input class="text-13-black w-50 border-0 bg-input-guest " style="flex:2;" readonly
                                name="location" id="myInput" value="{{ $detailExport->location }}" />
                        </li>
                    </ul>
                </div>
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
</div>
<x-user-flow></x-user-flow>
<script>
    $('#file_restore').on('change', function(e) {
        e.preventDefault();
        $('#formSubmit').attr('action', '{{ route('addAttachment') }}');
        // $('#formSubmit').attr('method', 'HEAD');
        $('input[name="_method"]').remove();
        $('#formSubmit')[0].submit();
        var name = 'BG';
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
                            '<td class="text-13-black" id="productPrice"></td>' +
                            '<td class="text-13-black" id="productTax"></td>' +
                            '<td class="text-13-black" id="dateProduct"></td>' +
                            '</tr>');
                        newRow.find('#productName').text(productData
                            .product_name);
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
            var productQty = parseFloat($(this).find('[name^="product_qty"]').val());
            var productPriceElement = $(this).find('[name^="product_price"]');
            var productPrice = 0;
            var taxValue = parseFloat($(this).find('[name^="product_tax"]').val());

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

    document.getElementById('btnNhan').addEventListener('click', function() {
        var selects = document.querySelectorAll('.product_tax');
        selects.forEach(function(select) {
            select.removeAttribute('disabled');
        });
    });
    document.getElementById('btnHoaDon').addEventListener('click', function() {
        var selects = document.querySelectorAll('.product_tax');
        selects.forEach(function(select) {
            select.removeAttribute('disabled');
        });
    });
    document.getElementById('btnThanhToan').addEventListener('click', function() {
        var selects = document.querySelectorAll('.product_tax');
        selects.forEach(function(select) {
            select.removeAttribute('disabled');
        });
    });
</script>
</body>

</html>
