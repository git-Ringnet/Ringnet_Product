<x-navbar :title="$title" activeGroup="sell" activeName="delivery">
</x-navbar>
<form onsubmit="return kiemTraFormGiaoHang();" action="{{ route('delivery.store') }}" method="POST">
    @csrf
    <input type="hidden" name="detailexport_id" id="detailexport_id"
        value="@isset($yes) {{ $data['detailexport_id'] }} @endisset">
    <input type="hidden" name="pdf_export" id="pdf_export">
    <div id="selectedSerialNumbersContainer"></div>
    <div class="content-wrapper--2Column m-0">
        <div class="content-header-fixed p-0 m-0 border-bottom-0">
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
                    <span class="font-weight-bold last-span">Tạo đơn giao hàng</span>
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <a href="{{ route('delivery.index') }}" class="activity" data-name1="GH" data-des="Hủy">
                            <button type="button" class="btn-destroy btn-light mx-1 d-flex align-items-center h-100">
                                <span>
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM6.03033 4.96967C5.73744 4.67678 5.26256 4.67678 4.96967 4.96967C4.67678 5.26256 4.67678 5.73744 4.96967 6.03033L6.93934 8L4.96967 9.96967C4.67678 10.2626 4.67678 10.7374 4.96967 11.0303C5.26256 11.3232 5.73744 11.3232 6.03033 11.0303L8 9.06066L9.96967 11.0303C10.2626 11.3232 10.7374 11.3232 11.0303 11.0303C11.3232 10.7374 11.3232 10.2626 11.0303 9.96967L9.06066 8L11.0303 6.03033C11.3232 5.73744 11.3232 5.26256 11.0303 4.96967C10.7374 4.67678 10.2626 4.67678 9.96967 4.96967L8 6.93934L6.03033 4.96967Z"
                                            fill="#6D7075" />
                                    </svg>
                                </span>
                                <span class="text-btnIner-primary ml-2">Hủy</span>
                            </button>
                        </a>
                        <div class="dropdown">
                            <button type="button" data-toggle="dropdown"
                                class="btn-destroy btn-light mx-1 d-flex align-items-center h-100 dropdown-toggle">
                                <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                        fill="#6D7075" />
                                </svg>
                                <span class="text-btnIner-primary ml-2">Lưu và in</span>
                            </button>
                            <div class="dropdown-menu" style="z-index: 9999;">
                                <a class="dropdown-item text-13-black" href="#" id="pdf-link">Xuất PDF</a>
                            </div>
                        </div>
                        <button type="submit" name="action" value="1"
                            class="btn-destroy mx-1 d-flex align-items-center h-100" id="luuNhap">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                        fill="#6D7075" />
                                </svg>
                            </span>
                            <span class="text-btnIner-primary ml-2">Lưu nháp</span>
                        </button>
                        <div class="dropdown">
                            <button type="submit" name="action" value="2"
                                class="custom-btn btn-light mx-1 d-flex align-items-center h-100" id="giaoHang">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z"
                                            fill="white" />
                                    </svg>
                                </span>
                                <span class="text-btnIner-primary ml-2">Giao hàng</span>
                            </button>
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
        </div>
        {{-- Thông tin sản phẩm --}}
        <div class="content margin-top-38" id="main">
            <section class="content">
                <div id="title--fixed"
                    class="content-title--fixed bg-filter-search border-top-0 text-center border-custom border-right-0">
                    <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN SẢN PHẨM</p>
                </div>
                <div class="container-fluided margin-top-72">
                    <section class="info-chung">
                        <div class="content-info position-relative text-nowrap">
                            <table class="table table-hover bg-white rounded">
                                <thead>
                                    <tr style="height:44px;">
                                        <th class="border-bottom border-right" style="width: 15%;padding-left:2rem;">
                                            <span class="text-table text-secondary">Mã sản phẩm</span>
                                        </th>
                                        <th class="border-right p-0 px-2 text-13 text-left" style="width:15%;">Tên sản
                                            phẩm</th>
                                        <th class="border-right p-0 px-2 text-13 text-left" style="width:7%;">Đơn vị
                                        </th>
                                        <th class="border-right p-0 px-2 text-right text-13" style="width:10%;">
                                            Số lượng
                                        </th>
                                        <th class="border-right p-0 px-2 text-right text-13" style="width:10%;">
                                            Quản lý SN
                                        </th>
                                        <th class="border-right p-0 px-2 text-right text-13" style="width:10%;">
                                            Đơn giá
                                        </th>
                                        <th class="border-right p-0 px-2 text-center text-13" style="width:10%;">
                                            Thuế
                                        </th>
                                        <th class="border-right p-0 px-2 text-center text-13" style="width:10%;">
                                            Khuyến mãi
                                        </th>
                                        <th class="border-right p-0 px-2 text-right text-13" style="width:15%;">
                                            Thành tiền
                                        </th>
                                        <th class="border-right p-0 px-2 text-left note text-13">Ghi chú sản phẩm</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="dynamic-fields" class="bg-white"></tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                    <section class="content">
                        <div class="container-fluided">
                            <div class="d-flex ml-3">
                                <button type="button" data-toggle="dropdown" id="add-field-btn"
                                    class="btn-save-print d-flex align-items-center h-100 py-1 px-2 rounded activity"
                                    style="margin-right:10px" data-name1="GH" data-des="Thêm sản phẩm">
                                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="14"
                                        height="14" viewBox="0 0 18 18" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                            fill="#42526E"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                            fill="#42526E"></path>
                                    </svg>
                                    <span class="text-table">Thêm sản phẩm</span>
                                </button>
                            </div>
                        </div>
                    </section>
                    <div class="content">
                        <div class="row" style="width:95%;">
                            <div class="position-relative col-lg-4 px-0"></div>
                            <div class="position-relative col-lg-5 col-md-7 col-sm-12 margin-left180">
                                <div class="m-3 ">
                                    <div class="d-flex justify-content-between">
                                        <span class="text-13-black">Giá trị trước thuế: </span>
                                        <span id="total-amount-sum" class="text-table">0đ</span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2 align-items-center">
                                        <span class="text-13-black">Khuyến mãi:</span>
                                        <div class="d-flex align-items-center">
                                            <input id="voucher" type="text" name="voucher" readonly
                                                class="text-right text-13-black border-0 py-1 w-100 height-32 bg-input-guest"
                                                placeholder="Nhập số tiền">
                                            <span class="percent_discount d-none">%</span>
                                            <select id="discount_type" disabled
                                                class="border-0 height-32 text-13-blue text-center discount_type bg-input-guest">
                                                <option value="1">Nhập tiền</option>
                                                <option value="2">Nhập %</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <span class="text-13-black">Thuế VAT: </span>
                                        <span id="product-tax" class="text-table">0đ</span>
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
            </section>
            {{-- Modal seri --}}
            <div id="list_modal">
                <div class="modal fade" id="exampleModal0" tabindex="-1" aria-labelledby="exampleModalLabel"
                    style="display: none;" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header align-items-center">
                                <h5 class="modal-title" id="exampleModalLabel">Thông tin Serial Number</h5>
                                <div class="d-flex align-items-center">
                                    <button type="button"
                                        class="btn-destroy btn-light mx-1 d-flex align-items-center h-100 btnclose"
                                        data-dismiss="modal">
                                        <span>
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM6.03033 4.96967C5.73744 4.67678 5.26256 4.67678 4.96967 4.96967C4.67678 5.26256 4.67678 5.73744 4.96967 6.03033L6.93934 8L4.96967 9.96967C4.67678 10.2626 4.67678 10.7374 4.96967 11.0303C5.26256 11.3232 5.73744 11.3232 6.03033 11.0303L8 9.06066L9.96967 11.0303C10.2626 11.3232 10.7374 11.3232 11.0303 11.0303C11.3232 10.7374 11.3232 10.2626 11.0303 9.96967L9.06066 8L11.0303 6.03033C11.3232 5.73744 11.3232 5.26256 11.0303 4.96967C10.7374 4.67678 10.2626 4.67678 9.96967 4.96967L8 6.93934L6.03033 4.96967Z"
                                                    fill="#6D7075" />
                                            </svg>
                                        </span>
                                        <span class="text-btnIner-primary ml-2">Hủy</span>
                                    </button>
                                    <button type="button"
                                        class="custom-btn mx-1 d-flex align-items-center h-100 check-seri"
                                        data-dismiss="">
                                        <div class="d-flex align-items-center">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z"
                                                        fill="white"></path>
                                                </svg>
                                            </span>
                                            <span class="text-btnIner-primary ml-2">Xác nhận</span>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="modal-body px-0 pb-4 pt-0 m-0">
                                <table id="table_SNS" class="w-100 hover-tr-table">
                                    <thead>
                                        <tr>
                                            <th class="border border-right-0 pl-3 py-1 border-top-0 border-checkbox">
                                                <input type="checkbox">
                                            </th>
                                            <th
                                                class="border border-right-0 border-top-0 border-left-0 py-1 text-secondary">
                                                STT</th>
                                            <th class="border border-left-0 border-top-0 py-1 text-secondary">Serial
                                                number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
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
            <div class="modal fade" id="recentModal" tabindex="-1" role="dialog"
                aria-labelledby="productModalLabel" aria-hidden="true">
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
                                                    <a href="#" class="sort-link" data-sort-by="id"
                                                        data-sort-type="#">
                                                        <button class="btn-sort text-13" type="submit">
                                                            Tên sản phẩm
                                                        </button>
                                                    </a>
                                                    <div class="icon" id="icon-id"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link" data-sort-by="id"
                                                        data-sort-type="#">
                                                        <button class="btn-sort text-13" type="submit">
                                                            Khách hàng
                                                        </button>
                                                    </a>
                                                    <div class="icon" id="icon-id"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link" data-sort-by="id"
                                                        data-sort-type="#">
                                                        <button class="btn-sort text-13" type="submit">
                                                            Giá bán
                                                        </button>
                                                    </a>
                                                    <div class="icon" id="icon-id"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link" data-sort-by="id"
                                                        data-sort-type="#">
                                                        <button class="btn-sort text-13" type="submit">
                                                            Thuế
                                                        </button>
                                                    </a>
                                                    <div class="icon" id="icon-id"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52">
                                                <span class="d-flex">
                                                    <a href="#" class="sort-link" data-sort-by="id"
                                                        data-sort-type="#">
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
        {{-- Thông tin khách hàng --}}
        <div class="content-wrapper2 px-0 py-0">
            <div id="mySidenav" class="sidenav border">
                <div id="show_info_Guest">
                    <div class="bg-filter-search border-0 text-center">
                        <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN KHÁCH HÀNG
                        </p>
                    </div>
                    <div class="d-flex border-left-0 justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative"
                        style="height:49px;">
                        <span class="text-13 btn-click" style="flex: 1.5;">Số báo giá</span>

                        <span class="mx-1 text-13" style="flex: 2;">
                            <input type="text" placeholder="Chọn thông tin" name="quotation_number"
                                class="border-0 w-100 bg-input-guest py-2 px-2 numberQute " id="myInput"
                                style="background-color:#F0F4FF; border-radius:4px;" autocomplete="off"
                                value="@isset($yes) {{ $data['quotation_number'] }} @endisset"
                                required>
                            <input type="hidden" name="detail_id" id="detail_id"
                                value="@isset($yes) {{ $data['detail_id'] }} @endisset">
                        </span>
                        <div class="">
                            <div id="myUL"
                                class="bg-white position-absolute rounded list-guest shadow p-1 z-index-block"
                                style="z-index: 99;display: none;">
                                <div class="p-1">
                                    <div class="position-relative">
                                        <input type="text" placeholder="Nhập số báo giá"
                                            class="pr-4 w-100 input-search bg-input-guest" id="companyFilter">
                                        <span id="search-icon" class="search-icon">
                                            <i class="fas fa-search text-table" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                                <ul class="m-0 p-0 scroll-data">
                                    @foreach ($numberQuote as $quote_value)
                                        <li class="p-2 align-items-center text-wrap"
                                            style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                            <a href="#" title="" style="flex:2" data-name1="GH"
                                                data-des="Lấy thông tin từ số báo giá" id="{{ $quote_value->id }}"
                                                name="search-info" class="search-info activity">
                                                <span
                                                    class="text-13-black">{{ $quote_value->quotation_number }}</span></span>
                                            </a>
                                            <a id="" class="search-infoEdit" type="button"
                                                data-toggle="modal" data-target="#guestModalEdit">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                        height="14" viewBox="0 0 14 14" fill="none">
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
                                </ul>
                                <!-- <a type="button"
                                            class="d-flex align-items-center p-2 position-sticky addGuestNew mt-2"
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
                                            <span class="text-13-black pl-3 pt-1"
                                                style="font-weight: 600 !important;">Thêm khách hàng</span>
                                        </a> -->
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="content-info--common" id="show-info-guest">
                            <ul class="p-0 m-0">
                                <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                    style="height:48px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Khách hàng</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest nameGuest"
                                        style="flex:2;" readonly
                                        value="@isset($yes){{ $getGuestbyId[0]->guest_name }}@endisset" />

                                    <input type="hidden" class="idGuest" autocomplete="off" name="guest_id"
                                        value="@isset($yes){{ $getGuestbyId[0]->id }}@endisset">
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left position-relative"
                                    style="height:48px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Người đại diện</span>

                                    <input tye="text"
                                        class="text-13-black w-50 border-0 bg-input-guest represent_name"
                                        value="{{ $getRepresentbyId[0]->represent_name ?? '' }}" style="flex:2;"
                                        readonly>

                                    <input type="hidden" class="idRepresent" autocomplete="off" name="represent_id"
                                        value="{{ $getRepresentbyId[0]->id ?? '' }}">
                                    <!-- <div id="myUL7"
                                                class="bg-white position-absolute rounded shadow p-1 list-guest z-index-block"
                                                style="z-index: 99;">
                                                <div class="p-1">
                                                        <div class="position-relative">
                                                            <input type="text" placeholder="Nhập công ty"
                                                                class="pr-4 w-100 input-search bg-input-guest" id="companyFilter7">
                                                            <span id="search-icon" class="search-icon"><i
                                                                    class="fas fa-search text-table" aria-hidden="true"></i></span>
                                                        </div>
                                                </div>
                                                <ul class="m-0 p-0 scroll-data">
                                                    <li class="p-2 align-items-center" style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                            <a href="#" title="" id="" name="search-info" class="search-info">
                                                                <span class="text-13-black">Nguyễn Văn A</span>
                                                            </a>
                                                    </li>
                                                </ul>
                                                <a type="button"
                                                    class="d-flex align-items-center p-2 position-sticky addGuestNew mt-2"
                                                    data-toggle="modal" data-target="#guestModal" style="bottom: 0;border-radius:4px;background-color:#F2F2F2;">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                            <path d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z" fill="#282A30"/>
                                                        </svg>
                                                    </span>
                                                    <span class="text-13-black pl-3 pt-1" style="font-weight: 600 !important;">Thêm người đại diện</span>
                                                </a>
                                            </div> -->
                                <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                    style="height:48px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Mã Giao Hàng</span>
                                    <input
                                        class="text-13-black w-50 border-0 bg-input-guest bg-input-guest-blue px-2 py-2"
                                        required placeholder="Nhập thông tin" style="flex:2;" name="code_delivery" />
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                    style="height:48px;">
                                    <span class="text-13 text-nowrap mr-1" style="flex: 1.5;">Đơn vị vận chuyển</span>
                                    <input
                                        class="text-13-black w-50 border-0 bg-input-guest bg-input-guest-blue px-2 py-2 unit_ship"
                                        name="shipping_unit" placeholder="Nhập thông tin" style="flex:2;" />
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                    style="height:48px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Phí giao hàng</span>
                                    <input
                                        class="text-13-black w-50 border-0 bg-input-guest bg-input-guest-blue px-2 py-2 fee_ship"
                                        name="shipping_fee" placeholder="Nhập thông tin" style="flex:2;" />
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                    style="height:48px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày giao hàng</span>
                                    <input class="text-13-black w-50 border-0 bg-input-guest " id="datePicker"
                                        required placeholder="Chọn thông tin" style="flex:2;" />

                                    <input type="hidden" id="hiddenDateInput" name="date_deliver" value="">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<x-user-flow></x-user-flow>
