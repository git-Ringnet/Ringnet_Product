<x-navbar :title="$title" activeGroup="sell" activeName="billsale">
</x-navbar>
<form onsubmit="return kiemTraFormGiaoHang();" action="{{ route('billSale.store') }}" method="POST">
    @csrf
    <input type="hidden" name="detailexport_id" id="detailexport_id"
        value="@isset($yes) {{ $data['detailexport_id'] }} @endisset">
    <input type="hidden" name="pdf_export" id="pdf_export">
    <input type="hidden" name="delivery_id" id="delivery_id">
    <div class="content-wrapper--2Column m-0">
        <div class="content-header-fixed p-0 m-0 border-0">
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
                    <span class="nearLast-span">Hóa đơn bán hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="font-weight-bold last-span">Tạo hóa đơn bán hàng</span>
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <a href="{{ route('billSale.index') }}" class="activity" data-name1="HDBH" data-des="Hủy">
                            <button type="button" class="btn-destroy btn-light mx-2 d-flex align-items-center h-100">
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
                                class="btn-destroy btn-light mx-1 d-flex align-items-center h-100">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                            fill="#6D7075" />
                                    </svg>
                                </span>
                                <span class="text-btnIner-primary ml-2">Lưu và in</span>
                            </button>
                            <div class="dropdown-menu" style="z-index: 9999;">
                                <a class="dropdown-item text-13-black" href="#" id="pdf-link">Xuất PDF</a>
                            </div>
                        </div>
                        <button type="submit" name="action" value="1" id="luuNhap"
                            class="btn-destroy mx-1 d-flex align-items-center h-100">
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
                                class="custom-btn btn-light mx-1 d-flex align-items-center h-100">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z"
                                            fill="white" />
                                    </svg>
                                </span>
                                <span class="text-btnIner-primary ml-2">Xác nhận</span>
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
                    class="content-title--fixed bg-filter-search border-top-0 text-center border-custom">
                    <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN SẢN PHẨM</p>
                </div>
                <div class="container-fluided margin-top-72">
                    <section class="content">
                        <div class="content-info position-relative table-responsive text-nowrap">
                            <table class="table table-hover bg-white rounded">
                                <thead>
                                    <tr style="height:44px;">
                                        <th class="border-right p-0 px-2 text-13 text-left" style="width:15%;">
                                            <input type='checkbox' class='checkall-btn ml-4 mr-1' id="checkall">
                                            <span class="text-table text-secondary">Mã sản phẩm</span>
                                        </th>
                                        <th class="border-right p-0 px-2 text-13" style="width:15%;">Tên sản phẩm
                                        </th>
                                        <th class="border-right p-0 px-2 text-13" style="width:7%;">Đơn vị</th>
                                        <th class="border-right p-0 px-2 text-right text-13" style="width:10%;">Số
                                            lượng</th>
                                        <th class="border-right p-0 px-2 text-right text-13" style="width:15%;">Đơn
                                            giá</th>
                                        <th class="border-right p-0 px-2 text-center text-13" style="width:10%;">Thuế
                                        </th>
                                        <th class="border-right p-0 px-2 text-center text-13" style="width:10%;">
                                            Khuyến mãi
                                        </th>
                                        <th class="border-right p-0 px-1 text-right text-13" style="width:12%;">Thành
                                            tiền</th>
                                        <th class="border-right p-0 px-2 text-left note text-13" style="width: 10%;">
                                            Ghi chú
                                        </th>
                                        <th class="p-0 px-2"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="dynamic-fields" class="bg-white"></tr>
                                </tbody>
                            </table>
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
        {{-- Thông tin khách hàng --}}
        <div class="content-wrapper2 px-0 py-0">
            <div id="mySidenav" class="sidenav border">
                <div id="show_info_Guest">
                    <div class="bg-filter-search border-0 text-center">
                        <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN KHÁCH HÀNG
                        </p>
                    </div>
                    <div class="d-flex justify-content-between py-2 px-3 border-bottom border-top align-items-center text-left text-nowrap position-relative"
                        style="height:43px;">
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
                                            class="pr-4 w-100 input-search bg-input-guest text-13-black"
                                            id="companyFilter">
                                        <span id="search-icon" class="search-icon">
                                            <i class="fas fa-search text-table" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                                <ul class="m-0 p-0 scroll-data">
                                    @foreach ($numberQuote as $quote_value)
                                        <li class="p-2 align-items-center text-wrap activity" data-name1="HDBH"
                                            data-des="Lấy thông tin từ số báo giá"
                                            style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                            <a href="#" title="" style="flex:2"
                                                id="{{ $quote_value->id }}" name="search-info" class="search-info">
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
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div id="show-info-guest">
                            <ul class="p-0 m-0 ">
                                <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                    style="height:43px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Khách hàng</span>
                                    <input readonly class="text-13-black w-50 border-0 nameGuest bg-input-guest"
                                        value="@isset($yes){{ $getGuestbyId[0]->guest_name }}@endisset"
                                        style="flex:2;">
                                    <input type="hidden" class="idGuest" autocomplete="off" name="guest_id"
                                        value="@isset($yes){{ $getGuestbyId[0]->id }}@endisset">
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                    style="height:42px;">
                                    <span class="text-13 text-nowrap mr-3"style="flex: 1.5;">Người đại diện</span>
                                    <input readonly class="text-13-black w-50 border-0 represent_name bg-input-guest"
                                        style="flex:2;" value="{{ $getRepresentbyId[0]->represent_name ?? '' }}" />
                                    <input type="hidden" class="idRepresent" autocomplete="off" name="represent_id"
                                        value="{{ $getRepresentbyId[0]->id ?? '' }}" />
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                    style="height:42px;">
                                    <span class="text-13 text-nowrap mr-1" style="flex: 1.5;">Số hóa đơn</span>
                                    <input
                                        class="text-13-black w-50 border-0 bg-input-guest bg-input-guest-blue py-2 px-2"
                                        style="flex:2;" placeholder="Nhập thông tin" name="number_bill" required />
                                </li>
                                <li class="d-flex justify-content-between py-2 px-3 border-bottom align-items-center text-left"
                                    style="height:42px;">
                                    <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày hóa đơn</span>
                                    <input type="text" class="text-13-black w-50 border-0 bg-input-guest"
                                        id="datePicker" style="flex:2;" placeholder="Nhập thông tin" />
                                    <input type="hidden" id="hiddenDateInput" value="" name="date_bill">
                                </li>
                            </ul>
                        </div>
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
</form>
<x-user-flow></x-user-flow>
<script>
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
    $('.deleteProduct').click(function() {
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

        // Update the displayed total-amount-sum value
        $('#total-amount-sum').text(formatCurrency(Math.round(totalAmount)));
    });
    let fieldCounter = 1;
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
                url: '{{ route('getInfoDelivery') }}',
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
                    $("#delivery_id").val(data.maGiaoHang);
                    $('.numberQute').val(data.soBG)
                    $('.nameGuest').val(data.guest_name)
                    $('.idRepresent').val(data.represent_id)
                    $('.represent_name').val(data.represent_name)
                    $('input[name="number_bill"]').val('SHD-' + (data.lastDeliveryId +
                        1));
                    $.ajax({
                        url: '{{ route('getProductDelivery') }}',
                        type: 'GET',
                        data: {
                            idQuote: idQuote
                        },
                        success: function(data) {
                            $(".sanPhamGiao").remove();
                            $('#show-info-guest').show();
                            $('#show-title-guest').show();
                            $.each(data, function(index, item) {
                                var tax = (((item.promotion_type == 1 ?
                                    item.product_total -
                                    item.promotion : item
                                    .product_total - (item
                                        .product_total * (
                                            item.promotion /
                                            100))) * (item
                                    .product_tax == 99 ? 0 :
                                    item.product_tax))) / 100;
                                $(".idGuest").val(item.guest_id);
                                $("#detailexport_id").val(item
                                    .detailexport_id);
                                $("#voucher").val(formatCurrency(item
                                    .discount == null ? 0 : item
                                    .discount));
                                $("#transport_fee").val(formatCurrency(
                                    item.transfer_fee == null ?
                                    0 : item.transfer_fee));
                                var newRow = `
                                <tr id="dynamic-row-${item.id}" class="bg-white sanPhamGiao" style="height:80px">
                                            <td class='border-right p-2 text-13 align-top border-bottom border-top-0'>
                                                <div class="d-flex w-100 justify-content-between align-items-center">
                                                <span class='mx-2'>
                                                    <svg xmlns='http://www.w3.org/2000/svg' width='6' height='10' viewBox='0 0 6 10' fill='none'>
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
                                                    <input type='checkbox' class='cb-element checkall-btn ml-2 mr-1'>
                                                    <input type="text" value="${item.product_code == null ? '' : item.product_code}" readonly autocomplete="off" class="border-0 px-2 py-1 w-75 product_code height-32" name="product_code[]">
                                                </div>
                                            </td>
                                            <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                                <div class='d-flex align-items-center'>
                                                    <input type='text' class='border-0 px-2 py-1 w-100 product_name height-32'
                                                            value="${item.product_name}" readonly
                                                            autocomplete='off' required name='product_name[]'>
                                                    <input type='hidden' value="${item.product_id}"
                                                            class='product_id' autocomplete='off' name='product_id[]'>
                                                    <div class='info-product' data-toggle='modal' data-target='#productModal'>
                                                        <svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 14 14' fill='none'>
                                                            <g clip-path='url(#clip0_2559_39956)'>
                                                                <path d='M6.99999 1.48362C5.53706 1.48362 4.13404 2.06477 3.09959 3.09922C2.06514 4.13367 1.48399 5.53669 1.48399 6.99963C1.48399 8.46256 2.06514 9.86558 3.09959 10.9C4.13404 11.9345 5.53706 12.5156 6.99999 12.5156C8.46292 12.5156 9.86594 11.9345 10.9004 10.9C11.9348 9.86558 12.516 8.46256 12.516 6.99963C12.516 5.53669 11.9348 4.13367 10.9004 3.09922C9.86594 2.06477 8.46292 1.48362 6.99999 1.48362ZM0.265991 6.99963C0.265991 5.21366 0.975464 3.50084 2.23833 2.23797C3.5012 0.975098 5.21402 0.265625 6.99999 0.265625C8.78596 0.265625 10.4988 0.975098 11.7616 2.23797C13.0245 3.50084 13.734 5.21366 13.734 6.99963C13.734 8.78559 13.0245 10.4984 11.7616 11.7613C10.4988 13.0242 8.78596 13.7336 6.99999 13.7336C5.21402 13.7336 3.5012 13.0242 2.23833 11.7613C0.975464 10.4984 0.265991 8.78559 0.265991 6.99963Z' fill='#282A30'/>
                                                                <path d='M7.07004 4.34488C6.92998 4.33528 6.78944 4.35459 6.65715 4.40161C6.52487 4.44863 6.40367 4.52236 6.30109 4.61821C6.19851 4.71406 6.11674 4.82999 6.06087 4.95878C6.00499 5.08757 5.9762 5.22648 5.97629 5.36688C5.97629 5.52851 5.91208 5.68352 5.79779 5.79781C5.6835 5.91211 5.52849 5.97631 5.36685 5.97631C5.20522 5.97631 5.05021 5.91211 4.93592 5.79781C4.82162 5.68352 4.75742 5.52851 4.75742 5.36688C4.75733 4.9557 4.87029 4.55241 5.08394 4.2011C5.2976 3.84979 5.60373 3.56398 5.96886 3.37492C6.33399 3.18585 6.74408 3.10081 7.15428 3.12909C7.56449 3.15737 7.95902 3.29788 8.29475 3.53526C8.63049 3.77265 8.8945 4.09776 9.05792 4.47507C9.22135 4.85237 9.2779 5.26735 9.22139 5.67462C9.16487 6.0819 8.99748 6.4658 8.7375 6.78436C8.47753 7.10292 8.13497 7.34387 7.74729 7.48088C7.70694 7.49534 7.67207 7.52196 7.64747 7.55706C7.62287 7.59216 7.60975 7.63402 7.60992 7.67688V8.22463C7.60992 8.38626 7.54571 8.54127 7.43142 8.65557C7.31712 8.76986 7.16211 8.83407 7.00048 8.83407C6.83885 8.83407 6.68383 8.76986 6.56954 8.65557C6.45525 8.54127 6.39104 8.38626 6.39104 8.22463V7.67688C6.39096 7.38197 6.48229 7.0943 6.65247 6.85345C6.82265 6.6126 7.0633 6.43042 7.34129 6.332C7.56313 6.25339 7.7511 6.10073 7.87356 5.89975C7.99603 5.69877 8.0455 5.46172 8.01366 5.22853C7.98181 4.99534 7.87059 4.78025 7.69872 4.61946C7.52685 4.45867 7.30483 4.36114 7.07004 4.34488Z' fill='#282A30'/>
                                                                <path d='M7.04382 10.1242C7.00228 10.1242 6.96245 10.1408 6.93307 10.1701C6.9037 10.1995 6.8872 10.2393 6.8872 10.2809C6.8872 10.3224 6.9037 10.3623 6.93307 10.3916C6.96245 10.421 7.00228 10.4375 7.04382 10.4375C7.08536 10.4375 7.1252 10.421 7.15457 10.3916C7.18395 10.3623 7.20045 10.3224 7.20045 10.2809C7.20045 10.2393 7.18395 10.1995 7.15457 10.1701C7.1252 10.1408 7.08536 10.1242 7.04382 10.1242ZM7.04382 10.9371C7.13 10.9371 7.21534 10.9201 7.29496 10.8872C7.37458 10.8542 7.44692 10.8059 7.50786 10.7449C7.5688 10.684 7.61714 10.6116 7.65012 10.532C7.6831 10.4524 7.70007 10.3671 7.70007 10.2809C7.70007 10.1947 7.6831 10.1094 7.65012 10.0297C7.61714 9.95012 7.5688 9.87777 7.50786 9.81684C7.44692 9.7559 7.37458 9.70756 7.29496 9.67458C7.21534 9.6416 7.13 9.62462 7.04382 9.62462C6.86977 9.62462 6.70286 9.69376 6.57978 9.81684C6.45671 9.93991 6.38757 10.1068 6.38757 10.2809C6.38757 10.4549 6.45671 10.6218 6.57978 10.7449C6.70286 10.868 6.86977 10.9371 7.04382 10.9371Z' fill='#282A30'/>
                                                            </g>
                                                            <defs>
                                                                <clipPath id='clip0_2559_39956'>
                                                                    <rect width='14' height='14' fill='white'/>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                                <input type="text" value="${item.product_unit}" readonly autocomplete="off" 
                                                    class="border-0 px-2 py-1 w-100 product_unit height-32" required="" name="product_unit[]">
                                            </td>
                                            <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                                    <div>
                                                        <input type='text' value="${formatNumber(item.soLuongHoaDon)}"
                                                            class='border-0 height-32 text-right px-2 py-1 w-100 quantity-input' autocomplete='off' required name='product_qty[]'>
                                                        <input type='hidden' class='tonkho'>
                                                        <input type="hidden" class="limit-quantity" value="${formatNumber(item.soLuongHoaDon)}" data-limit-quantity="${formatNumber(item.soLuongHoaDon)}">
                                                    </div>
                                                    <div class='mt-3 text-13-blue inventory'>Tồn kho: <span class='pl-1 soTonKho'>35</span></div>
                                            </td>
                                            <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                                <div>
                                                    <input type='text' class='text-right border-0 px-2 py-1 height-32 w-100 product_price' 
                                                        value="${formatCurrency(item.price_export)}"
                                                        autocomplete='off' name='product_price[]' required>
                                                </div>
                                                <a href='#'><div class='mt-3 text-13-blue transaction recentModal text-right' data-name1='HDBH' data-des="Xem giao dịch gần đây" data-toggle='modal' data-target='#recentModal'>Giao dịch gần đây</div></a>
                                            </td>
                                            <td class="border-right p-2 text-13 align-top border-bottom text-center border-top-0">
                                                <select class="border-0 text-center product_tax height-32" required="" disabled>
                                                    <option value="0" ${(item.product_tax == 0) ? 'selected' : ''}>0%</option>
                                                    <option value="8" ${(item.product_tax == 8) ? 'selected' : ''}>8%</option>
                                                    <option value="10" ${(item.product_tax == 10) ? 'selected' : ''}>10%</option>
                                                    <option value="99" ${(item.product_tax == 99) ? 'selected' : ''}>NOVAT</option>
                                                </select>
                                                <input type="hidden" class="product_tax" value="${(item.product_tax)}" name="product_tax[]">
                                            </td>
                                            <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                <div class="d-flex align-item-center">
                                    <input value="${formatCurrency(item.promotion)}" type="text" readonly name="promotion[]" class="text-right border-0 px-2 py-1 w-100 height-32 promotion" autocomplete="off">
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
                                                <input type='text'
                                                        value="${formatCurrency(Math.round(item.promotion_type == 1 ? item.product_total - item.promotion : item.product_total - (item.product_total * (item.promotion / 100))))}" readonly 
                                                        class="border-0 px-2 py-1 w-100 total-amount text-right height-32">
                                            </td>                             
                                            <td class="border-right p-2 text-13 align-top border-bottom border-top-0">
                                                <input type="text"
                                                        readonly value="${(item.product_note == null) ? '' : item.product_note}" 
                                                        class="border-0 py-1 w-100 height-32" name="product_note[]">
                                            </td>
                                            <td class="border-bottom p-2 text-13 align-top deleteProduct border-top-0 text-center" data-name1="HDBH" data-des="Xóa sản phẩm">
                                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1417 6.90625C13.4351 6.90625 13.673 7.1441 13.673 7.4375C13.673 7.47847 13.6682 7.5193 13.6589 7.55918L12.073 14.2992C11.8471 15.2591 10.9906 15.9375 10.0045 15.9375H6.99553C6.00943 15.9375 5.15288 15.2591 4.92702 14.2992L3.34113 7.55918C3.27393 7.27358 3.45098 6.98757 3.73658 6.92037C3.77645 6.91099 3.81729 6.90625 3.85826 6.90625H13.1417ZM9.03125 1.0625C10.4983 1.0625 11.6875 2.25175 11.6875 3.71875H13.8125C14.3993 3.71875 14.875 4.19445 14.875 4.78125V5.3125C14.875 5.6059 14.6371 5.84375 14.3438 5.84375H2.65625C2.36285 5.84375 2.125 5.6059 2.125 5.3125V4.78125C2.125 4.19445 2.6007 3.71875 3.1875 3.71875H5.3125C5.3125 2.25175 6.50175 1.0625 7.96875 1.0625H9.03125ZM9.03125 2.65625H7.96875C7.38195 2.65625 6.90625 3.13195 6.90625 3.71875H10.0938C10.0938 3.13195 9.61805 2.65625 9.03125 2.65625Z" fill="#6B6F76"></path>
                                                </svg>
                                            </td>
                                            <td style="display:none;"><input type="text" class="product_tax1" value="${tax}"></td>
                                            <td style='display:none;'><ul class ='seri_pro'></ul></td>
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
                                $('.recentModal').off('click').click(
                                    function() {
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
                                        //
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
                                    });
                                //kéo thả vị trí sản phẩm
                                // $("table tbody").sortable({
                                //     axis: "y",
                                //     handle: "td",
                                // });
                                //Xóa sản phẩm
                                $('.deleteProduct').off('click').click(
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
                                //Hiển thị danh sách tên sản phẩm
                                $(".list_product").hide();
                                $('.product_name').on("click", function(
                                    e) {
                                    e.stopPropagation();
                                    $(this).closest('tr').find(
                                            ".list_product")
                                        .show();
                                });
                                $(document).on("click", function(e) {
                                    if (!$(e.target).is(
                                            ".product_name")) {
                                        $(".list_product")
                                            .hide();
                                    }
                                });
                                //search tên sản phẩm
                                $(".product_name").on("keyup",
                                    function() {
                                        var value = $(this).val()
                                            .toUpperCase();
                                        var $tr = $(this).closest(
                                            "tr");
                                        $tr.find(".list_product li")
                                            .each(function() {
                                                var text = $(
                                                        this)
                                                    .find("a")
                                                    .text()
                                                    .toUpperCase();
                                                $(this).toggle(
                                                    text
                                                    .indexOf(
                                                        value
                                                    ) >
                                                    -1);
                                            });
                                    });
                                //lấy thông tin sản phẩm
                                $(document).ready(function() {
                                    $('.inventory').hide();
                                    // $('.info-product').hide();
                                    $('.idProduct').click(
                                        function() {
                                            var productName =
                                                $(this)
                                                .closest(
                                                    'tr')
                                                .find(
                                                    '.product_name'
                                                );
                                            var productUnit =
                                                $(this)
                                                .closest(
                                                    'tr')
                                                .find(
                                                    '.product_unit'
                                                );
                                            var thue = $(
                                                    this)
                                                .closest(
                                                    'tr')
                                                .find(
                                                    '.product_tax'
                                                );
                                            var product_id =
                                                $(this)
                                                .closest(
                                                    'tr')
                                                .find(
                                                    '.product_id'
                                                );
                                            var tonkho = $(
                                                    this)
                                                .closest(
                                                    'tr')
                                                .find(
                                                    '.tonkho'
                                                );
                                            var idProduct =
                                                $(this)
                                                .attr('id');
                                            $.ajax({
                                                url: '{{ route('getProductFromQuote') }}',
                                                type: 'GET',
                                                data: {
                                                    idProduct: idProduct
                                                },
                                                success: function(
                                                    data
                                                ) {
                                                    productName
                                                        .val(
                                                            data
                                                            .product_name
                                                        );
                                                    productUnit
                                                        .val(
                                                            data
                                                            .product_unit
                                                        );
                                                    thue.val(
                                                        data
                                                        .product_tax
                                                    );
                                                    product_id
                                                        .val(
                                                            data
                                                            .id
                                                        );
                                                    tonkho
                                                        .val(
                                                            data
                                                            .product_inventory
                                                        )
                                                    $('.info-product')
                                                        .show();
                                                    if (data
                                                        .product_inventory !==
                                                        null
                                                    ) {
                                                        $('.inventory')
                                                            .show();
                                                    }
                                                }
                                            });
                                        });
                                });
                                //Xem thông tin sản phẩm
                                $('.info-product').click(function() {
                                    var productName = $(this)
                                        .closest('tr').find(
                                            '.product_name')
                                        .val();
                                    var dvt = $(this).closest(
                                            'tr').find(
                                            '.product_unit')
                                        .val();
                                    var thue = $(this).closest(
                                            'tr').find(
                                            '.product_tax')
                                        .val();
                                    var tonKho = $(this)
                                        .closest('tr').find(
                                            '.tonkho').val();
                                    $('#productModal').find(
                                        '.modal-body').html(
                                        '<b>Tên sản phẩm: </b> ' +
                                        productName +
                                        '<br>' +
                                        '<b>Đơn vị: </b>' +
                                        dvt + '<br>' +
                                        '<b>Tồn kho: </b>' +
                                        tonKho +
                                        '<br>' +
                                        '<b>Thuế: </b>' +
                                        (thue == 99 ||
                                            thue == null ?
                                            "NOVAT" : thue +
                                            '%'));
                                });
                                //Mở rộng
                                if (status_form == 1) {
                                    $('.change_colum').text('Tối giản');
                                    $('.product_price').attr('readonly',
                                        false);
                                    // Xóa dữ liệu trường hệ số nhân, giá nhập
                                    $(this).closest("tr").find(
                                        '.product_ratio').val('')
                                    $(this).closest("tr").find(
                                        '.price_import').val('')
                                    // Xóa required
                                    $('tbody .heSoNhan').removeAttr(
                                        'required');
                                    $('tbody .giaNhap').removeAttr(
                                        'required');
                                    $('.product-ratio').hide();
                                    $('.product_ratio').hide()
                                    $('.price_import').hide();
                                    $('.note').hide();
                                    $('.Daydu').hide();
                                    $('.heSoNhan').val('')
                                    $('.giaNhap').val('')
                                } else {
                                    $('.change_colum').text('Đầy đủ');
                                    $('.product_price').attr('readonly',
                                        true);
                                    $(this).closest("tr").find(
                                        '.product_price').val('');
                                    // Xóa dữ liệu trương đơn giá
                                    $(this).closest("tr").find(
                                        '.price_export').val('')
                                    // Thêm required
                                    $('tbody .heSoNhan').attr(
                                        'required', true);
                                    $('tbody .giaNhap').attr('required',
                                        true);
                                    $('.product_ratio').show()
                                    $('.price_import').show();
                                    $('.note').show();
                                    $('.Daydu').show();
                                    $(this).closest("tr").find(
                                        '.heSoNhan').val('');
                                    $(this).closest("tr").find(
                                        '.giaNhap').val('');
                                }
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

    //Mở rộng
    var status_form = 0;
    $('.change_colum').off('click').on('click', function() {
        if (status_form == 0) {
            $(this).text('Tối giản');
            $('.product_price').attr('readonly', false);
            // Xóa required
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
            if (discountType === "2") { // Nhập %
                voucher = (totalAmount * voucher) / 100;
            }
            var grandTotal = (totalAmount - voucher) + totalTax;
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

    function kiemTraFormGiaoHang() {
        var numberValue = $('input[name="number_bill"]').val();
        var ajaxSuccess = false;

        $.ajax({
            url: '{{ route('checkNumberBill') }}',
            type: 'GET',
            async: false, // Chuyển thành đồng bộ
            data: {
                numberValue: numberValue
            },
            success: function(data) {
                if (!data.success) {
                    showAutoToast('warning', 'Số hóa đơn đã tồn tại');
                    $('#pdf_export').val(0);
                } else {
                    ajaxSuccess = true;
                }
            }
        });

        if (!ajaxSuccess) {
            return false;
        }

        var hasProducts = false;
        var rows = document.querySelectorAll('tr');
        for (var i = 1; i < rows.length; i++) {
            if (rows[i].classList.contains('sanPhamGiao')) {
                hasProducts = true;
                break;
            }
        }

        if (!hasProducts) {
            showAutoToast('warning', 'Không có sản phẩm để tạo hóa đơn');
            $('#pdf_export').val(0);
            return false;
        } else {
            return true;
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
