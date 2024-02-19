<x-navbar :title="$title" activeGroup="sell" activeName="quote" :workspacename="$workspacename"></x-navbar>
<form action="{{ route('detailExport.update', ['workspace' => $workspacename, 'detailExport' => $detailExport->maBG]) }}"
    method="POST" id="formSubmit" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="detail_id" value="{{ $detailExport->maBG }}">
    <input type="hidden" name="table_name" value="BG">
    <input type="hidden" value="{{ $detailExport->maBG }}" name="detailexport_id">
    <div class="content-wrapper1 py-2 border border-top-0 border-left-0 border-right-0">
        <div class="d-flex justify-content-between align-items-center pl-4 ml-1">
            <div class="container-fluided">
                <div class="mb">
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
                                fill="#26273B" fill-opacity="0.8"></path>
                        </svg>
                    </span>
                    <span class="font-weight-bold text-secondary">{{ $detailExport->quotation_number }}</span>
                    @if ($detailExport->tinhTrang == 1)
                        <span class="border ml-2 p-1 text-nav text-secondary shadow-sm rounded">Nháp</span>
                    @else
                        <span class="border ml-2 p-1 text-nav text-primary shadow-sm rounded">Chính thức</span>
                    @endif
                </div>
            </div>
            <div class="container-fluided z-index-block">
                <div class="row m-0">
                    <button name="action" value="action_5" type="submit"
                        onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                        class="custom-btn-danger d-flex align-items-center h-100 py-1 px-2" style="margin-right:10px">
                        <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z"
                                fill="white"></path>
                        </svg>
                        <span class="text-button">Xóa</span>
                    </button>
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
                                <span class="text-button">Hủy</span>
                            </button>
                        </a>
                    </div>
                    <div class="dropdown">
                        <button type="button" data-toggle="dropdown"
                            class="btn-save-print rounded d-flex align-items-center h-100 dropdown-toggle px-2"
                            style="margin-right:10px">
                            <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                    fill="#6D7075"></path>
                            </svg>
                            <span class="text-button">In</span>
                        </button>
                        <div class="dropdown-menu" style="z-index: 9999;">
                            <a class="dropdown-item text-nav" href="{{ route('excel', $detailExport->maBG) }}">Xuất
                                Excel</a>
                            <a class="dropdown-item text-nav border-top"
                                href="{{ route('pdf', $detailExport->maBG) }}">Xuất
                                PDF</a>
                        </div>
                    </div>
                    @if ($detailExport->tinhTrang == 1)
                        <a
                            href="{{ route('detailExport.edit', ['workspace' => $workspacename, 'detailExport' => $detailExport->maBG]) }}">
                            <button type="button" class="custom-btn d-flex align-items-center h-100 py-1 px-2"
                                style="margin-right:10px">
                                <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
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
                                <span>Sửa</span>
                            </button>
                        </a>
                    @endif
                    <div class="dropdown">
                        <button type="button" data-toggle="dropdown"
                            class="custom-btn rounded d-flex align-items-center h-100 dropdown-toggle px-2"
                            style="margin-right:10px">
                            <svg class="mr-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4.82017 6.15415C5.02571 5.94862 5.35895 5.94862 5.56449 6.15415L7.99935 8.58901L10.4342 6.15415C10.6397 5.94862 10.973 5.94862 11.1785 6.15415C11.3841 6.35969 11.3841 6.69294 11.1785 6.89848L8.37151 9.70549C8.16597 9.91103 7.83273 9.91103 7.62719 9.70549L4.82017 6.89848C4.61463 6.69294 4.61463 6.35969 4.82017 6.15415Z"
                                    fill="white" />
                            </svg>
                            <span class="text-button">Tạo nhanh</span>
                        </button>
                        <div class="dropdown-menu" style="z-index: 9999;">
                            <a href="#" onclick="getAction(this)" id="btnThanhToan">
                                <button name="action" value="action_4" type="submit"
                                    class="btn-save-print d-flex align-items-center h-100 border-top-0 w-100 rounded hover-button">
                                    <span class="text-nav text-dark mt-1">Tạo đơn thanh toán</span>
                                </button>
                            </a>
                            <a href="#" onclick="getAction(this)" id="btnHoaDon">
                                <button name="action" value="action_3" type="submit"
                                    class="btn-save-print d-flex align-items-center h-100 border-top-0 w-100 rounded hover-button">
                                    <span class="text-nav text-dark mt-1">Tạo hóa đơn bán hàng</span>
                                </button>
                            </a>
                            <a href="#" onclick="getAction(this)" id="btnNhan">
                                <button name="action" value="action_2" type="submit"
                                    class="btn-save-print d-flex align-items-center h-100 border-top-0 w-100 rounded hover-button">
                                    <span class="text-nav text-dark mt-1">Tạo đơn giao hàng</span>
                                </button>
                            </a>
                            <a href="#" onclick="getAction(this)" id="btnMuaHang">
                                <button name="action" value="action_6" type="submit"
                                    class="btn-save-print d-flex align-items-center h-100 border-top-0 w-100 rounded hover-button">
                                    <span class="text-nav text-dark mt-1">Tạo đơn mua hàng</span>
                                </button>
                            </a>
                        </div>
                    </div>
                    <label class="custom-btn d-flex align-items-center h-100 m-0 mr-2">
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
                    <div id="sideGuest">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="16" width="16" height="16" rx="5" transform="rotate(90 16 0)"
                                fill="#ECEEFA"></rect>
                            <path
                                d="M15 11C15 13.2091 13.2091 15 11 15L5 15C2.7909 15 1 13.2091 1 11L1 5C1 2.79086 2.7909 1 5 1L11 1C13.2091 1 15 2.79086 15 5L15 11ZM10 13.5L10 2.5L5 2.5C3.6193 2.5 2.5 3.61929 2.5 5L2.5 11C2.5 12.3807 3.6193 13.5 5 13.5H10Z"
                                fill="#26273B" fill-opacity="0.8"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Thông tin sản phẩm --}}
    <section class="content-wrapper1 p-2 position-relative">
        <div class="d-flex justify-content-between">
            <ul class="nav nav-tabs bg-filter-search border-0 py-2 rounded ml-3">
                <li class="text-nav">
                    <a data-toggle="tab" href="#info" class="active text-secondary">Thông tin</a>
                </li>
                <li class="text-nav">
                    <a data-toggle="tab" href="#history" class="text-secondary mx-4">Lịch sử</a>
                </li>
                <li class="text-nav">
                    <a data-toggle="tab" href="#files" class="text-secondary">File đính kèm</a>
                </li>
            </ul>
            <div class="d-flex position-sticky" style="right: 10px; top: 80px;">
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
    <div class="content-wrapper1 py-0 pl-0 px-0" id="main">
        <section class="content">
            <div class="container-fluided">
                <div class="tab-content">
                    <div id="info" class="content tab-pane in active">
                        <div class="bg-filter-search text-center py-2 border-right-0 border-left-0">
                            <span class="font-weight-bold text-secondary text-nav">THÔNG TIN SẢN PHẨM</span>
                        </div>
                        <section class="content">
                            <div class="container-fluided order_content">
                                <table class="table table-hover bg-white rounded">
                                    <thead>
                                        <tr>
                                            <th class="border-right p-1 border-top-0" style="width: 15%;">
                                                <input class="ml-4 border-danger" id="checkall" type="checkbox">
                                                <span class="text-table text-secondary">Mã sản phẩm</span>
                                            </th>
                                            <th class="border-right p-1 border-top-0" style="width: 15%;">
                                                <span class="text-table text-secondary">Tên sản phẩm</span>
                                            </th>
                                            <th class="border-right p-1 border-top-0" style="width: 8%;">
                                                <span class="text-table text-secondary">Đơn vị</span>
                                            </th>
                                            <th class="border-right p-1 border-top-0" style="width: 8%;">
                                                <span class="text-table text-secondary">Số lượng</span>
                                            </th>
                                            <th class="border-right p-1 border-top-0" style="width: 15%;">
                                                <span class="text-table text-secondary">Đơn giá</span>
                                            </th>
                                            <th class="border-right p-1 border-top-0" style="width: 8%;">
                                                <span class="text-table text-secondary">Thuế</span>
                                            </th>
                                            <th class="border-right p-1 border-top-0" style="width: 15%;">
                                                <span class="text-table text-secondary">
                                                    Thành tiền
                                                </span>
                                            </th>
                                            <th class="note p-1 border-top-0">
                                                <span class="text-table text-secondary">
                                                    Ghi chú
                                                </span>
                                            </th>
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
                                                            class="border-0 px-2 py-1 w-75 product_code"
                                                            name="product_code[]">
                                                    </div>
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 position-relative">
                                                    <div class="d-flex align-items-center">
                                                        <input type="text" value="{{ $item_quote->product_name }}"
                                                            class="border-0 px-2 py-1 w-100 product_name" readonly
                                                            autocomplete="off" name="product_name[]">
                                                        <input type="hidden" class="product_id"
                                                            value="{{ $item_quote->product_id }}" autocomplete="off"
                                                            name="product_id[]">
                                                        <div class="info-product" data-toggle="modal"
                                                            data-target="#productModal">
                                                            <svg width="16" height="16" viewBox="0 0 16 16"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                                <td class="border border-top-0 border-bottom-0">
                                                    <input type="text" autocomplete="off" readonly
                                                        value="{{ $item_quote->product_unit }}"
                                                        class="border-0 px-2 py-1 w-100 product_unit"
                                                        name="product_unit[]">
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 position-relative">
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
                                                <td class="border border-top-0 border-bottom-0 position-relative">
                                                    <input type="text"
                                                        value="{{ number_format($item_quote->price_export) }}"
                                                        class="border-0 px-2 py-1 w-100 product_price"
                                                        autocomplete="off" name="product_price[]" readonly>
                                                    <p class="text-primary text-right position-absolute transaction"
                                                        style="top: 68%; right: 5%; display: none;">Giao dịch
                                                        gần đây
                                                    </p>
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 px-4">
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
                                                <td class="border border-top-0 border-bottom-0">
                                                    <input type="text" readonly=""
                                                        value="{{ number_format($item_quote->product_total) }}"
                                                        class="border-0 px-2 py-1 w-100 total-amount">
                                                </td>
                                                <td
                                                    class="border border-top-0 border-bottom-0 position-relative note p-1 border-right-0">
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
                        <div class="content">
                            <div class="container-fluided">
                                <div class="row position-relative footer-total m-0">
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
                    <div id="history" class="tab-pane fade">
                        <div class="bg-filter-search border-top-0 text-center py-2">
                            <span class="font-weight-bold text-secondary text-nav">Lịch sử</span>
                        </div>
                        <section class="content">
                            <div class="container-fluided order_content">
                                <table class="table table-hover bg-white rounded">
                                    <thead>
                                        <tr>
                                            <th class="p-1 border-right text-table text-secondary border-top-0">
                                                Mã sản phẩm
                                            </th>
                                            <th class="p-1 border-right text-table text-secondary border-top-0">Tên sản
                                                phẩm</th>
                                            <th class="p-1 border-right text-table text-secondary border-top-0">Đơn vị
                                            </th>
                                            <th class="p-1 border-right text-table text-secondary border-top-0">Số
                                                lượng</th>
                                            <th class="p-1 border-right text-table text-secondary border-top-0">Đơn giá
                                            </th>
                                            <th class="p-1 border-right text-table text-secondary border-top-0">Thuế
                                            </th>
                                            <th class="p-1 border-right text-table text-secondary border-top-0">Thành
                                                tiền</th>
                                            <th class="p-1 border-right note text-table text-secondary border-top-0">
                                                Ghi chú</th>
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
                                                        class="border-0 px-2 py-1 w-100"
                                                        autocomplete="off" readonly>
                                                    <p class="text-primary text-right position-absolute transaction"
                                                        style="top: 68%; right: 5%; display: none;">Giao dịch
                                                        gần đây
                                                    </p>
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 px-4">
                                                    <select class="border-0 text-center" disabled>
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
                                                        class="border-0 px-2 py-1 w-100">
                                                </td>
                                                <td
                                                    class="border border-top-0 border-bottom-0 position-relative note p-1 border-right-0">
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
                    {{-- Thông tin khách hàng --}}
                    <div class="content-wrapper2 px-0 py-0">
                        <div id="mySidenav" class="sidenav1 border">
                            <div id="show_info_Guest">
                                <div class="bg-filter-search border-0 py-2 text-center">
                                    <span class="font-weight-bold text-secondary text-nav">THÔNG TIN KHÁCH HÀNG</span>
                                </div>
                                <div class="d-flex">
                                    <div style="width: 55%;">
                                        <div class="border border-right-0 py-1 border-left-0">
                                            <span class="text-table ml-2">Khách hàng</span>
                                        </div>
                                        <div id="show-title-guest">
                                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                                <span class="text-table ml-2">Người đại diện</span>
                                            </div>
                                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                                <span class="text-table ml-2">Số báo giá</span>
                                            </div>
                                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                                <span class="text-table ml-2">Số tham chiếu</span>
                                            </div>
                                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                                <span class="text-table ml-2">Ngày báo giá</span>
                                            </div>
                                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                                <span class="text-table ml-2">Hiệu lực báo giá</span>
                                            </div>
                                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                                <span class="text-table ml-2">Điều khoản</span>
                                            </div>
                                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                                <span class="text-table ml-2">Dự án</span>
                                            </div>
                                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                                <span class="text-table ml-2">Hàng hóa</span>
                                            </div>
                                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                                <span class="text-table ml-2">Giao hàng</span>
                                            </div>
                                            <div class="border border-right-0 py-1 border-left-0 border-top-0">
                                                <span class="text-table ml-2">Địa điểm</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div
                                            class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                                            <input type="text" placeholder="Chọn thông tin"
                                                value="{{ $detailExport->guest_name_display }}"
                                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0"
                                                autocomplete="off" id="myInput" readonly>
                                            <input type="hidden" class="idGuest" autocomplete="off" name="guest_id"
                                                value="{{ $detailExport->maKH }}">
                                            <div class="opacity-0">
                                                <svg width="18" height="18" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                        <div
                                            class="d-flex align-items-center justify-content-between border border-left-0 py-1 border-top-0">
                                            <input type="text" readonly
                                                value="{{ $detailExport->represent_name }}"
                                                class="border-0 bg w-100 bg-input-guest py-0 px-0" autocomplete="off">
                                            <input type="hidden" class="idGuest" autocomplete="off" name="represent_id"
                                                value="{{ $detailExport->maNDD }}">
                                            <div class="opacity-0">
                                                <svg width="18" height="18" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                        <div
                                            class="d-flex align-items-center justify-content-between border border-left-0 py-1 border-top-0">
                                            <input type="text" placeholder="Chọn thông tin"
                                                value="{{ $detailExport->quotation_number }}" name="quotation_number"
                                                class="border-0 bg w-100 bg-input-guest py-0 px-0 nameGuest"
                                                autocomplete="off" id="myInput" readonly>
                                            <div class="opacity-0">
                                                <svg width="18" height="18" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                        <div
                                            class="d-flex align-items-center justify-content-between border border-left-0 py-1 border-top-0">
                                            <input type="text" value="{{ $detailExport->reference_number }}"
                                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0"
                                                autocomplete="off" id="myInput" readonly>
                                            <div class="opacity-0">
                                                <svg width="18" height="18" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                        <div
                                            class="d-flex align-items-center justify-content-between border border-left-0 py-1 border-top-0">
                                            <input type="text"
                                                value="{{ date_format(new DateTime($detailExport->ngayBG), 'd/m/Y') }}"
                                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0"
                                                autocomplete="off" id="myInput" readonly>
                                            <div class="opacity-0">
                                                <svg width="18" height="18" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                        <div
                                            class="d-flex align-items-center justify-content-between border border-left-0 py-1 border-top-0">
                                            <input type="text" value="{{ $detailExport->price_effect }}"
                                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0"
                                                autocomplete="off" id="myInput" readonly>
                                            <div class="opacity-0">
                                                <svg width="18" height="18" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                        <div
                                            class="d-flex align-items-center justify-content-between border border-left-0 py-1 border-top-0">
                                            <input type="text" value="{{ $detailExport->terms_pay }}"
                                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0"
                                                autocomplete="off" id="myInput" readonly>
                                            <div class="opacity-0">
                                                <svg width="18" height="18" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                        <div
                                            class="d-flex align-items-center justify-content-between border border-left-0 py-1 border-top-0">
                                            <input type="text" value="{{ $detailExport->project_name }}"
                                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0"
                                                autocomplete="off" id="myInput" readonly>
                                            <div class="opacity-0">
                                                <svg width="18" height="18" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                        <div
                                            class="d-flex align-items-center justify-content-between border border-left-0 py-1 border-top-0">
                                            <input type="text" value="{{ $detailExport->goods }}"
                                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0"
                                                autocomplete="off" id="myInput" readonly>
                                            <div class="opacity-0">
                                                <svg width="18" height="18" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                        <div
                                            class="d-flex align-items-center justify-content-between border border-left-0 py-1 border-top-0">
                                            <input type="text" value="{{ $detailExport->delivery }}"
                                                class="border-0 bg w-50 bg-input-guest py-0 nameGuest px-0"
                                                autocomplete="off" id="myInput" readonly>
                                            <div class="opacity-0">
                                                <svg width="18" height="18" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                        <div
                                            class="d-flex align-items-center justify-content-between border border-left-0 py-1 border-top-0">
                                            <input type="text" value="{{ $detailExport->location }}"
                                                class="border-0 bg w-50 bg-input-guest py-0 nameGuest px-0"
                                                autocomplete="off" id="myInput" readonly>
                                            <div class="opacity-0">
                                                <svg width="18" height="18" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
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
