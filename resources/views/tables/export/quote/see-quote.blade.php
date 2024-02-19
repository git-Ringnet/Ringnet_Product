<x-navbar :title="$title" activeGroup="sell" activeName="quote" :workspacename="$workspacename"></x-navbar>
<form action="{{ route('detailExport.update', ['workspace' => $workspacename, 'detailExport' => $detailExport->maBG]) }}"
    method="POST" id="formSubmit" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="detail_id" value="{{ $detailExport->maBG }}">
    <input type="hidden" name="table_name" value="BG">
    <input type="hidden" value="{{ $detailExport->maBG }}" name="detailexport_id">

    
    <div class="content-wrapper m-0">
        <!-- Content Header (Page header) -->
        <div class="content-header-fixed p-0 margin-250 ">
            <div class="content__header--inner margin-left32">
                <div class="content__heading--left">
                    <span class="font-weight-bold">Bán hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z" fill="#26273B" fill-opacity="0.8"/>
                        </svg>
                    </span>
                    <span class="nearLast-span">Đơn báo giá</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z" fill="#26273B" fill-opacity="0.8"/>
                        </svg>
                    </span>
                    <span class="last-span">{{ $detailExport->quotation_number }}</span>
                    @if ($detailExport->tinhTrang == 1)
                        <span style="color: #858585; font-size:13px;" class="btn-status">Nháp</span>
                    @else
                        <span style="color: #0052CC; font-size:13px;" class="btn-status">Chính thức</span>
                    @endif
                </div>
                <div class="d-flex content__heading--right mr-3">
                    <div class="row m-0 mb-1">
                        <a href="#">
                            <button type="reset" class="btn-destroy btn-light mx-2 d-flex align-items-center h-100" >
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                        <path d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z" fill="#6D7075"/>
                                    </svg>
                                </span>
                                <span class="text-btnIner-primary ml-2">Hủy</span>
                            </button>
                        </a>
                        <button class="btn-destroy btn-light mx-2 d-flex align-items-center h-100">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z" fill="#6D7075"/>
                                </svg>
                            </span>
                            <span class="text-btnIner-primary ml-2">In</span>   
                        <input type="file" style="display: none;" id="file_restore" accept="*" name="file">
                        </button>
                        <a href="{{ route('detailExport.edit', ['workspace' => $workspacename, 'detailExport' => $detailExport->maBG]) }}">
                            <button type="button" class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path d="M4.75 2.00007C2.67893 2.00007 1 3.679 1 5.75007V11.25C1 13.3211 2.67893 15 4.75 15H10.2501C12.3212 15 14.0001 13.3211 14.0001 11.25V8.00007C14.0001 7.58586 13.6643 7.25007 13.2501 7.25007C12.8359 7.25007 12.5001 7.58586 12.5001 8.00007V11.25C12.5001 12.4927 11.4927 13.5 10.2501 13.5H4.75C3.50736 13.5 2.5 12.4927 2.5 11.25V5.75007C2.5 4.50743 3.50736 3.50007 4.75 3.50007H7C7.41421 3.50007 7.75 3.16428 7.75 2.75007C7.75 2.33586 7.41421 2.00007 7 2.00007H4.75Z" fill="white"/>
                                    <path d="M12.1339 5.19461L10.7197 3.7804L6.52812 7.97196C5.77185 8.72823 5.25635 9.69144 5.0466 10.7402C5.03144 10.816 5.09828 10.8828 5.17409 10.8677C6.22285 10.6579 7.18606 10.1424 7.94233 9.38618L12.1339 5.19461Z" fill="white"/>
                                    <path d="M13.4559 1.45679C13.2663 1.39356 13.0571 1.44293 12.9158 1.58431L11.7803 2.71974L13.1945 4.13395L14.33 2.99852C14.4714 2.85714 14.5207 2.64802 14.4575 2.45834C14.2999 1.98547 13.9288 1.61441 13.4559 1.45679Z" fill="white"/>
                                </svg>
                                <span class="text-btnIner-primary ml-1">Sửa</span>
                            </button>
                        </a>
                        <a href="#">
                            <button type="button" class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                                <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.82017 6.15415C5.02571 5.94862 5.35895 5.94862 5.56449 6.15415L7.99935 8.58901L10.4342 6.15415C10.6397 5.94862 10.973 5.94862 11.1785 6.15415C11.3841 6.35969 11.3841 6.69294 11.1785 6.89848L8.37151 9.70549C8.16597 9.91103 7.83273 9.91103 7.62719 9.70549L4.82017 6.89848C4.61463 6.69294 4.61463 6.35969 4.82017 6.15415Z" fill="white"/>
                                </svg>
                                </span>
                                <span class="text-btnIner-primary ml-1">Tạo nhanh</span>
                            </button>
                        </a>
                        <a href="#">
                            <button type="button" class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                        <path d="M9.30639 10.2061C9.57305 10.4727 9.59528 10.8913 9.37306 11.1832L9.30639 11.2595L6.84832 13.7176C5.58773 14.9782 3.54392 14.9782 2.28333 13.7176C1.06621 12.5005 1.02425 10.5532 2.15742 9.28574L2.28333 9.15261L4.7414 6.69453C5.03231 6.40363 5.50396 6.40363 5.79486 6.69453C6.06152 6.9612 6.08375 7.37973 5.86153 7.67171L5.79486 7.74799L3.33679 10.2061C2.65801 10.8848 2.65801 11.9854 3.33679 12.6641C3.98163 13.309 5.00709 13.3412 5.68999 12.7609L5.79486 12.6641L8.25293 10.2061C8.54384 9.91516 9.01549 9.91516 9.30639 10.2061ZM9.83063 6.17029C10.1215 6.46119 10.1215 6.93284 9.83063 7.22375L7.35002 9.70437C7.05911 9.99528 6.58746 9.99528 6.29656 9.70437C6.00565 9.41347 6.00565 8.94182 6.29656 8.65091L8.77718 6.17029C9.06808 5.87938 9.53973 5.87938 9.83063 6.17029ZM13.7183 2.2826C14.9354 3.49972 14.9774 5.44698 13.8442 6.71446L13.7183 6.84759L11.2602 9.30567C10.9693 9.59657 10.4977 9.59657 10.2068 9.30567C9.94012 9.03901 9.9179 8.62047 10.1401 8.32849L10.2068 8.25221L12.6648 5.79413C13.3436 5.11535 13.3436 4.01484 12.6648 3.33606C12.02 2.69122 10.9946 2.65898 10.3117 3.23933L10.2068 3.33606L7.74872 5.79413C7.45781 6.08504 6.98616 6.08504 6.69526 5.79413C6.4286 5.52747 6.40637 5.10893 6.62859 4.81696L6.69526 4.74067L9.15333 2.2826C10.4139 1.02201 12.4577 1.02201 13.7183 2.2826Z" fill="white"/>
                                    </svg>
                                </span>
                                <span class="text-btnIner-primary ml-1">Đính kèm file</span>
                            </button>
                        </a>
                        
                        <button id="sideGuest" type="button" class="btn-option border-0 mx-1">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="16" width="16" height="16" rx="5" transform="rotate(90 16 0)"
                                    fill="#ECEEFA" />
                                <path
                                    d="M15 11C15 13.2091 13.2091 15 11 15L5 15C2.7909 15 1 13.2091 1 11L1 5C1 2.79086 2.7909 1 5 1L11 1C13.2091 1 15 2.79086 15 5L15 11ZM10 13.5L10 2.5L5 2.5C3.6193 2.5 2.5 3.61929 2.5 5L2.5 11C2.5 12.3807 3.6193 13.5 5 13.5H10Z"
                                    fill="#26273B" fill-opacity="0.8" />
                            </svg>
                        </button>
                    </div>
                    <div class="row m-0 mb-1">
                        <a href="#" onclick="getAction(this)" id="btnThanhToan">
                            <button name="action" value="action_4" type="submit"
                                class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                                <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M3.75528 1.6875H5.99476H11.9948H12.123C12.3939 1.6875 12.6621 1.74088 12.9123 1.84459C13.1626 1.94829 13.3899 2.10029 13.5814 2.29189L15.7022 4.41269C16.089 4.79939 16.3064 5.32394 16.3065 5.87088V14.25C16.3065 14.797 16.0892 15.3216 15.7024 15.7084C15.3156 16.0952 14.791 16.3125 14.244 16.3125H12.75H5.25H3.83328C3.28894 16.3125 2.76666 16.0973 2.38031 15.7139C1.99396 15.3304 1.77486 14.8098 1.77078 14.2655L1.69278 3.76547C1.69074 3.49333 1.74258 3.22344 1.84531 2.97143C1.94805 2.71941 2.09965 2.49021 2.29137 2.29705C2.4831 2.10389 2.71115 1.95058 2.9624 1.84597C3.21364 1.74135 3.48312 1.68749 3.75528 1.6875ZM5.8125 15.1875H12.1875V9.9645C12.1875 9.74238 12.0071 9.5625 11.7862 9.5625H6.2145C5.99266 9.5625 5.8125 9.74266 5.8125 9.9645V15.1875ZM13.3125 15.1875V9.9645C13.3125 9.12163 12.6289 8.4375 11.7862 8.4375H6.2145C5.37134 8.4375 4.6875 9.12134 4.6875 9.9645V15.1875H3.83326C3.58582 15.1875 3.34842 15.0897 3.17281 14.9154C2.9972 14.7411 2.89761 14.5044 2.89574 14.257L2.81774 3.75703C2.81682 3.63333 2.84038 3.51066 2.88708 3.39611C2.93378 3.28155 3.00269 3.17737 3.08983 3.08957C3.17698 3.00177 3.28064 2.93208 3.39485 2.88453C3.50905 2.83698 3.63154 2.8125 3.75524 2.8125H5.43226V5.18175C5.43226 5.52985 5.57054 5.86369 5.81668 6.10983C6.06282 6.35597 6.39666 6.49425 6.74476 6.49425H11.2448C11.5929 6.49425 11.9267 6.35597 12.1728 6.10983C12.419 5.86369 12.5573 5.52985 12.5573 5.18175V2.91925C12.6414 2.96326 12.7185 3.01991 12.7858 3.08725L14.9068 5.20831C15.0826 5.38405 15.1814 5.62254 15.1815 5.87112V14.25C15.1815 14.4986 15.0827 14.7371 14.9069 14.9129C14.7311 15.0887 14.4926 15.1875 14.244 15.1875H13.3125ZM11.4323 5.18175V2.8125H6.55726V5.18175C6.55726 5.23148 6.57701 5.27917 6.61218 5.31433C6.64734 5.3495 6.69503 5.36925 6.74476 5.36925H11.2448C11.2945 5.36925 11.3422 5.3495 11.3773 5.31433C11.4125 5.27917 11.4323 5.23148 11.4323 5.18175Z"
                                        fill="white" />
                                </svg>
                                <span>Tạo đơn thanh toán</span>
                            </button>
                        </a>
                        <a href="#" onclick="getAction(this)" id="btnHoaDon">
                            <button name="action" value="action_3" type="submit"
                                class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                                <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M3.75528 1.6875H5.99476H11.9948H12.123C12.3939 1.6875 12.6621 1.74088 12.9123 1.84459C13.1626 1.94829 13.3899 2.10029 13.5814 2.29189L15.7022 4.41269C16.089 4.79939 16.3064 5.32394 16.3065 5.87088V14.25C16.3065 14.797 16.0892 15.3216 15.7024 15.7084C15.3156 16.0952 14.791 16.3125 14.244 16.3125H12.75H5.25H3.83328C3.28894 16.3125 2.76666 16.0973 2.38031 15.7139C1.99396 15.3304 1.77486 14.8098 1.77078 14.2655L1.69278 3.76547C1.69074 3.49333 1.74258 3.22344 1.84531 2.97143C1.94805 2.71941 2.09965 2.49021 2.29137 2.29705C2.4831 2.10389 2.71115 1.95058 2.9624 1.84597C3.21364 1.74135 3.48312 1.68749 3.75528 1.6875ZM5.8125 15.1875H12.1875V9.9645C12.1875 9.74238 12.0071 9.5625 11.7862 9.5625H6.2145C5.99266 9.5625 5.8125 9.74266 5.8125 9.9645V15.1875ZM13.3125 15.1875V9.9645C13.3125 9.12163 12.6289 8.4375 11.7862 8.4375H6.2145C5.37134 8.4375 4.6875 9.12134 4.6875 9.9645V15.1875H3.83326C3.58582 15.1875 3.34842 15.0897 3.17281 14.9154C2.9972 14.7411 2.89761 14.5044 2.89574 14.257L2.81774 3.75703C2.81682 3.63333 2.84038 3.51066 2.88708 3.39611C2.93378 3.28155 3.00269 3.17737 3.08983 3.08957C3.17698 3.00177 3.28064 2.93208 3.39485 2.88453C3.50905 2.83698 3.63154 2.8125 3.75524 2.8125H5.43226V5.18175C5.43226 5.52985 5.57054 5.86369 5.81668 6.10983C6.06282 6.35597 6.39666 6.49425 6.74476 6.49425H11.2448C11.5929 6.49425 11.9267 6.35597 12.1728 6.10983C12.419 5.86369 12.5573 5.52985 12.5573 5.18175V2.91925C12.6414 2.96326 12.7185 3.01991 12.7858 3.08725L14.9068 5.20831C15.0826 5.38405 15.1814 5.62254 15.1815 5.87112V14.25C15.1815 14.4986 15.0827 14.7371 14.9069 14.9129C14.7311 15.0887 14.4926 15.1875 14.244 15.1875H13.3125ZM11.4323 5.18175V2.8125H6.55726V5.18175C6.55726 5.23148 6.57701 5.27917 6.61218 5.31433C6.64734 5.3495 6.69503 5.36925 6.74476 5.36925H11.2448C11.2945 5.36925 11.3422 5.3495 11.3773 5.31433C11.4125 5.27917 11.4323 5.23148 11.4323 5.18175Z"
                                        fill="white" />
                                </svg>
                                <span>Tạo hóa đơn bán hàng</span>
                            </button>
                        </a>
                    </div>
                    <div class="row m-0 mb-1">
                        <a href="#" onclick="getAction(this)" id="btnNhan">
                            <button name="action" value="action_2" type="submit"
                                class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                                <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M3.75528 1.6875H5.99476H11.9948H12.123C12.3939 1.6875 12.6621 1.74088 12.9123 1.84459C13.1626 1.94829 13.3899 2.10029 13.5814 2.29189L15.7022 4.41269C16.089 4.79939 16.3064 5.32394 16.3065 5.87088V14.25C16.3065 14.797 16.0892 15.3216 15.7024 15.7084C15.3156 16.0952 14.791 16.3125 14.244 16.3125H12.75H5.25H3.83328C3.28894 16.3125 2.76666 16.0973 2.38031 15.7139C1.99396 15.3304 1.77486 14.8098 1.77078 14.2655L1.69278 3.76547C1.69074 3.49333 1.74258 3.22344 1.84531 2.97143C1.94805 2.71941 2.09965 2.49021 2.29137 2.29705C2.4831 2.10389 2.71115 1.95058 2.9624 1.84597C3.21364 1.74135 3.48312 1.68749 3.75528 1.6875ZM5.8125 15.1875H12.1875V9.9645C12.1875 9.74238 12.0071 9.5625 11.7862 9.5625H6.2145C5.99266 9.5625 5.8125 9.74266 5.8125 9.9645V15.1875ZM13.3125 15.1875V9.9645C13.3125 9.12163 12.6289 8.4375 11.7862 8.4375H6.2145C5.37134 8.4375 4.6875 9.12134 4.6875 9.9645V15.1875H3.83326C3.58582 15.1875 3.34842 15.0897 3.17281 14.9154C2.9972 14.7411 2.89761 14.5044 2.89574 14.257L2.81774 3.75703C2.81682 3.63333 2.84038 3.51066 2.88708 3.39611C2.93378 3.28155 3.00269 3.17737 3.08983 3.08957C3.17698 3.00177 3.28064 2.93208 3.39485 2.88453C3.50905 2.83698 3.63154 2.8125 3.75524 2.8125H5.43226V5.18175C5.43226 5.52985 5.57054 5.86369 5.81668 6.10983C6.06282 6.35597 6.39666 6.49425 6.74476 6.49425H11.2448C11.5929 6.49425 11.9267 6.35597 12.1728 6.10983C12.419 5.86369 12.5573 5.52985 12.5573 5.18175V2.91925C12.6414 2.96326 12.7185 3.01991 12.7858 3.08725L14.9068 5.20831C15.0826 5.38405 15.1814 5.62254 15.1815 5.87112V14.25C15.1815 14.4986 15.0827 14.7371 14.9069 14.9129C14.7311 15.0887 14.4926 15.1875 14.244 15.1875H13.3125ZM11.4323 5.18175V2.8125H6.55726V5.18175C6.55726 5.23148 6.57701 5.27917 6.61218 5.31433C6.64734 5.3495 6.69503 5.36925 6.74476 5.36925H11.2448C11.2945 5.36925 11.3422 5.3495 11.3773 5.31433C11.4125 5.27917 11.4323 5.23148 11.4323 5.18175Z"
                                        fill="white" />
                                </svg>
                                <span>Tạo đơn giao hàng</span>
                            </button>
                        </a>
                        <a href="#" onclick="getAction(this)" id="btnMuaHang">
                            <button name="action" value="action_6" type="submit"
                                class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                                <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M3.75528 1.6875H5.99476H11.9948H12.123C12.3939 1.6875 12.6621 1.74088 12.9123 1.84459C13.1626 1.94829 13.3899 2.10029 13.5814 2.29189L15.7022 4.41269C16.089 4.79939 16.3064 5.32394 16.3065 5.87088V14.25C16.3065 14.797 16.0892 15.3216 15.7024 15.7084C15.3156 16.0952 14.791 16.3125 14.244 16.3125H12.75H5.25H3.83328C3.28894 16.3125 2.76666 16.0973 2.38031 15.7139C1.99396 15.3304 1.77486 14.8098 1.77078 14.2655L1.69278 3.76547C1.69074 3.49333 1.74258 3.22344 1.84531 2.97143C1.94805 2.71941 2.09965 2.49021 2.29137 2.29705C2.4831 2.10389 2.71115 1.95058 2.9624 1.84597C3.21364 1.74135 3.48312 1.68749 3.75528 1.6875ZM5.8125 15.1875H12.1875V9.9645C12.1875 9.74238 12.0071 9.5625 11.7862 9.5625H6.2145C5.99266 9.5625 5.8125 9.74266 5.8125 9.9645V15.1875ZM13.3125 15.1875V9.9645C13.3125 9.12163 12.6289 8.4375 11.7862 8.4375H6.2145C5.37134 8.4375 4.6875 9.12134 4.6875 9.9645V15.1875H3.83326C3.58582 15.1875 3.34842 15.0897 3.17281 14.9154C2.9972 14.7411 2.89761 14.5044 2.89574 14.257L2.81774 3.75703C2.81682 3.63333 2.84038 3.51066 2.88708 3.39611C2.93378 3.28155 3.00269 3.17737 3.08983 3.08957C3.17698 3.00177 3.28064 2.93208 3.39485 2.88453C3.50905 2.83698 3.63154 2.8125 3.75524 2.8125H5.43226V5.18175C5.43226 5.52985 5.57054 5.86369 5.81668 6.10983C6.06282 6.35597 6.39666 6.49425 6.74476 6.49425H11.2448C11.5929 6.49425 11.9267 6.35597 12.1728 6.10983C12.419 5.86369 12.5573 5.52985 12.5573 5.18175V2.91925C12.6414 2.96326 12.7185 3.01991 12.7858 3.08725L14.9068 5.20831C15.0826 5.38405 15.1814 5.62254 15.1815 5.87112V14.25C15.1815 14.4986 15.0827 14.7371 14.9069 14.9129C14.7311 15.0887 14.4926 15.1875 14.244 15.1875H13.3125ZM11.4323 5.18175V2.8125H6.55726V5.18175C6.55726 5.23148 6.57701 5.27917 6.61218 5.31433C6.64734 5.3495 6.69503 5.36925 6.74476 5.36925H11.2448C11.2945 5.36925 11.3422 5.3495 11.3773 5.31433C11.4125 5.27917 11.4323 5.23148 11.4323 5.18175Z"
                                        fill="white" />
                                </svg>
                                <span>Tạo đơn mua hàng</span>
                            </button>
                        </a>
                    </div> 
                </div>
            </div>
            <section class="border-custom" style="height:50px">
                <div class="d-flex justify-content-between align-items-center h-100">
                    <div class="content-header--options p-0 border-0">
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
                    </div>
                    <div class="d-flex position-fixed" style="right: 10px; top: 70px;">
                        @if ($detailExport->status_receive == 1)
                            <div class="border text-secondary p-1" style="border-radius:4px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <g clip-path="url(#clip0_2936_30076)">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.99596 13.8634C11.2361 13.8634 13.8626 11.2368 13.8626 7.9967C13.8626 4.75662 11.2361 2.13003 7.99596 2.13003C4.75589 2.13003 2.1293 4.75662 2.1293 7.9967C2.1293 11.2368 4.75589 13.8634 7.99596 13.8634ZM7.99596 15.4634C12.1197 15.4634 15.4626 12.1204 15.4626 7.9967C15.4626 3.87297 12.1197 0.530029 7.99596 0.530029C3.87224 0.530029 0.529297 3.87297 0.529297 7.9967C0.529297 12.1204 3.87224 15.4634 7.99596 15.4634Z" fill="#858585"/>
                                        <path d="M11.8055 7.9967C11.8055 10.1006 10.0999 11.8062 7.99599 11.8062L7.99573 4.18717C10.0997 4.18717 11.8055 5.89275 11.8055 7.9967Z" fill="#858585"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_2936_30076">
                                        <rect width="16" height="16" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span class="text-table">Giao hàng: Chưa giao</span>
                            </div>
                        @elseif($detailExport->status_receive == 2)
                            <div class="border text-success p-1" style="border-radius:4px;">
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
                            <div class="border text-warning p-1">
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
                            <div class="border text-secondary p-1" style="border-radius:4px;">
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
                            <div class="border text-success p-1" style="border-radius:4px;">
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
                            <div class="border text-warning p-1" style="border-radius:4px;">
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
                            <div class="border text-secondary p-1" style="border-radius:4px;">
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
                            <div class="border text-success p-1" style="border-radius:4px;">
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
                            <div class="border text-warning p-1" style="border-radius:4px;">
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
    <div class="content" id="main" style="margin-top: 5.3rem;">
        <div class="container-fluided margin-250">
            <div class="tab-content">
                <div id="info" class="content tab-pane in active">
                    <div class="bg-filter-search border-top-0 text-center  border-custom">
                        <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN SẢN PHẨM</p>
                    </div>
                    <div class="col-12 p-0">
                        <section class="card scroll-custom mb-0">
                            <div class="card-body table-responsive text-nowrap border-custom order_content">
                                    <table class="table table-hover bg-white rounded" id="">
                                        <thead>
                                            <tr style="height:44px;">
                                                <th scope="col" class="border" style="padding-left: 2rem;">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="id"
                                                            data-sort-type="#">
                                                            <button class="btn-sort text-13" type="submit">Mã sản phẩm</button>
                                                        </a>
                                                        <div class="icon" id="icon-id"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="border">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="created_at"
                                                            data-sort-type="">
                                                            <button class="btn-sort text-13" type="submit">Tên sản phẩm</button>
                                                        </a>
                                                        <div class="icon" id="icon-created_at"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="border">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="created_at"
                                                            data-sort-type=""><button class="btn-sort text-13" type="submit">Đơn vị</button>
                                                        </a>
                                                        <div class="icon" id="icon-created_at"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="border">
                                                    <span class="d-flex justify-content-start">
                                                        <a href="#" class="sort-link" data-sort-by="total"
                                                            data-sort-type=""><button class="btn-sort text-13" type="submit">Số lượng</button>
                                                        </a>
                                                        <div class="icon" id="icon-total"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="border">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="total"
                                                            data-sort-type=""><button class="btn-sort text-13" type="submit">Đơn giá</button>
                                                        </a>
                                                        <div class="icon" id="icon-total"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="border">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="total"
                                                            data-sort-type=""><button class="btn-sort text-13" type="submit">Thuế</button>
                                                        </a>
                                                        <div class="icon" id="icon-total"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="border">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="total"
                                                            data-sort-type=""><button class="btn-sort text-13" type="submit">Thành tiền</button>
                                                        </a>
                                                        <div class="icon" id="icon-total"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="border">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="total"
                                                            data-sort-type=""><button class="btn-sort text-13" type="submit">Ghi chú sản phẩm</button>
                                                        </a>
                                                        <div class="icon" id="icon-total"></div>
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($quoteExport as $item_quote)
                                                <tr style="height:80px;">
                                                    <td class="border bg-white align-top text-13-black" style="padding-left: 2rem !important;">
                                                        <input type="text" autocomplete="off" readonly
                                                            value="{{ $item_quote->product_code }}"
                                                            class="border-0 py-1 w-75 product_code"
                                                            name="product_code[]">
                                                    </td>
                                                    <td class="border bg-white align-top text-13-black">
                                                        <div class="d-flex align-items-center">
                                                            <input type="text"
                                                                value="{{ $item_quote->product_name }}"
                                                                class="border-0 px-2 py-1 w-100 product_name" readonly
                                                                autocomplete="off" name="product_name[]">
                                                            <input type="hidden" class="product_id"
                                                                value="{{ $item_quote->product_id }}"
                                                                autocomplete="off" name="product_id[]">
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
                                                    <td class="border bg-white align-top text-13-black">
                                                        <input type="text" autocomplete="off" readonly
                                                            value="{{ $item_quote->product_unit }}"
                                                            class="border-0 px-2 py-1 w-100 product_unit"
                                                            name="product_unit[]">
                                                    </td>
                                                    <td class="border bg-white align-top text-13-black">
                                                        <div>
                                                            <input type='text' 
                                                            value="{{ is_int($item_quote->product_qty) ? $item_quote->product_qty : rtrim(rtrim(number_format($item_quote->product_qty, 4, '.', ''), '0'), '.') }}"
                                                                    class='text-right border-0 py-1 w-100 quantity-input' autocomplete='off' required name='product_qty[]'>
                                                            <input type='hidden' class='tonkho'>
                                                        </div>
                                                        <div class='mt-3 text-13-blue inventory text-right'>Tồn kho: <span class='pl-1 soTonKho'>35</span></div>
                                                    </td>
                                                    <td class="border bg-white align-top text-13-black">
                                                        <div>
                                                            <input type="text"
                                                                value="{{ number_format($item_quote->price_export) }}"
                                                                class="border-0 px-2 py-1 w-100 product_price text-right"
                                                                autocomplete="off" name="product_price[]" readonly>
                                                            </div>
                                                            <div class='mt-3 text-13-blue text-right'>Giao dịch gần đây</div>
                                                    </td>
                                                    <td class="border bg-white align-top">
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
                                                    <td class="border bg-white align-top text-13-black text-left">
                                                        <input type="text" readonly=""
                                                            value="{{ number_format($item_quote->product_total) }}"
                                                            class="border-0 px-2 py-1 w-100 total-amount">
                                                    </td>
                                                    <td class="text-center border bg-white align-top text-13-black">
                                                        <input type="text" class="border-0 py-1 w-100" readonly
                                                            name="product_note[]"
                                                            placeholder='Nhập ghi chú'
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

                    <div class="bg-filter-search border-top-0 text-left ">
                        <p class="font-weight-bold text-uppercase info-chung--heading text-left">Hệ thống ACCESS POINT</p>
                    </div>
                    <!-- TOTAL -->
                    <div class="content">
                                <div class="row" style="width:95%;">
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
                                                <span class="text-13-bold text-lg font-weight-bold text-right" id="grand-total" data-value="0">0đ</span>
                                                <input type="text" hidden="" name="totalValue" value="0" id="total"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
                <div id="history" class="tab-pane fade">
                    <div class="bg-filter-search border-top-0 text-center  border-custom">
                        <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN SẢN PHẨM</p>
                    </div>
                    <section class="card scroll-custom mb-0">
                            <div class="card-body table-responsive text-nowrap border-custom order_content">
                                    <table class="table table-hover bg-white rounded">
                                        <thead>
                                            <tr style="height:44px;">
                                                <th scope="col" class="border" style="padding-left: 2rem;">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="id"
                                                            data-sort-type="#">
                                                            <button class="btn-sort text-13" type="submit">Mã sản phẩm</button>
                                                        </a>
                                                        <div class="icon" id="icon-id"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="border">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="created_at"
                                                            data-sort-type="">
                                                            <button class="btn-sort text-13" type="submit">Tên sản phẩm</button>
                                                        </a>
                                                        <div class="icon" id="icon-created_at"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="border">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="created_at"
                                                            data-sort-type=""><button class="btn-sort text-13" type="submit">Đơn vị</button>
                                                        </a>
                                                        <div class="icon" id="icon-created_at"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="border">
                                                    <span class="d-flex justify-content-start">
                                                        <a href="#" class="sort-link" data-sort-by="total"
                                                            data-sort-type=""><button class="btn-sort text-13" type="submit">Số lượng</button>
                                                        </a>
                                                        <div class="icon" id="icon-total"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="border">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="total"
                                                            data-sort-type=""><button class="btn-sort text-13" type="submit">Đơn giá</button>
                                                        </a>
                                                        <div class="icon" id="icon-total"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="border">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="total"
                                                            data-sort-type=""><button class="btn-sort text-13" type="submit">Thuế</button>
                                                        </a>
                                                        <div class="icon" id="icon-total"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="border">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="total"
                                                            data-sort-type=""><button class="btn-sort text-13" type="submit">Thành tiền</button>
                                                        </a>
                                                        <div class="icon" id="icon-total"></div>
                                                    </span>
                                                </th>
                                                <th scope="col" class="border">
                                                    <span class="d-flex">
                                                        <a href="#" class="sort-link" data-sort-by="total"
                                                            data-sort-type=""><button class="btn-sort text-13" type="submit">Ghi chú sản phẩm</button>
                                                        </a>
                                                        <div class="icon" id="icon-total"></div>
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($quoteExport as $item_quote)
                                                <tr style="height:80px;">
                                                    <td class="border bg-white align-top text-13-black" style="padding-left: 2rem !important;">
                                                        <input type="text" autocomplete="off" readonly
                                                            value="{{ $item_quote->product_code }}"
                                                            class="border-0 py-1 w-75 product_code"
                                                            name="product_code[]">
                                                    </td>
                                                    <td class="border bg-white align-top text-13-black">
                                                        <div class="d-flex align-items-center">
                                                            <input type="text"
                                                                value="{{ $item_quote->product_name }}"
                                                                class="border-0 px-2 py-1 w-100 product_name" readonly
                                                                autocomplete="off" name="product_name[]">
                                                            <input type="hidden" class="product_id"
                                                                value="{{ $item_quote->product_id }}"
                                                                autocomplete="off" name="product_id[]">
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
                                                    <td class="border bg-white align-top text-13-black">
                                                        <input type="text" autocomplete="off" readonly
                                                            value="{{ $item_quote->product_unit }}"
                                                            class="border-0 px-2 py-1 w-100 product_unit"
                                                            name="product_unit[]">
                                                    </td>
                                                    <td class="border bg-white align-top text-13-black">
                                                        <div>
                                                            <input type='text' 
                                                            value="{{ is_int($item_quote->product_qty) ? $item_quote->product_qty : rtrim(rtrim(number_format($item_quote->product_qty, 4, '.', ''), '0'), '.') }}"
                                                                    class='text-right border-0 py-1 w-100 quantity-input' autocomplete='off' required name='product_qty[]'>
                                                            <input type='hidden' class='tonkho'>
                                                        </div>
                                                        <div class='mt-3 text-13-blue inventory text-right'>Tồn kho: <span class='pl-1 soTonKho'>35</span></div>
                                                    </td>
                                                    <td class="border bg-white align-top text-13-black">
                                                        <div>
                                                            <input type="text"
                                                                value="{{ number_format($item_quote->price_export) }}"
                                                                class="border-0 px-2 py-1 w-100 product_price text-right"
                                                                autocomplete="off" name="product_price[]" readonly>
                                                            </div>
                                                            <div class='mt-3 text-13-blue text-right'>Giao dịch gần đây</div>
                                                    </td>
                                                    <td class="border bg-white align-top">
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
                                                    <td class="border bg-white align-top text-13-black text-left">
                                                        <input type="text" readonly=""
                                                            value="{{ number_format($item_quote->product_total) }}"
                                                            class="border-0 px-2 py-1 w-100 total-amount">
                                                    </td>
                                                    <td class="text-center border bg-white align-top text-13-black">
                                                        <input type="text" class="border-0 py-1 w-100" readonly
                                                            name="product_note[]"
                                                            placeholder='Nhập ghi chú'
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
            </div>
        </div>
        {{-- Thông tin khách hàng --}}
        <div class="content">
            <div id="mySidenav" class="sidenav1 border" style="top:110px !important;">
                <div id="show_info_Guest">
                    <div class="bg-filter-search border-0 text-center border-custom">
                        <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN KHÁCH HÀNG</p>
                    </div>
                    <div class="d-flex justify-content-between py-2 px-3 border align-items-center text-left text-nowrap" style="height:44px;" style="height:44px;">
                            <span class="text-13 btn-click" style="flex: 1.5;"> Khách hàng
                            </span>
                            <span class="mx-1 text-13" style="flex: 2;">
                                <input type="text" placeholder="Chọn thông tin"
                                     class="border-0 w-100 bg-input-guest py-0 py-2 px-2 nameGuest " id="myInput"
                                     style="background-color:#F0F4FF; border-radius:4px;"
                                     autocomplete="off" required value="{{ $detailExport->guest_name_display }}">
                                 <input type="hidden" class="idGuest" 
                                    autocomplete="off" name="guest_id" value="{{ $detailExport->maKH }}">
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
                                        <span id="search-icon" class="search-icon"><i
                                                class="fas fa-search text-table" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                @foreach ($guest as $guest_value)
                                    <li class="p-2 align-items-center" style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                        <a href="#" title="{{ $guest_value->guest_name_display }}" 
                                            id="{{ $guest_value->id }}" name="search-info" class="search-info">
                                                <span class="text-13-black">{{ $guest_value->guest_name_display }}</span>
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
                                @endforeach
                                <a type="button"
                                    class="d-flex align-items-center p-2 position-sticky addGuestNew mt-2"
                                    data-toggle="modal" data-target="#guestModal" style="bottom: 0;border-radius:4px;background-color:#F2F2F2;">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z" fill="#282A30"/>
                                        </svg>
                                    </span>
                                    <span class="text-13-black pl-3 pt-1" style="font-weight: 600 !important;">Thêm khách hàng</span>
                                </a>
                            </ul>
                        </div>
                        <div class="content-info--common" id="show-info-guest">
                            <ul class="p-0 m-0">
                                <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left" style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Người đại diện</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest" value="{{ $detailExport->represent_name }}"
                                            id="represent_guest" style="flex:2;" placeholder="Chọn thông tin">
                                    <input type="hidden" class="represent_guest_id" name="represent_guest_id" autocomplete="off">
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left" style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3"style="flex: 1.5;">Số báo giá</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest" style="flex:2;" name="quotation_number" 
                                            value="{{ $detailExport->quotation_number }}"/>
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left" style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Số tham chiếu</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest" placeholder="Chọn thông tin" 
                                    style="flex:2;" name="reference_number" value="{{ $detailExport->reference_number }}"/>
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left" style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày báo giá</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest " 
                                    id="customDateInput" name="date_quote" style="flex:2;"  value="{{ date_format(new DateTime($detailExport->ngayBG), 'd/m/Y') }}" />
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left" style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Hiệu lực báo giá</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest " placeholder="Chọn thông tin" 
                                        name="price_effect" id="myInput"
                                        style="flex:2;"  value="{{ $detailExport->price_effect }}" />
                                
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left" style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Điều khoản</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest" id="myInput"
                                            placeholder="Chọn thông tin" style="flex:2;" name="terms_pay"
                                            value="{{ $detailExport->terms_pay }}"/>
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left" style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Dự án</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest" style="flex:2;" 
                                    placeholder="Chọn thông tin" id="ProjectInput" value="{{ $detailExport->project_name }}"/>
                                    
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left" style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Hàng hóa</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest " style="flex:2;"
                                            id="myInput" placeholder="Chọn thông tin" name="goods"
                                            value="{{ $detailExport->goods }}" />
                                   
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left" style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Giao hàng</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest " style="flex:2;" 
                                            placeholder="Chọn thông tin" name="delivery" id="myInput"
                                            value="{{ $detailExport->delivery }}"/>
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left" style="height:44px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Địa điểm</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest " style="flex:2;" 
                                            placeholder="Chọn thông tin" name="location" id="myInput"
                                            value="{{ $detailExport->location }}"/>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<div id="files" class="tab-pane fade">
    <div class="bg-filter-search border-top-0 text-center py-2">
        <span class="font-weight-bold text-secondary text-nav">File đính kèm</span>
    </div>
    <x-form-attachment :value="$detailExport" name="BG"></x-form-attachment>
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

    //Mở rộng
    var status_form = 0;
    $('.change_colum').off('click').on('click', function() {
        if (status_form == 0) {
            $(this).text('Tối giản');
            $('.product_price').attr('readonly', false);
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

    $(document).on('input', '.quantity-input, [name^="product_price"], .product_tax, .heSoNhan, .giaNhap',
        function() {
            calculateTotals();
        });

    function calculateTotals() {
        var totalAmount = 0;
        var totalTax = 0;

        // Lặp qua từng hàng
        $('#info tr').each(function() {
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
                var rawGiaNhap = giaNhapElement.val() || 0;
                if (rawGiaNhap !== "") {
                    giaNhap = parseFloat(rawGiaNhap.replace(/,/g, '')) ||
                        0;
                } else {
                    giaNhap = 0;
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
