<x-navbar :title="$title" activeGroup="buy" activeName="import"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<form action="{{ route('import.update', ['workspace' => $workspacename, 'import' => $import->id]) }}" method="POST"
    id="formSubmit" enctype="multipart/form-data">
    <div class="content-wrapper--2Column m-0">
        <!-- Content Header (Page header) -->
        @method('PUT')
        @csrf
        <input type="hidden" name="detail_id" value="{{ $import->id }}">
        <input type="hidden" name="table_name" value="DMH">
        <input type="hidden" id="provides_id" name="provides_id" value="{{ $import->provide_id }}">
        <input type="hidden" id="project_id" name="project_id" value="{{ $import->project_id }}">
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
                    <span class="nearLast-span">Đơn mua hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="last-span">{{ $title }}</span>
                    @if ($import->status == 1)
                        <span style="color: #858585; font-size:13px;" class="btn-status">Nháp</span>
                    @else
                        <span style="color: #0052CC; font-size:13px;" class="btn-status">Chính thức</span>
                    @endif
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <a href="{{ route('import.index', $workspacename) }}">
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
                        <div class="dropdown" style="margin-right:5px">
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
                        </div>

                        @if ($import->status == 1)
                            <a
                                href="{{ route('import.edit', ['workspace' => $workspacename, 'import' => $import->id]) }}">
                                <button type="button" class="custom-btn d-flex align-items-center h-100"
                                    style="margin-right:10px">
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
                        @endif

                        <div class="dropdown">
                            <button type="button" class="custom-btn d-flex align-items-center h-100"
                                style="margin-right:10px" id="btnCreateFast">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4.82017 6.15415C5.02571 5.94862 5.35895 5.94862 5.56449 6.15415L7.99935 8.58901L10.4342 6.15415C10.6397 5.94862 10.973 5.94862 11.1785 6.15415C11.3841 6.35969 11.3841 6.69294 11.1785 6.89848L8.37151 9.70549C8.16597 9.91103 7.83273 9.91103 7.62719 9.70549L4.82017 6.89848C4.61463 6.69294 4.61463 6.35969 4.82017 6.15415Z"
                                            fill="white" />
                                    </svg>
                                </span>
                                <span class="text-btnIner-primary ml-1">Tạo nhanh</span>
                            </button>
                            <div class="bg-white position-absolute rounded shadow p-2 z-index-block"
                                style="z-index:99;width: 165px;top: 20px;right: 88px; display:none;"
                                id="listBtnCreateFast">
                                <ul class="m-0 p-0 scroll-data">
                                    <li class="p-2 align-items-left text-wrap"
                                        style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                        <a href="#" style="flex:2;" onclick="getAction(this)"
                                            name="search-info" class="search-info">
                                            <button class="align-items-left h-100 border-0 w-100 rounded"
                                                style="background-color: transparent;" name="action"
                                                value="action_2" type="submit">
                                                <span style="font-weight: 600;color: #000; font-size:13px">Thêm nhận
                                                    hàng</span>
                                            </button>
                                        </a>
                                    </li>
                                    <li class="p-2 align-items-left text-wrap"
                                        style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                        <a href="#" style="flex:2;" onclick="getAction(this)"
                                            name="search-info" class="search-info">
                                            <button class="align-items-left h-100 border-0 w-100 rounded "
                                                style="background-color: transparent;" name="action"
                                                value="action_3" type="submit">
                                                <span style="font-weight: 600;color: #000; font-size:13px">Thêm mua
                                                    hàng</span>
                                            </button>
                                        </a>
                                    </li>
                                    <li class="p-2 align-items-left text-wrap"
                                        style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                        <a href="#" style="flex:2;" onclick="getAction(this)"
                                            name="search-info" class="search-info">
                                            <button class="align-items-left h-100 border-0 w-100 rounded"
                                                style="background-color: transparent;" name="action"
                                                value="action_4" type="submit">
                                                <span style="font-weight: 600;color: #000; font-size:13px">Thêm thanh
                                                    toán</span>
                                            </button>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- <a>
                            <label class="custom-btn d-flex align-items-center h-100 m-0 mr-2" style="margin-right:10px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                                    fill="none" class="mx-1">
                                    <path
                                        d="M8.30541 9.20586C8.57207 9.47246 8.5943 9.89106 8.37208 10.183L8.30541 10.2593L5.84734 12.7174C4.58675 13.978 2.54294 13.978 1.28235 12.7174C0.0652319 11.5003 0.0232719 9.55296 1.15644 8.2855L1.28235 8.15237L3.74042 5.69429C4.03133 5.40339 4.50298 5.40339 4.79388 5.69429C5.06054 5.96096 5.08277 6.37949 4.86055 6.67147L4.79388 6.74775L2.33581 9.20586C1.65703 9.88456 1.65703 10.9852 2.33581 11.6639C2.98065 12.3088 4.00611 12.341 4.68901 11.7607L4.79388 11.6639L7.25195 9.20586C7.54286 8.91492 8.01451 8.91492 8.30541 9.20586ZM8.82965 5.17005C9.12053 5.46095 9.12053 5.9326 8.82965 6.22351L6.34904 8.70413C6.05813 8.99504 5.58648 8.99504 5.29558 8.70413C5.00467 8.41323 5.00467 7.94158 5.29558 7.65067L7.7762 5.17005C8.0671 4.87914 8.53875 4.87914 8.82965 5.17005ZM12.7173 1.28236C13.9344 2.49948 13.9764 4.44674 12.8432 5.71422L12.7173 5.84735L10.2592 8.30543C9.96833 8.59633 9.49673 8.59633 9.20583 8.30543C8.93914 8.03877 8.91692 7.62023 9.13913 7.32825L9.20583 7.25197L11.6638 4.79389C12.3426 4.11511 12.3426 3.0146 11.6638 2.33582C11.019 1.69098 9.99363 1.65874 9.31073 2.23909L9.20583 2.33582L6.74774 4.79389C6.45683 5.0848 5.98518 5.0848 5.69428 4.79389C5.42762 4.52723 5.40539 4.10869 5.62761 3.81672L5.69428 3.74043L8.15235 1.28236C9.41293 0.0217665 11.4567 0.0217665 12.7173 1.28236Z"
                                        fill="white" />
                                </svg>
                                <span>Đính kèm file</span>
                                <input type="file" style="display: none;" id="file_restore" accept="*" name="file">
                            </label>
                        </a> -->

                        <a href="#">
                            <button name="action"type="button" id="delete_import"
                                class="btn--remove d-flex align-items-center h-100" style="margin-right:10px">
                                <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z"
                                        fill="white"></path>
                                </svg>
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

                        {{-- <a href="#" onclick="getAction(this)">
                            <button name="action" value="action_3" type="submit"
                                class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                                <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M3.75528 1.6875H5.99476H11.9948H12.123C12.3939 1.6875 12.6621 1.74088 12.9123 1.84459C13.1626 1.94829 13.3899 2.10029 13.5814 2.29189L15.7022 4.41269C16.089 4.79939 16.3064 5.32394 16.3065 5.87088V14.25C16.3065 14.797 16.0892 15.3216 15.7024 15.7084C15.3156 16.0952 14.791 16.3125 14.244 16.3125H12.75H5.25H3.83328C3.28894 16.3125 2.76666 16.0973 2.38031 15.7139C1.99396 15.3304 1.77486 14.8098 1.77078 14.2655L1.69278 3.76547C1.69074 3.49333 1.74258 3.22344 1.84531 2.97143C1.94805 2.71941 2.09965 2.49021 2.29137 2.29705C2.4831 2.10389 2.71115 1.95058 2.9624 1.84597C3.21364 1.74135 3.48312 1.68749 3.75528 1.6875ZM5.8125 15.1875H12.1875V9.9645C12.1875 9.74238 12.0071 9.5625 11.7862 9.5625H6.2145C5.99266 9.5625 5.8125 9.74266 5.8125 9.9645V15.1875ZM13.3125 15.1875V9.9645C13.3125 9.12163 12.6289 8.4375 11.7862 8.4375H6.2145C5.37134 8.4375 4.6875 9.12134 4.6875 9.9645V15.1875H3.83326C3.58582 15.1875 3.34842 15.0897 3.17281 14.9154C2.9972 14.7411 2.89761 14.5044 2.89574 14.257L2.81774 3.75703C2.81682 3.63333 2.84038 3.51066 2.88708 3.39611C2.93378 3.28155 3.00269 3.17737 3.08983 3.08957C3.17698 3.00177 3.28064 2.93208 3.39485 2.88453C3.50905 2.83698 3.63154 2.8125 3.75524 2.8125H5.43226V5.18175C5.43226 5.52985 5.57054 5.86369 5.81668 6.10983C6.06282 6.35597 6.39666 6.49425 6.74476 6.49425H11.2448C11.5929 6.49425 11.9267 6.35597 12.1728 6.10983C12.419 5.86369 12.5573 5.52985 12.5573 5.18175V2.91925C12.6414 2.96326 12.7185 3.01991 12.7858 3.08725L14.9068 5.20831C15.0826 5.38405 15.1814 5.62254 15.1815 5.87112V14.25C15.1815 14.4986 15.0827 14.7371 14.9069 14.9129C14.7311 15.0887 14.4926 15.1875 14.244 15.1875H13.3125ZM11.4323 5.18175V2.8125H6.55726V5.18175C6.55726 5.23148 6.57701 5.27917 6.61218 5.31433C6.64734 5.3495 6.69503 5.36925 6.74476 5.36925H11.2448C11.2945 5.36925 11.3422 5.3495 11.3773 5.31433C11.4125 5.27917 11.4323 5.23148 11.4323 5.18175Z"
                                        fill="white" />
                                </svg>
                                <span>Tạo hóa đơn mua hàng</span>
                            </button>
                        </a> --}}
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
                                    chỉnh sửa</a>
                            </li>
                            <li>
                                <a class="text-secondary m-0 pr-3" data-toggle="tab" href="#files">File đính kèm</a>
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex position-fixed" style="right: 10px; top: 70px;">
                        @if ($import->status_receive == 0)
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
                        @elseif($import->status_receive == 2)
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
                        @if ($import->status_reciept == 0)
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
                        @elseif($import->status_reciept == 2)
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
                        @if ($import->status_pay == 0)
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
                        @elseif($import->status_pay == 2)
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
        <div class="content margin-top-68" id="main">
            <section class="content margin-250">
                <div class="container-fluided">
                    <div class="tab-content">
                        <div id="info" class="content tab-pane in active">
                            <div id="title--fixed"
                                class="content-title--fixed top-109 bg-filter-search border-top-0 text-center border-custom">
                                <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN
                                    SẢN PHẨM</p>
                            </div>
                            <section class="content margin-top-103">
                                <div class="table-responsive text-nowrap order_content">
                                    <table id="inputcontent" class="table table-hover bg-white rounded m-0">
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
                                                    <td class='border-right p-2 text-13 align-top'
                                                        style="padding-left: 2rem !important;">
                                                        <input type="hidden" readonly value="{{ $item->id }}"
                                                            name="listProduct[]">
                                                        <input readonly type="text" name="product_code[]"
                                                            class='border-0 pl-0 pr-2 py-1 w-100 product_code searchProduct'
                                                            value="{{ $item->product_code }}"
                                                            @if ($import->status == 2) echo readonly @endif>
                                                        <ul id="listProductCode"
                                                            class="listProductCode bg-white position-absolute w-100 rounded shadow p-0 scroll-data"
                                                            style="z-index: 99; left: 24%; top: 75%;">
                                                        </ul>
                                                    </td>
                                                    <td class='border-right p-2 text-13 align-top position-relative'>
                                                        <div class="d-flex align-items-center">
                                                            <input readonly id="searchProductName" type="text"
                                                                name="product_name[]"
                                                                class="searchProductName border-0  py-1 w-100"
                                                                value="{{ $item->product_name }}"
                                                                @if ($import->status == 2) echo readonly @endif>
                                                            <ul id="listProductName"
                                                                class="listProductName bg-white position-absolute w-100 rounded shadow p-0 scroll-data"
                                                                style="z-index: 99; left: 1%; top: 74%; display: none;">
                                                            </ul>
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
                                                    <td class='border-right p-2 text-13 align-top position-relative'>
                                                        <input type="text" name="product_unit[]"
                                                            class="border-0 px-2 py-1 w-100 product_unit"
                                                            value="{{ $item->product_unit }}" readonly>
                                                    </td>
                                                    <td class='border-right p-2 text-13 align-top position-relative'>
                                                        <div class="">
                                                            <input readonly
                                                                oninput="checkQty(this,{{ $item->product_qty }})"
                                                                type="text" name="product_qty[]"
                                                                class="border-0 px-2 py-1 w-100 quantity-input text-right"
                                                                value="{{ number_format($item->product_qty) }}">
                                                            <div class='mt-3 text-13-blue inventory text-right'
                                                                tyle="top: 68%;">Tồn kho:
                                                                <span class='pl-1 soTonKho'>
                                                                    {{ fmod($item->product_inventory, 2) > 0 && fmod($item->product_inventory, 1) > 0 ? number_format($item->product_inventory, 2, '.', ',') : number_format($item->product_inventory) }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="border-right p-2 text-13 align-top">
                                                        <input type="text" name="price_export[]"
                                                            class="text-right border-0 px-2 py-1 w-100 product_price"
                                                            value="{{ fmod($item->price_export, 2) > 0 && fmod($item->price_export, 1) > 0 ? number_format($item->price_export, 2, '.', ',') : number_format($item->price_export) }}"
                                                            readonly>
                                                        <div class='mt-3 text-13-blue text-right transaction'
                                                            id="transaction" data-toggle="modal"
                                                            data-target="#recentModal">Giao dịch
                                                            gần đây
                                                        </div>
                                                    </td>
                                                    <input type="hidden" class="product_tax1">
                                                    <td class="border-right p-2 text-13 align-top">
                                                        <select name="product_tax[]" id="product_tax"
                                                            class="border-0 text-center product_tax" disabled>
                                                            <option value="0"
                                                                @if ($item->product_tax == 0) selected @endif>
                                                                0%
                                                            </option>
                                                            <option value="8"
                                                                @if ($item->product_tax == 8) selected @endif>
                                                                8%
                                                            </option>
                                                            <option value="10"
                                                                @if ($item->product_tax == 10) selected @endif>
                                                                10%
                                                            </option>
                                                            <option value="99"
                                                                @if ($item->product_tax == 99) selected @endif>
                                                                NOVAT
                                                            </option>
                                                        </select>
                                                    </td>
                                                    <td class="border-right p-2 text-13 align-top">
                                                        <input type="text" name="total_price[]"
                                                            class="text-right border-0 px-2 py-1 w-100 total_price"
                                                            readonly
                                                            value="{{ (fmod($item->product_total, 2) > 0 && fmod($item->product_total,1) > 0 ) ? number_format($item->product_total, 2, '.', ',') : number_format($item->product_total) }}"
                                                            @if ($import->status == 2) echo readonly @endif>
                                                    </td>
                                                    <td class="border-right p-2 text-13 align-top">
                                                        <input placeholder="Nhập ghi chú" readonly type="text"
                                                            name="product_note[]" class="border-0 px-2 py-1 w-100"
                                                            value="{{ $item->product_note }}">
                                                    </td>
                                                    <td class="border-right p-2 text-13 align-top">
                                                        <svg width="17" height="17" viewBox="0 0 17 17"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M13.1417 6.90625C13.4351 6.90625 13.673 7.1441 13.673 7.4375C13.673 7.47847 13.6682 7.5193 13.6589 7.55918L12.073 14.2992C11.8471 15.2591 10.9906 15.9375 10.0045 15.9375H6.99553C6.00943 15.9375 5.15288 15.2591 4.92702 14.2992L3.34113 7.55918C3.27393 7.27358 3.45098 6.98757 3.73658 6.92037C3.77645 6.91099 3.81729 6.90625 3.85826 6.90625H13.1417ZM9.03125 1.0625C10.4983 1.0625 11.6875 2.25175 11.6875 3.71875H13.8125C14.3993 3.71875 14.875 4.19445 14.875 4.78125V5.3125C14.875 5.6059 14.6371 5.84375 14.3438 5.84375H2.65625C2.36285 5.84375 2.125 5.6059 2.125 5.3125V4.78125C2.125 4.19445 2.6007 3.71875 3.1875 3.71875H5.3125C5.3125 2.25175 6.50175 1.0625 7.96875 1.0625H9.03125ZM9.03125 2.65625H7.96875C7.38195 2.65625 6.90625 3.13195 6.90625 3.71875H10.0938C10.0938 3.13195 9.61805 2.65625 9.03125 2.65625Z"
                                                                fill="#6B6F76"></path>
                                                        </svg>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                            <x-formsynthetic :import="''"></x-formsynthetic>
                        </div>

                        <div id="history" class="tab-pane fade">
                            <div id="title--fixed"
                                class="content-title--fixed top-109 bg-filter-search border-top-0 text-center border-custom">
                                <p class="font-weight-bold text-uppercase info-chung--heading text-center">LỊCH SỬ MUA
                                    HÀNG</p>
                            </div>
                            <section class="content margin-top-103">
                                <div class="table-responsive text-nowrap order_content">
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
                                            @foreach ($history as $item)
                                                <tr class="bg-white">
                                                    <td class='border-right p-2 text-13 align-top'
                                                        style="padding-left: 2rem !important;">
                                                        <input type="text" name="" id=""
                                                            class="border-0 px-0 py-1 w-100" readonly
                                                            value="{{ $item->product_code }}">
                                                    </td>
                                                    <td class='border-right p-2 text-13 align-top position-relative'>
                                                        <div class="d-flex align-items-center">
                                                            <input type="text"
                                                                class="searchProductName border-0 px-2 py-1 w-100"
                                                                readonly value="{{ $item->product_name }}">
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
                                                    <td class='border-right p-2 text-13 align-top position-relative'>
                                                        <input type="text"
                                                            class="border-0 px-2 py-1 w-100 product_unit" readonly
                                                            value="{{ $item->product_unit }}">
                                                    </td>
                                                    <td class='border-right p-2 text-13 align-top position-relative'>
                                                        <input type="text"
                                                            class="border-0 px-2 py-1 w-100 text-right" readonly
                                                            value="{{ (fmod($item->product_qty, 2) > 0 && fmod($item->product_qty,1) > 0 ) ? number_format($item->product_qty, 2, '.', ',') : number_format($item->product_qty) }}">
                                                    </td>
                                                    <td class='border-right p-2 text-13 align-top position-relative'>
                                                        <input type="text"
                                                            class="border-0 px-2 py-1 w-100 text-right" readonly
                                                            value="{{ fmod($item->price_export, 2) > 0 && fmod($item->price_export, 1) > 0 ? number_format($item->price_export, 2, '.', ',') : number_format($item->price_export) }}">
                                                    </td>
                                                    <td class='border-right p-2 text-13 align-top position-relative'>
                                                        <input type="text"
                                                            class="product_tax border-0 px-2 py-1 w-100" readonly
                                                            @if ($item->product_tax == 99) value = "NOVAT"
                                                           @else value="{{ $item->product_tax }} %" @endif>
                                                    </td>
                                                    <td class='border-right p-2 text-13 align-top position-relative'>
                                                        <input type="text" class="border-0 px-2 py-1 w-100"
                                                            readonly
                                                            value="{{ (fmod($item->product_total, 2) > 0 && fmod($item->product_total,1) > 0 ) ? number_format($item->product_total, 2, '.', ',') : number_format($item->product_total) }}">
                                                    </td>
                                                    <td class="border-right p-2 text-13 align-top">
                                                        <input placeholder="Nhập ghi chú" type="text"
                                                            class="border-0 px-2 py-1 w-100" readonly
                                                            value="{{ $item->product_note }}">
                                                    </td>
                                                    <!-- <td class="border border-top-0 border ">
                                                        <input type="text" class="border-0 px-2 py-1 w-100" readonly
                                                            value="{{ $item->version }}">
                                                    </td> -->
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                        </div>

                        <div id="files" class="tab-pane fade">
                            <div id="title--fixed"
                                class="content-title--fixed top-109 bg-filter-search border-top-0 text-center border-custom">
                                <p class="font-weight-bold text-uppercase info-chung--heading text-center">File đính
                                    kèm</p>
                            </div>
                            <x-form-attachment :value="$import" name="DMH"></x-form-attachment>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="content">
            <div id="mySidenav" class="sidenav border" style="top:109px !important;">
                <div id="show_info_Guest">
                    <div class="bg-filter-search border-top-0 text-center border-custom">
                        <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN NHÀ CUNG
                            CẤP</p>
                    </div>
                    <div class="content-info">
                        <div class="d-flex justify-content-between py-2 px-3 border align-items-center text-left text-nowrap"
                            style="height:44px;" style="height:44px;">
                            <span class="text-13 btn-click" style="flex: 1.5;">Nhà cung cấp</span>
                            <span class="mx-1 text-13" style="flex: 2;">
                                <input type="text" placeholder="Chọn thông tin" readonly
                                    value="{{ $import->getProvideName->provide_name_display }}"
                                    class="border-0 w-100 bg-input-guest py-0 py-2 px-2 nameGuest "
                                    style="background-color:#F0F4FF; border-radius:4px;" id="myInput"
                                    autocomplete="off">
                            </span>
                        </div>
                    </div>
                    <div>
                        <ul class="p-0 m-0 ">
                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Người đại diện</span>
                                <input class="text-13-black w-50 border-0 bg-input-guest"
                                    value="@if ($import->getNameRepresent) {{ $import->getNameRepresent->represent_name }} @endif"
                                    style="flex:2;" id="represent" readonly>
                            </li>
                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Đơn mua hàng</span>
                                <input class="text-13-black w-50 border-0" style="flex:2;"
                                    placeholder="Nhập thông tin" name="quotation_number"
                                    value="{{ $import->quotation_number }}" readonly />
                            </li>
                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Số tham chiếu</span>
                                <input class="text-13-black w-50 border-0" style="flex:2;"
                                    placeholder="Nhập thông tin" name="reference_number"readonly
                                    value="{{ $import->reference_number }}" />
                            </li>
                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày báo giá</span>
                                <input type="text" class="text-13-black w-50 border-0"
                                    placeholder="Nhập thông tin" id="datePicker" name="date_quote" style="flex:2;"
                                    value="{{ date_format(new DateTime($import->created_at), 'd/m/Y') }}" />
                            </li>
                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Hiệu lực báo giá</span>
                                <input type="text" class="text-13-black w-50 border-0" style="flex:2;"
                                    name="price_effect" placeholder="Nhập thông tin"
                                    value="{{ $import->price_effect }}" readonly />
                            </li>
                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Điều khoản</span>
                                <input type="text" readonly class="text-13-black w-50 border-0" name="terms_pay"
                                    style="flex:2;" placeholder="Nhập thông tin" value="{{ $import->terms_pay }}" />
                            </li>
                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Dự án</span>
                                <input type="text" class="text-13-black w-50 border-0" style="flex:2;"
                                    placeholder="Nhập thông tin" id="inputProject" readonly
                                    value="@if ($import->getProjectName) {{ $import->getProjectName->project_name }} @endif">
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




<x-formprovides> </x-formprovides>
<script src="{{ asset('/dist/js/products.js') }}"></script>
<script src="{{ asset('/dist/js/import.js') }}"></script>
<script>
    $("#listBtnCreateFast").hide();
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
        }
        toggleList($("#btnCreateFast"), $("#listBtnCreateFast"));
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
    deleteImport('#delete_import',
        '{{ route('import.destroy', ['workspace' => $workspacename, 'import' => $import->id]) }}')

    function getAction(e) {
        $('#getAction').val($(e).find('button').val());
    }
    $('#addRowTable').off('click').on('click', function() {
        addRowTable(1);
    })

    $('.search-info').click(function() {
        var provides_id = $(this).attr('id');
        console.log(provides_id);
        $.ajax({
            url: "{{ route('show_provide') }}",
            type: "get",
            data: {
                provides_id: provides_id,
            },
            success: function(data) {
                $('#myInput').val(data.provide_name_display);
                $('#provides_id').val(data.id);
            }
        });
    });

    $('#addProvide').click(function() {
        var check = false;
        var provide_name_display = $("input[name='provide_name_display']").val().trim();
        var provide_code = $("input[name='provide_code']").val().trim();
        var provide_address = $("input[name='provide_address']").val().trim();
        var provide_name = $("input[name='provide_name']").val().trim();
        var provide_represent = $("input[name='provide_represent']").val().trim();
        var provide_email = $("input[name='provide_email']").val().trim();
        var provide_phone = $("input[name='provide_phone']").val().trim();
        var provide_address_delivery = $("input[name='provide_address_delivery']").val().trim();
        if (provide_name_display == '') {
            alert("Vui lòng nhập Tên hiển thị");
            check = true;
            return false;
        }
        if (provide_code == '') {
            alert("Vui lòng nhập Mã số thuế");
            check = true;
            return false;
        }
        if (provide_address == '') {
            alert("Vui lòng nhập Địa chỉ nhà cung cấp");
            check = true;
            return false;
        }
        if (!check) {
            $.ajax({
                url: "{{ route('addNewProvide') }}",
                type: "get",
                data: {
                    provide_name_display: provide_name_display,
                    provide_code: provide_code,
                    provide_address: provide_address,
                    provide_name: provide_name,
                    provide_represent: provide_represent,
                    provide_email: provide_email,
                    provide_phone: provide_phone,
                    provide_address_delivery: provide_address_delivery
                },
                success: function(data) {
                    if (data.success == true) {
                        $('#myInput').val(data.name);
                        $('#provides_id').val(data.id);
                        alert(data.msg);
                        $('.modal [data-dismiss="modal"]').click();
                        $("input[name='provide_name_display']").val('');
                        $("input[name='provide_code']").val('');
                        $("input[name='provide_address']").val('');
                        $("input[name='provide_name']").val('');
                        $("input[name='provide_represent']").val('');
                        $("input[name='provide_email']").val('');
                        $("input[name='provide_phone']").val('');
                        $("input[name='provide_address_delivery']").val('');
                    } else {
                        alert(data.msg);
                    }
                }
            });
        }
    })

    getProduct('searchProduct');

    function getProduct(name) {
        $('#inputcontent tbody tr .' + name).on('click', function() {
            listProductCode = $(this).closest('tr').find('#listProductCode');
            listProductName = $(this).closest('tr').find('#listProductName');
            inputCode = $(this).closest('tr').find('.searchProduct');
            inputName = $(this).closest('tr').find('.searchProductName');
            inputUnit = $(this).closest('tr').find('.product_unit');
            inputPriceExprot = $(this).closest('tr').find('.price_export');
            inputRatio = $(this).closest('tr').find('.product_ratio');
            inputPriceImport = $(this).closest('tr').find('.price_import');
            selectTax = $(this).closest('tr').find('.product_tax');
            $('.search-product').on('click', function() {
                inputName.val('');
                inputCode.val($(this).closest('li').find('span').text())
                var dataId = $(this).attr('id'); // Lấy giá trị data-id
                listProductCode.hide();
                $.ajax({
                    url: "{{ route('showProductName') }}",
                    type: "get",
                    data: {
                        dataId: dataId
                    },
                    success: function(data) {
                        listProductName.empty();
                        data.forEach(element => {
                            var UL = '<li>' +
                                '<a data-unit="' + element
                                .product_unit +
                                '" data-priceExport= "' +
                                element.product_price_export +
                                '" data-ratio="' + element
                                .product_ratio +
                                '" data-priceImport="' + element
                                .product_price_import +
                                '" href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-name" id="' +
                                element.id +
                                '" data-tax="' + element
                                .product_tax +
                                '" name="search-product">' +
                                '<span class="w-100" data-id="' +
                                element.id + '">' + element
                                .product_name + '</span>' +
                                '</a>' +
                                '</li>';
                            listProductName.append(UL);
                        })
                        $('.search-name').on('click', function() {
                            inputName.val($(this).closest('li')
                                .find('span')
                                .text());
                            inputUnit.val($(this).attr(
                                    'data-unit') == null ?
                                "" : $(this).attr(
                                    'data-unit'));
                            inputPriceExprot.val($(this).attr(
                                    'data-priceExport') ==
                                "null" ? "" :
                                formatCurrency($(this).attr(
                                    'data-priceExport')))
                            inputRatio.val($(this).attr(
                                    'data-ratio') ==
                                "null" ? "" : $(this).attr(
                                    'data-ratio'))
                            inputPriceImport.val($(this).attr(
                                    'data-priceImport') ==
                                "null" ? "" :
                                formatCurrency($(this).attr(
                                    'data-priceImport')))
                            selectTax.val($(this).attr(
                                'data-tax'))
                            listProductName.hide();
                            checkDuplicateRows()
                        })
                    }
                })
            })
        })
    }


    $('.project_name').on('click', function() {
        var project_id = $(this).attr('id');
        $.ajax({
            url: "{{ route('show_project') }}",
            type: "get",
            data: {
                project_id: project_id
            },
            success: function(data) {
                $('#inputProject').val(data.project_name);
                $('#project_id').val(data.id);
            }
        })
    })
    $('#file_restore').on('change', function(e) {
        e.preventDefault();
        $('#formSubmit').attr('action', '{{ route('addAttachment') }}');
        $('input[name="_method"]').remove();
        $('#formSubmit')[0].submit();
    })

    $('.transaction').on('click', function() {
        nameProduct = $(this).closest('tr')
            .find('.searchProductName')
            .val()
        $.ajax({
            url: "{{ route('getHistoryImport') }}",
            type: "get",
            data: {
                product_name: nameProduct,
            },
            success: function(
                data) {
                $('#recentModal .modal-body tbody')
                    .empty()
                if (data[
                        'history'
                    ]) {
                    data[
                            'history'
                        ]
                        .forEach(
                            element => {
                                var tr = `
                                            <tr>
                                                <td>` + element.product_name + `</td>
                                                <td>` + formatCurrency(element.price_export) + `</td>
                                                <td>` + (element.product_tax == 99 ? "NOVAT" : element.product_tax +
                                    "%") + `</td>
                                                <td>` + new Date(element.created_at).toLocaleDateString('vi-VN'); + `</td>
                                            </tr> `;
                                $('#recentModal .modal-body tbody')
                                    .append(
                                        tr
                                    );
                            })
                }
            }
        })
    })
</script>
</body>

</html>