<script>
    //
    flatpickr("#datePicker", {
        locale: "vn",
        dateFormat: "d/m/Y",
        defaultDate: new Date(),
        onChange: function(selectedDates, dateStr, instance) {
            // Cập nhật giá trị của trường ẩn khi người dùng chọn ngày
            document.getElementById("hiddenDateInput").value = instance.formatDate(selectedDates[0],
                "Y-m-d");
        }
    });
    $('#checkall').change(function() {
        $('.cb-element').prop(
            'checked', this
            .checked);
        updateMultipleActionVisibility
            ();
    });
    $('.cb-element').change(function() {
        updateMultipleActionVisibility
            ();
        if ($('.cb-element:checked')
            .length === $(
                '.cb-element')
            .length) {
            $('#checkall').prop(
                'checked', true);
        } else {
            $('#checkall').prop(
                'checked', false
            );
        }
    });
    $(document).on('click',
        '.cancal_action',
        function(e) {
            e.preventDefault();
            $('.cb-element:checked')
                .prop('checked', false);
            $('#checkall').prop(
                'checked', false);
            updateMultipleActionVisibility
                ()
        })

    function updateMultipleActionVisibility() {
        if ($('.cb-element:checked')
            .length > 0) {
            $('.multiple_action').show();
            $('.count_checkbox').text(
                'Đã chọn ' + $(
                    '.cb-element:checked'
                ).length);
        } else {
            $('.multiple_action').hide();
        }
    }
    $('.deleteProduct1').click(function() {
        var deletedRow = $(this).closest("tr");
        var deletedProductAmount = parseFloat(deletedRow.find('.total-amount').val().replace(/,/g, ''));
        var deletedProductTax = parseFloat(deletedRow.find('.product_tax1').val().replace(/,/g, ''));

        deletedRow.remove();
        fieldCounter--;

        // Subtract the deleted product values from totalAmount and totalTax
        var totalAmount = parseFloat($('#total-amount-sum').text().replace(/,/g, '')) - deletedProductAmount;
        var totalTax = parseFloat($('#product-tax').text().replace(/,/g, '')) - deletedProductTax;

        // Call calculateGrandTotal with updated values
        calculateGrandTotal(totalAmount, totalTax);

        // Update the displayed totalTax value
        $('#product-tax').text(formatCurrency(Math.round(totalTax)));
    });

    //thêm sản phẩm
    let fieldCounter = 1;
    $(document).ready(function() {
        $("#add-field-btn").click(function() {
            let nextSoTT = $(".soTT").length + 1;
            // Tạo các phần tử HTML mới
            const newRow = $("<tr>", {
                "id": `dynamic-row-${fieldCounter}`,
                "class": `bg-white addProduct`,
                "style": `height:80px`
            });
            const maSanPham = $(
                `<td class='border-right p-2 text-13 text-left align-top border-bottom border-top-0'>` +
                `<span class='ml-1 mr-2'>` +
                `<svg xmlns='http://www.w3.org/2000/svg' width='6' height='10' viewBox='0 0 6 10' fill='none'>` +
                `<g clip-path='url(#clip0_1710_10941)'>` +
                `<path fill-rule='evenodd' clip-rule='evenodd' d='M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z' fill='#282A30'/>` +
                `</g>` +
                `<defs>` +
                `<clipPath id='clip0_1710_10941'>` +
                `<rect width='6' height='10' fill='white'/>` +
                `</clipPath>` +
                `</defs>` +
                `</svg>` +
                `</span>` +
                `<input type='checkbox' class='cb-element checkall-btn ml-1 mr-1'>` +
                `<input type='text' autocomplete='off' class='border-0 pl-1 pr-2 py-1 w-50 product_code height-32' name='product_code[]'>` +
                `</td>`
            );
            const tenSanPham = $(
                `<td class='border-right p-2 text-13 text-left align-top position-relative border-bottom border-top-0'>` +
                `<ul class='list_product bg-white position-absolute w-100 rounded shadow p-0 scroll-data' style='z-index: 99;top: 44%;left: 0%;'>` +
                `@foreach ($product as $product_value)` +
                `<li data-id='{{ $product_value->id }}'>` +
                `<a href='javascript:void(0);' class='text-13-black d-flex justify-content-between p-2 idProduct w-100' id='{{ $product_value->id }}' name='idProduct'>` +
                `<span class='w-50'>{{ $product_value->product_name }}</span>` +
                `</a>` +
                `</li>` +
                `@endforeach` +
                `</a></ul>` +
                `<div class='d-flex align-items-center'>` +
                `<input type='text' class='border-0 px-2 py-1 w-100 product_name height-32' autocomplete='off' required name='product_name[]'>` +
                `<input type='hidden' class='product_id' autocomplete='off' name='product_id[]'>` +
                `<div class='info-product' data-toggle='modal' data-target='#productModal'>` +
                `<svg width='16' height='16' viewBox='0 0 16 16' fill='none' xmlns='http://www.w3.org/2000/svg'>` +
                `<g clip-path='url(#clip0_1704_35239)'>` +
                `<path d='M7.99996 1.69596C6.32803 1.69596 4.72458 2.36012 3.54235 3.54235C2.36012 4.72458 1.69596 6.32803 1.69596 7.99996C1.69596 9.67188 2.36012 11.2753 3.54235 12.4576C4.72458 13.6398 6.32803 14.304 7.99996 14.304C9.67188 14.304 11.2753 13.6398 12.4576 12.4576C13.6398 11.2753 14.304 9.67188 14.304 7.99996C14.304 6.32803 13.6398 4.72458 12.4576 3.54235C11.2753 2.36012 9.67188 1.69596 7.99996 1.69596ZM0.303955 7.99996C0.303955 5.95885 1.11478 4.00134 2.55806 2.55806C4.00134 1.11478 5.95885 0.303955 7.99996 0.303955C10.0411 0.303955 11.9986 1.11478 13.4418 2.55806C14.8851 4.00134 15.696 5.95885 15.696 7.99996C15.696 10.0411 14.8851 11.9986 13.4418 13.4418C11.9986 14.8851 10.0411 15.696 7.99996 15.696C5.95885 15.696 4.00134 14.8851 2.55806 13.4418C1.11478 11.9986 0.303955 10.0411 0.303955 7.99996Z' fill='#282A30' />` +
                `<path d='M8.08001 4.96596C7.91994 4.95499 7.75932 4.97706 7.60814 5.0308C7.45696 5.08454 7.31845 5.1688 7.20121 5.27834C7.08398 5.38788 6.99053 5.52037 6.92667 5.66756C6.86281 5.81475 6.82991 5.97351 6.83001 6.13396C6.83001 6.31868 6.75663 6.49584 6.62601 6.62646C6.49539 6.75708 6.31824 6.83046 6.13351 6.83046C5.94879 6.83046 5.77163 6.75708 5.64101 6.62646C5.51039 6.49584 5.43701 6.31868 5.43701 6.13396C5.43691 5.66404 5.56601 5.20314 5.81019 4.80164C6.05436 4.40014 6.40422 4.0735 6.82152 3.85743C7.23881 3.64136 7.70748 3.54417 8.17629 3.57649C8.64509 3.60881 9.09599 3.76939 9.47968 4.04069C9.86338 4.31198 10.1651 4.68354 10.3519 5.11475C10.5386 5.54595 10.6033 6.02021 10.5387 6.48567C10.4741 6.95113 10.2828 7.38987 9.98568 7.75394C9.68857 8.11801 9.29708 8.39338 8.85401 8.54996C8.8079 8.56649 8.76805 8.59691 8.73993 8.63702C8.71182 8.67713 8.69682 8.72497 8.69701 8.77396V9.39996C8.69701 9.58468 8.62363 9.76184 8.49301 9.89246C8.36239 10.0231 8.18524 10.0965 8.00051 10.0965C7.81579 10.0965 7.63863 10.0231 7.50801 9.89246C7.37739 9.76184 7.30401 9.58468 7.30401 9.39996V8.77396C7.30392 8.43693 7.4083 8.10815 7.60279 7.83289C7.79727 7.55764 8.0723 7.34944 8.39001 7.23696C8.64354 7.14711 8.85837 6.97265 8.99832 6.74296C9.13828 6.51326 9.19482 6.24235 9.15843 5.97585C9.12203 5.70935 8.99492 5.46352 8.7985 5.27977C8.60208 5.09601 8.34835 4.98454 8.08001 4.96596Z' fill='#282A30' />` +
                `<path d='M8.05005 11.571C8.00257 11.571 7.95705 11.5898 7.92348 11.6234C7.88991 11.657 7.87105 11.7025 7.87105 11.75C7.87105 11.7974 7.88991 11.843 7.92348 11.8765C7.95705 11.9101 8.00257 11.929 8.05005 11.929C8.09752 11.929 8.14305 11.9101 8.17662 11.8765C8.21019 11.843 8.22905 11.7974 8.22905 11.75C8.22905 11.7025 8.21019 11.657 8.17662 11.6234C8.14305 11.5898 8.09752 11.571 8.05005 11.571ZM8.05005 12.5C8.14854 12.5 8.24607 12.4806 8.33706 12.4429C8.42805 12.4052 8.51073 12.3499 8.58038 12.2803C8.65002 12.2106 8.70527 12.128 8.74296 12.037C8.78065 11.946 8.80005 11.8484 8.80005 11.75C8.80005 11.6515 8.78065 11.5539 8.74296 11.4629C8.70527 11.3719 8.65002 11.2893 8.58038 11.2196C8.51073 11.15 8.42805 11.0947 8.33706 11.057C8.24607 11.0194 8.14854 11 8.05005 11C7.85114 11 7.66037 11.079 7.51972 11.2196C7.37907 11.3603 7.30005 11.551 7.30005 11.75C7.30005 11.9489 7.37907 12.1396 7.51972 12.2803C7.66037 12.4209 7.85114 12.5 8.05005 12.5Z' fill='#282A30' />` +
                `</g>` +
                `<defs>` +
                `<clipPath id='clip0_1704_35239'>` +
                `<rect width='16' height='16' fill='white' />` +
                `</clipPath>` +
                `</defs>` +
                `</svg>` +
                `</div></div></td>`
            );
            const dvTinh = $(
                "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
                "<input type='text' autocomplete='off' class='border-0 px-2 py-1 w-100 product_unit height-32' required name='product_unit[]'>" +
                "</td>"
            );
            const soLuong = $(
                "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
                "<div class='d-flex align-items-center'>" +
                "<div>" +
                "<input type='number' value='' data-product-id='' class='border-0 px-2 text-right py-1 w-100 quantity-input height-32' autocomplete='off' required='' name='product_qty[]'>" +
                "<input type='hidden' class='tonkho'>" +
                "<p class='mt-3 text-13-blue inventory text-right mb-0'>Tồn kho: <span class='soTonKho'>0</span></p>" +
                "</div>" +
                "</div>" +
                "</td>" +
                "</td>" +
                "<td class='text-center ui-sortable-handle d-none'>" +
                "<input class='check-add-sn' type='checkbox' name='cbSeri[]' value='1'>" +
                "</td>"
            );
            const quanLySN = $(
                `<td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                    <a class="open-modal-btn text-center d-none" href="#" data-target="#exampleModal0" data-toggle="modal">
                        <div class="sn--modal pt-2">
                            <span class="border-span--modal">SN</span>
                        </div>
                    </a>
                </td>`
            );
            const donGia = $(
                "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
                "<div>" +
                "<input type='text' class='text-right border-0 px-2 py-1 w-100 product_price height-32' autocomplete='off' name='product_price[]' required>" +
                "</div>" +
                "<a href='#'><div class='mt-3 text-13-blue recentModal mb-0 text-right' data-toggle='modal' data-target='#recentModal' style='display:none;'>Giao dịch gần đây</div></a>" +
                "</td>"
            );
            const thue = $(
                "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
                "<select name='product_tax[]' class='border-0 py-1 w-100 text-center product_tax height-32' required>" +
                "<option value='0'>0%</option>" +
                "<option value='8'>8%</option>" +
                "<option value='10'>10%</option>" +
                "<option value='99'>NOVAT</option>" +
                "</select>" +
                "</td>"
            );
            const khuyenMai = $(
                "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
                "<div class='d-flex align-item-center'>" +
                "<input type='text' name='promotion[]' readonly class='text-right border-0 px-2 py-1 w-100 height-32 promotion' autocomplete='off'>" +
                "<span class='mt-2 percent d-none'>%</span>" +
                "</div>" +
                "<div class='text-right'>" +
                "<select name='promotion_type[]' class='border-0 mt-3 text-13-blue text-center promotion_type' required=''><option value='1'>Nhập tiền</option><option value='2'>Nhập %</option></select>" +
                "</div>" +
                "</td>"
            );
            const thanhTien = $(
                "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
                "<input type='text' readonly class='text-right border-0 px-2 py-1 w-100 total-amount height-32'>" +
                "</td>"
            );
            const ghiChu = $(
                "<td class='border-right p-2 text-13 align-top border-bottom border-top-0'>" +
                "<input type='text' class='border-0 py-1 w-100 height-32' placeholder='Nhập ghi chú' name='product_note[]'>" +
                "</td>"
            );
            const option = $(
                "<td class='border-bottom text-right deleteProduct border-top-0' data-name1='BG' data-des='Xóa sản phẩm'>" +
                "<svg width='17' height='17' viewBox='0 0 17 17' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
                "<path fill-rule='evenodd' clip-rule='evenodd' d='M13.1417 6.90625C13.4351 6.90625 13.673 7.1441 13.673 7.4375C13.673 7.47847 13.6682 7.5193 13.6589 7.55918L12.073 14.2992C11.8471 15.2591 10.9906 15.9375 10.0045 15.9375H6.99553C6.00943 15.9375 5.15288 15.2591 4.92702 14.2992L3.34113 7.55918C3.27393 7.27358 3.45098 6.98757 3.73658 6.92037C3.77645 6.91099 3.81729 6.90625 3.85826 6.90625H13.1417ZM9.03125 1.0625C10.4983 1.0625 11.6875 2.25175 11.6875 3.71875H13.8125C14.3993 3.71875 14.875 4.19445 14.875 4.78125V5.3125C14.875 5.6059 14.6371 5.84375 14.3438 5.84375H2.65625C2.36285 5.84375 2.125 5.6059 2.125 5.3125V4.78125C2.125 4.19445 2.6007 3.71875 3.1875 3.71875H5.3125C5.3125 2.25175 6.50175 1.0625 7.96875 1.0625H9.03125ZM9.03125 2.65625H7.96875C7.38195 2.65625 6.90625 3.13195 6.90625 3.71875H10.0938C10.0938 3.13195 9.61805 2.65625 9.03125 2.65625Z' fill='#6B6F76'/>" +
                "</svg>" +
                "</td>" +
                "<td style='display:none;'><input type='text' class='product_tax1' value='0'></td>" +
                "<td style='display:none;'><input type='text' class='type'></td>"
            );
            // 
            // Gắn các phần tử vào hàng mới
            newRow.append(maSanPham, tenSanPham, dvTinh, soLuong, quanLySN, donGia, thue, khuyenMai,
                thanhTien,
                ghiChu,
                option);
            $("#dynamic-fields").before(newRow);
            // Tăng giá trị fieldCounter
            fieldCounter++;

            //kéo thả vị trí sản phẩm
            // $("table tbody").sortable({
            //     axis: "y",
            //     handle: "td",
            // });
            //Xóa sản phẩm
            option.click(function() {
                var deletedRow = $(this).closest("tr");
                var deletedProductAmount = parseFloat(deletedRow.find('.total-amount').val()
                    .replace(/,/g, '')) || 0;
                var deletedProductTax = parseFloat(deletedRow.find('.product_tax1').val()
                    .replace(/,/g, ''));

                var productId = deletedRow
                    .find(".product_id")
                    .val();
                $("input[name='selected_serial_numbers[]'][data-product-id='" +
                        productId + "']")
                    .remove();

                deletedRow.remove();
                fieldCounter--;

                // Subtract the deleted product values from totalAmount and totalTax
                var totalAmount = parseFloat($('#total-amount-sum').text().replace(/,/g, '')) -
                    deletedProductAmount;
                var totalTax = parseFloat($('#product-tax').text().replace(/,/g, '')) -
                    deletedProductTax;

                // Call calculateGrandTotal with updated values
                calculateGrandTotal(totalAmount, totalTax);

                // Update the displayed totalTax value
                $('#product-tax').text(formatCurrency(Math.round(totalTax)));
                $('#total-amount-sum').text(formatCurrency(Math.round(totalAmount)));
                //
                var name = $(this).data('name1'); // Lấy giá trị của thuộc tính data-name1
                var des = $(this).data('des'); // Lấy giá trị của thuộc tính data-des
                $.ajax({
                    url: '{{ route('addActivity') }}',
                    type: 'GET',
                    data: {
                        name: name,
                        des: des,
                    },
                    success: function(data) {}
                });
            });
            // Checkbox
            $('#checkall').change(function() {
                $('.cb-element').prop('checked', this.checked);
                updateMultipleActionVisibility();
            });
            $('.cb-element').change(function() {
                updateMultipleActionVisibility();
                if ($('.cb-element:checked').length === $('.cb-element').length) {
                    $('#checkall').prop('checked', true);
                } else {
                    $('#checkall').prop('checked', false);
                }
            });
            $(document).on('click', '.cancal_action', function(e) {
                e.preventDefault();
                $('.cb-element:checked').prop('checked', false);
                $('#checkall').prop('checked', false);
                updateMultipleActionVisibility()
            })

            function updateMultipleActionVisibility() {
                if ($('.cb-element:checked').length > 0) {
                    $('.multiple_action').show();
                    $('.count_checkbox').text('Đã chọn ' + $('.cb-element:checked').length);
                } else {
                    $('.multiple_action').hide();
                }
            }

            //Hiển thị danh sách tên sản phẩm
            $(".list_product").hide();
            $('.product_name').on("click", function(e) {
                e.stopPropagation();
                $(this).closest('tr').find(".list_product").show();
            });
            $(document).on("click", function(e) {
                if (!$(e.target).is(".product_name")) {
                    $(".list_product").hide();
                }
            });
            //search tên sản phẩm
            $(".product_name").on("keyup", function() {
                var value = $(this).val().toUpperCase();
                var $tr = $(this).closest("tr");
                $tr.find(".list_product li").each(function() {
                    var text = $(this).find("a").text().toUpperCase();
                    $(this).toggle(text.indexOf(value) > -1);
                });
            });
            //lấy thông tin sản phẩm
            $(document).ready(function() {
                $('.idProduct').off('click').on('click', function(event) {
                    event.stopPropagation();

                    var productCode = $(this).closest('tr').find('.product_code');
                    var productName = $(this).closest('tr').find('.product_name');
                    var productUnit = $(this).closest('tr').find('.product_unit');
                    var productPrice = $(this).closest('tr').find('.product_price');
                    var thue = $(this).closest('tr').find('.product_tax');
                    var product_id = $(this).closest('tr').find('.product_id');
                    var tonkho = $(this).closest('tr').find('.tonkho');
                    var soTonKho = $(this).closest('tr').find('.soTonKho');
                    var type = $(this).closest('tr').find('.type');
                    var idProduct = $(this).attr('id');
                    var currentRow = $(this).closest('tr');
                    var clickedProductId = $(this).parent().data('id');
                    var inventory = $(this).closest('tr').find('.inventory');

                    if (clickedProductId !== product_id.val()) {
                        if (currentRow.siblings().find('.product_id[value="' +
                                clickedProductId + '"]').length > 0) {
                            showAutoToast('warning',
                                'Không thể chọn sản phẩm này. Vui lòng chọn sản phẩm khác.'
                            );
                            return;
                        }
                    }

                    $.ajax({
                        url: '{{ route('getProductFromQuote') }}',
                        type: 'GET',
                        data: {
                            idProduct: idProduct
                        },
                        success: function(data) {
                            if (Array.isArray(data) && data.length > 0) {
                                var productData = data[0];
                                var seriProArray = productData.seri_pro;
                                productCode.val(productData.product_code);
                                productName.val(productData.product_name);
                                productUnit.val(productData.product_unit);
                                productPrice.val(formatCurrency(productData
                                    .product_price_export))
                                thue.val(productData.product_tax);
                                product_id.val(productData.id);
                                tonkho.val(productData.product_inventory);
                                if (productData.type == 2) {
                                    inventory.hide();
                                    soTonKho.text('');
                                } else {
                                    inventory.show();
                                    soTonKho.text(formatNumber(productData
                                        .product_inventory == null ?
                                        0 :
                                        productData
                                        .product_inventory));
                                }
                                type.val(productData.type);
                                thue.prop('disabled', true);
                                productCode.prop('readonly', true);
                                productUnit.prop('readonly', true);
                                $('.list_product').hide();
                                $('.recentModal').show();
                                // Cập nhật ID của hàng (row)
                                var newRowID = 'dynamic-row-' + productData
                                    .id;
                                $(this).closest('tr').attr('id', newRowID);
                                var dataTarget = '#exampleModal' +
                                    productData.id;
                                currentRow.find('.add-seri-number').attr(
                                    'data-target', dataTarget);
                                var dataProduct = '#exampleModal' +
                                    productData.id;
                                currentRow.find('.add-seri-number').attr(
                                    'data-target', dataTarget);
                                var quantityInput = currentRow.find(
                                    '.quantity-input');
                                quantityInput.attr('data-product-id',
                                    productData.id);
                                //Ẩn/hiện button S/N
                                var rowElement = $(`#${newRowID}`);
                                if (seriProArray && seriProArray.length >
                                    0 && seriProArray[0] !== null) {
                                    currentRow.find('.open-modal-btn')
                                        .removeClass('d-none');
                                    currentRow.find(`.check-add-sn`)
                                        .prop('disabled', true);
                                } else {
                                    currentRow.find('.open-modal-btn')
                                        .addClass('d-none');
                                    currentRow.find(`.check-add-sn`)
                                        .prop('disabled', false);
                                }
                                //Hiện SN theo sản phẩm
                                $('.open-modal-btn').off('click').on(
                                    'click',
                                    function() {
                                        var trElement = $(this)
                                            .closest('tr');
                                        var productInput = trElement
                                            .find('.product_id');
                                        var productId = productInput
                                            .val();
                                        var selectedSerialNumbersForProduct =
                                            selectedSerialNumbers[
                                                productId] || [];
                                        var qty_enter = trElement
                                            .find('.quantity-input')
                                            .val();
                                        $("#exampleModal0 .modal-body tbody")
                                            .empty();

                                        $.ajax({
                                            url: "{{ route('getProductSeri') }}",
                                            method: 'GET',
                                            data: {
                                                productId: productId,
                                            },
                                            success: function(
                                                response
                                            ) {
                                                var currentIndex =
                                                    1;
                                                response
                                                    .forEach(
                                                        function(
                                                            sn
                                                        ) {
                                                            var snId =
                                                                parseInt(
                                                                    sn
                                                                    .id
                                                                );
                                                            var selectedSerialNumbersForProductInt =
                                                                selectedSerialNumbersForProduct
                                                                .map(
                                                                    function(
                                                                        value
                                                                    ) {
                                                                        return parseInt(
                                                                            value
                                                                            .serialNumberId
                                                                        );
                                                                    }
                                                                );
                                                            var isChecked =
                                                                selectedSerialNumbersForProductInt
                                                                .includes(
                                                                    snId
                                                                );
                                                            var newRow = `<tr style="">
                                                                <td class="border-bottom pl-3 border-checkbox">
                                                                    <input type="checkbox" class="check-item" data-product-id-sn="${sn.product_id}" value="${sn.id}" ${isChecked ? 'checked' : ''}>
                                                                </td>
                                                                <td class="border-bottom">${currentIndex}</td>
                                                                <td class="border-bottom">
                                                                    <input readonly class="form-control w-100" type="text" value="${sn.serinumber}">
                                                                </td>
                                                            </tr>`;
                                                            currentIndex++;
                                                            $("#exampleModal0 .modal-body tbody")
                                                                .append(
                                                                    newRow
                                                                );
                                                        }
                                                    );
                                                $("#exampleModal0 .modal-body tbody tr")
                                                    .click(
                                                        function(
                                                            event
                                                        ) {
                                                            // Kiểm tra xem phần tử được click có phải là checkbox hay không
                                                            var checkbox =
                                                                $(
                                                                    this
                                                                )
                                                                .find(
                                                                    ".check-item"
                                                                );
                                                            if (!
                                                                $(event
                                                                    .target
                                                                )
                                                                .is(
                                                                    checkbox
                                                                )
                                                            ) {
                                                                // Đảo ngược trạng thái checked của checkbox
                                                                checkbox
                                                                    .prop(
                                                                        "checked",
                                                                        !
                                                                        checkbox
                                                                        .prop(
                                                                            "checked"
                                                                        )
                                                                    );
                                                                // Trigger sự kiện change cho checkbox
                                                                checkbox
                                                                    .trigger(
                                                                        "change"
                                                                    );
                                                            }
                                                        });
                                                //Thay đổi số lượng thì xóa s/n đã check
                                                $(".quantity-input")
                                                    .on("change",
                                                        function() {
                                                            var quantity =
                                                                $(
                                                                    this
                                                                )
                                                                .val();
                                                            var productId =
                                                                $(
                                                                    this
                                                                )
                                                                .data(
                                                                    "product-id"
                                                                );
                                                            var
                                                                selectedSerialNumbersForProductInt = [];
                                                            if (Array
                                                                .isArray(
                                                                    selectedSerialNumbersForProduct
                                                                )
                                                            ) {
                                                                selectedSerialNumbersForProductInt
                                                                    =
                                                                    selectedSerialNumbersForProduct
                                                                    .map(
                                                                        function(
                                                                            value
                                                                        ) {
                                                                            return parseInt(
                                                                                value
                                                                                .serialNumberId
                                                                            );
                                                                        }
                                                                    );
                                                            }
                                                            for (
                                                                let i =
                                                                    0; i <
                                                                selectedSerialNumbers
                                                                .length; i++
                                                            ) {
                                                                if (Array
                                                                    .isArray(
                                                                        selectedSerialNumbers[
                                                                            i
                                                                        ]
                                                                    ) &&
                                                                    selectedSerialNumbers[
                                                                        i
                                                                    ]
                                                                    .length >
                                                                    0
                                                                ) {
                                                                    selectedSerialNumbers
                                                                        [
                                                                            i
                                                                        ] =
                                                                        selectedSerialNumbers[
                                                                            i
                                                                        ]
                                                                        .filter(
                                                                            function(
                                                                                item
                                                                            ) {
                                                                                return item
                                                                                    .product_id !==
                                                                                    productId;
                                                                            }
                                                                        );
                                                                    $('input[name="selected_serial_numbers[]"][data-product-id="' +
                                                                            productId +
                                                                            '"]'
                                                                        )
                                                                        .remove();
                                                                }
                                                            }
                                                        }
                                                    );
                                                $('.check-item')
                                                    .on('change',
                                                        function(
                                                            event
                                                        ) {
                                                            event
                                                                .stopPropagation();
                                                            var checkedCheckboxes =
                                                                $(
                                                                    '.check-item:checked'
                                                                )
                                                                .length;
                                                            var serialNumberId =
                                                                $(
                                                                    this
                                                                )
                                                                .val();
                                                            var productId =
                                                                $(
                                                                    this
                                                                )
                                                                .data(
                                                                    'product-id-sn'
                                                                );
                                                            if (checkedCheckboxes >
                                                                qty_enter
                                                            ) {
                                                                $(this)
                                                                    .prop(
                                                                        'checked',
                                                                        false
                                                                    );
                                                            } else {
                                                                if ($(
                                                                        this
                                                                    )
                                                                    .is(
                                                                        ':checked'
                                                                    )
                                                                ) {
                                                                    if (!
                                                                        selectedSerialNumbers[
                                                                            productId
                                                                        ]
                                                                    ) {
                                                                        selectedSerialNumbers
                                                                            [
                                                                                productId
                                                                            ] = [];
                                                                    }
                                                                    selectedSerialNumbers
                                                                        [
                                                                            productId
                                                                        ]
                                                                        .push({
                                                                            product_id: productId,
                                                                            serialNumberId: serialNumberId
                                                                        });

                                                                    // Tạo một trường input ẩn mới và đặt giá trị
                                                                    var newInput =
                                                                        $('<input>', {
                                                                            type: 'hidden',
                                                                            name: 'selected_serial_numbers[]',
                                                                            value: serialNumberId,
                                                                            'data-product-id': productId,
                                                                        });

                                                                    // Thêm trường input mới vào container
                                                                    $('#selectedSerialNumbersContainer')
                                                                        .append(
                                                                            newInput
                                                                        );
                                                                } else {
                                                                    if (selectedSerialNumbers[
                                                                            productId
                                                                        ]) {
                                                                        selectedSerialNumbers
                                                                            [
                                                                                productId
                                                                            ] =
                                                                            selectedSerialNumbers[
                                                                                productId
                                                                            ]
                                                                            .filter(
                                                                                function(
                                                                                    item
                                                                                ) {
                                                                                    return item
                                                                                        .serialNumberId !==
                                                                                        serialNumberId;
                                                                                }
                                                                            );

                                                                        // Xóa trường input ẩn tương ứng
                                                                        $('input[name="selected_serial_numbers[]"][value="' +
                                                                                serialNumberId +
                                                                                '"]'
                                                                            )
                                                                            .remove();
                                                                    }
                                                                }
                                                            }
                                                        });

                                                // Xoá sự kiện click trước đó nếu có
                                                $('.check-seri')
                                                    .off(
                                                        'click'
                                                    )
                                                    .on('click',
                                                        function() {
                                                            var checkedCheckboxes =
                                                                $(
                                                                    '.check-item:checked'
                                                                )
                                                                .length;
                                                            var check_item =
                                                                $(
                                                                    '.check-item'
                                                                );
                                                            if (check_item
                                                                .length >
                                                                0
                                                            ) {
                                                                if (checkedCheckboxes <
                                                                    qty_enter
                                                                ) {
                                                                    showAutoToast
                                                                        ('warning',
                                                                            'Vui lòng chọn đủ serial number theo số lượng xuất!'
                                                                        );
                                                                    // Không cho phép đóng modal khi có lỗi
                                                                    return false;
                                                                } else if (
                                                                    checkedCheckboxes ==
                                                                    qty_enter
                                                                ) {
                                                                    // Kiểm tra xem nút được nhấn có class 'check-seri' không
                                                                    if ($(
                                                                            this
                                                                        )
                                                                        .hasClass(
                                                                            'check-seri'
                                                                        )
                                                                    ) {
                                                                        $(this)
                                                                            .attr(
                                                                                'data-dismiss',
                                                                                'modal'
                                                                            );
                                                                    }
                                                                }
                                                            } else {
                                                                $(this)
                                                                    .attr(
                                                                        'data-dismiss',
                                                                        'modal'
                                                                    );
                                                            }
                                                        }
                                                    );
                                            }
                                        });
                                    });
                                //Hủy checked
                                if (productData.check_seri == 1) {
                                    currentRow.find(`.check-add-sn`)
                                        .prop('checked', true);
                                } else {
                                    currentRow.find(`.check-add-sn`)
                                        .prop('checked', false);
                                }
                                //Kiểm tra đã thêm seri chưa
                                $('#luuNhap').off('click').on('click',
                                    function(e) {
                                        var
                                            insufficientSeriProducts = [];
                                        var
                                            invalidInventoryProducts = [];
                                        var invalidInventorySN = [];
                                        var sanPhamHetSN = [];
                                        $(".bg-white.addProduct")
                                            .each(
                                                function() {
                                                    var soTonKho =
                                                        parseFloat(
                                                            $(
                                                                this
                                                            )
                                                            .find(
                                                                ".soTonKho"
                                                            ).text()
                                                        );
                                                    var checkbox =
                                                        $(
                                                            this)
                                                        .find(
                                                            ".check-add-sn"
                                                        );

                                                    var quantity =
                                                        parseFloat(
                                                            $(this)
                                                            .find(
                                                                ".quantity-input"
                                                            )
                                                            .val());
                                                    var type =
                                                        parseFloat(
                                                            $(this)
                                                            .find(
                                                                ".type"
                                                            )
                                                            .val());
                                                    var productNameInventory =
                                                        $(this)
                                                        .find(
                                                            ".product_name"
                                                        ).val();
                                                    // Kiểm tra số lượng tồn kho
                                                    if (type !=
                                                        2) {
                                                        if (quantity >
                                                            soTonKho
                                                        ) {
                                                            invalidInventoryProducts
                                                                .push(
                                                                    productNameInventory
                                                                );
                                                        }
                                                    }

                                                    if (checkbox
                                                        .prop(
                                                            "checked"
                                                        ) &&
                                                        checkbox
                                                        .prop(
                                                            "disabled"
                                                        )
                                                    ) {
                                                        var quantityValue =
                                                            parseFloat(
                                                                $(
                                                                    this
                                                                )
                                                                .find(
                                                                    ".quantity-input"
                                                                )
                                                                .val()
                                                            );
                                                        var productId =
                                                            $(this)
                                                            .find(
                                                                ".product_id"
                                                            ).val();
                                                        var productName =
                                                            $(this)
                                                            .find(
                                                                ".product_name"
                                                            ).val();

                                                        for (var i =
                                                                0; i <
                                                            quantityValue; i++
                                                        ) {
                                                            var isSeriInputExist =
                                                                $(
                                                                    `input[name="selected_serial_numbers[]"][data-product-id="${productId}"]:eq(${i})`
                                                                )
                                                                .length >
                                                                0;

                                                            if (!
                                                                isSeriInputExist
                                                            ) {
                                                                insufficientSeriProducts
                                                                    .push(
                                                                        productName
                                                                    );
                                                                break;
                                                            }
                                                        }
                                                    }
                                                    //
                                                    if (checkbox
                                                        .prop(
                                                            "checked"
                                                        ) &&
                                                        !checkbox
                                                        .prop(
                                                            "disabled"
                                                        )
                                                    ) {
                                                        if (type !=
                                                            2) {
                                                            invalidInventorySN
                                                                .push(
                                                                    productNameInventory
                                                                );
                                                            sanPhamHetSN
                                                                .push(
                                                                    productNameInventory
                                                                );
                                                        }
                                                    }
                                                });

                                        // Hiển thị thông báo nếu có sản phẩm không đủ "seri"
                                        if (insufficientSeriProducts
                                            .length > 0) {
                                            showAutoToast('warning',
                                                `Serial Number chưa được chọn ở các sản phẩm: ${insufficientSeriProducts.join(", ")}`
                                            );
                                            $('#pdf_export').val(0);
                                            e.preventDefault();
                                        } else {
                                            if (invalidInventorySN
                                                .length > 0) {
                                                showAutoToast(
                                                    'warning',
                                                    `Số lượng "seri" đã hết cho các sản phẩm: ${sanPhamHetSN.join(", ")}`
                                                );
                                                $('#pdf_export').val(0);
                                                e.preventDefault();
                                            }
                                            // Hiển thị thông báo nếu không đủ số lượng tồn kho
                                            if (invalidInventoryProducts
                                                .length > 0) {
                                                showAutoToast(
                                                    'warning',
                                                    "Không đủ số lượng tồn kho cho các sản phẩm:\n" +
                                                    invalidInventoryProducts
                                                    .join(
                                                        ', '
                                                    ));
                                                $('#pdf_export').val(0);
                                                e.preventDefault();
                                            } else {
                                                // Tiếp tục kiểm tra thông tin sản phẩm và submit form nếu hợp lệ
                                                var allFieldsFilled =
                                                    true;

                                                $('.addProduct')
                                                    .each(
                                                        function() {
                                                            var productName =
                                                                $(
                                                                    this
                                                                )
                                                                .find(
                                                                    '.product_name'
                                                                )
                                                                .val();
                                                            var productUnit =
                                                                $(
                                                                    this
                                                                )
                                                                .find(
                                                                    '.product_unit'
                                                                )
                                                                .val();
                                                            var productQty =
                                                                $(
                                                                    this
                                                                )
                                                                .find(
                                                                    '.quantity-input'
                                                                )
                                                                .val();

                                                            if (productName ===
                                                                '' ||
                                                                productUnit ===
                                                                '' ||
                                                                productQty ===
                                                                ''
                                                            ) {
                                                                allFieldsFilled
                                                                    =
                                                                    false;
                                                                return false;
                                                            }
                                                        });

                                                if (
                                                    allFieldsFilled
                                                ) {
                                                    $('.check-add-sn:checked[disabled]')
                                                        .prop(
                                                            'disabled',
                                                            false
                                                        );
                                                    // document
                                                    //     .getElementById(
                                                    //         'deliveryForm'
                                                    //     )
                                                    //     .submit();
                                                } else {
                                                    showAutoToast
                                                        (
                                                            'warning',
                                                            'Vui lòng điền đủ thông tin sản phẩm'
                                                        );
                                                    e.preventDefault();
                                                }
                                            }
                                        }
                                    });
                                $('#giaoHang').off('click').on('click',
                                    function(e) {
                                        var
                                            insufficientSeriProducts = [];
                                        var
                                            invalidInventoryProducts = [];
                                        var invalidInventorySN = [];
                                        var sanPhamHetSN = [];
                                        $(".bg-white.addProduct")
                                            .each(
                                                function() {
                                                    var soTonKho =
                                                        parseFloat(
                                                            $(
                                                                this
                                                            )
                                                            .find(
                                                                ".soTonKho"
                                                            ).text()
                                                        );
                                                    var checkbox =
                                                        $(
                                                            this)
                                                        .find(
                                                            ".check-add-sn"
                                                        );

                                                    var quantity =
                                                        parseFloat(
                                                            $(this)
                                                            .find(
                                                                ".quantity-input"
                                                            )
                                                            .val());
                                                    var type =
                                                        parseFloat(
                                                            $(this)
                                                            .find(
                                                                ".type"
                                                            )
                                                            .val());
                                                    var productNameInventory =
                                                        $(this)
                                                        .find(
                                                            ".product_name"
                                                        ).val();
                                                    // Kiểm tra số lượng tồn kho
                                                    if (type !=
                                                        2) {
                                                        if (quantity >
                                                            soTonKho
                                                        ) {
                                                            invalidInventoryProducts
                                                                .push(
                                                                    productNameInventory
                                                                );
                                                        }
                                                    }

                                                    if (checkbox
                                                        .prop(
                                                            "checked"
                                                        ) &&
                                                        checkbox
                                                        .prop(
                                                            "disabled"
                                                        )
                                                    ) {
                                                        var quantityValue =
                                                            parseFloat(
                                                                $(
                                                                    this
                                                                )
                                                                .find(
                                                                    ".quantity-input"
                                                                )
                                                                .val()
                                                            );
                                                        var productId =
                                                            $(this)
                                                            .find(
                                                                ".product_id"
                                                            ).val();
                                                        var productName =
                                                            $(this)
                                                            .find(
                                                                ".product_name"
                                                            ).val();

                                                        for (var i =
                                                                0; i <
                                                            quantityValue; i++
                                                        ) {
                                                            var isSeriInputExist =
                                                                $(
                                                                    `input[name="selected_serial_numbers[]"][data-product-id="${productId}"]:eq(${i})`
                                                                )
                                                                .length >
                                                                0;

                                                            if (!
                                                                isSeriInputExist
                                                            ) {
                                                                insufficientSeriProducts
                                                                    .push(
                                                                        productName
                                                                    );
                                                                break;
                                                            }
                                                        }
                                                    }
                                                    //
                                                    if (checkbox
                                                        .prop(
                                                            "checked"
                                                        ) &&
                                                        !checkbox
                                                        .prop(
                                                            "disabled"
                                                        )
                                                    ) {
                                                        if (type !=
                                                            2) {
                                                            invalidInventorySN
                                                                .push(
                                                                    productNameInventory
                                                                );
                                                            sanPhamHetSN
                                                                .push(
                                                                    productNameInventory
                                                                );
                                                        }
                                                    }
                                                });

                                        // Hiển thị thông báo nếu có sản phẩm không đủ "seri"
                                        if (insufficientSeriProducts
                                            .length > 0) {
                                            showAutoToast('warning',
                                                `Serial Number chưa được chọn ở các sản phẩm: ${insufficientSeriProducts.join(", ")}`
                                            );
                                            $('#pdf_export').val(0);
                                            e.preventDefault();
                                        } else {
                                            if (invalidInventorySN
                                                .length > 0) {
                                                showAutoToast(
                                                    'warning',
                                                    `Số lượng "seri" đã hết cho các sản phẩm: ${sanPhamHetSN.join(", ")}`
                                                );
                                                $('#pdf_export').val(0);
                                                e.preventDefault();
                                            }
                                            // Hiển thị thông báo nếu không đủ số lượng tồn kho
                                            if (invalidInventoryProducts
                                                .length > 0) {
                                                showAutoToast(
                                                    'warning',
                                                    "Không đủ số lượng tồn kho cho các sản phẩm:\n" +
                                                    invalidInventoryProducts
                                                    .join(
                                                        ', '
                                                    ));
                                                $('#pdf_export').val(0);
                                                e.preventDefault();
                                            } else {
                                                // Tiếp tục kiểm tra thông tin sản phẩm và submit form nếu hợp lệ
                                                var allFieldsFilled =
                                                    true;

                                                $('.addProduct')
                                                    .each(
                                                        function() {
                                                            var productName =
                                                                $(
                                                                    this
                                                                )
                                                                .find(
                                                                    '.product_name'
                                                                )
                                                                .val();
                                                            var productUnit =
                                                                $(
                                                                    this
                                                                )
                                                                .find(
                                                                    '.product_unit'
                                                                )
                                                                .val();
                                                            var productQty =
                                                                $(
                                                                    this
                                                                )
                                                                .find(
                                                                    '.quantity-input'
                                                                )
                                                                .val();

                                                            if (productName ===
                                                                '' ||
                                                                productUnit ===
                                                                '' ||
                                                                productQty ===
                                                                ''
                                                            ) {
                                                                allFieldsFilled
                                                                    =
                                                                    false;
                                                                return false;
                                                            }
                                                        });

                                                if (
                                                    allFieldsFilled
                                                ) {
                                                    $('.check-add-sn:checked[disabled]')
                                                        .prop(
                                                            'disabled',
                                                            false
                                                        );
                                                    // document
                                                    //     .getElementById(
                                                    //         'deliveryForm'
                                                    //     )
                                                    //     .submit();
                                                } else {
                                                    showAutoToast
                                                        (
                                                            'warning',
                                                            'Vui lòng điền đủ thông tin sản phẩm'
                                                        );
                                                    e.preventDefault();
                                                }
                                            }
                                        }
                                    });
                            } else {
                                console.error(
                                    'Invalid or empty data structure.');
                            }
                        }.bind(this),
                        error: function(xhr, status, error) {
                            console.error('Error fetching product data:',
                                error);
                        }
                    });
                });
            });

            //Xem thông tin sản phẩm
            $('.info-product').click(function() {
                var productName = $(this).closest('tr').find('.product_name').val();
                var dvt = $(this).closest('tr').find('.product_unit').val();
                var thue = $(this).closest('tr').find('.product_tax').val();
                var tonKho = $(this).closest('tr').find('.tonkho').val();
                $('#productModal').find('.modal-body').html('<b>Tên sản phẩm: </b> ' +
                    productName + '<br>' +
                    '<b>Đơn vị: </b>' + dvt + '<br>' + '<b>Tồn kho: </b>' + formatNumber(
                        tonKho) +
                    '<br>' + '<b>Thuế: </b>' +
                    (thue == 99 || thue == null ? "NOVAT" : thue + '%'));
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
        });
    });
    //hiện, tìm kiếm, ẩn danh sách số báo giá khi click trường tìm kiếm
    $("#myUL").hide();
    $(document).ready(function() {
        function toggleListGuest(input, list, filterInput) {
            input.on("click", function() {
                list.show();
            });

            $(document).click(function(event) {
                if (!$(event.target).closest(input).length && !$(event.target).closest(filterInput)
                    .length) {
                    list.hide();
                }
            });

            var applyFilter = function() {
                var value = filterInput.val().toUpperCase();
                list.find("li").each(function() {
                    var text = $(this).find("a").text().toUpperCase();
                    $(this).toggle(text.indexOf(value) > -1);
                });
            };

            input.on("keyup", applyFilter);
            filterInput.on("keyup", applyFilter);
        }

        toggleListGuest($("#myInput"), $("#myUL"), $("#companyFilter"));
    });

    var selectedSerialNumbers = [];
    //Lấy thông tin từ số báo giá
    $(document).ready(function() {
        $('#show-info-guest').hide();
        $('#show-title-guest').hide();
        $('.search-info').click(function(event, idQuote) {
            if (idQuote) {
                idQuote = idQuote
            } else {
                idQuote = parseInt($(this).attr('id'), 10);
            }
            $.ajax({
                url: '{{ route('getInfoQuote') }}',
                type: 'GET',
                data: {
                    idQuote: idQuote
                },
                success: function(data) {
                    if (data.discount_type == 2) {
                        $('.percent_discount').removeClass('d-none');
                    } else {
                        $('.percent_discount').addClass('d-none');
                    }
                    $("#discount_type").val(data.discount_type);
                    $("#voucher").val(
                        formatCurrency(data.discount));
                    $("#total-amount-sum").text(
                        formatCurrency(data.total_price));
                    $("#grand-total").text(formatCurrency(
                        data.amount_owed));
                    $("#product-tax").text(formatCurrency(data.total_tax));
                    $('.idRepresent').val(data.represent_id)
                    $('.numberQute').val(data.quotation_number)
                    $('.nameGuest').val(data.guest_name)
                    $('.represent_name').val(data.represent_name)
                    $('input[name="code_delivery"]').val('GH-' + (data.lastDeliveryId + 1));
                    $('#show-info-guest').show();
                    $('#show-title-guest').show();
                    $.ajax({
                        url: '{{ route('getProductQuote') }}',
                        type: 'GET',
                        data: {
                            idQuote: idQuote
                        },
                        success: function(data) {
                            console.log(data);
                            $(".addProduct").remove();
                            $.each(data, function(index, item) {
                                var tax = (((item.promotion_type == 1 ? item.product_total - item.promotion : item.product_total - (item.product_total * (item.promotion / 100))) * (item.thueSP == 99 ? 0 : item.thueSP))) / 100;
                                $(".idGuest").val(item.guest_id);
                                $("#detailexport_id").val(item.maXuat);
                                $("#voucher").val(formatCurrency(item
                                    .discount == null ? 0 : item
                                    .discount));
                                $("#transport_fee").val(formatCurrency(
                                    item.transfer_fee == null ?
                                    0 : item.transfer_fee));
                                var newRow = `
                                <tr id="dynamic-row-${item.maSP}" class="bg-white addProduct">
                                    <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                        <div class="d-flex w-100 justify-content-between align-items-center">
                                            <span class='mx-2'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='10' height='13' viewBox='0 0 10 13' fill='none'>
                                                    <g clip-path='url(#clip0_1710_10941)'>
                                                    <path fill-rule='evenodd' clip-rule='evenodd' d='M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z' fill='#282A30'/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id='clip0_1710_10941'>
                                                        <rect width='6' height='10' fill='white'/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </span>
                                            <input type="checkbox" class="cb-element">
                                            <input type="text" value="${item.maCode == null ? '' : item.maCode}" readonly autocomplete="off" class="border-0 px-2 py-1 w-75 product_code height-32" name="product_code[]">
                                        </div>
                                    </td>
                                    <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                        <div class="d-flex align-items-center">
                                            <input type="text" value="${item.tenSP}" readonly class="border-0 px-2 py-1 w-100 product_name height-32" autocomplete="off" required="" name="product_name[]">
                                            <input type="hidden" class="product_id" value="${item.maSP}" autocomplete="off" name="product_id[]">
                                            <div class="info-product" data-toggle="modal" data-target="#productModal">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1704_35239)">
                                                <path d="M7.99996 1.69596C6.32803 1.69596 4.72458 2.36012 3.54235 3.54235C2.36012 4.72458 1.69596 6.32803 1.69596 7.99996C1.69596 9.67188 2.36012 11.2753 3.54235 12.4576C4.72458 13.6398 6.32803 14.304 7.99996 14.304C9.67188 14.304 11.2753 13.6398 12.4576 12.4576C13.6398 11.2753 14.304 9.67188 14.304 7.99996C14.304 6.32803 13.6398 4.72458 12.4576 3.54235C11.2753 2.36012 9.67188 1.69596 7.99996 1.69596ZM0.303955 7.99996C0.303955 5.95885 1.11478 4.00134 2.55806 2.55806C4.00134 1.11478 5.95885 0.303955 7.99996 0.303955C10.0411 0.303955 11.9986 1.11478 13.4418 2.55806C14.8851 4.00134 15.696 5.95885 15.696 7.99996C15.696 10.0411 14.8851 11.9986 13.4418 13.4418C11.9986 14.8851 10.0411 15.696 7.99996 15.696C5.95885 15.696 4.00134 14.8851 2.55806 13.4418C1.11478 11.9986 0.303955 10.0411 0.303955 7.99996Z" fill="#282A30"></path><path d="M8.08001 4.96596C7.91994 4.95499 7.75932 4.97706 7.60814 5.0308C7.45696 5.08454 7.31845 5.1688 7.20121 5.27834C7.08398 5.38788 6.99053 5.52037 6.92667 5.66756C6.86281 5.81475 6.82991 5.97351 6.83001 6.13396C6.83001 6.31868 6.75663 6.49584 6.62601 6.62646C6.49539 6.75708 6.31824 6.83046 6.13351 6.83046C5.94879 6.83046 5.77163 6.75708 5.64101 6.62646C5.51039 6.49584 5.43701 6.31868 5.43701 6.13396C5.43691 5.66404 5.56601 5.20314 5.81019 4.80164C6.05436 4.40014 6.40422 4.0735 6.82152 3.85743C7.23881 3.64136 7.70748 3.54417 8.17629 3.57649C8.64509 3.60881 9.09599 3.76939 9.47968 4.04069C9.86338 4.31198 10.1651 4.68354 10.3519 5.11475C10.5386 5.54595 10.6033 6.02021 10.5387 6.48567C10.4741 6.95113 10.2828 7.38987 9.98568 7.75394C9.68857 8.11801 9.29708 8.39338 8.85401 8.54996C8.8079 8.56649 8.76805 8.59691 8.73993 8.63702C8.71182 8.67713 8.69682 8.72497 8.69701 8.77396V9.39996C8.69701 9.58468 8.62363 9.76184 8.49301 9.89246C8.36239 10.0231 8.18524 10.0965 8.00051 10.0965C7.81579 10.0965 7.63863 10.0231 7.50801 9.89246C7.37739 9.76184 7.30401 9.58468 7.30401 9.39996V8.77396C7.30392 8.43693 7.4083 8.10815 7.60279 7.83289C7.79727 7.55764 8.0723 7.34944 8.39001 7.23696C8.64354 7.14711 8.85837 6.97265 8.99832 6.74296C9.13828 6.51326 9.19482 6.24235 9.15843 5.97585C9.12203 5.70935 8.99492 5.46352 8.7985 5.27977C8.60208 5.09601 8.34835 4.98454 8.08001 4.96596Z" fill="#282A30"></path><path d="M8.05005 11.571C8.00257 11.571 7.95705 11.5898 7.92348 11.6234C7.88991 11.657 7.87105 11.7025 7.87105 11.75C7.87105 11.7974 7.88991 11.843 7.92348 11.8765C7.95705 11.9101 8.00257 11.929 8.05005 11.929C8.09752 11.929 8.14305 11.9101 8.17662 11.8765C8.21019 11.843 8.22905 11.7974 8.22905 11.75C8.22905 11.7025 8.21019 11.657 8.17662 11.6234C8.14305 11.5898 8.09752 11.571 8.05005 11.571ZM8.05005 12.5C8.14854 12.5 8.24607 12.4806 8.33706 12.4429C8.42805 12.4052 8.51073 12.3499 8.58038 12.2803C8.65002 12.2106 8.70527 12.128 8.74296 12.037C8.78065 11.946 8.80005 11.8484 8.80005 11.75C8.80005 11.6515 8.78065 11.5539 8.74296 11.4629C8.70527 11.3719 8.65002 11.2893 8.58038 11.2196C8.51073 11.15 8.42805 11.0947 8.33706 11.057C8.24607 11.0194 8.14854 11 8.05005 11C7.85114 11 7.66037 11.079 7.51972 11.2196C7.37907 11.3603 7.30005 11.551 7.30005 11.75C7.30005 11.9489 7.37907 12.1396 7.51972 12.2803C7.66037 12.4209 7.85114 12.5 8.05005 12.5Z" fill="#282A30"></path></g><defs><clipPath id="clip0_1704_35239"><rect width="16" height="16" fill="white"></rect></clipPath></defs>
                                            </svg>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                        <input type="text" value="${item.product_unit}" readonly autocomplete="off" class="height-32 border-0 px-2 py-1 w-100 product_unit" required="" name="product_unit[]">
                                    </td>
                                    <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                        <div class="d-flex align-items-center">
                                            <div>
                                        <input type="number" value="${formatNumber(item.soLuongCanGiao)}" data-product-id="${item.maSP}" class="height-32 border-0 px-2 text-right py-1 w-100 quantity-input" autocomplete="off" required="" name="product_qty[]">
                                        <input type="hidden" class="limit-quantity" value="${formatNumber(item.soLuongCanGiao)}" data-limit-quantity="${formatNumber(item.soLuongCanGiao)}">
                                        <input type="hidden" class="tonkho">
                                        <p class="mt-3 text-13-blue inventory text-right mb-0 ${item.type == 2 ? "d-none" : 'd-block'}">Tồn kho: <span class="soTonKho">${formatNumber(item.product_inventory == null ? 0 : item.product_inventory)}</span></p>
                                        </div>  
                                        </div>
                                    </td>
                                    <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                        <a class="open-modal-btn text-center" href="#" data-target="#exampleModal0" data-toggle="modal">
                                            <div class="sn--modal pt-2">
                                                <span class="border-span--modal">SN</span>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="text-center d-none border-top-0">
                                        <input class="check-add-sn" data-seri="${item.maSP}" type="checkbox" name="cbSeri[]" value="1" ${(item.check_seri == 1) ? 'checked' : ''}>    
                                    </td>
                                    <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                        <input type="text" value="${formatCurrency(item.price_export)}" readonly 
                                            class="border-0 px-2 py-1 w-100 text-right product_price height-32" autocomplete="off" name="product_price[]" required="" readonly="readonly">
                                            <a href='#'><p class="mt-3 text-13-blue recentModal mb-0" data-toggle='modal' data-target='#recentModal'>Giao dịch gần đây</p></a>
                                    </td>
                                    <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                        <select class="border-0 py-1 w-100 text-center product_tax height-32" required="" disabled>
                                            <option value="0" ${(item.thueSP == 0) ? 'selected' : ''}>0%</option>
                                            <option value="8" ${(item.thueSP == 8) ? 'selected' : ''}>8%</option>
                                            <option value="10" ${(item.thueSP == 10) ? 'selected' : ''}>10%</option>
                                            <option value="99" ${(item.thueSP == 99) ? 'selected' : ''}>NOVAT</option>
                                        </select>
                                        <input type="hidden" class="product_tax" value="${(item.thueSP)}" name="product_tax[]">
                                    </td>
                                    <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                <div class="d-flex align-item-center">
                                    <input value="${formatCurrency(item.promotion)}" readonly type="text" name="promotion[]" class="text-right border-0 px-2 py-1 w-100 height-32 promotion" autocomplete="off">
                                    <span class="mt-2 percent d-none">%</span>
                                </div>
                                <div class="text-right">
                                    <select class="border-0 mt-3 text-13-blue text-center" disabled>
                                        <option value='1' ${(item.promotion_type == 1) ? 'selected' : ''}>Nhập tiền</option>
                                        <option value='2' ${(item.promotion_type == 2) ? 'selected' : ''}>
                                            Nhập %
                                        </option>
                                    </select>
                                    <input type="hidden" name='promotion_type[]' value="${item.promotion_type}">
                                </div>
                            </td>
                                    <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                        <input type="text" value="${formatCurrency(Math.round(item.promotion_type == 1 ? item.product_total - item.promotion : item.product_total - (item.product_total * (item.promotion / 100))))}" readonly 
                                            class="border-0 px-2 text-right py-1 w-100 total-amount height-32">
                                    </td>
                                    <td class="border-top border-secondary p-0 bg-secondary Daydu d-none border-top-0" style="width:1%;"></td>
                                    <td class="border border-bottom-0 position-relative product_ratio d-none border-top-0">
                                        <input type="text" value="${item.product_ratio}" readonly class="border-0 px-2 py-1 w-100 heSoNhan" autocomplete="off" required="required" name="product_ratio[]">
                                    </td>
                                    <td class="border border-bottom-0 position-relative price_import d-none border-top-0">
                                        <input type="text" value="${formatCurrency(item.price_import)}" readonly class="border-0 px-2 py-1 w-100 giaNhap" autocomplete="off" required="required" name="price_import[]">
                                    </td>
                                    <td class="border-right p-2 text-13 align-top note p-1 border-bottom border-top-0">
                                        <input type="text" readonly value="${(item.product_note == null) ? '' : item.product_note}" class="border-0 py-1 w-100 height-32" name="product_note[]">
                                    </td>
                                    <td class="border-bottom text-right deleteProduct border-top-0" data-name1='GH' data-des='Xóa sản phẩm'>
                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M13.1417 6.90625C13.4351 6.90625 13.673 7.1441 13.673 7.4375C13.673 7.47847 13.6682 7.5193 13.6589 7.55918L12.073 14.2992C11.8471 15.2591 10.9906 15.9375 10.0045 15.9375H6.99553C6.00943 15.9375 5.15288 15.2591 4.92702 14.2992L3.34113 7.55918C3.27393 7.27358 3.45098 6.98757 3.73658 6.92037C3.77645 6.91099 3.81729 6.90625 3.85826 6.90625H13.1417ZM9.03125 1.0625C10.4983 1.0625 11.6875 2.25175 11.6875 3.71875H13.8125C14.3993 3.71875 14.875 4.19445 14.875 4.78125V5.3125C14.875 5.6059 14.6371 5.84375 14.3438 5.84375H2.65625C2.36285 5.84375 2.125 5.6059 2.125 5.3125V4.78125C2.125 4.19445 2.6007 3.71875 3.1875 3.71875H5.3125C5.3125 2.25175 6.50175 1.0625 7.96875 1.0625H9.03125ZM9.03125 2.65625H7.96875C7.38195 2.65625 6.90625 3.13195 6.90625 3.71875H10.0938C10.0938 3.13195 9.61805 2.65625 9.03125 2.65625Z" fill="#6B6F76"></path></svg>
                                    </td>
                                    <td style="display:none;"><input type="text" class="product_tax1" value="${tax}"></td>
                                    <td style='display:none;'><ul class ='seri_pro'></ul></td>
                                    <td style="display:none;"><input type="text" class="type" value="${item.type}"></td>
                                </tr>`;
                                $("#dynamic-fields").before(newRow);
                                //giới hạn số lượng
                                $("tr").on("input", ".quantity-input",
                                    function() {
                                        // Lấy giá trị nhập vào
                                        var value = parseInt($(this)
                                            .val());
                                        // Lấy giá trị giới hạn từ thuộc tính 'data-limit-quantity'
                                        var limit = parseInt($(
                                            ".limit-quantity"
                                        ).data(
                                            "limit-quantity"
                                        ));
                                        // Kiểm tra nếu giá trị nhập vào lớn hơn giới hạn
                                        if (value > limit) {
                                            // Đặt giá trị của input thành giới hạn
                                            $(this).val(limit);
                                        }
                                    });
                                //Xem giao dịch gần đây
                                $('.recentModal').click(function() {
                                    var idProduct = $(this)
                                        .closest('tr').find(
                                            '.product_id')
                                        .val();
                                    $.ajax({
                                        url: '{{ route('getRecentTransaction') }}',
                                        type: 'GET',
                                        data: {
                                            idProduct: idProduct
                                        },
                                        success: function(
                                            data) {
                                            if (Array
                                                .isArray(
                                                    data
                                                ) &&
                                                data
                                                .length >
                                                0) {
                                                $('#recentModal .modal-body tbody')
                                                    .empty();
                                                data.forEach(
                                                    function(
                                                        productData
                                                    ) {
                                                        var newRow =
                                                            $(
                                                                '<tr class="position-relative">' +
                                                                '<td class="text-13-black" id="productName"></td>' +
                                                                '<td class="text-13-black" id="guestName"></td>' +
                                                                '<td class="text-13-black" id="productPrice"></td>' +
                                                                '<td class="text-13-black" id="productTax"></td>' +
                                                                '<td class="text-13-black" id="dateProduct"></td>' +
                                                                '</tr>'
                                                            );
                                                        newRow
                                                            .find(
                                                                '#productName'
                                                            )
                                                            .text(
                                                                productData
                                                                .product_name
                                                            );
                                                        newRow
                                                            .find(
                                                                '#guestName'
                                                            )
                                                            .text(
                                                                productData
                                                                .guest_name
                                                            );
                                                        newRow
                                                            .find(
                                                                '#productPrice'
                                                            )
                                                            .text(
                                                                formatCurrency(
                                                                    productData
                                                                    .price_export
                                                                )
                                                            );
                                                        newRow
                                                            .find(
                                                                '#productTax'
                                                            )
                                                            .text(
                                                                productData
                                                                .product_tax ==
                                                                99 ?
                                                                'NOVAT' :
                                                                productData
                                                                .product_tax +
                                                                '%'
                                                            );
                                                        var formattedDate =
                                                            new Date(
                                                                productData
                                                                .created_at
                                                            )
                                                            .toLocaleDateString(
                                                                'vi-VN'
                                                            );
                                                        newRow
                                                            .find(
                                                                '#dateProduct'
                                                            )
                                                            .text(
                                                                formattedDate
                                                            );
                                                        newRow
                                                            .appendTo(
                                                                '#recentModal .modal-body tbody'
                                                            );
                                                    }
                                                );
                                            } else {
                                                $('#recentModal .modal-body tbody')
                                                    .empty();
                                            }
                                        }
                                    });
                                });
                                //Check S/N
                                var rowId = $(this.currentTarget)
                                    .closest('tr').attr('id');
                                var seriList = item.seri_pro.filter(
                                    item => item !== null).join(
                                    '</li><li>');
                                var seriProElement = $(
                                    `#dynamic-row-${item.maSP} .seri_pro`
                                );
                                var rowElement = $(
                                    `#dynamic-row-${item.maSP}`);

                                if (seriList.length > 0) {
                                    rowElement.find(`.check-add-sn`)
                                        .prop('disabled', true);
                                    seriProElement.hide();
                                } else {
                                    seriProElement.html(
                                        `<li>${seriList}</li>`);
                                    seriProElement.show();
                                    rowElement.find(`.open-modal-btn`)
                                        .hide();
                                }
                                //Kiểm tra đã thêm seri chưa
                                $('#luuNhap').off('click').on('click',
                                    function(e) {
                                        var
                                            insufficientSeriProducts = [];
                                        var
                                            invalidInventoryProducts = [];
                                        var invalidInventorySN = [];
                                        var sanPhamHetSN = [];
                                        $(".bg-white.addProduct")
                                            .each(
                                                function() {
                                                    var soTonKho =
                                                        parseFloat(
                                                            $(
                                                                this
                                                            )
                                                            .find(
                                                                ".soTonKho"
                                                            ).text()
                                                        );
                                                    var checkbox =
                                                        $(
                                                            this)
                                                        .find(
                                                            ".check-add-sn"
                                                        );

                                                    var quantity =
                                                        parseFloat(
                                                            $(this)
                                                            .find(
                                                                ".quantity-input"
                                                            )
                                                            .val());
                                                    var type =
                                                        parseFloat(
                                                            $(this)
                                                            .find(
                                                                ".type"
                                                            )
                                                            .val());
                                                    var productNameInventory =
                                                        $(this)
                                                        .find(
                                                            ".product_name"
                                                        ).val();
                                                    // Kiểm tra số lượng tồn kho
                                                    if (type !=
                                                        2) {
                                                        if (quantity >
                                                            soTonKho
                                                        ) {
                                                            invalidInventoryProducts
                                                                .push(
                                                                    productNameInventory
                                                                );
                                                        }
                                                    }

                                                    if (checkbox
                                                        .prop(
                                                            "checked"
                                                        ) &&
                                                        checkbox
                                                        .prop(
                                                            "disabled"
                                                        )
                                                    ) {
                                                        var quantityValue =
                                                            parseFloat(
                                                                $(
                                                                    this
                                                                )
                                                                .find(
                                                                    ".quantity-input"
                                                                )
                                                                .val()
                                                            );
                                                        var productId =
                                                            $(this)
                                                            .find(
                                                                ".product_id"
                                                            ).val();
                                                        var productName =
                                                            $(this)
                                                            .find(
                                                                ".product_name"
                                                            ).val();

                                                        for (var i =
                                                                0; i <
                                                            quantityValue; i++
                                                        ) {
                                                            var isSeriInputExist =
                                                                $(
                                                                    `input[name="selected_serial_numbers[]"][data-product-id="${productId}"]:eq(${i})`
                                                                )
                                                                .length >
                                                                0;

                                                            if (!
                                                                isSeriInputExist
                                                            ) {
                                                                insufficientSeriProducts
                                                                    .push(
                                                                        productName
                                                                    );
                                                                break;
                                                            }
                                                        }
                                                    }
                                                    //
                                                    if (checkbox
                                                        .prop(
                                                            "checked"
                                                        ) &&
                                                        !checkbox
                                                        .prop(
                                                            "disabled"
                                                        )
                                                    ) {
                                                        if (type !=
                                                            2) {
                                                            invalidInventorySN
                                                                .push(
                                                                    productNameInventory
                                                                );
                                                            sanPhamHetSN
                                                                .push(
                                                                    productNameInventory
                                                                );
                                                        }
                                                    }
                                                });

                                        // Hiển thị thông báo nếu có sản phẩm không đủ "seri"
                                        if (insufficientSeriProducts
                                            .length > 0) {
                                            showAutoToast('warning',
                                                `Serial Number chưa được chọn ở các sản phẩm: ${insufficientSeriProducts.join(", ")}`
                                            );
                                            $('#pdf_export').val(0);
                                            e.preventDefault();
                                        } else {
                                            // Hiển thị thông báo nếu không đủ số lượng tồn kho
                                            if (invalidInventoryProducts
                                                .length > 0) {
                                                showAutoToast(
                                                    'warning',
                                                    "Không đủ số lượng tồn kho cho các sản phẩm:\n" +
                                                    invalidInventoryProducts
                                                    .join(
                                                        ', '
                                                    ));
                                                $('#pdf_export')
                                                    .val(0);
                                                e.preventDefault();
                                            } else {
                                                if (invalidInventorySN
                                                    .length > 0) {
                                                    showAutoToast(
                                                        'warning',
                                                        `Số lượng "seri" đã hết cho các sản phẩm: ${sanPhamHetSN.join(", ")}`
                                                    );
                                                    $('#pdf_export')
                                                        .val(0);
                                                    e
                                                        .preventDefault();
                                                } else {
                                                    // Tiếp tục kiểm tra thông tin sản phẩm và submit form nếu hợp lệ
                                                    var allFieldsFilled =
                                                        true;

                                                    $('.addProduct')
                                                        .each(
                                                            function() {
                                                                var productName =
                                                                    $(
                                                                        this
                                                                    )
                                                                    .find(
                                                                        '.product_name'
                                                                    )
                                                                    .val();
                                                                var productUnit =
                                                                    $(
                                                                        this
                                                                    )
                                                                    .find(
                                                                        '.product_unit'
                                                                    )
                                                                    .val();
                                                                var productQty =
                                                                    $(
                                                                        this
                                                                    )
                                                                    .find(
                                                                        '.quantity-input'
                                                                    )
                                                                    .val();

                                                                if (productName ===
                                                                    '' ||
                                                                    productUnit ===
                                                                    '' ||
                                                                    productQty ===
                                                                    ''
                                                                ) {
                                                                    allFieldsFilled
                                                                        =
                                                                        false;
                                                                    return false;
                                                                }
                                                            });

                                                    if (
                                                        allFieldsFilled
                                                    ) {
                                                        $('.check-add-sn:checked[disabled]')
                                                            .prop(
                                                                'disabled',
                                                                false
                                                            );
                                                        // document
                                                        //     .getElementById(
                                                        //         'deliveryForm'
                                                        //     )
                                                        //     .submit();
                                                    } else {
                                                        showAutoToast
                                                            (
                                                                'warning',
                                                                'Vui lòng điền đủ thông tin sản phẩm'
                                                            );
                                                        e
                                                            .preventDefault();
                                                    }
                                                }

                                            }
                                        }
                                    });
                                $('#giaoHang').off('click').on('click',
                                    function(e) {
                                        var
                                            insufficientSeriProducts = [];
                                        var
                                            invalidInventoryProducts = [];
                                        var invalidInventorySN = [];
                                        var sanPhamHetSN = [];
                                        $(".bg-white.addProduct")
                                            .each(
                                                function() {
                                                    var soTonKho =
                                                        parseFloat(
                                                            $(
                                                                this
                                                            )
                                                            .find(
                                                                ".soTonKho"
                                                            ).text()
                                                        );
                                                    var checkbox =
                                                        $(
                                                            this)
                                                        .find(
                                                            ".check-add-sn"
                                                        );

                                                    var quantity =
                                                        parseFloat(
                                                            $(this)
                                                            .find(
                                                                ".quantity-input"
                                                            )
                                                            .val());
                                                    var type =
                                                        parseFloat(
                                                            $(this)
                                                            .find(
                                                                ".type"
                                                            )
                                                            .val());
                                                    var productNameInventory =
                                                        $(this)
                                                        .find(
                                                            ".product_name"
                                                        ).val();
                                                    // Kiểm tra số lượng tồn kho
                                                    if (type !=
                                                        2) {
                                                        if (quantity >
                                                            soTonKho
                                                        ) {
                                                            invalidInventoryProducts
                                                                .push(
                                                                    productNameInventory
                                                                );
                                                        }
                                                    }

                                                    if (checkbox
                                                        .prop(
                                                            "checked"
                                                        ) &&
                                                        checkbox
                                                        .prop(
                                                            "disabled"
                                                        )
                                                    ) {
                                                        var quantityValue =
                                                            parseFloat(
                                                                $(
                                                                    this
                                                                )
                                                                .find(
                                                                    ".quantity-input"
                                                                )
                                                                .val()
                                                            );
                                                        var productId =
                                                            $(this)
                                                            .find(
                                                                ".product_id"
                                                            ).val();
                                                        var productName =
                                                            $(this)
                                                            .find(
                                                                ".product_name"
                                                            ).val();

                                                        for (var i =
                                                                0; i <
                                                            quantityValue; i++
                                                        ) {
                                                            var isSeriInputExist =
                                                                $(
                                                                    `input[name="selected_serial_numbers[]"][data-product-id="${productId}"]:eq(${i})`
                                                                )
                                                                .length >
                                                                0;

                                                            if (!
                                                                isSeriInputExist
                                                            ) {
                                                                insufficientSeriProducts
                                                                    .push(
                                                                        productName
                                                                    );
                                                                break;
                                                            }
                                                        }
                                                    }
                                                    //
                                                    if (checkbox
                                                        .prop(
                                                            "checked"
                                                        ) &&
                                                        !checkbox
                                                        .prop(
                                                            "disabled"
                                                        )
                                                    ) {
                                                        if (type !=
                                                            2) {
                                                            invalidInventorySN
                                                                .push(
                                                                    productNameInventory
                                                                );
                                                            sanPhamHetSN
                                                                .push(
                                                                    productNameInventory
                                                                );
                                                        }
                                                    }
                                                });

                                        // Hiển thị thông báo nếu có sản phẩm không đủ "seri"
                                        if (insufficientSeriProducts
                                            .length > 0) {
                                            showAutoToast('warning',
                                                `Serial Number chưa được chọn ở các sản phẩm: ${insufficientSeriProducts.join(", ")}`
                                            );
                                            $('#pdf_export').val(0);
                                            e.preventDefault();
                                        } else {
                                            // Hiển thị thông báo nếu không đủ số lượng tồn kho
                                            if (invalidInventoryProducts
                                                .length > 0) {
                                                showAutoToast(
                                                    'warning',
                                                    "Không đủ số lượng tồn kho cho các sản phẩm:\n" +
                                                    invalidInventoryProducts
                                                    .join(
                                                        ', '
                                                    ));
                                                $('#pdf_export')
                                                    .val(0);
                                                e.preventDefault();
                                            } else {
                                                if (invalidInventorySN
                                                    .length > 0) {
                                                    showAutoToast(
                                                        'warning',
                                                        `Số lượng "seri" đã hết cho các sản phẩm: ${sanPhamHetSN.join(", ")}`
                                                    );
                                                    $('#pdf_export')
                                                        .val(0);
                                                    e
                                                        .preventDefault();
                                                } else {
                                                    // Tiếp tục kiểm tra thông tin sản phẩm và submit form nếu hợp lệ
                                                    var allFieldsFilled =
                                                        true;

                                                    $('.addProduct')
                                                        .each(
                                                            function() {
                                                                var productName =
                                                                    $(
                                                                        this
                                                                    )
                                                                    .find(
                                                                        '.product_name'
                                                                    )
                                                                    .val();
                                                                var productUnit =
                                                                    $(
                                                                        this
                                                                    )
                                                                    .find(
                                                                        '.product_unit'
                                                                    )
                                                                    .val();
                                                                var productQty =
                                                                    $(
                                                                        this
                                                                    )
                                                                    .find(
                                                                        '.quantity-input'
                                                                    )
                                                                    .val();

                                                                if (productName ===
                                                                    '' ||
                                                                    productUnit ===
                                                                    '' ||
                                                                    productQty ===
                                                                    ''
                                                                ) {
                                                                    allFieldsFilled
                                                                        =
                                                                        false;
                                                                    return false;
                                                                }
                                                            });

                                                    if (
                                                        allFieldsFilled
                                                    ) {
                                                        $('.check-add-sn:checked[disabled]')
                                                            .prop(
                                                                'disabled',
                                                                false
                                                            );
                                                        // document
                                                        //     .getElementById(
                                                        //         'deliveryForm'
                                                        //     )
                                                        //     .submit();
                                                    } else {
                                                        showAutoToast
                                                            (
                                                                'warning',
                                                                'Vui lòng điền đủ thông tin sản phẩm'
                                                            );
                                                        e
                                                            .preventDefault();
                                                    }
                                                }

                                            }
                                        }
                                    });

                                //Kiểm tra seri có được nhập
                                $('.save-seri-btn').off('click').on(
                                    'click',
                                    function() {
                                        var maSP = $(this).data(
                                            'masp');
                                        var inputs = $(
                                            'input[name="seri[' +
                                            maSP + '][]"]');
                                        var quantityInput = $(
                                            'input.quantity-input[data-product-id="' +
                                            maSP + '"]');
                                        var requiredCount =
                                            parseInt(quantityInput
                                                .val());
                                        var isValid = true;
                                        if (inputs.length > 0) {
                                            if (inputs.length !==
                                                requiredCount) {
                                                isValid = false;
                                            } else {
                                                inputs.each(
                                                    function() {
                                                        if ($(
                                                                this
                                                            )
                                                            .val()
                                                            .trim() ===
                                                            ''
                                                        ) {
                                                            isValid
                                                                =
                                                                false;
                                                            return false;
                                                        }
                                                    });
                                            }

                                            if (!isValid) {
                                                showAutoToast(
                                                    'warning',
                                                    'Serinumber đang được bỏ trống hoặc chưa được nhập đủ số lượng!'
                                                );
                                                $('#pdf_export')
                                                    .val(0);
                                                $(this).attr(
                                                    'data-dismiss',
                                                    '');
                                            } else {
                                                $(this).attr(
                                                    'data-dismiss',
                                                    'modal');
                                            }
                                        } else {
                                            showAutoToast('warning',
                                                'Vui lòng thêm serinumber!'
                                            );
                                        }
                                    });
                                //Xóa sản phẩm
                                $('.deleteProduct').off('click').on(
                                    'click',
                                    function() {
                                        var deletedRow = $(this)
                                            .closest("tr");
                                        var productId = deletedRow
                                            .find(".product_id")
                                            .val();
                                        $("input[name='selected_serial_numbers[]'][data-product-id='" +
                                                productId + "']")
                                            .remove();

                                        var deletedProductAmount =
                                            parseFloat(deletedRow
                                                .find(
                                                    '.total-amount')
                                                .val().replace(/,/g,
                                                    ''));
                                        var deletedProductTax =
                                            parseFloat(deletedRow
                                                .find(
                                                    '.product_tax1')
                                                .val().replace(/,/g,
                                                    ''));
                                        deletedRow.remove();
                                        fieldCounter--;
                                        var name = $(this).data(
                                            'name1'
                                        ); // Lấy giá trị của thuộc tính data-name1
                                        var des = $(this).data(
                                            'des'
                                        ); // Lấy giá trị của thuộc tính data-des
                                        $.ajax({
                                            url: '{{ route('addActivity') }}',
                                            type: 'GET',
                                            data: {
                                                name: name,
                                                des: des,
                                            },
                                            success: function(
                                                data) {}
                                        });
                                        // Subtract the deleted product values from totalAmount and totalTax
                                        var totalAmount =
                                            parseFloat($(
                                                    '#total-amount-sum'
                                                ).text()
                                                .replace(/,/g, '')
                                            ) -
                                            deletedProductAmount;
                                        var totalTax = parseFloat($(
                                                    '#product-tax')
                                                .text().replace(
                                                    /,/g, '')) -
                                            deletedProductTax;

                                        // Call calculateGrandTotal with updated values
                                        calculateGrandTotal(
                                            totalAmount,
                                            totalTax);

                                        // Update the displayed totalTax value
                                        $('#product-tax').text(
                                            formatCurrency(Math
                                                .round(totalTax)
                                            ));

                                        // Update the displayed total-amount-sum value
                                        $('#total-amount-sum').text(
                                            formatCurrency(Math
                                                .round(
                                                    totalAmount)
                                            ));
                                    });

                                // Checkbox
                                $('#checkall').change(function() {
                                    $('.cb-element').prop(
                                        'checked', this
                                        .checked);
                                    updateMultipleActionVisibility
                                        ();
                                });
                                $('.cb-element').change(function() {
                                    updateMultipleActionVisibility
                                        ();
                                    if ($('.cb-element:checked')
                                        .length === $(
                                            '.cb-element')
                                        .length) {
                                        $('#checkall').prop(
                                            'checked', true);
                                    } else {
                                        $('#checkall').prop(
                                            'checked', false
                                        );
                                    }
                                });
                                $(document).on('click',
                                    '.cancal_action',
                                    function(e) {
                                        e.preventDefault();
                                        $('.cb-element:checked')
                                            .prop('checked', false);
                                        $('#checkall').prop(
                                            'checked', false);
                                        updateMultipleActionVisibility
                                            ()
                                    })

                                function updateMultipleActionVisibility() {
                                    if ($('.cb-element:checked')
                                        .length > 0) {
                                        $('.multiple_action').show();
                                        $('.count_checkbox').text(
                                            'Đã chọn ' + $(
                                                '.cb-element:checked'
                                            ).length);
                                    } else {
                                        $('.multiple_action').hide();
                                    }
                                }
                                //Xem thông tin sản phẩm
                                $('.info-product').click(function() {
                                    var idProduct =
                                        $(this)
                                        .closest('tr').find(
                                            '.product_id')
                                        .val();
                                    $.ajax({
                                        url: '{{ route('getProductFromQuote') }}',
                                        type: 'GET',
                                        data: {
                                            idProduct: idProduct
                                        },
                                        success: function(
                                            data
                                        ) {
                                            if (Array
                                                .isArray(
                                                    data
                                                ) &&
                                                data
                                                .length >
                                                0) {
                                                var productData =
                                                    data[
                                                        0
                                                    ];
                                                $('#productModal')
                                                    .find(
                                                        '.modal-body'
                                                    )
                                                    .html(
                                                        '<b>Tên sản phẩm: </b> ' +
                                                        productData
                                                        .product_name +
                                                        '<br>' +
                                                        '<b>Đơn vị: </b>' +
                                                        productData
                                                        .product_unit +
                                                        '<br>' +
                                                        '<b>Tồn kho: </b>' +
                                                        (formatNumber(
                                                            productData
                                                            .product_inventory ==
                                                            null ?
                                                            0 :
                                                            productData
                                                            .product_inventory
                                                        )) +
                                                        '<br>' +
                                                        '<b>Thuế: </b>' +
                                                        (productData
                                                            .product_tax ==
                                                            99 ||
                                                            productData
                                                            .product_tax ==
                                                            null ?
                                                            "NOVAT" :
                                                            productData
                                                            .product_tax +
                                                            '%'
                                                        )
                                                    );
                                            }
                                        }
                                    });
                                });
                                $('.open-modal-btn').off('click').on(
                                    'click',
                                    function() {
                                        var trElement = $(this)
                                            .closest('tr');
                                        var productInput = trElement
                                            .find('.product_id');
                                        var productId = productInput
                                            .val();
                                        var selectedSerialNumbersForProduct =
                                            selectedSerialNumbers[
                                                productId] || [];
                                        var qty_enter = trElement
                                            .find('.quantity-input')
                                            .val();
                                        $("#exampleModal0 .modal-body tbody")
                                            .empty();

                                        $.ajax({
                                            url: "{{ route('getProductSeri') }}",
                                            method: 'GET',
                                            data: {
                                                productId: productId,
                                            },
                                            success: function(
                                                response
                                            ) {
                                                var currentIndex =
                                                    1;
                                                response
                                                    .forEach(
                                                        function(
                                                            sn
                                                        ) {
                                                            var snId =
                                                                parseInt(
                                                                    sn
                                                                    .id
                                                                );
                                                            var productId =
                                                                sn
                                                                .product_id;
                                                            var
                                                                selectedSerialNumbersForProductInt = [];
                                                            if (Array
                                                                .isArray(
                                                                    selectedSerialNumbersForProduct
                                                                )
                                                            ) {
                                                                selectedSerialNumbersForProductInt
                                                                    =
                                                                    selectedSerialNumbersForProduct
                                                                    .map(
                                                                        function(
                                                                            value
                                                                        ) {
                                                                            return parseInt(
                                                                                value
                                                                                .serialNumberId
                                                                            );
                                                                        }
                                                                    );
                                                            }
                                                            var isChecked =
                                                                selectedSerialNumbersForProductInt
                                                                .includes(
                                                                    snId
                                                                );
                                                            var newRow = `
                    <tr style="">
                        <td class="border-bottom pl-3 border-checkbox">
                            <input type="checkbox" data-product-id-sn="${sn.product_id}" class="check-item" value="${sn.id}" ${isChecked ? 'checked' : ''}>
                        </td>
                        <td class="border-bottom">${currentIndex}</td>
                        <td class="border-bottom">
                            <input readonly class="form-control w-100" type="text" value="${sn.serinumber}">
                        </td>
                    </tr>`;
                                                            currentIndex++;
                                                            $("#exampleModal0 .modal-body tbody")
                                                                .append(
                                                                    newRow
                                                                );
                                                        }
                                                    );
                                                //Thay đổi số lượng thì xóa s/n đã check
                                                $(".quantity-input")
                                                    .on("change",
                                                        function() {
                                                            var quantity =
                                                                $(
                                                                    this
                                                                )
                                                                .val();
                                                            var productId =
                                                                $(
                                                                    this
                                                                )
                                                                .data(
                                                                    "product-id"
                                                                );
                                                            var
                                                                selectedSerialNumbersForProductInt = [];
                                                            if (Array
                                                                .isArray(
                                                                    selectedSerialNumbersForProduct
                                                                )
                                                            ) {
                                                                selectedSerialNumbersForProductInt
                                                                    =
                                                                    selectedSerialNumbersForProduct
                                                                    .map(
                                                                        function(
                                                                            value
                                                                        ) {
                                                                            return parseInt(
                                                                                value
                                                                                .serialNumberId
                                                                            );
                                                                        }
                                                                    );
                                                            }
                                                            for (
                                                                let i =
                                                                    0; i <
                                                                selectedSerialNumbers
                                                                .length; i++
                                                            ) {
                                                                if (Array
                                                                    .isArray(
                                                                        selectedSerialNumbers[
                                                                            i
                                                                        ]
                                                                    ) &&
                                                                    selectedSerialNumbers[
                                                                        i
                                                                    ]
                                                                    .length >
                                                                    0
                                                                ) {
                                                                    selectedSerialNumbers
                                                                        [
                                                                            i
                                                                        ] =
                                                                        selectedSerialNumbers[
                                                                            i
                                                                        ]
                                                                        .filter(
                                                                            function(
                                                                                item
                                                                            ) {
                                                                                return item
                                                                                    .product_id !==
                                                                                    productId;
                                                                            }
                                                                        );
                                                                    $('input[name="selected_serial_numbers[]"][data-product-id="' +
                                                                            productId +
                                                                            '"]'
                                                                        )
                                                                        .remove();
                                                                }
                                                            }
                                                        }
                                                    );
                                                //Checked theo hàng
                                                $("#exampleModal0 .modal-body tbody tr")
                                                    .click(
                                                        function(
                                                            event
                                                        ) {
                                                            // Kiểm tra xem phần tử được click có phải là checkbox hay không
                                                            var checkbox =
                                                                $(
                                                                    this
                                                                )
                                                                .find(
                                                                    ".check-item"
                                                                );
                                                            if (!
                                                                $(event
                                                                    .target
                                                                )
                                                                .is(
                                                                    checkbox
                                                                )
                                                            ) {
                                                                // Đảo ngược trạng thái checked của checkbox
                                                                checkbox
                                                                    .prop(
                                                                        "checked",
                                                                        !
                                                                        checkbox
                                                                        .prop(
                                                                            "checked"
                                                                        )
                                                                    );
                                                                // Trigger sự kiện change cho checkbox
                                                                checkbox
                                                                    .trigger(
                                                                        "change"
                                                                    );
                                                            }
                                                        }
                                                    );
                                                $('.check-item')
                                                    .on('change',
                                                        function(
                                                            event
                                                        ) {
                                                            event
                                                                .stopPropagation();

                                                            var checkedCheckboxes =
                                                                $(
                                                                    '.check-item:checked'
                                                                )
                                                                .length;
                                                            var serialNumberId =
                                                                $(
                                                                    this
                                                                )
                                                                .val();
                                                            var productId =
                                                                $(
                                                                    this
                                                                )
                                                                .data(
                                                                    'product-id-sn'
                                                                );

                                                            if (checkedCheckboxes >
                                                                qty_enter
                                                            ) {
                                                                $(this)
                                                                    .prop(
                                                                        'checked',
                                                                        false
                                                                    );
                                                            } else {
                                                                if ($(
                                                                        this
                                                                    )
                                                                    .is(
                                                                        ':checked'
                                                                    )
                                                                ) {

                                                                    if (!
                                                                        selectedSerialNumbers[
                                                                            productId
                                                                        ]
                                                                    ) {
                                                                        selectedSerialNumbers
                                                                            [
                                                                                productId
                                                                            ] = [];
                                                                    }
                                                                    selectedSerialNumbers
                                                                        [
                                                                            productId
                                                                        ]
                                                                        .push({
                                                                            product_id: productId,
                                                                            serialNumberId: serialNumberId
                                                                        });

                                                                    // Tạo một trường input ẩn mới và đặt giá trị
                                                                    var newInput =
                                                                        $('<input>', {
                                                                            type: 'hidden',
                                                                            name: 'selected_serial_numbers[]',
                                                                            value: serialNumberId,
                                                                            'data-product-id': productId,
                                                                        });

                                                                    // Thêm trường input mới vào container
                                                                    $('#selectedSerialNumbersContainer')
                                                                        .append(
                                                                            newInput
                                                                        );
                                                                } else {

                                                                    if (selectedSerialNumbers[
                                                                            productId
                                                                        ]) {
                                                                        selectedSerialNumbers
                                                                            [
                                                                                productId
                                                                            ] =
                                                                            selectedSerialNumbers[
                                                                                productId
                                                                            ]
                                                                            .filter(
                                                                                function(
                                                                                    item
                                                                                ) {
                                                                                    return item
                                                                                        .serialNumberId !==
                                                                                        serialNumberId;
                                                                                }
                                                                            );

                                                                        // Xóa trường input ẩn tương ứng
                                                                        $('input[name="selected_serial_numbers[]"][value="' +
                                                                                serialNumberId +
                                                                                '"]'
                                                                            )
                                                                            .remove();
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    );

                                                // Xoá sự kiện click trước đó nếu có
                                                $('.check-seri')
                                                    .off(
                                                        'click'
                                                    )
                                                    .on('click',
                                                        function() {
                                                            var checkedCheckboxes =
                                                                $(
                                                                    '.check-item:checked'
                                                                )
                                                                .length;
                                                            var check_item =
                                                                $(
                                                                    '.check-item'
                                                                );
                                                            if (check_item
                                                                .length >
                                                                0
                                                            ) {
                                                                if (checkedCheckboxes <
                                                                    qty_enter
                                                                ) {
                                                                    showAutoToast
                                                                        ('warning',
                                                                            'Vui lòng chọn đủ serial number theo số lượng xuất!'
                                                                        );
                                                                    // Không cho phép đóng modal khi có lỗi
                                                                    return false;
                                                                } else if (
                                                                    checkedCheckboxes ==
                                                                    qty_enter
                                                                ) {
                                                                    // Kiểm tra xem nút được nhấn có class 'check-seri' không
                                                                    if ($(
                                                                            this
                                                                        )
                                                                        .hasClass(
                                                                            'check-seri'
                                                                        )
                                                                    ) {
                                                                        $(this)
                                                                            .attr(
                                                                                'data-dismiss',
                                                                                'modal'
                                                                            );
                                                                    }
                                                                }
                                                            } else {
                                                                $(this)
                                                                    .attr(
                                                                        'data-dismiss',
                                                                        'modal'
                                                                    );
                                                            }
                                                        }
                                                    );
                                            }
                                        });
                                    });
                            });
                        }
                    });
                }
            });
        });
        var idQuote = $('#detail_id').val();
        if (idQuote) {
            $('.search-info').trigger('click', idQuote);
        }
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
        $('tr').each(function() {
            var productQty = parseFloat($(this).find('[name^="product_qty"]').val());
            var productPriceElement = $(this).find('[name^="product_price"]');
            var productPrice = 0;
            var promotionElement = $(this).find('[name^="promotion"]');
            var promotion = 0;
            var taxValue = parseFloat($(this).find('[name^="product_tax"]').val());
            var promotionType = parseFloat($(this).find('[name^="promotion_type"]').val());

            if (taxValue == 99) {
                taxValue = 0;
            }
            if (productPriceElement.length > 0) {
                var rawPrice = productPriceElement.val();
                if (rawPrice !== "") {
                    productPrice = parseFloat(rawPrice.replace(/,/g, ''));
                }
            }
            if (promotionElement.length > 0) {
                var rawPromotion = promotionElement.val();
                if (rawPromotion !== "") {
                    promotion = parseFloat(rawPromotion.replace(/,/g, ''));
                }
            }

            if (!isNaN(productQty) && !isNaN(taxValue)) {
                var donGia = productPrice;
                var rowTotal = productQty * donGia;
                // Trừ khuyến mãi
                if (promotionType == "1") {
                    rowTotal -= promotion;
                } else if (promotionType == "2") {
                    rowTotal *= (1 - promotion / 100);
                }
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
        var voucher = parseFloat($('#voucher').val().replace(/[^0-9.-]+/g, "")) || 0;
        var discountType = $('.discount_type').val();
        if (!isNaN(totalAmount) || !isNaN(totalTax)) {
            var grandTotal = totalAmount + totalTax;
            if (discountType === "2") { // Nhập %
                voucher = (grandTotal * voucher) / 100;
            }

            grandTotal -= voucher;
            grandTotal = Math.round(grandTotal);
            $('#grand-total').text(formatCurrency(Math.round(grandTotal)));
            // Cập nhật giá trị data-value
            $('#grand-total').attr('data-value', grandTotal);
            $('#total').val(totalAmount);
        }
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

    //format giá
    var inputElement = document.getElementById('product_price');
    $('body').on('input', '.product_price, #transport_fee, .giaNhap, #voucher, .fee_ship', function(event) {
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

    function kiemTraFormGiaoHang(event) {
        var rows = document.querySelectorAll('tr');
        var numberValue = $('input[name="code_delivery"]').val();
        var hasProducts = false;
        var ajaxSuccess = false;
        var previousProductNames = [];

        function normalizeProductName(name) {
            // Chuyển tất cả các ký tự thành chữ thường
            var lowercaseName = name.toLowerCase();
            // Loại bỏ các dấu
            var normalized = lowercaseName.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            return normalized;
        }

        $.ajax({
            url: '{{ route('checkCodeDelivery') }}',
            type: 'GET',
            async: false, // Chuyển thành đồng bộ
            data: {
                numberValue: numberValue
            },
            success: function(data) {
                if (!data.success) {
                    showAutoToast('warning', 'Mã giao hàng đã tồn tại!');
                    $('#pdf_export').val(0);
                } else {
                    ajaxSuccess = true;
                }
            }
        });

        if (!ajaxSuccess) {
            return false;
        }

        for (var i = 1; i < rows.length; i++) {
            if (rows[i].classList.contains('addProduct')) {
                var productNameInput = rows[i].querySelector('.product_name');
                var productName = productNameInput.value;

                var normalizedProductName = normalizeProductName(productName);

                if (previousProductNames.includes(normalizedProductName)) {
                    showAutoToast('warning', 'Tên sản phẩm bị trùng: ' + productName);
                    $('#pdf_export').val(0);
                    return false;
                } else {
                    // Thêm tên sản phẩm đã chuẩn hóa vào mảng các tên sản phẩm đã xuất hiện trước đó
                    previousProductNames.push(normalizedProductName);
                }
                hasProducts = true;
            }
        }

        var inputValue = $('.idGuest').val();

        if ($.trim(inputValue) === '') {
            showAutoToast('warning', 'Vui lòng chọn số báo giá từ danh sách!');
            $('#pdf_export').val(0);
            event.preventDefault();
        } else {
            // Hiển thị thông báo nếu không có sản phẩm
            if (!hasProducts) {
                showAutoToast('warning', 'Không có sản phẩm để báo giá');
                $('#pdf_export').val(0);
                event.preventDefault();
            } else {
                $('.product_tax').prop('disabled', false);
            }
        }
    }
    //Lưu và in
    document.addEventListener("DOMContentLoaded", function() {
        var pdfLink = document.querySelector("#pdf-link");

        pdfLink.addEventListener("click", function(event) {
            event.preventDefault();
            $('#pdf_export').val(1);
            $('#luuNhap').click();
        });
    });
</script>
</body>

</html>
