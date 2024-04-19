<x-navbar :title="$title" activeGroup="sell" activeName="dashboardProduct" :workspacename="$workspacename"></x-navbar>
<div class="content-wrapper m-0 min-height--none">
    <div class="content-header-fixed p-0 margin-250">
        <div class="content__header--inner margin-left32">
            <div class="content__heading--left">
                <span>Dashboard</span>
            </div>
        </div>
    </div>
    <div class="content margin-top-67 overflow-auto" style="height: 90vh; scrollbar-width: none;">
        <section class="content margin-250">
            <div class="container-fluided">
                {{-- Sản phẩm bán chạy và hoạt động bán hàng --}}
                <div class="row">
                    <div class="col-md-12 p-0 m-0 pl-2">
                        <div class="text-nowrap">
                            <div class="row">
                                <div class="col-md-6 px-4">
                                    <div class="border rounded px-2 py-2 w-100 h-100">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="font-weight-bold">Sản phẩm bán chạy nhất</h5>
                                            <div class="d-flex">
                                                <div class="dropdown w-100">
                                                    <button class="btn w-100 border rounded dropdown-toggle"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" style="height: 60px;">
                                                        <div id="all-orders">
                                                            <div class="d-flex flex-column all-orders">
                                                                <div class="ca d-flex">
                                                                    <div id="first-sales">{{ $firstDay }}</div>
                                                                    -&gt;
                                                                    <div id="last-sales">{{ $lastDay }}</div>
                                                                </div>
                                                                <div class="ca text-left" id="sales-text">Tất cả</div>
                                                            </div>
                                                        </div>
                                                    </button>
                                                    <div class="dropdown-menu w-100"
                                                        aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item dropdown-item-sales" href="#"
                                                            data-value="1">
                                                            Tất cả
                                                        </a>
                                                        <a class="dropdown-item dropdown-item-sales" href="#"
                                                            data-value="2">
                                                            Tháng này
                                                        </a>
                                                        <a class="dropdown-item dropdown-item-sales" href="#"
                                                            data-value="3">
                                                            Tháng trước
                                                        </a>
                                                        <a class="dropdown-item dropdown-item-sales" href="#"
                                                            data-value="4">
                                                            3 tháng trước
                                                        </a>
                                                        <a class="dropdown-item" id="btn-sales-options" href="#">
                                                            Khoảng thời gian
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="block-optionss" id="times-sales-options"
                                                    style="display: none;">
                                                    <div class="wrap w-100">
                                                        <div class="input-group p-2 justify-content-around">
                                                            <div class="start">
                                                                <label for="start">Từ ngày</label>
                                                                <input type="date" name="date_start"
                                                                    class="date_start rounded">
                                                            </div>
                                                            <div class="end">
                                                                <label for="start">Đến ngày</label>
                                                                <input type="date" name="date_end"
                                                                    class="date_end rounded">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-contents-center align-items-baseline p-2">
                                                        <button type="button" id="confirm-times-sales"
                                                            class="suscess btn btn-primary btn-block mr-2"
                                                            value="4">Xác nhận
                                                        </button>
                                                        <button type="button" id="cancel-times-sales"
                                                            class="btn btn-default btn-block">Hủy</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row px-3">
                                            <div class="col-md-5">
                                                <canvas id="myChart" width="350" height="350"
                                                    style="position: relative; height:25vh;"></canvas>
                                            </div>
                                            <div class="col-md-7">
                                                <div id="chartLegend"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 px-4">
                                    <div class="border rounded px-2 py-2 w-100 h-100">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="font-weight-bold">Hoạt động bán hàng</h5>
                                            <div class="d-flex">
                                                <div class="dropdown w-100">
                                                    <button class="btn w-100 border rounded dropdown-toggle"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" style="height: 60px;">
                                                        <div>
                                                            <div class="d-flex flex-column">
                                                                <div class="ca d-flex">
                                                                    <div id="firstDayStatus">{{ $firstDayStatus }}</div>
                                                                    -&gt;
                                                                    <div id="lastDayStatus">{{ $lastDayStatus }}</div>
                                                                </div>
                                                                <div class="ca text-left" id="status-text">Tất cả</div>
                                                            </div>
                                                        </div>
                                                    </button>
                                                    <div class="dropdown-menu w-100"
                                                        aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item dropdown-item-status" href="#"
                                                            data-value="1">
                                                            Tất cả
                                                        </a>
                                                        <a class="dropdown-item dropdown-item-status" href="#"
                                                            data-value="2">
                                                            Tháng này
                                                        </a>
                                                        <a class="dropdown-item dropdown-item-status" href="#"
                                                            data-value="3">
                                                            Tháng trước
                                                        </a>
                                                        <a class="dropdown-item dropdown-item-status" href="#"
                                                            data-value="4">
                                                            3 tháng trước
                                                        </a>
                                                        <a class="dropdown-item" href="#"
                                                            id="btn-status-options">
                                                            Khoảng thời gian
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="block-optionss" id="times-status-options"
                                                    style="display: none;">
                                                    <div class="wrap w-100">
                                                        <div class="input-group p-2 justify-content-around">
                                                            <div class="start">
                                                                <label for="start">Từ ngày</label>
                                                                <input type="date" name="date_status_start"
                                                                    class="date_status_start rounded">
                                                            </div>
                                                            <div class="end">
                                                                <label for="start">Đến ngày</label>
                                                                <input type="date" name="date_status_end"
                                                                    class="date_status_end rounded">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-contents-center align-items-baseline p-2">
                                                        <button type="button" id="confirm-status"
                                                            class="suscess btn btn-primary btn-block mr-2"
                                                            value="4">Xác nhận
                                                        </button>
                                                        <button type="button" id="cancel-status"
                                                            class="btn btn-default btn-block">Hủy</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span class="font-weight-bold text-center d-block">
                                                    Tổng số đơn:
                                                    <?php
                                                    if (is_array($soDon)) {
                                                        $tong = array_sum($soDon);
                                                        echo "<span class='tongDon'>$tong</span>";
                                                    } else {
                                                        echo '<span>0</span>';
                                                    }
                                                    ?>
                                                </span>
                                                <div>
                                                    <canvas id="sumExport" width="350" height="350"
                                                        style="position: relative; height:25vh;"></canvas>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="w-75">
                                                    <div id="des_count"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-6"></div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Đơn báo giá đã xác nhận và Top nhân viên xuất sắc --}}
                <div class="row mt-4">
                    <div class="col-md-12 p-0 m-0 pl-2">
                        <div class="text-nowrap">
                            <div class="row">
                                <div class="col-md-6 px-4">
                                    <div class="border rounded px-2 py-2 w-100 h-100">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="font-weight-bold">Đơn báo giá đã xác nhận</h5>
                                            <div class="d-flex">
                                                <div class="dropdown w-100">
                                                    <button class="btn w-100 border rounded dropdown-toggle"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" style="height: 60px;">
                                                        <div>
                                                            <div class="d-flex flex-column">
                                                                <div class="ca d-flex">
                                                                    <div id="firstDayAccept">{{ $minDate }}
                                                                    </div>
                                                                    -&gt;
                                                                    <div id="lastDayAccept">{{ $maxDate }}</div>
                                                                </div>
                                                                <div class="ca text-left" id="accept-text">Tất cả
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </button>
                                                    <div class="dropdown-menu w-100"
                                                        aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item dropdown-item-accept" href="#"
                                                            data-value="1">
                                                            Tất cả
                                                        </a>
                                                        <a class="dropdown-item dropdown-item-accept" href="#"
                                                            data-value="2">
                                                            Tháng này
                                                        </a>
                                                        <a class="dropdown-item dropdown-item-accept" href="#"
                                                            data-value="3">
                                                            Tháng trước
                                                        </a>
                                                        <a class="dropdown-item dropdown-item-accept" href="#"
                                                            data-value="4">
                                                            3 tháng trước
                                                        </a>
                                                        <a class="dropdown-item" href="#"
                                                            id="btn-accept-options">
                                                            Khoảng thời gian
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="block-optionss" id="times-accept-options"
                                                    style="display: none;">
                                                    <div class="wrap w-100">
                                                        <div class="input-group p-2 justify-content-around">
                                                            <div class="start">
                                                                <label for="start">Từ ngày</label>
                                                                <input type="date" name="date_accept_start"
                                                                    class="date_accept_start rounded">
                                                            </div>
                                                            <div class="end">
                                                                <label for="start">Đến ngày</label>
                                                                <input type="date" name="date_accept_end"
                                                                    class="date_accept_end rounded">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-contents-center align-items-baseline p-2">
                                                        <button type="button" id="confirm-accept"
                                                            class="suscess btn btn-primary btn-block mr-2"
                                                            value="4">Xác nhận
                                                        </button>
                                                        <button type="button" id="cancel-accept"
                                                            class="btn btn-default btn-block">Hủy</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="col-md-6">
                                                <div style="background: #F1FAFD; border: 1px solid #F1FAFD;"
                                                    class="d-flex justify-content-between align-items-center border my-2 rounded px-2 py-2">
                                                    <div>
                                                        <span>
                                                            <svg width="36" height="36" viewBox="0 0 36 36"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M30 16.5V7.5C30 6.70435 29.6839 5.94129 29.1213 5.37868C28.5587 4.81607 27.7956 4.5 27 4.5H7.5C6.70435 4.5 5.94129 4.81607 5.37868 5.37868C4.81607 5.94129 4.5 6.70435 4.5 7.5V28.5C4.5 29.2956 4.81607 30.0587 5.37868 30.6213C5.94129 31.1839 6.70435 31.5 7.5 31.5H15"
                                                                    stroke="#009EF7" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M13.875 22.5H15" stroke="#009EF7"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path d="M26.25 20.7271V25.5001" stroke="#009EF7"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path
                                                                    d="M31.5 33.0001H21.1875C20.7399 33.0001 20.3107 32.8223 19.9943 32.5058C19.6778 32.1893 19.5 31.7601 19.5 31.3126V24.8506C19.5003 24.4453 19.5824 24.0443 19.7415 23.6716L20.562 21.7516C20.6921 21.4476 20.9085 21.1884 21.1845 21.0063C21.4605 20.8242 21.7839 20.7271 22.1145 20.7271H30.3855C30.7159 20.7272 31.0391 20.8244 31.3148 21.0065C31.5905 21.1886 31.8067 21.4477 31.9365 21.7516L32.7585 23.6746C32.9178 24.0472 33 24.4483 33 24.8536V31.5001C33 31.8979 32.842 32.2794 32.5607 32.5607C32.2794 32.842 31.8978 33.0001 31.5 33.0001Z"
                                                                    stroke="#009EF7" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path
                                                                    d="M33 27C33 26.6022 32.842 26.2206 32.5607 25.9393C32.2794 25.658 31.8978 25.5 31.5 25.5H21C20.6022 25.5 20.2206 25.658 19.9393 25.9393C19.658 26.2206 19.5 26.6022 19.5 27"
                                                                    stroke="#009EF7" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M13.875 16.5H19.5" stroke="#009EF7"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path d="M13.875 10.6875H24" stroke="#009EF7"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path
                                                                    d="M10.125 11.7C10.3475 11.7 10.565 11.634 10.75 11.5104C10.935 11.3867 11.0792 11.211 11.1644 11.0055C11.2495 10.7999 11.2718 10.5737 11.2284 10.3555C11.185 10.1372 11.0778 9.93679 10.9205 9.77945C10.7632 9.62212 10.5627 9.51498 10.3445 9.47157C10.1262 9.42816 9.90005 9.45043 9.69448 9.53558C9.48891 9.62073 9.31321 9.76493 9.1896 9.94993C9.06598 10.1349 9 10.3524 9 10.575C9 10.8733 9.11853 11.1595 9.3295 11.3704C9.54048 11.5814 9.82663 11.7 10.125 11.7Z"
                                                                    fill="#009EF7" />
                                                                <path
                                                                    d="M10.125 17.7C10.3475 17.7 10.565 17.634 10.75 17.5104C10.935 17.3867 11.0792 17.211 11.1644 17.0055C11.2495 16.7999 11.2718 16.5737 11.2284 16.3555C11.185 16.1372 11.0778 15.9368 10.9205 15.7795C10.7632 15.6221 10.5627 15.515 10.3445 15.4716C10.1262 15.4282 9.90005 15.4504 9.69448 15.5356C9.48891 15.6207 9.31321 15.7649 9.1896 15.9499C9.06598 16.1349 9 16.3524 9 16.575C9 16.8733 9.11853 17.1595 9.3295 17.3704C9.54048 17.5814 9.82663 17.7 10.125 17.7Z"
                                                                    fill="#009EF7" />
                                                                <path
                                                                    d="M10.125 23.55C10.3475 23.55 10.565 23.4841 10.75 23.3604C10.935 23.2368 11.0792 23.0611 11.1644 22.8556C11.2495 22.65 11.2718 22.4238 11.2284 22.2056C11.185 21.9873 11.0778 21.7869 10.9205 21.6296C10.7632 21.4722 10.5627 21.3651 10.3445 21.3217C10.1262 21.2783 9.90005 21.3005 9.69448 21.3857C9.48891 21.4708 9.31321 21.615 9.1896 21.8C9.06598 21.985 9 22.2025 9 22.425C9 22.7234 9.11853 23.0096 9.3295 23.2205C9.54048 23.4315 9.82663 23.55 10.125 23.55Z"
                                                                    fill="#009EF7" />
                                                            </svg>
                                                        </span>
                                                        <span class="font-weight-bold">Tổng số đơn</span>
                                                    </div>
                                                    <span class="font-weight-bold" style="color: #009EF7;"
                                                        id="tongSoDon">{{ $countDetailExport }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div style="background: #E6FFF3; border: 1px solid #E6FFF3;"
                                                    class="d-flex justify-content-between align-items-center border my-2 rounded px-2 py-2">
                                                    <div>
                                                        <span>
                                                            <svg width="36" height="36" viewBox="0 0 36 36"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M5.40155 7.20636L5.40175 7.20623C6.336 6.58573 7.57789 6.11156 8.62165 5.97934C12.0992 5.54029 15.5001 7.65246 16.6008 10.9334C16.6008 10.9335 16.6009 10.9335 16.6009 10.9336L16.7554 11.4043L16.7704 11.4499L16.8184 11.4502L20.4887 11.4713L24.1349 11.4923L24.4997 11.6949L24.4998 11.695C24.6972 11.8039 24.9701 12.0299 25.0897 12.1959L25.0908 12.1974C25.2687 12.4301 25.3764 12.6375 25.4407 12.9323C25.5059 13.2305 25.5271 13.6196 25.5271 14.2171V15.2577V15.3244H25.5938H27.8086C28.4797 15.3244 29.0679 15.3314 29.5161 15.3446C29.7403 15.3512 29.9291 15.3593 30.0755 15.3688C30.2235 15.3783 30.3242 15.3891 30.3748 15.4002L30.3755 15.4003C31.1643 15.565 31.8784 16.1074 32.2419 16.8132C32.3322 17.0015 32.7451 18.0787 33.16 19.2178L5.40155 7.20636ZM5.40155 7.20636C5.09759 7.4067 4.70045 7.75119 4.3248 8.12684C3.94924 8.5024 3.59928 8.90498 3.38823 9.21983C2.18961 11.0249 1.82712 13.22 2.38481 15.3462C2.8164 16.9821 4.00142 18.6139 5.46493 19.5896C5.465 19.5897 5.46506 19.5897 5.46513 19.5898L6.0764 19.9902L6.1063 20.0098L6.10653 20.0456L6.12762 23.294V23.294L6.12777 23.3159C6.13823 24.8985 6.14356 25.705 6.16534 26.1512C6.17629 26.3754 6.19126 26.5045 6.21193 26.5938C6.23198 26.6803 6.25761 26.7308 6.29516 26.799L6.29564 26.7999C6.53611 27.2534 6.77264 27.4885 7.15901 27.6783C7.3204 27.7573 7.43909 27.8022 7.6131 27.8325C7.79015 27.8633 8.02495 27.879 8.4194 27.8966L8.41953 27.8966L9.32656 27.9388L9.37077 27.9409L9.38604 27.9824L9.5126 28.3269L9.51261 28.3269L9.51307 28.3282C9.58573 28.5396 9.79053 28.8284 10.0419 29.0972C10.2924 29.365 10.5795 29.6029 10.8084 29.7175C12.2089 30.3969 13.891 29.7928 14.5433 28.3713L14.7332 27.9566L14.751 27.9176H14.7938H20.5383H26.2758H26.3173L26.3356 27.9549L26.5535 28.3976C27.1112 29.5199 28.2861 30.1561 29.4426 29.9577L29.443 29.9576C30.4341 29.7924 31.167 29.2299 31.5514 28.3445L31.6125 28.371L31.5513 28.3446C31.6003 28.2309 31.6385 28.1431 31.6724 28.0765C31.7061 28.0105 31.7385 27.959 31.7781 27.9223C31.8591 27.847 31.957 27.8472 32.0812 27.8473C32.0866 27.8473 32.0921 27.8473 32.0977 27.8473C32.7467 27.8473 33.3228 27.4964 33.6565 26.8904L33.6566 26.8902L33.8593 26.5254L33.8802 23.8986L33.9012 21.2738L33.16 19.218L5.40155 7.20636ZM15.6339 13.3944L15.6339 13.395C15.6304 13.827 15.6234 14.0959 15.5965 14.3251C15.5695 14.5556 15.5226 14.7444 15.4412 15.0167L15.4411 15.0171C14.8874 16.8274 13.771 18.1294 12.1078 18.8971C11.3479 19.2522 10.7561 19.4019 9.91803 19.4516C6.56229 19.6507 3.67634 17.0771 3.4702 13.7149L3.47019 13.7148C3.24268 9.91813 6.61911 6.7976 10.3874 7.32373C11.6169 7.49431 12.7755 8.03442 13.6786 8.85929C14.2971 9.42094 14.7382 10.0259 15.1004 10.8143C15.3124 11.2735 15.4465 11.632 15.527 12.0204C15.6075 12.4084 15.6339 12.8232 15.6339 13.3944ZM24.1643 13.1645L24.1839 13.1841L24.1839 13.2118L24.1698 19.8422V19.8423L24.1487 26.4728L24.1485 26.5389L24.0824 26.5392L19.4347 26.5603L19.4346 26.5603L14.794 26.5744L14.7494 26.5745L14.7323 26.5335L14.5705 26.1467L14.5705 26.1466C14.2145 25.2908 13.2376 24.5751 12.2989 24.4929L12.2983 24.4928C11.8058 24.445 11.1927 24.5685 10.711 24.8162L10.7103 24.8166C10.2761 25.0337 9.7794 25.5767 9.53841 26.0862L9.32052 26.5501L9.30174 26.5901L9.25759 26.5884L8.53385 26.5603C8.53376 26.5603 8.53368 26.5603 8.53359 26.5603C8.44598 26.5575 8.36728 26.5568 8.29442 26.5561C8.25189 26.5557 8.21136 26.5553 8.17221 26.5546C8.06834 26.5526 7.97573 26.548 7.89575 26.5316C7.81467 26.5151 7.74282 26.4859 7.68292 26.4322C7.62319 26.3787 7.58074 26.3058 7.54975 26.2112C7.489 26.0257 7.46688 25.7381 7.45878 25.2975C7.4533 24.9996 7.45429 24.6268 7.45553 24.1616C7.45613 23.935 7.45679 23.6865 7.45679 23.414V20.6226V20.5379L7.5391 20.5578L7.94692 20.6562L7.9476 20.6564C8.27389 20.7388 8.83361 20.788 9.40652 20.7994C9.97883 20.8108 10.5553 20.7843 10.9144 20.7188C14.3434 20.0705 16.838 17.2065 16.9983 13.7219L16.9983 13.7216L17.0405 12.8638L17.0436 12.8004H17.1071H20.4399H23.7727H23.8003L23.8198 12.82L23.9956 12.9957L24.1643 13.1645ZM31.8088 19.4185L31.8088 19.4186L32.5471 21.4577L32.5511 21.4687V21.4804V23.8077V23.8082C32.5511 24.4528 32.5511 24.9364 32.5439 25.3002C32.5368 25.6632 32.5225 25.911 32.493 26.0822C32.4635 26.2529 32.417 26.3608 32.3339 26.429C32.2582 26.4913 32.1599 26.5123 32.0568 26.5344C32.0517 26.5355 32.0465 26.5366 32.0414 26.5377L32.0414 26.5378L32.0387 26.5383C31.9889 26.5469 31.9412 26.5543 31.8981 26.5509C31.8504 26.5471 31.8087 26.5304 31.7705 26.4953C31.7352 26.4629 31.7048 26.4166 31.6731 26.3579C31.641 26.2985 31.6045 26.2205 31.5589 26.1206C31.0228 24.9452 29.752 24.2804 28.5252 24.534L28.525 24.534C27.5427 24.7332 26.8015 25.3708 26.4366 26.3413L26.4367 26.3414L26.4358 26.3435C26.4008 26.4275 26.3663 26.4986 26.2823 26.5368C26.2434 26.5544 26.198 26.5633 26.1451 26.5682C26.0919 26.5731 26.0263 26.5744 25.9453 26.5744H25.5938H25.5271V26.5077V21.621V16.7343V16.6676H25.5938H27.8297C28.838 16.6676 29.4043 16.6711 29.7502 16.6897C30.0974 16.7083 30.2303 16.7425 30.3681 16.8075C30.5014 16.8697 30.613 16.9292 30.7154 17.0192C30.818 17.1095 30.9079 17.2275 31.0039 17.4028C31.1942 17.7502 31.4158 18.338 31.8088 19.4185ZM13.4118 27.1357L13.4118 27.136C13.4297 27.3965 13.4162 27.5993 13.3479 27.7794C13.2794 27.9602 13.1585 28.111 12.9751 28.2729C12.4528 28.7507 11.7711 28.7882 11.211 28.3829C10.7098 28.0217 10.5093 27.4077 10.7088 26.8309C10.8515 26.4028 11.1369 26.0989 11.4928 25.953C11.8485 25.8072 12.2688 25.8216 12.6776 26.0185C13.117 26.2198 13.3752 26.6297 13.4118 27.1357ZM29.513 25.93C29.665 25.969 29.8293 26.0754 29.9707 26.2087C30.1129 26.3426 30.2385 26.5098 30.3097 26.6782C30.7878 27.7605 29.8164 28.9217 28.6843 28.6112C27.592 28.3231 27.2799 26.8341 28.1687 26.1526C28.3624 26.0028 28.5623 25.9096 28.784 25.8733C29.005 25.8371 29.2433 25.8581 29.513 25.93Z"
                                                                    fill="#50CC8A" stroke="#009EF7"
                                                                    stroke-width="0.133333" />
                                                                <path
                                                                    d="M8.41423 14.5597L8.36729 14.6065L8.32024 14.5598L7.49055 13.7372L7.49053 13.7372C7.03825 13.2884 6.77308 13.0469 6.57505 12.9399C6.47873 12.8879 6.40287 12.8704 6.33195 12.8744C6.2597 12.8785 6.1853 12.9051 6.09202 12.9543L6.09203 12.9543L6.09074 12.9549C6.0356 12.9825 5.97265 13.0304 5.91524 13.0869C5.85794 13.1434 5.81006 13.2047 5.78249 13.2567C5.72903 13.3602 5.70007 13.4371 5.69834 13.514C5.69665 13.5894 5.72112 13.6741 5.79483 13.7915C5.94527 14.0312 6.28091 14.3781 6.92343 15.0135L6.92369 15.0138C7.51223 15.6023 7.85234 15.9263 8.08662 16.0919C8.20289 16.1741 8.28809 16.2136 8.36045 16.2287C8.42997 16.2431 8.49335 16.2363 8.56946 16.2145C8.57067 16.2138 8.57472 16.2113 8.58249 16.2058C8.59433 16.1974 8.61044 16.1849 8.63094 16.1681C8.6718 16.1346 8.72738 16.0863 8.79627 16.0245C8.93388 15.901 9.12254 15.7252 9.34866 15.5101C9.80082 15.0799 10.4016 14.4932 11.0411 13.8536L11.0413 13.8535C12.295 12.6069 12.9252 11.9782 13.2189 11.601C13.3657 11.4125 13.4205 11.2963 13.4328 11.2045C13.4448 11.1145 13.4179 11.0379 13.3683 10.9175C13.3091 10.7829 13.2345 10.6917 13.1369 10.633C13.0383 10.5737 12.9092 10.5432 12.7336 10.5432H12.4447L10.4392 12.5417L8.41423 14.5597Z"
                                                                    fill="#50CC8A" stroke="#009EF7"
                                                                    stroke-width="0.133333" />
                                                                <path
                                                                    d="M17.9094 17.6713C17.9094 17.6713 17.9094 17.6713 17.9094 17.6714C17.6643 17.8778 17.5965 18.182 17.7359 18.4547C17.788 18.5553 17.8307 18.6225 17.8921 18.6726C17.9528 18.7222 18.038 18.76 18.1836 18.787C18.4792 18.8418 18.9915 18.8474 19.9688 18.8474C20.9461 18.8474 21.4584 18.8418 21.754 18.787C21.8996 18.76 21.9849 18.7222 22.0456 18.6726C22.1069 18.6225 22.1497 18.5553 22.2017 18.4547C22.3412 18.182 22.2734 17.8777 22.0282 17.6713L21.8289 17.5042H19.9688H18.1087L17.9094 17.6713Z"
                                                                    fill="#50CC8A" stroke="#009EF7"
                                                                    stroke-width="0.133333" />
                                                                <path
                                                                    d="M11.6698 21.8693L11.6698 21.8693L11.6707 21.8701L11.8408 22.0466H16.875H21.9092L22.0794 21.8701L22.0793 21.8701L22.0808 21.8687C22.3352 21.6206 22.3352 21.1997 22.0808 20.9516L22.0808 20.9517L22.0794 20.9502L21.9091 20.7736L16.9592 20.7596C15.5918 20.7561 14.3335 20.7596 13.4074 20.7675C12.9443 20.7715 12.5645 20.7765 12.2958 20.7824C12.1614 20.7853 12.0551 20.7884 11.9802 20.7916C11.9427 20.7932 11.9136 20.7948 11.893 20.7964C11.8826 20.7972 11.875 20.798 11.8699 20.7987C11.8692 20.7988 11.8686 20.7988 11.868 20.7989C11.4604 20.9727 11.3522 21.5516 11.6698 21.8693Z"
                                                                    fill="#50CC8A" stroke="#009EF7"
                                                                    stroke-width="0.133333" />
                                                                <path
                                                                    d="M26.7596 17.5934L26.7596 17.5934L26.7575 17.5946C26.6749 17.6393 26.6221 17.6752 26.5824 17.7302C26.5424 17.7856 26.511 17.8675 26.4884 18.0129C26.4428 18.3062 26.4374 18.8233 26.4339 19.8142V21.6427L26.6534 21.8622L26.8729 22.0818H28.8773C29.8134 22.0818 30.3207 22.0782 30.6197 22.0599C30.9151 22.0418 30.9969 22.0098 31.0856 21.9579C31.2075 21.8806 31.322 21.7386 31.3588 21.616L31.3588 21.616L31.3596 21.6135C31.3773 21.5622 31.387 21.5191 31.386 21.4612C31.3849 21.4013 31.3722 21.3225 31.3398 21.2005C31.2747 20.9559 31.1353 20.5548 30.8747 19.8152C30.7168 19.3731 30.5537 18.947 30.4187 18.6158C30.3512 18.4501 30.291 18.3086 30.242 18.201C30.1924 18.0917 30.157 18.0233 30.1386 17.9975C30.0547 17.888 29.9776 17.805 29.8888 17.7406C29.8003 17.6765 29.6974 17.6287 29.5596 17.5935C29.2801 17.5221 28.8653 17.5042 28.1534 17.5042C27.7 17.5077 27.3748 17.5147 27.1485 17.5295C27.0353 17.5369 26.9483 17.5462 26.8832 17.5576C26.8165 17.5692 26.7788 17.5821 26.7596 17.5934ZM29.707 20.5242L29.707 20.5242L29.7077 20.5265C29.7165 20.5562 29.7303 20.612 29.6907 20.6587C29.673 20.6795 29.6495 20.6922 29.6263 20.7006C29.6029 20.709 29.575 20.715 29.5432 20.7194C29.4186 20.737 29.1838 20.7385 28.7648 20.7385H27.8438H27.7771V20.6719V19.793V18.907V18.838L27.846 18.8404L28.4577 18.8615L28.4578 18.8615L29.0765 18.8826L29.122 18.8841L29.1371 18.9271L29.3971 19.6648C29.3971 19.6649 29.3971 19.665 29.3972 19.6651C29.4278 19.7496 29.4581 19.8333 29.4871 19.9134C29.5979 20.2191 29.69 20.4733 29.707 20.5242Z"
                                                                    fill="#50CC8A" stroke="#009EF7"
                                                                    stroke-width="0.133333" />
                                                            </svg>
                                                        </span>
                                                        <span class="font-weight-bold">Số đơn giao hàng</span>
                                                    </div>
                                                    <span class="font-weight-bold" style="color: #50CC8A;"
                                                        id="soDonGiao">{{ $countDelivery }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div style="background: #F4EFFE; border: 1px solid #F4EFFE;"
                                                    class="d-flex justify-content-between align-items-center border my-2 rounded px-2 py-2">
                                                    <div>
                                                        <span>
                                                            <svg width="36" height="36" viewBox="0 0 36 36"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_5542_65687)">
                                                                    <path
                                                                        d="M30 19.5V7.5C30 6.70435 29.6839 5.94129 29.1213 5.37868C28.5587 4.81607 27.7956 4.5 27 4.5H7.5C6.70435 4.5 5.94129 4.81607 5.37868 5.37868C4.81607 5.94129 4.5 6.70435 4.5 7.5V28.5C4.5 29.2956 4.81607 30.0587 5.37868 30.6213C5.94129 31.1839 6.70435 31.5 7.5 31.5H20.25"
                                                                        stroke="#8F60EE" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path d="M13.875 22.5H15" stroke="#8F60EE"
                                                                        stroke-width="1.5" stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path d="M13.875 16.5H19.5" stroke="#8F60EE"
                                                                        stroke-width="1.5" stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path d="M13.875 10.6875H24" stroke="#8F60EE"
                                                                        stroke-width="1.5" stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path
                                                                        d="M10.125 11.7C10.3475 11.7 10.565 11.634 10.75 11.5104C10.935 11.3867 11.0792 11.211 11.1644 11.0055C11.2495 10.7999 11.2718 10.5737 11.2284 10.3555C11.185 10.1372 11.0778 9.93679 10.9205 9.77945C10.7632 9.62212 10.5627 9.51498 10.3445 9.47157C10.1262 9.42816 9.90005 9.45043 9.69448 9.53558C9.48891 9.62073 9.31321 9.76493 9.1896 9.94993C9.06598 10.1349 9 10.3524 9 10.575C9 10.8733 9.11853 11.1595 9.3295 11.3704C9.54048 11.5814 9.82663 11.7 10.125 11.7Z"
                                                                        fill="#8F60EE" stroke="#8F60EE"
                                                                        stroke-width="1.5" stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path
                                                                        d="M10.125 17.7C10.3475 17.7 10.565 17.634 10.75 17.5104C10.935 17.3867 11.0792 17.211 11.1644 17.0055C11.2495 16.7999 11.2718 16.5737 11.2284 16.3555C11.185 16.1372 11.0778 15.9368 10.9205 15.7795C10.7632 15.6221 10.5627 15.515 10.3445 15.4716C10.1262 15.4282 9.90005 15.4504 9.69448 15.5356C9.48891 15.6207 9.31321 15.7649 9.1896 15.9499C9.06598 16.1349 9 16.3524 9 16.575C9 16.8733 9.11853 17.1595 9.3295 17.3704C9.54048 17.5814 9.82663 17.7 10.125 17.7Z"
                                                                        fill="#8F60EE" stroke="#8F60EE"
                                                                        stroke-width="1.5" stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path
                                                                        d="M10.125 23.55C10.3475 23.55 10.565 23.4841 10.75 23.3604C10.935 23.2368 11.0792 23.0611 11.1644 22.8556C11.2495 22.65 11.2718 22.4238 11.2284 22.2056C11.185 21.9873 11.0778 21.7869 10.9205 21.6296C10.7632 21.4722 10.5627 21.3651 10.3445 21.3217C10.1262 21.2783 9.90005 21.3005 9.69448 21.3857C9.48891 21.4708 9.31321 21.615 9.1896 21.8C9.06598 21.985 9 22.2025 9 22.425C9 22.7234 9.11853 23.0096 9.3295 23.2205C9.54048 23.4315 9.82663 23.55 10.125 23.55Z"
                                                                        fill="#8F60EE" stroke="#8F60EE"
                                                                        stroke-width="1.5" stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M26.6298 20.25C23.196 20.2462 20.25 23.1904 20.25 26.625C20.25 28.3158 20.9217 29.9373 22.1172 31.1328C23.3127 32.3284 24.9342 33 26.625 33H26.6255C28.3162 33.0007 29.938 32.3297 31.134 31.1346C32.33 29.9395 33.0023 28.3183 33.003 26.6276C33.0037 24.9368 32.3327 23.315 31.1376 22.119C29.9425 20.923 28.3213 20.2507 26.6306 20.25L26.6298 20.25ZM26.6314 18C21.9535 17.9953 18 21.9479 18 26.625C18 28.9125 18.9087 31.1063 20.5262 32.7238C22.1436 34.3412 24.3372 35.2499 26.6246 35.25M26.6318 18C28.9192 18.001 31.1125 18.9106 32.7292 20.5286C34.3461 22.1468 35.2539 24.341 35.253 26.6285C35.2521 28.9159 34.3425 31.1094 32.7244 32.7262C31.1063 34.343 28.9123 35.2508 26.625 35.25"
                                                                        fill="#8F60EE" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M26.625 22.5C27.2464 22.5 27.75 23.0037 27.75 23.625V23.7299C28.0479 23.8408 28.3287 23.997 28.5819 24.1945L28.6564 24.1514C29.1941 23.8401 29.8824 24.0236 30.1937 24.5613C30.505 25.099 30.3214 25.7873 29.7837 26.0986L29.7394 26.1243C29.7678 26.2881 29.7833 26.4544 29.7853 26.6214C29.7874 26.7926 29.7754 26.9632 29.7497 27.1317L29.7837 27.1514C30.3214 27.4627 30.505 28.1509 30.1937 28.6886C29.8824 29.2264 29.1941 29.4099 28.6564 29.0986L28.6322 29.0845C28.3927 29.2794 28.1252 29.438 27.8382 29.5548C27.809 29.5667 27.7796 29.5782 27.75 29.5892V29.625C27.75 30.2463 27.2464 30.75 26.625 30.75C26.0037 30.75 25.5 30.2463 25.5 29.625V29.5625C25.4701 29.5506 25.4403 29.5381 25.4107 29.5252C25.1388 29.4068 24.8858 29.2505 24.6589 29.0615L24.5864 29.1028C24.0464 29.4101 23.3595 29.2214 23.0522 28.6813C22.745 28.1413 22.9337 27.4544 23.4737 27.1472L23.5641 27.0957C23.5421 26.9396 23.5318 26.781 23.5338 26.6214C23.5357 26.4658 23.5492 26.3115 23.5737 26.1597L23.4737 26.1028C22.9337 25.7956 22.745 25.1087 23.0522 24.5687C23.3595 24.0286 24.0464 23.8399 24.5864 24.1472L24.7088 24.2169C24.9496 24.0245 25.2165 23.8698 25.5 23.7565V23.625C25.5 23.0037 26.0037 22.5 26.625 22.5ZM27.3746 26.1535C27.3419 26.1073 27.3048 26.0644 27.2637 26.0252C27.0981 25.8675 26.8775 25.7808 26.6489 25.7836C26.4202 25.7864 26.2018 25.8784 26.0401 26.0401C25.8784 26.2018 25.7864 26.4202 25.7836 26.6489C25.7808 26.8775 25.8675 27.0981 26.0252 27.2637C26.1058 27.3483 26.2025 27.4159 26.3096 27.4626C26.3539 27.4819 26.3996 27.4975 26.4462 27.5092C26.5044 27.4999 26.5642 27.495 26.625 27.495C26.6996 27.495 26.7725 27.5023 26.843 27.5161C26.893 27.5054 26.9422 27.4903 26.9898 27.4709C27.098 27.4268 27.1963 27.3616 27.279 27.279C27.288 27.2699 27.2969 27.2606 27.3055 27.2512C27.3281 27.1882 27.3567 27.1263 27.3915 27.0663C27.4233 27.0113 27.459 26.9601 27.4982 26.9127C27.5239 26.8273 27.5366 26.7383 27.5355 26.6489C27.534 26.532 27.5093 26.4167 27.4626 26.3096C27.4547 26.2915 27.4462 26.2737 27.4372 26.2562C27.4212 26.2328 27.4059 26.2086 27.3915 26.1837C27.3856 26.1736 27.38 26.1636 27.3746 26.1535Z"
                                                                        fill="#8F60EE" />
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_5542_65687">
                                                                        <rect width="36" height="36"
                                                                            rx="4" fill="white" />
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        </span>
                                                        <span class="font-weight-bold">Số đơn đã xuất hóa đơn</span>
                                                    </div>
                                                    <span class="font-weight-bold" style="color: #8F60EE;"
                                                        id="soDonDaXuat">{{ $countBillsale }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div style="background: #FFF9E3; border: 1px solid #FFF9E3;"
                                                    class="d-flex justify-content-between align-items-center border my-2 rounded px-2 py-2">
                                                    <div>
                                                        <span>
                                                            <svg width="36" height="36" viewBox="0 0 36 36"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_5542_65709)">
                                                                    <path
                                                                        d="M10.2857 5.82904H8.35714C7.33416 5.82904 6.35309 6.22646 5.62973 6.93385C4.90638 7.64125 4.5 8.60069 4.5 9.6011V29.4044C4.5 30.4048 4.90638 31.3643 5.62973 32.0717C6.35309 32.7791 7.33416 33.1765 8.35714 33.1765H27.6429C28.6658 33.1765 29.6469 32.7791 30.3703 32.0717C31.0936 31.3643 31.5 30.4048 31.5 29.4044V9.6011C31.5 8.60069 31.0936 7.64125 30.3703 6.93385C29.6469 6.22646 28.6658 5.82904 27.6429 5.82904H25.7143V7.71507H27.6429C28.1543 7.71507 28.6449 7.91378 29.0066 8.26748C29.3682 8.62118 29.5714 9.1009 29.5714 9.6011V29.4044C29.5714 29.9046 29.3682 30.3843 29.0066 30.738C28.6449 31.0917 28.1543 31.2904 27.6429 31.2904H8.35714C7.84565 31.2904 7.35511 31.0917 6.99344 30.738C6.63176 30.3843 6.42857 29.9046 6.42857 29.4044V9.6011C6.42857 9.1009 6.63176 8.62118 6.99344 8.26748C7.35511 7.91378 7.84565 7.71507 8.35714 7.71507H10.2857V5.82904Z"
                                                                        fill="#FFC700" />
                                                                    <path
                                                                        d="M20.8929 4.88603C21.1486 4.88603 21.3939 4.98538 21.5747 5.16223C21.7555 5.33908 21.8571 5.57894 21.8571 5.82904V7.71507C21.8571 7.96518 21.7555 8.20504 21.5747 8.38189C21.3939 8.55874 21.1486 8.65809 20.8929 8.65809H15.1071C14.8514 8.65809 14.6061 8.55874 14.4253 8.38189C14.2445 8.20504 14.1429 7.96518 14.1429 7.71507V5.82904C14.1429 5.57894 14.2445 5.33908 14.4253 5.16223C14.6061 4.98538 14.8514 4.88603 15.1071 4.88603H20.8929ZM15.1071 3C14.3399 3 13.6041 3.29806 13.0616 3.82861C12.5191 4.35916 12.2143 5.07874 12.2143 5.82904V7.71507C12.2143 8.46538 12.5191 9.18496 13.0616 9.71551C13.6041 10.2461 14.3399 10.5441 15.1071 10.5441H20.8929C21.6601 10.5441 22.3959 10.2461 22.9384 9.71551C23.4809 9.18496 23.7857 8.46538 23.7857 7.71507V5.82904C23.7857 5.07874 23.4809 4.35916 22.9384 3.82861C22.3959 3.29806 21.6601 3 20.8929 3H15.1071Z"
                                                                        fill="#FFC700" />
                                                                    <path
                                                                        d="M12.2143 22.9714C12.4203 24.768 14.3206 26.043 17.2134 26.2079V27.5184H18.6654V26.2079C21.8256 26.0149 23.7857 24.6581 23.7857 22.6514C23.7857 20.9378 22.4674 19.9462 19.6706 19.388L18.6654 19.1864V15.0889C20.2274 15.2075 21.2813 15.8584 21.5472 16.8305H23.5936C23.3625 15.1062 21.4497 13.8689 18.6654 13.732V12.4301H17.2134V13.759C14.5141 14.0069 12.6612 15.3454 12.6612 17.1603C12.6612 18.7273 14.006 19.8363 16.3656 20.3041L17.2148 20.4786V24.823C15.6153 24.6398 14.5141 23.9608 14.2482 22.9714H12.2143ZM16.935 18.8373C15.483 18.5538 14.7076 17.9481 14.7076 17.0956C14.7076 16.0783 15.6877 15.3271 17.2134 15.1256V18.8922L16.935 18.8373ZM19.1499 20.8548C20.9416 21.2029 21.7281 21.7805 21.7281 22.7613C21.7281 23.9436 20.5782 24.7314 18.6654 24.851V20.761L19.1499 20.8548Z"
                                                                        fill="#FFC700" />
                                                                    <path
                                                                        d="M10.2857 5.82904H8.35714C7.33416 5.82904 6.35309 6.22646 5.62973 6.93385C4.90638 7.64125 4.5 8.60069 4.5 9.6011V29.4044C4.5 30.4048 4.90638 31.3643 5.62973 32.0717C6.35309 32.7791 7.33416 33.1765 8.35714 33.1765H27.6429C28.6658 33.1765 29.6469 32.7791 30.3703 32.0717C31.0936 31.3643 31.5 30.4048 31.5 29.4044V9.6011C31.5 8.60069 31.0936 7.64125 30.3703 6.93385C29.6469 6.22646 28.6658 5.82904 27.6429 5.82904H25.7143V7.71507H27.6429C28.1543 7.71507 28.6449 7.91378 29.0066 8.26748C29.3682 8.62118 29.5714 9.1009 29.5714 9.6011V29.4044C29.5714 29.9046 29.3682 30.3843 29.0066 30.738C28.6449 31.0917 28.1543 31.2904 27.6429 31.2904H8.35714C7.84565 31.2904 7.35511 31.0917 6.99344 30.738C6.63176 30.3843 6.42857 29.9046 6.42857 29.4044V9.6011C6.42857 9.1009 6.63176 8.62118 6.99344 8.26748C7.35511 7.91378 7.84565 7.71507 8.35714 7.71507H10.2857V5.82904Z"
                                                                        stroke="#FFC700" stroke-width="0.4" />
                                                                    <path
                                                                        d="M20.8929 4.88603C21.1486 4.88603 21.3939 4.98538 21.5747 5.16223C21.7555 5.33908 21.8571 5.57894 21.8571 5.82904V7.71507C21.8571 7.96518 21.7555 8.20504 21.5747 8.38189C21.3939 8.55874 21.1486 8.65809 20.8929 8.65809H15.1071C14.8514 8.65809 14.6061 8.55874 14.4253 8.38189C14.2445 8.20504 14.1429 7.96518 14.1429 7.71507V5.82904C14.1429 5.57894 14.2445 5.33908 14.4253 5.16223C14.6061 4.98538 14.8514 4.88603 15.1071 4.88603H20.8929ZM15.1071 3C14.3399 3 13.6041 3.29806 13.0616 3.82861C12.5191 4.35916 12.2143 5.07874 12.2143 5.82904V7.71507C12.2143 8.46538 12.5191 9.18496 13.0616 9.71551C13.6041 10.2461 14.3399 10.5441 15.1071 10.5441H20.8929C21.6601 10.5441 22.3959 10.2461 22.9384 9.71551C23.4809 9.18496 23.7857 8.46538 23.7857 7.71507V5.82904C23.7857 5.07874 23.4809 4.35916 22.9384 3.82861C22.3959 3.29806 21.6601 3 20.8929 3H15.1071Z"
                                                                        stroke="#FFC700" stroke-width="0.4" />
                                                                    <path
                                                                        d="M12.2143 22.9714C12.4203 24.768 14.3206 26.043 17.2134 26.2079V27.5184H18.6654V26.2079C21.8256 26.0149 23.7857 24.6581 23.7857 22.6514C23.7857 20.9378 22.4674 19.9462 19.6706 19.388L18.6654 19.1864V15.0889C20.2274 15.2075 21.2813 15.8584 21.5472 16.8305H23.5936C23.3625 15.1062 21.4497 13.8689 18.6654 13.732V12.4301H17.2134V13.759C14.5141 14.0069 12.6612 15.3454 12.6612 17.1603C12.6612 18.7273 14.006 19.8363 16.3656 20.3041L17.2148 20.4786V24.823C15.6153 24.6398 14.5141 23.9608 14.2482 22.9714H12.2143ZM16.935 18.8373C15.483 18.5538 14.7076 17.9481 14.7076 17.0956C14.7076 16.0783 15.6877 15.3271 17.2134 15.1256V18.8922L16.935 18.8373ZM19.1499 20.8548C20.9416 21.2029 21.7281 21.7805 21.7281 22.7613C21.7281 23.9436 20.5782 24.7314 18.6654 24.851V20.761L19.1499 20.8548Z"
                                                                        stroke="#FFC700" stroke-width="0.4" />
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_5542_65709">
                                                                        <rect width="36" height="36"
                                                                            rx="4" fill="white" />
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        </span>
                                                        <span class="font-weight-bold">Số đơn đã thanh toán</span>
                                                    </div>
                                                    <span class="font-weight-bold" style="color: #FFC700;"
                                                        id="soDonDaTT">{{ $countPayExport }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 px-4">
                                    <div class="border rounded px-2 py-2 w-100 h-100">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="font-weight-bold">Top nhân viên xuất sắc</h5>
                                            <div class="d-flex">
                                                <div class="dropdown w-100">
                                                    <button class="btn w-100 border rounded dropdown-toggle"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" style="height: 60px;">
                                                        <div>
                                                            <div class="d-flex flex-column">
                                                                <div class="ca d-flex">
                                                                    <div id="firstDayTop">
                                                                        {{ $minDateBillSale }}
                                                                    </div>
                                                                    -&gt;
                                                                    <div id="lastDayTop">
                                                                        {{ $maxDateBillSale }}
                                                                    </div>
                                                                </div>
                                                                <div class="ca text-left" id="top-text">Tất cả
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </button>
                                                    <div class="dropdown-menu w-100"
                                                        aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item dropdown-item-top" href="#"
                                                            data-value="1">
                                                            Tất cả
                                                        </a>
                                                        <a class="dropdown-item dropdown-item-top" href="#"
                                                            data-value="2">
                                                            Tháng này
                                                        </a>
                                                        <a class="dropdown-item dropdown-item-top" href="#"
                                                            data-value="3">
                                                            Tháng trước
                                                        </a>
                                                        <a class="dropdown-item dropdown-item-top" href="#"
                                                            data-value="4">
                                                            3 tháng trước
                                                        </a>
                                                        <a class="dropdown-item" href="#" id="btn-top-options">
                                                            Khoảng thời gian
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="block-optionss" id="times-top-options"
                                                    style="display: none;">
                                                    <div class="wrap w-100">
                                                        <div class="input-group p-2 justify-content-around">
                                                            <div class="start">
                                                                <label for="start">Từ ngày</label>
                                                                <input type="date" name="date_top_start"
                                                                    class="date_top_start rounded">
                                                            </div>
                                                            <div class="end">
                                                                <label for="start">Đến ngày</label>
                                                                <input type="date" name="date_top_end"
                                                                    class="date_top_end rounded">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-contents-center align-items-baseline p-2">
                                                        <button type="button" id="confirm-top"
                                                            class="suscess btn btn-primary btn-block mr-2"
                                                            value="4">Xác nhận
                                                        </button>
                                                        <button type="button" id="cancel-top"
                                                            class="btn btn-default btn-block">Hủy</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="border-top-0 border-bottom-0">Tên nhân
                                                        viên</th>
                                                    <th scope="col" class="border-top-0 border-bottom-0"">Doanh số
                                                    </th>
                                                    <th scope="col" class="border-top-0 border-bottom-0"">Tỉ lệ
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="top-employee">
                                                @php
                                                    $tongDoanhThu = 0;
                                                    foreach ($sumSales as $sales) {
                                                        $tongDoanhThu += $sales->price_total_sum;
                                                    }
                                                @endphp
                                                @foreach ($sumSales as $sales)
                                                    <tr>
                                                        <td>
                                                            <?php if ($sales->name) {
                                                                echo $sales->name;
                                                            } else {
                                                                echo 'Admin';
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            {{ number_format($sales->price_total_sum) }}
                                                        </td>
                                                        <td>
                                                            {{ round($sales->price_total_sum / $tongDoanhThu) * 100 }}%
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Thống kê doanh số và Công nợ --}}
                <div class="row my-4">
                    <div class="col-md-12 p-0 m-0 pl-2">
                        <div class="text-nowrap">
                            <div class="row">
                                <div class="col-md-7 pl-4 pr-5">
                                    <div class="border rounded px-2 py-2 w-100 h-100">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="font-weight-bold">Thống kê doanh số</h5>
                                            <select id="option-doanhSo" class="border rounded px-3 py-1">
                                                <option value="2024" selected>2024</option>
                                                <option value="2023">2023</option>
                                                <option value="2022">2022</option>
                                                <option value="2021">2021</option>
                                                <option value="2020">2020</option>
                                            </select>
                                        </div>
                                        <div class="">
                                            <canvas id="chartTotal" width="400" height="400"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 pr-4 pl-5">
                                    <div class="border rounded px-2 py-2 w-100">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="font-weight-bold">Công nợ</h5>
                                            <div class="d-flex">
                                                <div class="dropdown w-100">
                                                    <button class="btn w-100 border rounded dropdown-toggle"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" style="height: 60px;">
                                                        <div>
                                                            <div class="d-flex flex-column">
                                                                <div class="ca d-flex">
                                                                    <div id="firstDayDebt">{{ $minDateDebt }}
                                                                    </div>
                                                                    -&gt;
                                                                    <div id="lastDayDebt">{{ $maxDateDebt }}</div>
                                                                </div>
                                                                <div class="ca text-left" id="debt-text">Tất cả
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </button>
                                                    <div class="dropdown-menu w-100"
                                                        aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item dropdown-item-debt" href="#"
                                                            data-value="1">
                                                            Tất cả
                                                        </a>
                                                        <a class="dropdown-item dropdown-item-debt" href="#"
                                                            data-value="2">
                                                            Tháng này
                                                        </a>
                                                        <a class="dropdown-item dropdown-item-debt" href="#"
                                                            data-value="3">
                                                            Tháng trước
                                                        </a>
                                                        <a class="dropdown-item dropdown-item-debt" href="#"
                                                            data-value="4">
                                                            3 tháng trước
                                                        </a>
                                                        <a class="dropdown-item" href="#"
                                                            id="btn-debt-options">
                                                            Khoảng thời gian
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="block-optionss" id="times-debt-options"
                                                    style="display: none;">
                                                    <div class="wrap w-100">
                                                        <div class="input-group p-2 justify-content-around">
                                                            <div class="start">
                                                                <label for="start">Từ ngày</label>
                                                                <input type="date" name="date_debt_start"
                                                                    class="date_debt_start rounded">
                                                            </div>
                                                            <div class="end">
                                                                <label for="start">Đến ngày</label>
                                                                <input type="date" name="date_debt_end"
                                                                    class="date_debt_end rounded">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-contents-center align-items-baseline p-2">
                                                        <button type="button" id="confirm-debt"
                                                            class="suscess btn btn-primary btn-block mr-2"
                                                            value="4">Xác nhận
                                                        </button>
                                                        <button type="button" id="cancel-debt"
                                                            class="btn btn-default btn-block">Hủy</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-block">
                                            <div class="my-2 px-5 mx-4">
                                                <div class="d-flex border rounded justify-content-center align-items-center position-relative py-2"
                                                    style="background: #E4F5FF;">
                                                    <div class="position-absolute" style="left: 20px;">
                                                        <svg width="36" height="36" viewBox="0 0 36 36"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0_5581_67609)">
                                                                <path
                                                                    d="M10.2857 5.82904H8.35714C7.33416 5.82904 6.35309 6.22646 5.62973 6.93385C4.90638 7.64125 4.5 8.60069 4.5 9.6011V29.4044C4.5 30.4048 4.90638 31.3643 5.62973 32.0717C6.35309 32.7791 7.33416 33.1765 8.35714 33.1765H27.6429C28.6658 33.1765 29.6469 32.7791 30.3703 32.0717C31.0936 31.3643 31.5 30.4048 31.5 29.4044V9.6011C31.5 8.60069 31.0936 7.64125 30.3703 6.93385C29.6469 6.22646 28.6658 5.82904 27.6429 5.82904H25.7143V7.71507H27.6429C28.1543 7.71507 28.6449 7.91378 29.0066 8.26748C29.3682 8.62118 29.5714 9.1009 29.5714 9.6011V29.4044C29.5714 29.9046 29.3682 30.3843 29.0066 30.738C28.6449 31.0917 28.1543 31.2904 27.6429 31.2904H8.35714C7.84565 31.2904 7.35511 31.0917 6.99344 30.738C6.63176 30.3843 6.42857 29.9046 6.42857 29.4044V9.6011C6.42857 9.1009 6.63176 8.62118 6.99344 8.26748C7.35511 7.91378 7.84565 7.71507 8.35714 7.71507H10.2857V5.82904Z"
                                                                    fill="#0D9AF6" />
                                                                <path
                                                                    d="M20.8929 4.88603C21.1486 4.88603 21.3939 4.98538 21.5747 5.16223C21.7555 5.33908 21.8571 5.57894 21.8571 5.82904V7.71507C21.8571 7.96518 21.7555 8.20504 21.5747 8.38189C21.3939 8.55874 21.1486 8.65809 20.8929 8.65809H15.1071C14.8514 8.65809 14.6061 8.55874 14.4253 8.38189C14.2445 8.20504 14.1429 7.96518 14.1429 7.71507V5.82904C14.1429 5.57894 14.2445 5.33908 14.4253 5.16223C14.6061 4.98538 14.8514 4.88603 15.1071 4.88603H20.8929ZM15.1071 3C14.3399 3 13.6041 3.29806 13.0616 3.82861C12.5191 4.35916 12.2143 5.07874 12.2143 5.82904V7.71507C12.2143 8.46538 12.5191 9.18496 13.0616 9.71551C13.6041 10.2461 14.3399 10.5441 15.1071 10.5441H20.8929C21.6601 10.5441 22.3959 10.2461 22.9384 9.71551C23.4809 9.18496 23.7857 8.46538 23.7857 7.71507V5.82904C23.7857 5.07874 23.4809 4.35916 22.9384 3.82861C22.3959 3.29806 21.6601 3 20.8929 3H15.1071Z"
                                                                    fill="#0D9AF6" />
                                                                <path
                                                                    d="M12.2143 22.9714C12.4203 24.768 14.3206 26.043 17.2134 26.2079V27.5184H18.6654V26.2079C21.8256 26.0149 23.7857 24.6581 23.7857 22.6514C23.7857 20.9378 22.4674 19.9462 19.6706 19.388L18.6654 19.1864V15.0889C20.2274 15.2075 21.2813 15.8584 21.5472 16.8305H23.5936C23.3625 15.1062 21.4497 13.8689 18.6654 13.732V12.4301H17.2134V13.759C14.5141 14.0069 12.6612 15.3454 12.6612 17.1603C12.6612 18.7273 14.006 19.8363 16.3656 20.3041L17.2148 20.4786V24.823C15.6153 24.6398 14.5141 23.9608 14.2482 22.9714H12.2143ZM16.935 18.8373C15.483 18.5538 14.7076 17.9481 14.7076 17.0956C14.7076 16.0783 15.6877 15.3271 17.2134 15.1256V18.8922L16.935 18.8373ZM19.1499 20.8548C20.9416 21.2029 21.7281 21.7805 21.7281 22.7613C21.7281 23.9436 20.5782 24.7314 18.6654 24.851V20.761L19.1499 20.8548Z"
                                                                    fill="#0D9AF6" />
                                                                <path
                                                                    d="M10.2857 5.82904H8.35714C7.33416 5.82904 6.35309 6.22646 5.62973 6.93385C4.90638 7.64125 4.5 8.60069 4.5 9.6011V29.4044C4.5 30.4048 4.90638 31.3643 5.62973 32.0717C6.35309 32.7791 7.33416 33.1765 8.35714 33.1765H27.6429C28.6658 33.1765 29.6469 32.7791 30.3703 32.0717C31.0936 31.3643 31.5 30.4048 31.5 29.4044V9.6011C31.5 8.60069 31.0936 7.64125 30.3703 6.93385C29.6469 6.22646 28.6658 5.82904 27.6429 5.82904H25.7143V7.71507H27.6429C28.1543 7.71507 28.6449 7.91378 29.0066 8.26748C29.3682 8.62118 29.5714 9.1009 29.5714 9.6011V29.4044C29.5714 29.9046 29.3682 30.3843 29.0066 30.738C28.6449 31.0917 28.1543 31.2904 27.6429 31.2904H8.35714C7.84565 31.2904 7.35511 31.0917 6.99344 30.738C6.63176 30.3843 6.42857 29.9046 6.42857 29.4044V9.6011C6.42857 9.1009 6.63176 8.62118 6.99344 8.26748C7.35511 7.91378 7.84565 7.71507 8.35714 7.71507H10.2857V5.82904Z"
                                                                    stroke="#0D9AF6" stroke-width="0.4" />
                                                                <path
                                                                    d="M20.8929 4.88603C21.1486 4.88603 21.3939 4.98538 21.5747 5.16223C21.7555 5.33908 21.8571 5.57894 21.8571 5.82904V7.71507C21.8571 7.96518 21.7555 8.20504 21.5747 8.38189C21.3939 8.55874 21.1486 8.65809 20.8929 8.65809H15.1071C14.8514 8.65809 14.6061 8.55874 14.4253 8.38189C14.2445 8.20504 14.1429 7.96518 14.1429 7.71507V5.82904C14.1429 5.57894 14.2445 5.33908 14.4253 5.16223C14.6061 4.98538 14.8514 4.88603 15.1071 4.88603H20.8929ZM15.1071 3C14.3399 3 13.6041 3.29806 13.0616 3.82861C12.5191 4.35916 12.2143 5.07874 12.2143 5.82904V7.71507C12.2143 8.46538 12.5191 9.18496 13.0616 9.71551C13.6041 10.2461 14.3399 10.5441 15.1071 10.5441H20.8929C21.6601 10.5441 22.3959 10.2461 22.9384 9.71551C23.4809 9.18496 23.7857 8.46538 23.7857 7.71507V5.82904C23.7857 5.07874 23.4809 4.35916 22.9384 3.82861C22.3959 3.29806 21.6601 3 20.8929 3H15.1071Z"
                                                                    stroke="#0D9AF6" stroke-width="0.4" />
                                                                <path
                                                                    d="M12.2143 22.9714C12.4203 24.768 14.3206 26.043 17.2134 26.2079V27.5184H18.6654V26.2079C21.8256 26.0149 23.7857 24.6581 23.7857 22.6514C23.7857 20.9378 22.4674 19.9462 19.6706 19.388L18.6654 19.1864V15.0889C20.2274 15.2075 21.2813 15.8584 21.5472 16.8305H23.5936C23.3625 15.1062 21.4497 13.8689 18.6654 13.732V12.4301H17.2134V13.759C14.5141 14.0069 12.6612 15.3454 12.6612 17.1603C12.6612 18.7273 14.006 19.8363 16.3656 20.3041L17.2148 20.4786V24.823C15.6153 24.6398 14.5141 23.9608 14.2482 22.9714H12.2143ZM16.935 18.8373C15.483 18.5538 14.7076 17.9481 14.7076 17.0956C14.7076 16.0783 15.6877 15.3271 17.2134 15.1256V18.8922L16.935 18.8373ZM19.1499 20.8548C20.9416 21.2029 21.7281 21.7805 21.7281 22.7613C21.7281 23.9436 20.5782 24.7314 18.6654 24.851V20.761L19.1499 20.8548Z"
                                                                    stroke="#0D9AF6" stroke-width="0.4" />
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_5581_67609">
                                                                    <rect width="36" height="36"
                                                                        rx="4" fill="white" />
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </div>
                                                    <div class="">
                                                        <p class="p-0 m-0 font-weight-bold text-center">Công nợ bán</p>
                                                        <p class="p-0 m-0" id="congNoBan" style="color: #0D9AF6;">
                                                            {{ number_format($debtExport) }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="my-2 px-5 mx-4">
                                                <div class="d-flex border rounded justify-content-center align-items-center position-relative py-2"
                                                    style="background: #FFE8ED;">
                                                    <div class="position-absolute" style="left: 20px;">
                                                        <svg width="36" height="36" viewBox="0 0 36 36"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0_5581_67616)">
                                                                <path
                                                                    d="M10.2857 5.82904H8.35714C7.33416 5.82904 6.35309 6.22646 5.62973 6.93385C4.90638 7.64125 4.5 8.60069 4.5 9.6011V29.4044C4.5 30.4048 4.90638 31.3643 5.62973 32.0717C6.35309 32.7791 7.33416 33.1765 8.35714 33.1765H27.6429C28.6658 33.1765 29.6469 32.7791 30.3703 32.0717C31.0936 31.3643 31.5 30.4048 31.5 29.4044V9.6011C31.5 8.60069 31.0936 7.64125 30.3703 6.93385C29.6469 6.22646 28.6658 5.82904 27.6429 5.82904H25.7143V7.71507H27.6429C28.1543 7.71507 28.6449 7.91378 29.0066 8.26748C29.3682 8.62118 29.5714 9.1009 29.5714 9.6011V29.4044C29.5714 29.9046 29.3682 30.3843 29.0066 30.738C28.6449 31.0917 28.1543 31.2904 27.6429 31.2904H8.35714C7.84565 31.2904 7.35511 31.0917 6.99344 30.738C6.63176 30.3843 6.42857 29.9046 6.42857 29.4044V9.6011C6.42857 9.1009 6.63176 8.62118 6.99344 8.26748C7.35511 7.91378 7.84565 7.71507 8.35714 7.71507H10.2857V5.82904Z"
                                                                    fill="#FF6384" />
                                                                <path
                                                                    d="M20.8929 4.88603C21.1486 4.88603 21.3939 4.98538 21.5747 5.16223C21.7555 5.33908 21.8571 5.57894 21.8571 5.82904V7.71507C21.8571 7.96518 21.7555 8.20504 21.5747 8.38189C21.3939 8.55874 21.1486 8.65809 20.8929 8.65809H15.1071C14.8514 8.65809 14.6061 8.55874 14.4253 8.38189C14.2445 8.20504 14.1429 7.96518 14.1429 7.71507V5.82904C14.1429 5.57894 14.2445 5.33908 14.4253 5.16223C14.6061 4.98538 14.8514 4.88603 15.1071 4.88603H20.8929ZM15.1071 3C14.3399 3 13.6041 3.29806 13.0616 3.82861C12.5191 4.35916 12.2143 5.07874 12.2143 5.82904V7.71507C12.2143 8.46538 12.5191 9.18496 13.0616 9.71551C13.6041 10.2461 14.3399 10.5441 15.1071 10.5441H20.8929C21.6601 10.5441 22.3959 10.2461 22.9384 9.71551C23.4809 9.18496 23.7857 8.46538 23.7857 7.71507V5.82904C23.7857 5.07874 23.4809 4.35916 22.9384 3.82861C22.3959 3.29806 21.6601 3 20.8929 3H15.1071Z"
                                                                    fill="#FF6384" />
                                                                <path
                                                                    d="M12.2143 22.9714C12.4203 24.768 14.3206 26.043 17.2134 26.2079V27.5184H18.6654V26.2079C21.8256 26.0149 23.7857 24.6581 23.7857 22.6514C23.7857 20.9378 22.4674 19.9462 19.6706 19.388L18.6654 19.1864V15.0889C20.2274 15.2075 21.2813 15.8584 21.5472 16.8305H23.5936C23.3625 15.1062 21.4497 13.8689 18.6654 13.732V12.4301H17.2134V13.759C14.5141 14.0069 12.6612 15.3454 12.6612 17.1603C12.6612 18.7273 14.006 19.8363 16.3656 20.3041L17.2148 20.4786V24.823C15.6153 24.6398 14.5141 23.9608 14.2482 22.9714H12.2143ZM16.935 18.8373C15.483 18.5538 14.7076 17.9481 14.7076 17.0956C14.7076 16.0783 15.6877 15.3271 17.2134 15.1256V18.8922L16.935 18.8373ZM19.1499 20.8548C20.9416 21.2029 21.7281 21.7805 21.7281 22.7613C21.7281 23.9436 20.5782 24.7314 18.6654 24.851V20.761L19.1499 20.8548Z"
                                                                    fill="#FF6384" />
                                                                <path
                                                                    d="M10.2857 5.82904H8.35714C7.33416 5.82904 6.35309 6.22646 5.62973 6.93385C4.90638 7.64125 4.5 8.60069 4.5 9.6011V29.4044C4.5 30.4048 4.90638 31.3643 5.62973 32.0717C6.35309 32.7791 7.33416 33.1765 8.35714 33.1765H27.6429C28.6658 33.1765 29.6469 32.7791 30.3703 32.0717C31.0936 31.3643 31.5 30.4048 31.5 29.4044V9.6011C31.5 8.60069 31.0936 7.64125 30.3703 6.93385C29.6469 6.22646 28.6658 5.82904 27.6429 5.82904H25.7143V7.71507H27.6429C28.1543 7.71507 28.6449 7.91378 29.0066 8.26748C29.3682 8.62118 29.5714 9.1009 29.5714 9.6011V29.4044C29.5714 29.9046 29.3682 30.3843 29.0066 30.738C28.6449 31.0917 28.1543 31.2904 27.6429 31.2904H8.35714C7.84565 31.2904 7.35511 31.0917 6.99344 30.738C6.63176 30.3843 6.42857 29.9046 6.42857 29.4044V9.6011C6.42857 9.1009 6.63176 8.62118 6.99344 8.26748C7.35511 7.91378 7.84565 7.71507 8.35714 7.71507H10.2857V5.82904Z"
                                                                    stroke="#FF6384" stroke-width="0.4" />
                                                                <path
                                                                    d="M20.8929 4.88603C21.1486 4.88603 21.3939 4.98538 21.5747 5.16223C21.7555 5.33908 21.8571 5.57894 21.8571 5.82904V7.71507C21.8571 7.96518 21.7555 8.20504 21.5747 8.38189C21.3939 8.55874 21.1486 8.65809 20.8929 8.65809H15.1071C14.8514 8.65809 14.6061 8.55874 14.4253 8.38189C14.2445 8.20504 14.1429 7.96518 14.1429 7.71507V5.82904C14.1429 5.57894 14.2445 5.33908 14.4253 5.16223C14.6061 4.98538 14.8514 4.88603 15.1071 4.88603H20.8929ZM15.1071 3C14.3399 3 13.6041 3.29806 13.0616 3.82861C12.5191 4.35916 12.2143 5.07874 12.2143 5.82904V7.71507C12.2143 8.46538 12.5191 9.18496 13.0616 9.71551C13.6041 10.2461 14.3399 10.5441 15.1071 10.5441H20.8929C21.6601 10.5441 22.3959 10.2461 22.9384 9.71551C23.4809 9.18496 23.7857 8.46538 23.7857 7.71507V5.82904C23.7857 5.07874 23.4809 4.35916 22.9384 3.82861C22.3959 3.29806 21.6601 3 20.8929 3H15.1071Z"
                                                                    stroke="#FF6384" stroke-width="0.4" />
                                                                <path
                                                                    d="M12.2143 22.9714C12.4203 24.768 14.3206 26.043 17.2134 26.2079V27.5184H18.6654V26.2079C21.8256 26.0149 23.7857 24.6581 23.7857 22.6514C23.7857 20.9378 22.4674 19.9462 19.6706 19.388L18.6654 19.1864V15.0889C20.2274 15.2075 21.2813 15.8584 21.5472 16.8305H23.5936C23.3625 15.1062 21.4497 13.8689 18.6654 13.732V12.4301H17.2134V13.759C14.5141 14.0069 12.6612 15.3454 12.6612 17.1603C12.6612 18.7273 14.006 19.8363 16.3656 20.3041L17.2148 20.4786V24.823C15.6153 24.6398 14.5141 23.9608 14.2482 22.9714H12.2143ZM16.935 18.8373C15.483 18.5538 14.7076 17.9481 14.7076 17.0956C14.7076 16.0783 15.6877 15.3271 17.2134 15.1256V18.8922L16.935 18.8373ZM19.1499 20.8548C20.9416 21.2029 21.7281 21.7805 21.7281 22.7613C21.7281 23.9436 20.5782 24.7314 18.6654 24.851V20.761L19.1499 20.8548Z"
                                                                    stroke="#FF6384" stroke-width="0.4" />
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_5581_67616">
                                                                    <rect width="36" height="36"
                                                                        rx="4" fill="white" />
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </div>
                                                    <div class="">
                                                        <p class="p-0 m-0 font-weight-bold text-center">Công nợ mua</p>
                                                        <p class="p-0 m-0 font-weight-bold" id="congNoMua"
                                                            style="color: #FF6384;">
                                                            {{ number_format($debtOrder) }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</div>
</body>
<script>
    var productName = {!! json_encode($productName) !!};
    var qtyProduct = {!! json_encode($qtyProduct) !!};
    //Sản phẩm bán chạy nhất
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: productName,
            datasets: [{
                label: 'Sản phẩm bán chạy',
                data: qtyProduct,
                backgroundColor: [
                    '#DDDDDD99',
                    '#A1DFCD99',
                    '#8F60EE99',
                    '#FFCD5699',
                    '#FF638499',
                    '#36A2EB99',
                ],
                borderColor: [
                    '#DDDDDD99',
                    '#A1DFCD99',
                    '#8F60EE99',
                    '#FFCD5699',
                    '#FF638499',
                    '#36A2EB99',
                ],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                x: {
                    display: false,
                },
                y: {
                    display: false,
                }
            },
            plugins: {
                legend: {
                    display: false // Ẩn chú thích mặc định của biểu đồ
                }
            }
        }
    });
    var legendContainer = document.getElementById('chartLegend');
    var legendHTML = '';
    myChart.data.labels.forEach(function(label, index) {
        var dataset = myChart.data.datasets[0];
        legendHTML +=
            '<div class="d-flex align-items-center my-2"><div class="border-radius-chart mr-2" style="background:' +
            dataset.backgroundColor[index] +
            '"></div><div class="d-flex justify-content-between w-100 align-items-center"><span class="legend-label text-wrap">' +
            label +
            '</span><span>' + 'x' + dataset.data[index] + '</span></div></div>';
    });
    legendContainer.innerHTML = legendHTML;
    //Hoạt động bán hàng
    var tinhTrang = {!! json_encode($tinhTrang) !!};
    var soDon = {!! json_encode($soDon) !!};
    var ctx1 = document.getElementById('sumExport').getContext('2d');
    var myChart1 = new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: tinhTrang,
            datasets: [{
                label: 'Hoạt động bán hàng',
                data: soDon,
                backgroundColor: [
                    '#FF6384',
                    '#36A2EB',
                    '#FFCD56',
                ],
                borderColor: [
                    '#FF6384',
                    '#36A2EB',
                    '#FFCD56',
                ],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                x: {
                    display: false,
                },
                y: {
                    display: false,
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
    var des_count = document.getElementById('des_count');
    var des_count_HTML = '';
    myChart1.data.labels.forEach(function(label, index) {
        var dataset = myChart1.data.datasets[0];
        var count = dataset.data[index];
        des_count_HTML +=
            `<div class="bg-filter-search rounded px-1 py-1 my-2">
                <h5 class="font-weight-bold">${count}</h5>
                <p class="m-0 p-0" style="color: ${dataset.backgroundColor[index]}">Số đơn ${label}</p>
            </div>`;
    });
    des_count.innerHTML = des_count_HTML;
    //Doanh thu theo quý
    var ctx4 = document.getElementById('chartTotal').getContext('2d');
    var revenueData = []; // Khởi tạo mảng để lưu trữ doanh thu
    @foreach ($revenueByQuarter as $item)
        revenueData.push({{ $item->total_revenue }});
    @endforeach
    var myChart4 = new Chart(ctx4, {
        type: 'bar',
        data: {
            labels: ['Quý I', 'Quý II', 'Quý III', 'Quý IV'],
            datasets: [{
                label: 'Tổng số đơn hàng',
                data: revenueData,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
    //Lọc sản phẩm bán chạy nhất
    $('#btn-sales-options').click(function() {
        $('#times-sales-options').toggle();
    });
    $('#cancel-times-sales').click(function() {
        $('#times-sales-options').hide();
    });
    // Cập nhật dữ liệu biểu đồ và mô tả số liệu
    function updateChartDataAndLegend(productName, qtyProduct) {
        // Cập nhật dữ liệu của biểu đồ
        myChart.data.labels = productName;
        myChart.data.datasets[0].data = qtyProduct;
        myChart.update(); // Vẽ lại biểu đồ với dữ liệu mới

        // Cập nhật mô tả số liệu
        var legendContainer = document.getElementById('chartLegend');
        var legendHTML = '';
        myChart.data.labels.forEach(function(label, index) {
            var dataset = myChart.data.datasets[0];
            legendHTML +=
                '<div class="d-flex align-items-center my-2"><div class="border-radius-chart mr-2" style="background:' +
                dataset.backgroundColor[index] +
                '"></div><div class="d-flex justify-content-between w-100"><span class="legend-label text-wrap">' +
                label +
                '</span><span>' + 'x' + dataset.data[index] + '</span></div></div>';
        });
        legendContainer.innerHTML = legendHTML;
    }
    document.addEventListener("DOMContentLoaded", function() {
        var dropdownItems1 = document.querySelectorAll('.dropdown-item-sales');
        dropdownItems1.forEach(function(item) {
            item.addEventListener('click', function(event) {
                event.preventDefault();
                var selectedValue1 = parseInt(item.getAttribute('data-value'));
                $.ajax({
                    url: '{{ route('productSell') }}',
                    type: 'GET',
                    data: {
                        selectedValue: selectedValue1,
                    },
                    success: function(data) {
                        $('#first-sales').text(data.firstDay);
                        $('#last-sales').text(data.lastDay);
                        $('#sales-text').text(data.salesText);
                        updateChartDataAndLegend(data.productName, data.qtyProduct);
                    }
                });
            });
        });

        // Xử lý sự kiện khi chọn "Khoảng thời gian"
        $('#confirm-times-sales').click(function() {
            var startDate = $('.date_start').val();
            var endDate = $('.date_end').val();
            $.ajax({
                url: '{{ route('productSell') }}',
                type: 'GET',
                data: {
                    startDate: startDate,
                    endDate: endDate
                },
                success: function(data) {
                    $('#first-sales').text(data.firstDay);
                    $('#last-sales').text(data.lastDay);
                    $('#sales-text').text(data.salesText);
                    updateChartDataAndLegend(data.productName, data.qtyProduct);
                    $('#times-sales-options').hide();
                }
            });
        });
    });
    //Lọc hoạt động bán hàng
    $('#btn-status-options').click(function() {
        $('#times-status-options').toggle();
    });
    $('#cancel-status').click(function() {
        $('#times-status-options').hide();
    });

    function updateChartDataHDBH(tinhTrang, soDon) {
        // Cập nhật dữ liệu của biểu đồ
        myChart1.data.labels = tinhTrang;
        myChart1.data.datasets[0].data = soDon;
        myChart1.update(); // Vẽ lại biểu đồ với dữ liệu mới

        var des_count = document.getElementById('des_count');
        var des_count_HTML = '';
        myChart1.data.labels.forEach(function(label, index) {
            var dataset = myChart1.data.datasets[0];
            var count = dataset.data[index];
            des_count_HTML +=
                `<div class="bg-filter-search rounded px-1 py-1 my-2">
                <h5 class="font-weight-bold">${count}</h5>
                <p class="m-0 p-0" style="color: ${dataset.backgroundColor[index]}">Số đơn ${label}</p>
            </div>`;
        });
        des_count.innerHTML = des_count_HTML;
    }

    // Cập nhật dữ liệu biểu đồ và mô tả số liệu
    document.addEventListener("DOMContentLoaded", function() {
        var dropdownItems2 = document.querySelectorAll('.dropdown-item-status');
        dropdownItems2.forEach(function(item) {
            item.addEventListener('click', function(event) {
                event.preventDefault();
                var selectedValue2 = parseInt(item.getAttribute('data-value'));
                $.ajax({
                    url: '{{ route('statusSales') }}',
                    type: 'GET',
                    data: {
                        selectedValue: selectedValue2,
                    },
                    success: function(data) {
                        $('#firstDayStatus').text(data.firstDayStatus);
                        $('#lastDayStatus').text(data.lastDayStatus);
                        $('#status-text').text(data.statusText);
                        let sum = 0;
                        for (i = 0; i < (data.soDon).length; i++) {
                            sum += data.soDon[i];
                        }
                        $('.tongDon').text(sum)
                        updateChartDataHDBH(data.tinhTrang, data.soDon);
                    }
                });
            });
        });
        // Xử lý sự kiện khi chọn "Khoảng thời gian"
        $('#confirm-status').click(function() {
            var startDate = $('.date_status_start').val();
            var endDate = $('.date_status_end').val();
            $.ajax({
                url: '{{ route('statusSales') }}',
                type: 'GET',
                data: {
                    startDate: startDate,
                    endDate: endDate
                },
                success: function(data) {
                    $('#firstDayStatus').text(data.firstDayStatus);
                    $('#lastDayStatus').text(data.lastDayStatus);
                    $('#status-text').text(data.statusText);
                    let sum = 0;
                    for (i = 0; i < (data.soDon).length; i++) {
                        sum += data.soDon[i];
                    }
                    $('.tongDon').text(sum)
                    updateChartDataHDBH(data.tinhTrang, data.soDon);
                    $('#times-status-options').hide();
                }
            });
        });
    });
    //Lọc đơn báo giá đã xác nhận
    $('#btn-accept-options').click(function() {
        $('#times-accept-options').toggle();
    });
    $('#cancel-accept').click(function() {
        $('#times-accept-options').hide();
    });
    document.addEventListener("DOMContentLoaded", function() {
        var dropdownItems3 = document.querySelectorAll('.dropdown-item-accept');
        dropdownItems3.forEach(function(item) {
            item.addEventListener('click', function(event) {
                event.preventDefault();
                var selectedValue3 = parseInt(item.getAttribute('data-value'));
                $.ajax({
                    url: '{{ route('exportAccept') }}',
                    type: 'GET',
                    data: {
                        selectedValue: selectedValue3,
                    },
                    success: function(data) {
                        $('#tongSoDon').text(data.tongSoDon);
                        $('#soDonGiao').text(data.soDonGiao);
                        $('#soDonDaXuat').text(data.soDonDaXuat);
                        $('#soDonDaTT').text(data.soDonDaTT);
                        $('#accept-text').text(data.acceptText);
                        $('#firstDayAccept').text(data.firstDayAccept);
                        $('#lastDayAccept').text(data.lastDayAccept);
                    }
                });
            });
        });
        // Xử lý sự kiện khi chọn "Khoảng thời gian"
        $('#confirm-accept').click(function() {
            var startDate = $('.date_accept_start').val();
            var endDate = $('.date_accept_end').val();
            $.ajax({
                url: '{{ route('exportAccept') }}',
                type: 'GET',
                data: {
                    startDate: startDate,
                    endDate: endDate
                },
                success: function(data) {
                    $('#tongSoDon').text(data.tongSoDon);
                    $('#soDonGiao').text(data.soDonGiao);
                    $('#soDonDaXuat').text(data.soDonDaXuat);
                    $('#soDonDaTT').text(data.soDonDaTT);
                    $('#accept-text').text(data.acceptText);
                    $('#firstDayAccept').text(data.firstDayAccept);
                    $('#lastDayAccept').text(data.lastDayAccept);
                    $('#times-accept-options').hide();
                }
            });
        });
    });
    //Lọc top nhân viên xuất sắc
    $('#btn-top-options').click(function() {
        $('#times-top-options').toggle();
    });
    $('#cancel-top').click(function() {
        $('#times-top-options').hide();
    });

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
            formattedValue += "." + parts[1].replace(/0+$/, ''); // Loại bỏ số không cần thiết ở phần thập phân
        }

        return formattedValue;
    }
    document.addEventListener("DOMContentLoaded", function() {
        var dropdownItems4 = document.querySelectorAll('.dropdown-item-top');
        dropdownItems4.forEach(function(item) {
            item.addEventListener('click', function(event) {
                event.preventDefault();
                var selectedValue4 = parseInt(item.getAttribute('data-value'));
                $.ajax({
                    url: '{{ route('topEmployee') }}',
                    type: 'GET',
                    data: {
                        selectedValue: selectedValue4,
                    },
                    success: function(data) {
                        $('#firstDayTop').text(data.firstDayTop);
                        $('#lastDayTop').text(data.lastDayTop);
                        $('#top-text').text(data.topText);
                        var tbody = $('#top-employee');
                        tbody.empty();
                        $.each(data.sumSales, function(index, sale) {
                            var tongDoanhThu = 0;
                            data.sumSales.forEach(function(sale) {
                                tongDoanhThu += parseFloat(sale
                                    .price_total_sum);
                            });
                            var row = '<tr>' +
                                '<td>' + (sale.name == null ? 'Admin' : sale.name) + '</td>' +
                                '<td>' + formatCurrency(sale
                                    .price_total_sum) + '</td>' +
                                '<td>' + (sale.price_total_sum /
                                    tongDoanhThu) * 100 + '%' + '</td>' +
                                '</tr>';
                            tbody.append(row);
                        });
                    }
                });
            });
        });
        // Xử lý sự kiện khi chọn "Khoảng thời gian"
        $('#confirm-top').click(function() {
            var startDate = $('.date_top_start').val();
            var endDate = $('.date_top_end').val();
            $.ajax({
                url: '{{ route('topEmployee') }}',
                type: 'GET',
                data: {
                    startDate: startDate,
                    endDate: endDate
                },
                success: function(data) {
                    $('#firstDayTop').text(data.firstDayTop);
                    $('#lastDayTop').text(data.lastDayTop);
                    $('#top-text').text(data.topText);
                    var tbody = $('#top-employee');
                    tbody.empty();
                    $.each(data.sumSales, function(index, sale) {
                        var tongDoanhThu = 0;
                        data.sumSales.forEach(function(sale) {
                            tongDoanhThu += parseFloat(sale
                                .price_total_sum);
                        });
                        var row = '<tr>' +
                            '<td>' + sale.name + '</td>' +
                            '<td>' + formatCurrency(sale
                                .price_total_sum) + '</td>' +
                            '<td>' + (sale.price_total_sum /
                                tongDoanhThu) * 100 + '%' + '</td>' +
                            '</tr>';
                        tbody.append(row);
                    });
                    $('#times-top-options').hide();
                }
            });
        });
    });
    //Lọc doanh thu theo quý
    function updateChartDataTKDS(revenueData) {
        // Cập nhật dữ liệu của biểu đồ
        myChart4.data.datasets[0].data = revenueData;
        myChart4.data.labels = ['Quý I', 'Quý II', 'Quý III', 'Quý IV'];
        myChart4.update();
    }
    document.getElementById('option-doanhSo').addEventListener('change', function() {
        // Lấy giá trị đã chọn
        var selectedYear = this.value;
        $.ajax({
            url: '{{ route('revenueByQuarter') }}',
            type: 'GET',
            data: {
                selectedYear: selectedYear,
            },
            success: function(data) {
                revenueData.length = 0;
                data.revenueByQuarter.forEach(function(item) {
                    revenueData.push(item
                        .total_revenue);
                });
                updateChartDataTKDS(revenueData);
            }
        });
    });
    //Lọc dư nợ
    $('#btn-debt-options').click(function() {
        $('#times-debt-options').toggle();
    });
    $('#cancel-debt').click(function() {
        $('#times-debt-options').hide();
    });
    document.addEventListener("DOMContentLoaded", function() {
        var dropdownItems5 = document.querySelectorAll('.dropdown-item-debt');
        dropdownItems5.forEach(function(item) {
            item.addEventListener('click', function(event) {
                event.preventDefault();
                var selectedValue5 = parseInt(item.getAttribute('data-value'));
                $.ajax({
                    url: '{{ route('debtChart') }}',
                    type: 'GET',
                    data: {
                        selectedValue: selectedValue5,
                    },
                    success: function(data) {
                        $('#firstDayDebt').text(data.firstDayDebt);
                        $('#lastDayDebt').text(data.lastDayDebt);
                        $('#debt-text').text(data.debtText);
                        $('#congNoBan').text(formatCurrency(data.debtExport));
                        $('#congNoMua').text(formatCurrency(data.debtOrder));
                    }
                });
            });
        });
        // Xử lý sự kiện khi chọn "Khoảng thời gian"
        $('#confirm-debt').click(function() {
            var startDate = $('.date_debt_start').val();
            var endDate = $('.date_debt_end').val();
            $.ajax({
                url: '{{ route('debtChart') }}',
                type: 'GET',
                data: {
                    startDate: startDate,
                    endDate: endDate
                },
                success: function(data) {
                    $('#firstDayDebt').text(data.firstDayDebt);
                    $('#lastDayDebt').text(data.lastDayDebt);
                    $('#debt-text').text(data.debtText);
                    $('#congNoBan').text(formatCurrency(data.debtExport));
                    $('#congNoMua').text(formatCurrency(data.debtOrder));
                    $('#times-debt-options').hide();
                }
            });
        });
    });
</script>

</html>
