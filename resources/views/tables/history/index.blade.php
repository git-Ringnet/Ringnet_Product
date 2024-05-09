<x-navbar :title="$title" activeGroup="history" activeName="history" :workspacename="$workspacename">
</x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper m-0 min-height--none">
    <!-- Content Header (Page header) -->
    <div class="content-header-fixed p-0 margin-250">
        <div class="content__header--inner margin-left32">
            <div class="content__heading--left">
                <span>Lịch sử giao dịch</span>
            </div>
        </div>

        {{-- <div class="row m-auto filter p-0 border-custom height-52">
            <div class="w-100">
                <div class="row mr-0 mt-1 padding-left32">
                    <div class="col-md-5 d-flex align-items-center pl-1">
                        <div
                            class="border p-1 mt-2 rounded d-flex align-items-center px-2 w-50 justify-content-between">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.9408 8.91426L12.9576 8.65557C12.9855 8.4419 13 8.22314 13 8C13 7.77686 12.9855 7.5581 12.9576 7.34443L14.9408 7.08573C14.9799 7.38496 15 7.69013 15 8C15 8.30987 14.9799 8.61504 14.9408 8.91426ZM14.4688 5.32049C14.2328 4.7514 13.9239 4.22019 13.5538 3.73851L11.968 4.95716C12.2328 5.30185 12.4533 5.68119 12.6214 6.08659L14.4688 5.32049ZM12.2615 2.4462L11.0428 4.03204C10.6981 3.76716 10.3188 3.54673 9.91341 3.37862L10.6795 1.53116C11.2486 1.76715 11.7798 2.07605 12.2615 2.4462ZM8.91426 1.05917L8.65557 3.04237C8.4419 3.01449 8.22314 3 8 3C7.77686 3 7.5581 3.01449 7.34443 3.04237L7.08574 1.05917C7.38496 1.02013 7.69013 1 8 1C8.30987 1 8.61504 1.02013 8.91426 1.05917ZM5.32049 1.53116L6.08659 3.37862C5.68119 3.54673 5.30185 3.76716 4.95716 4.03204L3.73851 2.4462C4.22019 2.07605 4.7514 1.76715 5.32049 1.53116ZM2.4462 3.73851L4.03204 4.95716C3.76716 5.30185 3.54673 5.68119 3.37862 6.08659L1.53116 5.32049C1.76715 4.7514 2.07605 4.22019 2.4462 3.73851ZM1.05917 7.08574C1.02013 7.38496 1 7.69013 1 8C1 8.30987 1.02013 8.61504 1.05917 8.91426L3.04237 8.65557C3.01449 8.4419 3 8.22314 3 8C3 7.77686 3.01449 7.5581 3.04237 7.34443L1.05917 7.08574ZM1.53116 10.6795L3.37862 9.91341C3.54673 10.3188 3.76716 10.6981 4.03204 11.0428L2.4462 12.2615C2.07605 11.7798 1.76715 11.2486 1.53116 10.6795ZM3.73851 13.5538L4.95716 11.968C5.30185 12.2328 5.68119 12.4533 6.08659 12.6214L5.32049 14.4688C4.7514 14.2328 4.22019 13.9239 3.73851 13.5538ZM7.08574 14.9408L7.34443 12.9576C7.5581 12.9855 7.77686 13 8 13C8.22314 13 8.4419 12.9855 8.65557 12.9576L8.91427 14.9408C8.61504 14.9799 8.30987 15 8 15C7.69013 15 7.38496 14.9799 7.08574 14.9408ZM10.6795 14.4688L9.91341 12.6214C10.3188 12.4533 10.6981 12.2328 11.0428 11.968L12.2615 13.5538C11.7798 13.9239 11.2486 14.2328 10.6795 14.4688ZM13.5538 12.2615L11.968 11.0428C12.2328 10.6981 12.4533 10.3188 12.6214 9.91341L14.4688 10.6795C14.2328 11.2486 13.924 11.7798 13.5538 12.2615Z"
                                    fill="#6D7075" />
                            </svg>
                            <span class="text-13">Status</span>
                            <span class="text-13">is</span>
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7 2C4.23858 2 2 4.23858 2 7C2 9.76142 4.23858 12 7 12C9.76142 12 12 9.76142 12 7C12 4.23858 9.76142 2 7 2ZM0 7C0 3.13401 3.13401 0 7 0C10.866 0 14 3.13401 14 7C14 10.866 10.866 14 7 14C3.13401 14 0 10.866 0 7Z"
                                    fill="#6D7075" />
                            </svg>
                            <span class="text-13">Todo</span>
                            <svg width="11" height="11" viewBox="0 0 11 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.784066 0.284063C1.05865 0.0094789 1.50385 0.0094789 1.77843 0.284063L5.5 4.00531L9.22159 0.284063C9.49619 0.0094789 9.94131 0.0094789 10.2159 0.284063C10.4905 0.558648 10.4905 1.00385 10.2159 1.27843L6.49469 5L10.2159 8.72159C10.4656 8.97115 10.4882 9.36181 10.284 9.63706L10.2159 9.7159C9.94131 9.9905 9.49619 9.9905 9.22159 9.7159L5.5 5.99468L1.77843 9.7159C1.50385 9.9905 1.05865 9.9905 0.784066 9.7159C0.509482 9.44131 0.509482 8.99618 0.784066 8.72159L4.50531 5L0.784066 1.27843C0.534438 1.0288 0.51175 0.638185 0.715985 0.362926L0.784066 0.284063Z"
                                    fill="#6D7075" />
                            </svg>
                        </div>
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" class="ml-3 mt-2"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.70312 1.3125C6.70312 0.924178 6.38832 0.609375 6 0.609375C5.61168 0.609375 5.29688 0.924178 5.29688 1.3125V5.29688H1.3125C0.924178 5.29688 0.609375 5.61168 0.609375 6C0.609375 6.38832 0.924178 6.70312 1.3125 6.70312H5.29688V10.6875C5.29688 11.0758 5.61168 11.3906 6 11.3906C6.38832 11.3906 6.70312 11.0758 6.70312 10.6875V6.70312H10.6875C11.0758 6.70312 11.3906 6.38832 11.3906 6C11.3906 5.61168 11.0758 5.29688 10.6875 5.29688H6.70312V1.3125Z"
                                fill="#6D7075" />
                        </svg>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- <div class="content-wrapper1 py-1 pl-4 border-bottom d-none">
            <div class="row m-auto filter pt-1">
                <div class="w-100">
                    <div class="row mr-0">
                        <div class="col-md-5 d-flex align-items-center">
                            <div class="border p-2 rounded d-flex align-items-center px-2 w-50 justify-content-between">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.9408 8.91426L12.9576 8.65557C12.9855 8.4419 13 8.22314 13 8C13 7.77686 12.9855 7.5581 12.9576 7.34443L14.9408 7.08573C14.9799 7.38496 15 7.69013 15 8C15 8.30987 14.9799 8.61504 14.9408 8.91426ZM14.4688 5.32049C14.2328 4.7514 13.9239 4.22019 13.5538 3.73851L11.968 4.95716C12.2328 5.30185 12.4533 5.68119 12.6214 6.08659L14.4688 5.32049ZM12.2615 2.4462L11.0428 4.03204C10.6981 3.76716 10.3188 3.54673 9.91341 3.37862L10.6795 1.53116C11.2486 1.76715 11.7798 2.07605 12.2615 2.4462ZM8.91426 1.05917L8.65557 3.04237C8.4419 3.01449 8.22314 3 8 3C7.77686 3 7.5581 3.01449 7.34443 3.04237L7.08574 1.05917C7.38496 1.02013 7.69013 1 8 1C8.30987 1 8.61504 1.02013 8.91426 1.05917ZM5.32049 1.53116L6.08659 3.37862C5.68119 3.54673 5.30185 3.76716 4.95716 4.03204L3.73851 2.4462C4.22019 2.07605 4.7514 1.76715 5.32049 1.53116ZM2.4462 3.73851L4.03204 4.95716C3.76716 5.30185 3.54673 5.68119 3.37862 6.08659L1.53116 5.32049C1.76715 4.7514 2.07605 4.22019 2.4462 3.73851ZM1.05917 7.08574C1.02013 7.38496 1 7.69013 1 8C1 8.30987 1.02013 8.61504 1.05917 8.91426L3.04237 8.65557C3.01449 8.4419 3 8.22314 3 8C3 7.77686 3.01449 7.5581 3.04237 7.34443L1.05917 7.08574ZM1.53116 10.6795L3.37862 9.91341C3.54673 10.3188 3.76716 10.6981 4.03204 11.0428L2.4462 12.2615C2.07605 11.7798 1.76715 11.2486 1.53116 10.6795ZM3.73851 13.5538L4.95716 11.968C5.30185 12.2328 5.68119 12.4533 6.08659 12.6214L5.32049 14.4688C4.7514 14.2328 4.22019 13.9239 3.73851 13.5538ZM7.08574 14.9408L7.34443 12.9576C7.5581 12.9855 7.77686 13 8 13C8.22314 13 8.4419 12.9855 8.65557 12.9576L8.91427 14.9408C8.61504 14.9799 8.30987 15 8 15C7.69013 15 7.38496 14.9799 7.08574 14.9408ZM10.6795 14.4688L9.91341 12.6214C10.3188 12.4533 10.6981 12.2328 11.0428 11.968L12.2615 13.5538C11.7798 13.9239 11.2486 14.2328 10.6795 14.4688ZM13.5538 12.2615L11.968 11.0428C12.2328 10.6981 12.4533 10.3188 12.6214 9.91341L14.4688 10.6795C14.2328 11.2486 13.924 11.7798 13.5538 12.2615Z"
                                        fill="#6D7075" />
                                </svg>
                                <span class="text-table">Status</span>
                                <span>is</span>
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7 2C4.23858 2 2 4.23858 2 7C2 9.76142 4.23858 12 7 12C9.76142 12 12 9.76142 12 7C12 4.23858 9.76142 2 7 2ZM0 7C0 3.13401 3.13401 0 7 0C10.866 0 14 3.13401 14 7C14 10.866 10.866 14 7 14C3.13401 14 0 10.866 0 7Z"
                                        fill="#6D7075" />
                                </svg>
                                <span>Todo</span>
                                <svg width="11" height="11" viewBox="0 0 11 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.784066 0.284063C1.05865 0.0094789 1.50385 0.0094789 1.77843 0.284063L5.5 4.00531L9.22159 0.284063C9.49619 0.0094789 9.94131 0.0094789 10.2159 0.284063C10.4905 0.558648 10.4905 1.00385 10.2159 1.27843L6.49469 5L10.2159 8.72159C10.4656 8.97115 10.4882 9.36181 10.284 9.63706L10.2159 9.7159C9.94131 9.9905 9.49619 9.9905 9.22159 9.7159L5.5 5.99468L1.77843 9.7159C1.50385 9.9905 1.05865 9.9905 0.784066 9.7159C0.509482 9.44131 0.509482 8.99618 0.784066 8.72159L4.50531 5L0.784066 1.27843C0.534438 1.0288 0.51175 0.638185 0.715985 0.362926L0.784066 0.284063Z"
                                        fill="#6D7075" />
                                </svg>
                            </div>
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" class="ml-3"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.70312 1.3125C6.70312 0.924178 6.38832 0.609375 6 0.609375C5.61168 0.609375 5.29688 0.924178 5.29688 1.3125V5.29688H1.3125C0.924178 5.29688 0.609375 5.61168 0.609375 6C0.609375 6.38832 0.924178 6.70312 1.3125 6.70312H5.29688V10.6875C5.29688 11.0758 5.61168 11.3906 6 11.3906C6.38832 11.3906 6.70312 11.0758 6.70312 10.6875V6.70312H10.6875C11.0758 6.70312 11.3906 6.38832 11.3906 6C11.3906 5.61168 11.0758 5.29688 10.6875 5.29688H6.70312V1.3125Z"
                                    fill="#6D7075" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <div class="content-filter-all">
        <div class="bg-filter-search pl-4">
            <div class="content-wrapper1 py-2">
                <div class="row m-auto filter p-0">
                    <div class="w-100">
                        <div class="row mr-0">
                            <div class="col-md-5 d-flex align-items-center">
                                <form action="" method="get" id="search-filter" class="p-0 m-0">
                                    <div class="position-relative ml-1">
                                        <input type="text" placeholder="Tìm kiếm" name="keywords" id="search-history"
                                            style="outline: none;" class="pr-4 w-100 input-search text-13"
                                            value="{{ request()->keywords }}">
                                        <span id="search-icon" class="search-icon btn-submit" data-button="history"><i
                                                class="fas fa-search" aria-hidden="true"></i></span>
                                        <input class="btn-submit" type="submit" id="hidden-submit" name="hidden-submit"
                                            style="display: none;">
                                    </div>
                                </form>
                                <div class="dropdown mx-2">
                                    <button class="btn-filter_search" data-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
                                            <path
                                                d="M12.9548 3H10.0457C9.74445 3 9.50024 3.24421 9.50024 3.54545V6.45455C9.50024 6.75579 9.74445 7 10.0457 7H12.9548C13.256 7 13.5002 6.75579 13.5002 6.45455V3.54545C13.5002 3.24421 13.256 3 12.9548 3Z"
                                                fill="#6D7075" />
                                            <path
                                                d="M6.45455 3H3.54545C3.24421 3 3 3.24421 3 3.54545V6.45455C3 6.75579 3.24421 7 3.54545 7H6.45455C6.75579 7 7 6.75579 7 6.45455V3.54545C7 3.24421 6.75579 3 6.45455 3Z"
                                                fill="#6D7075" />
                                            <path
                                                d="M6.45455 9.50024H3.54545C3.24421 9.50024 3 9.74445 3 10.0457V12.9548C3 13.256 3.24421 13.5002 3.54545 13.5002H6.45455C6.75579 13.5002 7 13.256 7 12.9548V10.0457C7 9.74445 6.75579 9.50024 6.45455 9.50024Z"
                                                fill="#6D7075" />
                                            <path
                                                d="M12.9548 9.50024H10.0457C9.74445 9.50024 9.50024 9.74445 9.50024 10.0457V12.9548C9.50024 13.256 9.74445 13.5002 10.0457 13.5002H12.9548C13.256 13.5002 13.5002 13.256 13.5002 12.9548V10.0457C13.5002 9.74445 13.256 9.50024 12.9548 9.50024Z"
                                                fill="#6D7075" />
                                        </svg>
                                        <span class="text-btnIner">Bộ lọc</span>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                                fill="#6B6F76" />
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu" id="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="search-container px-2">
                                            <input type="text" placeholder="Tìm kiếm" id="myInput" class="text-13"
                                                onkeyup="filterFunction()" style="outline: none;">
                                            <span class="search-icon mr-2">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </div>
                                        <div class="scrollbar">
                                            <button class="dropdown-item btndropdown" id="btn-provides"
                                                data-button="provides" type="button">Nhà cung cấp
                                            </button>
                                            <button class="dropdown-item btndropdown" id="btn-POnhap"
                                                data-button="POnhap" type="button">Số PO nhập
                                            </button>
                                            <button class="dropdown-item btndropdown" id="btn-tensp"
                                                data-button="tensp" type="button">Mặt hàng</button>
                                            {{-- <button class="dropdown-item btndropdown" id="btn-hdvao"
                                                data-button="hdvao" type="button">Hoá đơn vào</button> --}}
                                            <button class="dropdown-item btndropdown" id="btn-dateHDN"
                                                data-button="dateHDN" type="button">Ngày hoá đơn</button>
                                            <button class="dropdown-item btndropdown" id="btn-BH" data-button="BH"
                                                type="button">Bảo hành</button>
                                            <button class="dropdown-item btndropdown" id="btn-slnhap"
                                                data-button="slnhap" type="button">Số lượng nhập</button>
                                            <button class="dropdown-item btndropdown" id="btn-trcVATN"
                                                data-button="trcVATN" type="button">Trước VAT</button>
                                            <button class="dropdown-item btndropdown" id="btn-VATN"
                                                data-button="VATN" type="button">VAT</button>
                                            <button class="dropdown-item btndropdown" id="btn-sauVATN"
                                                data-button="sauVATN" type="button">Sau VAT</button>
                                            <button class="dropdown-item btndropdown" id="btn-TTN"
                                                data-button="TTN" type="button">Thanh toán</button>
                                            <button class="dropdown-item btndropdown" id="btn-dateTTN"
                                                data-button="ngayTTN" type="button">Ngày thanh toán</button>
                                            <button class="dropdown-item btndropdown" id="btn-HTTTN"
                                                data-button="HTTTN" type="button">Hình thức thanh
                                                toán</button>
                                            <button class="dropdown-item btndropdown" id="btn-guests"
                                                data-button="guests" type="button">Khách hàng</button>
                                            <button class="dropdown-item btndropdown" id="btn-POxuat"
                                                data-button="POxuat" type="button">Số PO xuất</button>
                                            <button class="dropdown-item btndropdown" id="btn-slxuat"
                                                data-button="slxuat" type="button">Số lượng xuất</button>
                                            <button class="dropdown-item btndropdown" id="btn-trcVATX"
                                                data-button="trcVATX" type="button">Trước VAT</button>
                                            <button class="dropdown-item btndropdown" id="btn-VATX"
                                                data-button="VATX" type="button">VAT xuất</button>
                                            <button class="dropdown-item btndropdown" id="btn-sauVATX"
                                                data-button="sauVATX" type="button">Sau VAT</button>
                                            <button class="dropdown-item btndropdown" id="btn-hdra"
                                                data-button="hdra" type="button">Hoá đơn ra</button>
                                            <button class="dropdown-item btndropdown" id="btn-dateHDX"
                                                data-button="datequoteX" type="button">Ngày hoá đơn</button>
                                            <button class="dropdown-item btndropdown" id="btn-TTX"
                                                data-button="TTX" type="button">Đã trả</button>
                                            <button class="dropdown-item btndropdown" id="btn-dateTTX"
                                                data-button="ngayTTX" type="button">Ngày thanh toán</button>
                                            <button class="dropdown-item btndropdown" id="btn-HTTTX"
                                                data-button="HTTTX" type="button">Hình thức</button>
                                        </div>
                                    </div>
                                    <x-filter-text name="provides" button="history" title="Nhà cung cấp" />
                                    <x-filter-text name="guests" button="history" title="Khách hàng" />
                                    <x-filter-text name="tensp" button="history" title="Mặt hàng" />
                                    <x-filter-text name="hdvao" button="history" title="Hoá đơn vào" />
                                    <x-filter-text name="hdra" button="history" title="Hoá đơn ra" />
                                    <x-filter-text name="BH" button="history" title="Bảo hành" />
                                    <x-filter-text name="POnhap" button="history" title="Số PO nhập" />
                                    <x-filter-text name="POxuat" button="history" title="Số PO xuất" />
                                    <x-filter-text name="HTTTX" button="history"
                                        title="Hình thức thanh toán xuất" />
                                    <x-filter-text name="HTTTN" button="history"
                                        title="Hình thức thanh toán nhập" />
                                    <x-filter-compare name="slxuat" button="history" title="Số lượng xuất" />
                                    <x-filter-compare name="slnhap" button="history" title="Số lượng nhập" />
                                    <x-filter-compare name="trcVATN" button="history" title="Số lượng nhập" />
                                    <x-filter-compare name="VATN" button="history" title="Giá nhập" />
                                    <x-filter-compare name="sauVATN" button="history" title="Thành tiền nhập" />
                                    <x-filter-compare name="trcVATX" button="history" title="Số lượng xuất" />
                                    <x-filter-compare name="VATX" button="history" title="Giá xuất" />
                                    <x-filter-compare name="sauVATX" button="history" title="Thành tiền xuất" />
                                    <x-filter-status name="TTX" key1="1" value1="Chưa thanh toán"
                                        key2="2" value2="Thanh toán đủ" key3="3" value3="Một phần"
                                        title="Đã trả" />
                                    <x-filter-status name="TTN" key1="0" value1="Chưa thanh toán"
                                        key2="2" value2="Thanh toán đủ" key3="1" value3="Một phần"
                                        title="Thanh toán nhập" />
                                    <x-filter-date-time name="dateTTN" title="Ngày thanh toán nhập" />
                                    <x-filter-date-time name="dateHDN" title="Ngày hoá đơn nhập" />
                                    <x-filter-date-time name="dateTTX" title="Ngày thanh toán xuất" />
                                    <x-filter-date-time name="dateHDX" title="Ngày hoá đơn xuất" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content margin-top-75">
        <!-- Main content -->
        <section class="content margin-250">
            <div class="container-fluided">
                <div class="row result-filter-history margin-left30 my-1">
                </div>
                <div class="row p-0 m-0">
                    <div class="col-md-12 p-0 m-0">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="outer2 text-nowrap">
                                <table id="example2" class="table table-hover">
                                    <thead class="sticky-head">
                                        {{-- SortType --}}
                                        <input type="hidden" id="perPageinput" name="perPageinput"
                                            value="{{ request()->perPageinput ?? 25 }}">
                                        <input type="hidden" id="sortByInput" name="sort-by" value="">
                                        <input type="hidden" id="sortTypeInput" name="sort-type">
                                        <tr class="height-52">
                                            <th colspan="13" scope="col" class="text-left text-13 border-right">
                                                <span class="d-flex justify-content-center align-items-center">
                                                    <a href="#" class="sort-link" data-sort-by="#"
                                                        data-sort-type="DESC"><button class="btn-sort text-13"
                                                            type="submit">NHẬP HÀNG
                                                        </button></a>
                                                    <div class="icon" id="icon-#"></div>
                                                </span>
                                            </th>
                                            <th colspan="11" scope="col"
                                                class="text-left text-13 border-right border-left">
                                                <span class="d-flex justify-content-center align-items-center">
                                                    <a href="#" class="sort-link" data-sort-by="#"
                                                        data-sort-type="DESC"><button class="btn-sort text-13"
                                                            type="submit">BÁN HÀNG
                                                        </button></a>
                                                    <div class="icon" id="icon-#"></div>
                                                </span>
                                            </th>
                                            <th rowspan="2" scope="col" class="text-left text-13 border-left">
                                                S/N</th>
                                        </tr>
                                        {{-- Hàng dưới --}}
                                        <tr>
                                            <th scope="col" class="text-left text-13">
                                                <span class="d-flex justify-content-start align-items-center">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="tenNCC" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Nhà cung
                                                            cấp</button></a>
                                                    <div class="icon" id="icon-tenNCC"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="text-left text-13">
                                                <span class="d-flex justify-content-start align-items-center">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="POnhap" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Số PO</button></a>
                                                    <div class="icon" id="icon-POnhap"></div>
                                                </span>
                                            </th>

                                            <th scope="col" class="text-left text-13">
                                                <span class="d-flex justify-content-start">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="tensp" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Nội dung hàng
                                                            hoá</button></a>
                                                    <div class="icon" id="icon-tensp"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="text-left text-13">
                                                <span class="d-flex justify-content-start align-items-center">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="hdvao" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Số hoá
                                                            đơn</button></a>
                                                    <div class="icon" id="icon-hdvao"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="text-13">
                                                <span class="d-flex justify-center-start align-items-center">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="ngayHDnhap" data-sort-type="DESC">
                                                        <button class="btn-sort text-13" type="submit">
                                                            Ngày hoá đơn
                                                        </button>
                                                    </a>
                                                    <div class="icon" id="icon-ngayHDnhap"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="text-13">
                                                <span class="d-flex justify-center-start align-items-center">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="baoHanh" data-sort-type="DESC">
                                                        <button class="btn-sort text-13" type="submit">
                                                            Bảo hành
                                                        </button>
                                                    </a>
                                                    <div class="icon" id="icon-baoHanh"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="text-left text-13">
                                                <span class="d-flex justify-content-end align-items-center">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="slNhap" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">SL
                                                            Nhập</button></a>
                                                    <div class="icon" id="icon-slNhap"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="text-left text-13">
                                                <span class="d-flex justify-content-end align-items-center">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="tienThue" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Trước
                                                            VAT</button></a>
                                                    <div class="icon" id="icon-tienThue"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="text-left text-13">
                                                <span class="d-flex justify-content-end align-items-center">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="thueNhapCalculated"
                                                        data-sort-type="DESC"><button class="btn-sort text-13"
                                                            type="submit">VAT</button></a>
                                                    <div class="icon" id="icon-thueNhapCalculated"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="text-left text-13">
                                                <span class="d-flex justify-content-end align-items-center">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="thanhtiennhap" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Sau
                                                            VAT</button></a>
                                                    <div class="icon" id="icon-thanhtiennhap"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="text-left text-13">
                                                <span class="d-flex justify-content-center align-items-center">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="TTnhap" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Thanh
                                                            toán</button></a>
                                                    <div class="icon" id="icon-TTnhap"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="text-left text-13">
                                                <span class="d-flex justify-content-start align-items-end">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="ngayTT" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Ngày thanh
                                                            toán</button></a>
                                                    <div class="icon" id="icon-ngayTT"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="text-left text-13 border-right">
                                                <span class="d-flex justify-content-center align-items-end">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="HTTT" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Hình thức thanh
                                                            toán</button></a>
                                                    <div class="icon" id="icon-HTTT"></div>
                                                </span>
                                            </th>
                                            {{-- Bán hàng --}}
                                            <th scope="col" class="text-left text-13 border-left">
                                                <span class="d-flex justify-content-start align-items-center">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="tenKhach" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Khách
                                                            hàng</button></a>
                                                    <div class="icon" id="icon-tenKhach"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="text-left text-13">
                                                <span class="d-flex justify-content-start align-items-end">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="POxuat" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">SỐ PO/ HỢP
                                                            ĐỒNG</button></a>
                                                    <div class="icon" id="icon-POxuat"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="text-left text-13">
                                                <span class="d-flex justify-content-end align-items-center">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="slXuat" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">SL
                                                            Xuất</button></a>
                                                    <div class="icon" id="icon-slXuat"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="text-left text-13">
                                                <span class="d-flex justify-content-end align-items-center">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="giaban" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Trước
                                                            VAT</button></a>
                                                    <div class="icon" id="icon-giaban"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="text-left text-13">
                                                <span class="d-flex justify-content-end align-items-center">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="thueXuatCalculated"
                                                        data-sort-type="DESC"><button class="btn-sort text-13"
                                                            type="submit">VAT</button></a>
                                                    <div class="icon" id="icon-thueXuatCalculated"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="text-left text-13">
                                                <span class="d-flex justify-content-end align-items-center">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="thanhtienxuat" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Sau
                                                            VAT</button></a>
                                                    <div class="icon" id="icon-thanhtienxuat"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="text-left text-13">
                                                <span class="d-flex justify-content-start align-items-center">
                                                    <a href="#" class="sort-link btn-submit" data-sort-by="hdr"
                                                        data-sort-type="DESC"><button class="btn-sort text-13"
                                                            type="submit">Số hoá
                                                            đơn</button></a>
                                                    <div class="icon" id="icon-hdr"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="text-left text-13">
                                                <span class="d-flex justify-content-start align-items-center">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="ngayHDxuat" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Ngày hoá
                                                            đơn</button></a>
                                                    <div class="icon" id="icon-ngayHDxuat"></div>
                                                </span>
                                            </th>

                                            <th scope="col" class="text-left text-13">
                                                <span class="d-flex justify-content-center align-items-center">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="status_pay" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Thanh
                                                            toán</button></a>
                                                    <div class="icon" id="icon-status_pay"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="text-13 text-left">
                                                <span class="d-flex justify-content-start align-items-center">
                                                    <a href="#" class="sort-link btn-submit "
                                                        data-sort-by="ngayTTxuat" data-sort-type="DESC">
                                                        <button class="btn-sort text-13" type="submit">Ngày thanh
                                                            toán</button>
                                                    </a>
                                                    <div class="icon" id="icon-ngayTTxuat"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="text-left text-13 border-right">
                                                <span class="d-flex justify-content-start align-items-center">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="HTTTxuat" data-sort-type="DESC"><button
                                                            class="btn-sort text-13" type="submit">Hình
                                                            thức</button></a>
                                                    <div class="icon" id="icon-HTTTxuat"></div>
                                                </span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody-history">
                                        {{-- @isset($history)
                                            @foreach ($history as $index => $item)
                                                <tr class="position-relative history-info height-52 {{ $item->id }}">
                                                    <input type="hidden" name="id-history" class="id-history"
                                                        id="id-history" value="{{ $item->id }}">
                                                    <td class="text-13-black">{{ $item->tenNCC }}</td>
                                                    <td class="text-13-black min-width180">{{ $item->POnhap }}</td>
                                                    <td class="text-13-black min-width180">{{ $item->tensp }}</td>
                                                    <td class="text-13-black">
                                                        {{ date('d/m/Y', strtotime($item->ngayHDnhap)) }}
                                                    </td>
                                                    <td class="text-13-black text-center">{{ $item->baoHanh }}</td>
                                                    <td class="text-13-black text-right">
                                                        {{ number_format($item->slNhap) }}
                                                    </td>
                                                    <td class="text-13-black text-right">
                                                        {{ number_format($item->trcVat * $item->slNhap) }}
                                                    </td>
                                                    <td class="text-13-black text-right">
                                                        {{ number_format($item->thueNhapCalculated) }}
                                                    </td>
                                                    <td class="text-13-black text-right">
                                                        {{ number_format($item->thanhtiennhap) }}
                                                    </td>
                                                    <td class="text-13-black min-width180 text-center">
                                                        @if ($item->TTnhap == 0)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                height="14" viewBox="0 0 14 14" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M7 2C4.23858 2 2 4.23858 2 7C2 9.76142 4.23858 12 7 12C9.76142 12 12 9.76142 12 7C12 4.23858 9.76142 2 7 2ZM0 7C0 3.13401 3.13401 0 7 0C10.866 0 14 3.13401 14 7C14 10.866 10.866 14 7 14C3.13401 14 0 10.866 0 7Z"
                                                                    fill="#858585" />
                                                            </svg>
                                                        @elseif ($item->TTnhap == 1)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 16 16" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M7.9967 13.8636C11.2368 13.8636 13.8634 11.237 13.8634 7.99694C13.8634 4.75687 11.2368 2.13027 7.9967 2.13027C4.75662 2.13027 2.13003 4.75687 2.13003 7.99694C2.13003 11.237 4.75662 13.8636 7.9967 13.8636ZM7.9967 15.4636C12.1204 15.4636 15.4634 12.1207 15.4634 7.99694C15.4634 3.87322 12.1204 0.530273 7.9967 0.530273C3.87297 0.530273 0.530029 3.87322 0.530029 7.99694C0.530029 12.1207 3.87297 15.4636 7.9967 15.4636Z"
                                                                    fill="#E8B600" />
                                                                <path
                                                                    d="M11.8062 7.99694C11.8062 10.1009 10.1007 11.8064 7.99673 11.8064L7.99646 4.18742C10.1004 4.18742 11.8062 5.89299 11.8062 7.99694Z"
                                                                    fill="#E8B600" />
                                                            </svg>
                                                        @else
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                height="14" viewBox="0 0 14 14" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                                                    fill="#08AA36" fill-opacity="0.75" />
                                                            </svg>
                                                        @endif
                                                    </td>
                                                    <td class="text-13-black">
                                                        {{ date('d/m/Y', strtotime($item->ngayTT)) }}</td>
                                                    <td class="text-13-black text-center border-right">{{ $item->HTTT }}
                                                    </td>
                                                    <td class="text-13-black border-left min-width180">
                                                        {{ $item->tenKhach }}</td>

                                                    <td class="text-13-black min-width180">{{ $item->POxuat }}</td>
                                                    <td class="text-13-black text-right">
                                                        {{ number_format($item->slXuat) }}</td>
                                                    <td class="text-13-black text-right">
                                                        {{ number_format($item->giaban) }}</td>
                                                    <td class="text-13-black text-right">
                                                        {{ number_format($item->thueXuatCalculated) }}
                                                    </td>
                                                    <td class="text-13-black text-right">
                                                        {{ number_format($item->thanhtienxuat) }}
                                                    </td>
                                                    <td class="text-13-black">{{ $item->hdr }}</td>
                                                    <td class="text-13-black">
                                                        {{ date('d/m/Y', strtotime($item->ngayHDxuat)) == '01/01/1970' ? '' : date('d/m/Y', strtotime($item->ngayHDxuat)) }}
                                                    </td>
                                                    <td class="text-13-black min-width180 text-center">
                                                        @if ($item->status_pay === 1)
                                                            <svg width="16" height="16" viewBox="0 0 16 16"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M8 3C5.23858 3 3 5.23858 3 8C3 10.7614 5.23858 13 8 13C10.7614 13 13 10.7614 13 8C13 5.23858 10.7614 3 8 3ZM1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8Z"
                                                                    fill="#858585" />
                                                            </svg>
                                                        @elseif ($item->status_pay === 3)
                                                            <svg width="16" height="16" viewBox="0 0 16 16"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                                                        <rect width="16" height="16"
                                                                            fill="white" />
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        @elseif($item->status_pay === 2)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                height="14" viewBox="0 0 14 14" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                                                    fill="#08AA36" fill-opacity="0.75" />
                                                            </svg>
                                                        @endif
                                                    </td>
                                                    <td class="text-13-black">
                                                        {{ date('d/m/Y', strtotime($item->ngayTTxuat)) == '01/01/1970' ? '' : date('d/m/Y', strtotime($item->ngayTTxuat)) }}
                                                    </td>
                                                    <td class="text-13-black">{{ $item->HTTTxuat }}</td>
                                                    <td data-toggle="modal" data-target="#snModal"
                                                        data-delivery-id="{{ $item->delivery_id }}"
                                                        data-product-id="{{ $item->product_id }}" class="sn"><img
                                                            src="../../dist/img/icon/list.png"></td>
                                                </tr>
                                            @endforeach
                                        @endisset --}}
                                        @foreach ($history as $key => $item)
                                            <tr>
                                                <td>
                                                    @if ($item->getDetailImport)
                                                        {{ $item->getDetailImport->provide_name }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->getDetailImport)
                                                        {{ $item->getDetailImport->reference_number }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->detailimport_id == 0 && $item->history_import == 0)
                                                        @if ($item->getProduct)
                                                            {{ $item->getProduct->product_name }}
                                                        @endif
                                                    @else
                                                        @if ($item->getQtyImport)
                                                            {{ $item->getQtyImport->product_name }}
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->getReciept)
                                                        @foreach ($item->getReciept as $value)
                                                            <a
                                                                href="{{ route('reciept.edit', ['workspace' => $workspacename, 'reciept' => $value->id]) }}">
                                                                <p>{{ $value->number_bill }}</p>
                                                            </a>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->getReciept)
                                                        @foreach ($item->getReciept as $value)
                                                            <p>{{ date_format(new DateTime($value->created_at), 'd/m/Y') }}
                                                            </p>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->getProductImport)
                                                        {{ $item->getProductImport->product_guarantee }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->getQtyImport)
                                                        {{ number_format($item->getQtyImport->product_qty) }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->getQtyImport)
                                                        {{ number_format($item->getQtyImport->product_total) }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->getQtyImport)
                                                        {{ number_format(($item->getQtyImport->price_export * $item->getQtyImport->product_qty * $item->getQtyImport->product_tax) / 100) }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->getQtyImport)
                                                        {{ number_format($item->getQtyImport->product_total + ($item->getQtyImport->price_export * $item->getQtyImport->product_qty * $item->getQtyImport->product_tax) / 100) }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->getDetailImport)
                                                        @if ($item->getDetailImport->status_pay == 0)
                                                            <span>
                                                                <svg width="16" height="16"
                                                                    viewBox="0 0 16 16" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M8 3C5.23858 3 3 5.23858 3 8C3 10.7614 5.23858 13 8 13C10.7614 13 13 10.7614 13 8C13 5.23858 10.7614 3 8 3ZM1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8Z"
                                                                        fill="#858585" />
                                                                </svg>
                                                            </span>
                                                        @elseif($item->getDetailImport->status_pay == 1)
                                                            <span>
                                                                <svg width="16" height="16"
                                                                    viewBox="0 0 16 16" fill="none"
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
                                                                            <rect width="16" height="16"
                                                                                fill="white" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </span>
                                                        @else
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" viewBox="0 0 14 14"
                                                                    fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                                                        fill="#08AA36" fill-opacity="0.75" />
                                                                </svg>
                                                            </span>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (
                                                        $item->getDetailImport &&
                                                            isset($item->getDetailImport->getPayOrder) &&
                                                            isset($item->getDetailImport->getPayOrder->getHistoryPay))
                                                        {{ date_format(new DateTime($item->getDetailImport->getPayOrder->getHistoryPay->created_at), 'd/m/Y') }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (isset($item->getDetailImport->getPayOrder) && $item->getDetailImport)
                                                        <span>{{ $item->getDetailImport->getPayOrder->payment_type }}</span>
                                                    @endif
                                                </td>

                                                {{-- Khách hàng --}}
                                                <td class="border-left">
                                                    @if ($item->getDetailExport)
                                                        {{ $item->getDetailExport->guest_name }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->getDetailExport)
                                                        {{ $item->getDetailExport->reference_number }}
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ number_format($item->qty_export) }}
                                                </td>
                                                <td>
                                                    @if ($item->getQuoteExport)
                                                        {{ number_format($item->getQuoteExport->price_export) }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->getQuoteExport)
                                                        {{ number_format(($item->getQuoteExport->price_export * $item->qty_export * $item->getQuoteExport->product_tax) / 100) }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->getQuoteExport)
                                                        {{ number_format($item->getQuoteExport->price_export * $item->qty_export + ($item->getQuoteExport->price_export * $item->qty_export * $item->getQuoteExport->product_tax) / 100) }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->getBillSale)
                                                        @foreach ($item->getBillSale as $value)
                                                            <a
                                                                href="{{ route('billSale.edit', ['workspace' => $workspacename, 'billSale' => $value->id]) }}">
                                                                <p>{{ $value->number_bill }}</p>
                                                            </a>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->getBillSale)
                                                        @foreach ($item->getBillSale as $value)
                                                            <p>{{ date_format(new DateTime($value->created_at), 'd/m/Y') }}
                                                            </p>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (isset($item->getDetailExport))
                                                        @if ($item->getDetailExport->status_pay == 1)
                                                            <span>
                                                                <svg width="16" height="16"
                                                                    viewBox="0 0 16 16" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M8 3C5.23858 3 3 5.23858 3 8C3 10.7614 5.23858 13 8 13C10.7614 13 13 10.7614 13 8C13 5.23858 10.7614 3 8 3ZM1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8Z"
                                                                        fill="#858585" />
                                                                </svg>
                                                            </span>
                                                        @elseif($item->getDetailExport->status_pay == 3)
                                                            <svg width="16" height="16" viewBox="0 0 16 16"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                                                        <rect width="16" height="16"
                                                                            fill="white" />
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        @else
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" viewBox="0 0 14 14"
                                                                    fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                                                        fill="#08AA36" fill-opacity="0.75" />
                                                                </svg>
                                                            </span>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (isset($item->getDetailExport->getPayExport) &&
                                                            $item->getDetailExport &&
                                                            isset($item->getDetailExport->getPayExport->getHistoryPay))
                                                        {{ date_format(new DateTime($item->getDetailExport->getPayExport->getHistoryPay->created_at), 'd/m/Y') }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (isset($item->getDetailExport->getPayExport) && $item->getDetailExport)
                                                        {{ $item->getDetailExport->getPayExport->payment_type }}
                                                    @endif
                                                </td>
                                                <td data-toggle="modal" data-target="#snModal"
                                                    data-delivery-id="{{ $item->delivered_id }}"
                                                    data-product-id="{{ $item->product_id }}" class="sn"
                                                    @if ($key + 1 < count($history) && $item->detailexport_id == $history[$key + 1]->detailexport_id) rowspan="2" @endif><img
                                                        src="../../dist/img/icon/list.png">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="modal fade" id="snModal" tabindex="-1" role="dialog"
                                    aria-labelledby="productModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document" style="max-width: 85%;">
                                        <div class="modal-content">
                                            <div class="modal-header align-items-center">
                                                <div>
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        Serial
                                                        Number</h5>
                                                    <p>Thông tin chi tiết về số S/N của mỗi sản phẩm </p>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Tên sản phẩm</th>
                                                            <th class="text-right">Số lượng sản phẩm</th>
                                                            <th class="text-right">Số lượng S/N</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="product-name"></td>
                                                            <td class="text-right product-qty"></td>
                                                            <td class="text-right qty-sn"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <h3>Thông tin Serial Number </h3>
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>STT</th>
                                                            <th>Serial Number</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="bg-white-sn">
                                                    </tbody>
                                                </table>
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
<script src="{{ asset('/dist/js/filter.js') }}"></script>
<script>
    $(document).ready(function() {
        function filterguests() {
            filterButtons("myInput-guests", "ks-cboxtags-guests");
        }

        function filterprovides() {
            filterButtons("myInput-provides", "ks-cboxtags-provides");
        }

        $('#snModal').on('hidden.bs.modal', function() {
            // Xóa nội dung của các phần tử
            $('.bg-white-sn').empty();
            $('.product-name').text('');
            $('.product-qty').text('');
            $('.qty-sn').text('');
        });

        // Khai báo biến
        var sort = [];
        var filterHistory = [];
        var product_unit = [];
        var svgtop =
            "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M11.5006 19.0009C11.6332 19.0009 11.7604 18.9482 11.8542 18.8544C11.9480 18.7607 12.0006 18.6335 12.0006 18.5009V6.70789L15.1466 9.85489C15.2405 9.94878 15.3679 10.0015 15.5006 10.0015C15.6334 10.0015 15.7607 9.94878 15.8546 9.85489C15.9485 9.76101 16.0013 9.63367 16.0013 9.50089C16.0013 9.36812 15.9485 9.24078 15.8546 9.14689L11.8546 5.14689C11.8082 5.10033 11.7530 5.06339 11.6923 5.03818C11.6315 5.01297 11.5664 5 11.5006 5C11.4349 5 11.3697 5.01297 11.3090 5.03818C11.2483 5.06339 11.1931 5.10033 11.1466 5.14689L7.14663 9.14689C7.10014 9.19338 7.06327 9.24857 7.03811 9.30931C7.01295 9.37005 7 9.43515 7 9.50089C7 9.63367 7.05274 9.76101 7.14663 9.85489C7.24052 9.94878 7.36786 10.0015 7.50063 10.0015C7.63341 10.0015 7.76075 9.94878 7.85463 9.85489L11.0006 6.70789V18.5009C11.0006 18.6335 11.0533 18.7607 11.1471 18.8544C11.2408 18.9482 11.3680 19.0009 11.5006 19.0009Z' fill='#555555'/></svg>";
        var svgbot =
            "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M11.5006 5C11.6332 5 11.7604 5.05268 11.8542 5.14645C11.948 5.24021 12.0006 5.36739 12.0006 5.5V17.293L15.1466 14.146C15.2405 14.0521 15.3679 13.9994 15.5006 13.9994C15.6334 13.9994 15.7607 14.0521 15.8546 14.146C15.9485 14.2399 16.0013 14.3672 16.0013 14.5C16.0013 14.6328 15.9485 14.7601 15.8546 14.854L11.8546 18.854C11.8082 18.9006 11.753 18.9375 11.6923 18.9627C11.6315 18.9879 11.5664 19.0009 11.5006 19.0009C11.4349 19.0009 11.3697 18.9879 11.309 18.9627C11.2483 18.9375 11.1931 18.9006 11.1466 18.854L7.14663 14.854C7.05274 14.7601 7 14.6328 7 14.5C7 14.3672 7.05274 14.2399 7.14663 14.146C7.24052 14.0521 7.36786 13.9994 7.50063 13.9994C7.63341 13.9994 7.76075 14.0521 7.85463 14.146L11.0006 17.293V5.5C11.0006 5.36739 11.0533 5.24021 11.1471 5.14645C11.2408 5.05268 11.368 5 11.5006 5Z' fill='#555555'/></svg>"

        var TTX = [];
        var TTN = [];

        // Filter ajxx
        $(document).on('click', '.btn-submit', function(e) {
            if (!$(e.target).is('input[type="checkbox"]')) {
                e.preventDefault();
            }
            var buttonname = $(this).data('button') || 'history';
            var tensp = $('#tensp').val();
            var BH = $('#BH').val();
            var POnhap = $('#POnhap').val();
            var POxuat = $('#POxuat').val();
            var guests = $('#guests').val();
            var provides = $('#provides').val();
            var hdvao = $('#hdvao').val();
            var hdra = $('#hdra').val();
            var HTTTN = $('#HTTTN').val();
            var HTTTX = $('#HTTTX').val();

            var operator_trcVATN = $('.trcVATN-operator').val();
            var val_trcVATN = $('.trcVATN-quantity').val();
            var trcVATN = [operator_trcVATN, val_trcVATN];

            var operator_VATN = $('.VATN-operator').val();
            var val_VATN = $('.VATN-quantity').val();
            var VATN = [operator_VATN, val_VATN];

            var operator_sauVATN = $('.sauVATN-operator').val();
            var val_sauVATN = $('.sauVATN-quantity').val();
            var sauVATN = [operator_sauVATN, val_sauVATN];

            var operator_trcVATX = $('.trcVATX-operator').val();
            var val_trcVATX = $('.trcVATX-quantity').val();
            var trcVATX = [operator_trcVATX, val_trcVATX];

            var operator_VATX = $('.VATX-operator').val();
            var val_VATX = $('.VATX-quantity').val();
            var VATX = [operator_VATX, val_VATX];

            var operator_sauVATX = $('.sauVATX-operator').val();
            var val_sauVATX = $('.sauVATX-quantity').val();
            var sauVATX = [operator_sauVATX, val_sauVATX];

            var operator_slxuat = $('.slxuat-operator').val();
            var val_slxuat = $('.slxuat-quantity').val();
            var slxuat = [operator_slxuat, val_slxuat];
            var operator_slnhap = $('.slnhap-operator').val();
            var val_slnhap = $('.slnhap-quantity').val();
            var slnhap = [operator_slnhap, val_slnhap];

            var date_startHDN = $('#date_start_dateHDN').val();
            var date_endHDN = $('#date_end_dateHDN').val();
            var dateHDN = [date_startHDN, date_endHDN];

            var date_startHDX = $('#date_start_dateHDX').val();
            var date_endHDX = $('#date_end_dateHDX').val();
            var dateHDX = [date_startHDX, date_endHDX];

            var date_startTTN = $('#date_start_dateTTN').val();
            var date_endTTN = $('#date_end_dateTTN').val();
            var dateTTN = [date_startTTN, date_endTTN];

            var date_startTTX = $('#date_start_dateTTX').val();
            var date_endTTX = $('#date_end_dateTTX').val();
            var dateTTX = [date_startTTX, date_endTTX];

            if ($(this).data('button-name') === 'TTN') {
                $('.ks-cboxtags-TTN input[type="checkbox"]').each(function() {
                    const value = $(this).val();
                    if ($(this).is(':checked') && TTN.indexOf(value) === -1) {
                        TTN.push(value);
                    } else if (!$(this).is(':checked')) {
                        const index = TTN.indexOf(value);
                        if (index !== -1) {
                            TTN.splice(index, 1);
                        }
                    }
                });
            }
            if ($(this).data('button-name') === 'TTX') {
                $('.ks-cboxtags-TTX input[type="checkbox"]').each(function() {
                    const value = $(this).val();
                    if ($(this).is(':checked') && TTX.indexOf(value) === -1) {
                        TTX.push(value);
                    } else if (!$(this).is(':checked')) {
                        const index = TTX.indexOf(value);
                        if (index !== -1) {
                            TTX.splice(index, 1);
                        }
                    }
                });
            }

            var search = $('#search-' + buttonname).val();
            // Sort
            var sort_by = '';
            if (typeof $(this).data('sort-by') !== 'undefined') {
                sort_by = $(this).data('sort-by');
            }
            var sort_type = $(this).data('sort-type');
            sort_type = (sort_type === 'ASC') ? 'DESC' : 'ASC';
            $(this).data('sort-type', sort_type);
            $('.icon').text('');
            var iconId = 'icon-' + sort_by;
            var iconDiv = $('#' + iconId);
            iconDiv.html((sort_type === 'ASC') ? svgtop : svgbot);
            sort = [
                sort_by, sort_type
            ];

            var btn_submit = $(this).data('button-name');
            if (!$(e.target).closest('li, input[type="checkbox"]').length) {
                $('#' + btn_submit + '-options').hide();
            }
            $(".btn-filter_search").prop("disabled", false);
            if ($(this).data('delete') === 'TTN') {
                TTN = [];
                // $('.deselect-all-TTN').click();
                $('.ks-cboxtags-TTN input[type="checkbox"]').prop('checked', false);
            }
            if ($(this).data('delete') === 'TTX') {
                TTX = [];
                // $('.deselect-all-TTX').click();
                $('.ks-cboxtags-TTX input[type="checkbox"]').prop('checked', false);
            }
            if ($(this).data('delete') === 'provides') {
                provides = null;
                $('#provides').val('');
            }
            if ($(this).data('delete') === 'guests') {
                guests = null;
                $('#guests').val('');
            }
            if ($(this).data('delete') === 'BH') {
                BH = null;
                $('#BH').val('');
            }
            if ($(this).data('delete') === 'HTTTX') {
                HTTTX = null;
                $('#HTTTX').val('');
            }
            if ($(this).data('delete') === 'HTTTN') {
                HTTTN = null;
                $('#HTTTN').val('');
            }
            if ($(this).data('delete') === 'POnhap') {
                POnhap = null;
                $('#POnhap').val('');
            }
            if ($(this).data('delete') === 'hdra') {
                hdra = null;
                $('#hdra').val('');
            }
            if ($(this).data('delete') === 'hdvao') {
                hdvao = null;
                $('#hdvao').val('');
            }
            if ($(this).data('delete') === 'POxuat') {
                POxuat = null;
                $('#POxuat').val('');
            }
            if ($(this).data('delete') === 'tensp') {
                tensp = null;
                $('#tensp').val('');
            }
            if ($(this).data('delete') === 'trcVATN') {
                trcVATN = null;
                $('.trcVATN-quantity').val('');
            }
            if ($(this).data('delete') === 'VATN') {
                VATN = null;
                $('.VATN-quantity').val('');
            }
            if ($(this).data('delete') === 'sauVATN') {
                sauVATN = null;
                $('.sauVATN-quantity').val('');
            }
            if ($(this).data('delete') === 'trcVATX') {
                trcVATX = null;
                $('.trcVATX-quantity').val('');
            }
            if ($(this).data('delete') === 'VATX') {
                VATX = null;
                $('.VATX-quantity').val('');
            }
            if ($(this).data('delete') === 'sauVATX') {
                sauVATX = null;
                $('.sauVATX-quantity').val('');
            }
            if ($(this).data('delete') === 'slnhap') {
                slnhap = null;
                $('.slnhap-quantity').val('');
            }
            if ($(this).data('delete') === 'slxuat') {
                slxuat = null;
                $('.slxuat-quantity').val('');
            }
            if ($(this).data('delete') === 'dateHDN') {
                dateHDN = null;
                $('#date_start_dateHDN').val('');
                $('#date_end_dateHDN').val('');
            }
            if ($(this).data('delete') === 'dateHDX') {
                dateHDX = null;
                $('#date_start_dateHDX').val('');
                $('#date_end_dateHDX').val('');
            }
            if ($(this).data('delete') === 'dateTTN') {
                dateTTN = null;
                $('#date_start_dateTTN').val('');
                $('#date_end_dateTTN').val('');
            }
            if ($(this).data('delete') === 'dateTTX') {
                dateTTX = null;
                $('#date_start_dateTTX').val('');
                $('#date_end_dateTTX').val('');
            }
            // Xử lí dữ liệu
            if (buttonname === 'history') {
                $.ajax({
                    url: "{{ route('searchHistory') }}",
                    type: "get",
                    data: {
                        search: search,
                        tensp: tensp,
                        hdvao: hdvao,
                        hdra: hdra,
                        POnhap: POnhap,
                        POxuat: POxuat,
                        hdra: hdra,
                        tensp: tensp,
                        BH: BH,
                        provides: provides,
                        guests: guests,
                        trcVATN: trcVATN,
                        VATN: VATN,
                        sauVATN: sauVATN,
                        trcVATX: trcVATX,
                        VATX: VATX,
                        TTN: TTN,
                        TTX: TTX,
                        HTTTX: HTTTX,
                        HTTTN: HTTTN,
                        sauVATX: sauVATX,
                        dateHDN: dateHDN,
                        dateHDX: dateHDX,
                        dateTTN: dateTTN,
                        dateTTX: dateTTX,
                        slxuat: slxuat,
                        slnhap: slnhap,
                        sort: sort,
                    },
                    success: function(data) {
                        // console.log(data.filterHistory);
                        // Hiển thị label dữ liệu tìm kiếm ...
                        var existingNames = [];
                        data.filterHistory.forEach(function(item) {
                            // Kiểm tra xem item.name đã tồn tại trong mảng filterHistory chưa
                            if (filterHistory.indexOf(item.name) === -1) {
                                filterHistory.push(item.name);
                            }
                            existingNames.push(item.name);
                        });

                        filterHistory = filterHistory.filter(function(name) {
                            return existingNames.includes(name);
                        });
                        $('.result-filter-history').empty();
                        if (data.filterHistory.length > 0) {
                            $('.result-filter-history').addClass('has-filters');
                        } else {
                            $('.result-filter-history').removeClass('has-filters');
                        }
                        // Lặp qua mảng filterHistory để tạo và render các phần tử
                        data.filterHistory.forEach(function(item) {
                            var index = filterHistory.indexOf(item.name);
                            // Tạo thẻ item-filter
                            var itemFilter = $('<div>').addClass(
                                'item-filter span input-search d-flex justify-content-center align-items-center mb-2 mr-2'
                            ).attr('data-icon', item.icon);
                            itemFilter.css('order', index);
                            // Thêm nội dung và thuộc tính data vào thẻ item-filter
                            itemFilter.append(
                                '<span class="text text-13-black m-0" style="flex:2;">' +
                                item.value +
                                '</span><i class="fa-solid fa-xmark btn-submit" data-delete="' +
                                item.name + '" data-button="' + buttonname +
                                '"></i>');
                            // Thêm thẻ item-filter vào 
                            $('.result-filter-history').append(itemFilter);
                        });

                        // Ẩn hiện dữ liệu khi đã filterHistory
                        var historyIds = [];
                        // Lặp qua mảng provides và thu thập các historyIds
                        data.history.forEach(function(item) {
                            var historyId = item.id;
                            historyIds.push(historyId);
                        });
                        // Ẩn tất cả các phần tử .history-info
                        $('.history-info').hide();
                        // Lặp qua từng phần tử .history-info để hiển thị và cập nhật data-position
                        $('.history-info').each(function() {
                            var value = parseInt($(this).find('.id-history')
                                .val());
                            var index = historyIds.indexOf(value);
                            if (index !== -1) {
                                $(this).show();
                                // Cập nhật data-position
                                $(this).attr('data-position', index + 1);
                            } else {
                                $(this).hide();
                            }
                        });
                        // Tạo một bản sao của mảng phần tử .history-info
                        var clonedElements = $('.history-info').clone();
                        // Sắp xếp các phần tử trong bản sao theo data-position
                        var sortedElements = clonedElements.sort(function(a, b) {
                            return $(a).data('position') - $(b).data('position');
                        });
                        // Thay thế các phần tử trong .tbody-history bằng các phần tử đã sắp xếp
                        $('.tbody-history').empty().append(sortedElements);
                    }
                })
            }
            $.ajaxSetup({
                headers: {
                    'csrftoken': '{{ csrf_token() }}'
                }
            });
        });

        // Load SN cho từng sản phẩm
        $(document).on('click', '.sn', function(e) {
            var delivery_id = $(this).data('delivery-id');
            var product_id = $(this).data('product-id');
            console.log(delivery_id, product_id);
            var formatter = new Intl.NumberFormat('en-US');
            $.ajax({
                type: 'get',
                url: '{{ URL::to('getSN') }}',
                data: {
                    'delivery_id': delivery_id,
                    'product_id': product_id,
                },
                success: function(data) {
                    console.log(data);
                    data.serinumber.forEach(function(item, index) {
                        var newRow = $('<tr></tr>');
                        var numberCell = $('<td></td>').text(index + 1)
                        newRow.append(numberCell)
                        var serinumberCell = $('<td></td>').text(item
                            .serinumber)
                        newRow.append(serinumberCell)
                        $('.bg-white-sn').append(newRow)
                    });
                    data.product.forEach(function(item) {
                        $('.product-name').text(item.product_name)
                        $('.product-qty').text(formatter.format(item.deliver_qty))
                        $('.qty-sn').text(data.serinumber.length)
                    });
                }
            });
        });
    });
</script>

</html>
