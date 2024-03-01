<x-navbar :title="$title" activeGroup="sell" activeName="delivery">
</x-navbar>
<form action="{{ route('delivery.store', ['workspace' => $workspacename]) }}" method="POST">
    @csrf
    <input type="hidden" name="detailexport_id" id="detailexport_id"
        value="@isset($yes) {{ $data['detailexport_id'] }} @endisset">
    <div id="selectedSerialNumbersContainer"></div>
    <div class="content-wrapper--2Column m-0">
        <div class="content-header-fixed p-0 margin-250">
            <div class="content__header--inner margin-left32">
                <div class="content__heading--left">
                    <span>Bán hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="nearLast-span">Đơn giao hàng</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="font-weight-bold last-span">Tạo đơn giao hàng</span>
                </div>
                <div class="container-fluided z-index-block">
                    <div class="row m-0">
                        <a href="{{ route('delivery.index', $workspacename) }}">
                            <button type="button" class="btn-destroy btn-light mx-1 d-flex align-items-center h-100">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                        fill="none">
                                        <path
                                        d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z"
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
                                <span class="text-btnIner-primary ml-2">In</span>
                            </button>
                            <div class="dropdown-menu" style="z-index: 9999;">
                                <a class="dropdown-item text-13-black" href="#">Xuất Excel</a>
                                <a class="dropdown-item text-13-black" href="#">Xuất PDF</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button type="submit" name="action" value="2"
                                class="btn-destroy btn-light mx-1 d-flex align-items-center h-100"
                                onclick="kiemTraFormGiaoHang(event);" id="giaoHang">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                        fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM11.7836 6.42901C12.0858 6.08709 12.0695 5.55006 11.7472 5.22952C11.4248 4.90897 10.9186 4.9263 10.6164 5.26821L7.14921 9.19122L5.3315 7.4773C5.00127 7.16593 4.49561 7.19748 4.20208 7.54777C3.90855 7.89806 3.93829 8.43445 4.26852 8.74581L6.28032 10.6427C6.82041 11.152 7.64463 11.1122 8.13886 10.553L11.7836 6.42901Z"
                                            fill="#6D7075" />
                                    </svg>
                                </span>
                                <span class="text-btnIner-primary ml-2">Giao hàng</span>
                            </button>
                        </div>
                        <button type="submit" name="action" value="1"
                            class="custom-btn mx-1 d-flex align-items-center h-100"
                            onclick="kiemTraFormGiaoHang(event);" id="luuNhap">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                        fill="white" />
                                </svg>
                            </span>
                            <span class="text-btnIner-primary ml-2">Lưu nháp</span>
                        </button>
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
                </div>
            </div>
        </div>
        {{-- Thông tin sản phẩm --}}
        <div class="content " style="margin-top:3.8rem;" id="main">
            <section class="content margin-250">
                <div class="bg-filter-search border-top-0 text-center border-custom">
                    <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN SẢN PHẨM</p>
                </div>
                <div class="container-fluided">
                    <section class="info-chung">
                        <div class="content-info position-relative table-responsive text-nowrap">
                            <table class="table table-hover bg-white rounded">
                                <thead>
                                    <tr style="height:44px;">
                                            <th class="border-right p-0 px-2 text-13" style="width:10%;">
                                                <span class="mx-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path
                                                            d="M6.37 7.63C6.49289 7.75305 6.56192 7.91984 6.56192 8.09375C6.56192 8.26766 6.49289 8.43445 6.37 8.5575L4.375 10.5L5.46875 11.5938C5.46875 11.7678 5.39961 11.9347 5.27654 12.0578C5.15347 12.1809 4.98655 12.25 4.8125 12.25H2.40625C2.2322 12.25 2.06528 12.1809 1.94221 12.0578C1.81914 11.9347 1.75 11.7678 1.75 11.5938V9.1875C1.75 9.01345 1.81914 8.84653 1.94221 8.72346C2.06528 8.60039 2.2322 8.53125 2.40625 8.53125L3.5 9.625L5.4425 7.63C5.56555 7.50711 5.73234 7.43808 5.90625 7.43808C6.08016 7.43808 6.24695 7.50711 6.37 7.63ZM7.63 6.37C7.50711 6.24695 7.43808 6.08016 7.43808 5.90625C7.43808 5.73234 7.50711 5.56555 7.63 5.4425L9.625 3.5L8.53125 2.40625C8.53125 2.2322 8.60039 2.06528 8.72346 1.94221C8.84653 1.81914 9.01345 1.75 9.1875 1.75H11.5938C11.7678 1.75 11.9347 1.81914 12.0578 1.94221C12.1809 2.06528 12.25 2.2322 12.25 2.40625V4.8125C12.25 4.98655 12.1809 5.15347 12.0578 5.27654C11.9347 5.39961 11.7678 5.46875 11.5938 5.46875L10.5 4.375L8.5575 6.37C8.43445 6.49289 8.26766 6.56192 8.09375 6.56192C7.91984 6.56192 7.75305 6.49289 7.63 6.37Z"
                                                            fill="#26273B" fill-opacity="0.8" />
                                                    </svg>
                                                </span>
                                                <input type='checkbox' class='checkall-btn mx-1' id="checkall">
                                                <span>Mã sản phẩm</span>
                                            </th>
                                            <th class="border-right p-0 px-2 text-13" style="width:15%;">Tên sản phẩm
                                            </th>
                                            <th class="border-right p-0 px-2 text-13" style="width:7%;">Đơn vị</th>
                                            <th class="border-right p-0 px-2 text-center text-13" style="width:10%;">Số lượng</th>
                                            <th class="border-right p-0 px-2 text-right text-13" style="width:10%;">Đơn giá</th>
                                            <th class="border-right p-0 px-2 text-center text-13" style="width:10%;">Thuế</th>
                                            <th class="border-right p-0 px-1 text-center text-13" style="width:15%;">Thành tiền</th>
                                            <th class="border-right p-0 px-2 text-center note text-13">Ghi chú sản phẩm
                                            </th>
                                            <th class="border-right p-0 px-2"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="dynamic-fields" class="bg-white"></tr>
                                </tbody>
                            </table>
                            <section class="content">
                                <div class="container-fluided">
                                    <div class="d-flex ml-3">
                                        <button type="button" data-toggle="dropdown" id="add-field-btn"
                                            class="btn-save-print d-flex align-items-center h-100 py-1 px-2 rounded"
                                            style="margin-right:10px">
                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 18 18" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                                    fill="#42526E"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                                    fill="#42526E"></path>
                                            </svg>
                                            <span class="text-table">Thêm sản phẩm</span>
                                        </button>
                                        <button type="button" data-toggle="dropdown" id="add-field-btn"
                                            class="btn-save-print d-flex align-items-center h-100 py-1 px-2 rounded"
                                            style="margin-right:10px">
                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 18 18" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                                    fill="#42526E"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                                    fill="#42526E"></path>
                                            </svg>
                                            <span class="text-table">Thêm đầu mục</span>
                                        </button>
                                        <button type="button" data-toggle="dropdown"
                                            class="btn-save-print d-flex align-items-center h-100 py-1 px-2 rounded"
                                            style="margin-right:10px">
                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 18 18" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                                    fill="#42526E"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                                    fill="#42526E"></path>
                                            </svg>
                                            <span class="text-table">Thêm hàng loạt</span>
                                        </button>
                                        <button type="button" class="btn-option py-1 px-2 bg-white border-0">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
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
                                        </button>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </section>
                    <div class="content">
                        <div class="row footer-total" style="width:95%;">
                                    <div class="position-relative col-lg-4 px-0"></div>
                                    <div class="position-relative col-lg-5 col-md-7 col-sm-12 margin-left180">
                                        <div class="m-3 ">
                                            <div class="d-flex justify-content-between">
                                                <span class="text-13-black">Giá trị trước thuế:</span>
                                                <span id="total-amount-sum" class="text-table">
                                                    @isset($yes)
                                                        {{ number_format($getInfoQuote->total_price) }}
                                                    @endisset
                                                </span>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2 align-items-center">
                                                <span class="text-13-black">Thuế VAT:</span>
                                                <span id="product-tax" class="text-table">
                                                    @isset($yes)
                                                        {{ number_format($getInfoQuote->total_tax) }}
                                                    @endisset
                                                </span>
                                            </div>
                                        
                                            <div class="d-flex justify-content-between mt-2">
                                                <span class="text-13-bold text-lg font-weight-bold">Tổng cộng:</span>
                                                <span id="grand-total" data-value="0"  class="text-13-bold text-lg font-weight-bold text-right">
                                                    @isset($yes)
                                                        {{ number_format($getInfoQuote->total_tax + $getInfoQuote->total_price) }}
                                                    @endisset
                                                </span>
                                                <input type="text" hidden="" name="totalValue" value="0"id="total">
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
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Thông tin Serial Number</h5>
                                <button type="button" class="close btnclose" data-dismiss="" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table id="table_SNS">
                                    <thead>
                                        <tr>
                                            <td style="width:2%"></td>
                                            <th style="width:5%">STT</th>
                                            <th style="width:100%">Serial number</th>
                                            <th style="width:3%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary check-seri" data-dismiss="">Save
                                    changes</button>
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
        </div>
        {{-- Thông tin khách hàng --}}
        <div class="content-wrapper px-0 py-0">
            <div id="mySidenav" class="sidenav border">
                <div id="show_info_Guest">
                    <div class="bg-filter-search border-0 text-center border-custom">
                        <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN KHÁCH HÀNG</p>
                    </div>
                    <div class="d-flex justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative"
                        style="height:44px;" style="height:44px;">
                        <span class="text-13 btn-click" style="flex: 1.5;">Số báo giá</span>

                        <span class="mx-1 text-13" style="flex: 2;">
                            <input type="text" placeholder="Chọn thông tin" name="quotation_number"
                                class="border-0 w-100 bg-input-guest py-0 py-2 px-2 numberQute " id="myInput"
                                style="background-color:#F0F4FF; border-radius:4px;" autocomplete="off"
                                value="@isset($yes) {{ $data['quotation_number'] }} @endisset" required>
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
                                                    <a href="#" title="" style="flex:2" 
                                                        id="{{ $quote_value->id }}" name="search-info"
                                                        class="search-info">
                                                        <span class="text-13-black">{{ $quote_value->quotation_number }}</span></span>
                                                    </a>
                                                    <a id="" class="search-infoEdit" type="button" data-toggle="modal"
                                                        data-target="#guestModalEdit">
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
                                        <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                            style="height:44px;">
                                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Khách hàng</span>
                                            <input class="text-13-black w-50 border-0 bg-input-guest nameGuest" style="flex:2;"
                                                value="@isset($yes){{ $getGuestbyId[0]->guest_name_display }}@endisset" />

                                            <input type="hidden" class="idGuest" autocomplete="off" name="guest_id"
                                                value="@isset($yes){{ $getGuestbyId[0]->id }}@endisset">
                                        </li>
                                        <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left position-relative"
                                            style="height:44px;">
                                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Người đại diện</span>

                                            <input tye="text" class="text-13-black w-50 border-0 bg-input-guest represent_name"
                                                value="{{ $getRepresentbyId[0]->represent_name ?? '' }}"
                                                style="flex:2;" placeholder="Chọn thông tin" readonly>

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
                                        </li>
                                        <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                            style="height:44px;">
                                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Mã Giao Hàng</span>
                                            <input class="text-13-black w-50 border-0 bg-input-guest"
                                                placeholder="Chọn thông tin" style="flex:2;" name="code_delivery" />
                                        </li>
                                        <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                            style="height:44px;">
                                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Đơn vị vận chuyển</span>
                                            <input class="text-13-black w-50 border-0 bg-input-guest unit_ship " name="shipping_unit"
                                                placeholder="Chọn thông tin" style="flex:2;" />
                                        </li>
                                        <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                            style="height:44px;">
                                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Phí giao hàng</span>
                                            <input class="text-13-black w-50 border-0 bg-input-guest fee_ship" name="shipping_fee"
                                                placeholder="Chọn thông tin" style="flex:2;" />
                                        </li>
                                        <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left"
                                            style="height:44px;">
                                            <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày giao  hàng</span>
                                            <input class="text-13-black w-50 border-0 bg-input-guest " id="datePicker" required
                                                placeholder="Chọn thông tin" style="flex:2;" />

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
                "<td class='border-right p-2 text-13 align-top'>" +
                "<span class='ml-1 mr-2'>"+
                "<svg xmlns='http://www.w3.org/2000/svg' width='6' height='10' viewBox='0 0 6 10' fill='none'>"+
                "<g clip-path='url(#clip0_1710_10941)'>"+
                "<path fill-rule='evenodd' clip-rule='evenodd' d='M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z' fill='#282A30'/>"+
                "</g>"+
                "<defs>"+
                "<clipPath id='clip0_1710_10941'>"+
                "<rect width='6' height='10' fill='white'/>"+
                "</clipPath>"+
                "</defs>"+
                "</svg>"+
                "</span>"+
                "<input type='checkbox' class='cb-element checkall-btn ml-1 mr-1'>" +
                "<input type='text' autocomplete='off' class='border-0 pl-1 pr-2 py-1 w-50 product_code' name='product_code[]'>" +
                "</td>"
            );
            const tenSanPham = $(
                "<td class='border-right p-2 text-13 align-top position-relative'>" +
                    "<ul class='list_product bg-white position-absolute w-100 rounded shadow p-0 scroll-data' style='z-index: 99;top: 44%;left: 0%;'>" +
                        "@foreach ($product as $product_value)" +
                        "<li>" +
                            "<a href='javascript:void(0);' class='text-dark d-flex justify-content-between p-2 idProduct w-100' id='{{ $product_value->id }}' name='idProduct'>" +
                                "<span class='w-50 text-13-black'>{{ $product_value->product_name }}</span>" +
                            "</a>" +
                        "</li>" +
                        "@endforeach" +
                    "</ul>" +
                    "<div class='d-flex align-items-center'>" +
                        "<input type='text' class='border-0 px-2 py-1 w-100 product_name' autocomplete='off' required name='product_name[]'>" +
                        "<input type='hidden' class='product_id' autocomplete='off' name='product_id[]'>" +
                            "<div class='info-product' style='display: none;' data-toggle='modal' data-target='#productModal'>" +
                               "<svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 14 14' fill='none'>"+
                                    "<g clip-path='url(#clip0_2559_39956)'>"+
                                        "<path d='M6.99999 1.48362C5.53706 1.48362 4.13404 2.06477 3.09959 3.09922C2.06514 4.13367 1.48399 5.53669 1.48399 6.99963C1.48399 8.46256 2.06514 9.86558 3.09959 10.9C4.13404 11.9345 5.53706 12.5156 6.99999 12.5156C8.46292 12.5156 9.86594 11.9345 10.9004 10.9C11.9348 9.86558 12.516 8.46256 12.516 6.99963C12.516 5.53669 11.9348 4.13367 10.9004 3.09922C9.86594 2.06477 8.46292 1.48362 6.99999 1.48362ZM0.265991 6.99963C0.265991 5.21366 0.975464 3.50084 2.23833 2.23797C3.5012 0.975098 5.21402 0.265625 6.99999 0.265625C8.78596 0.265625 10.4988 0.975098 11.7616 2.23797C13.0245 3.50084 13.734 5.21366 13.734 6.99963C13.734 8.78559 13.0245 10.4984 11.7616 11.7613C10.4988 13.0242 8.78596 13.7336 6.99999 13.7336C5.21402 13.7336 3.5012 13.0242 2.23833 11.7613C0.975464 10.4984 0.265991 8.78559 0.265991 6.99963Z' fill='#282A30'/>"+
                                        "<path d='M7.07004 4.34488C6.92998 4.33528 6.78944 4.35459 6.65715 4.40161C6.52487 4.44863 6.40367 4.52236 6.30109 4.61821C6.19851 4.71406 6.11674 4.82999 6.06087 4.95878C6.00499 5.08757 5.9762 5.22648 5.97629 5.36688C5.97629 5.52851 5.91208 5.68352 5.79779 5.79781C5.6835 5.91211 5.52849 5.97631 5.36685 5.97631C5.20522 5.97631 5.05021 5.91211 4.93592 5.79781C4.82162 5.68352 4.75742 5.52851 4.75742 5.36688C4.75733 4.9557 4.87029 4.55241 5.08394 4.2011C5.2976 3.84979 5.60373 3.56398 5.96886 3.37492C6.33399 3.18585 6.74408 3.10081 7.15428 3.12909C7.56449 3.15737 7.95902 3.29788 8.29475 3.53526C8.63049 3.77265 8.8945 4.09776 9.05792 4.47507C9.22135 4.85237 9.2779 5.26735 9.22139 5.67462C9.16487 6.0819 8.99748 6.4658 8.7375 6.78436C8.47753 7.10292 8.13497 7.34387 7.74729 7.48088C7.70694 7.49534 7.67207 7.52196 7.64747 7.55706C7.62287 7.59216 7.60975 7.63402 7.60992 7.67688V8.22463C7.60992 8.38626 7.54571 8.54127 7.43142 8.65557C7.31712 8.76986 7.16211 8.83407 7.00048 8.83407C6.83885 8.83407 6.68383 8.76986 6.56954 8.65557C6.45525 8.54127 6.39104 8.38626 6.39104 8.22463V7.67688C6.39096 7.38197 6.48229 7.0943 6.65247 6.85345C6.82265 6.6126 7.0633 6.43042 7.34129 6.332C7.56313 6.25339 7.7511 6.10073 7.87356 5.89975C7.99603 5.69877 8.0455 5.46172 8.01366 5.22853C7.98181 4.99534 7.87059 4.78025 7.69872 4.61946C7.52685 4.45867 7.30483 4.36114 7.07004 4.34488Z' fill='#282A30'/>"+
                                        "<path d='M7.04382 10.1242C7.00228 10.1242 6.96245 10.1408 6.93307 10.1701C6.9037 10.1995 6.8872 10.2393 6.8872 10.2809C6.8872 10.3224 6.9037 10.3623 6.93307 10.3916C6.96245 10.421 7.00228 10.4375 7.04382 10.4375C7.08536 10.4375 7.1252 10.421 7.15457 10.3916C7.18395 10.3623 7.20045 10.3224 7.20045 10.2809C7.20045 10.2393 7.18395 10.1995 7.15457 10.1701C7.1252 10.1408 7.08536 10.1242 7.04382 10.1242ZM7.04382 10.9371C7.13 10.9371 7.21534 10.9201 7.29496 10.8872C7.37458 10.8542 7.44692 10.8059 7.50786 10.7449C7.5688 10.684 7.61714 10.6116 7.65012 10.532C7.6831 10.4524 7.70007 10.3671 7.70007 10.2809C7.70007 10.1947 7.6831 10.1094 7.65012 10.0297C7.61714 9.95012 7.5688 9.87777 7.50786 9.81684C7.44692 9.7559 7.37458 9.70756 7.29496 9.67458C7.21534 9.6416 7.13 9.62462 7.04382 9.62462C6.86977 9.62462 6.70286 9.69376 6.57978 9.81684C6.45671 9.93991 6.38757 10.1068 6.38757 10.2809C6.38757 10.4549 6.45671 10.6218 6.57978 10.7449C6.70286 10.868 6.86977 10.9371 7.04382 10.9371Z' fill='#282A30'/>"+
                                    "</g>"+
                                    "<defs>"+
                                        "<clipPath id='clip0_2559_39956'>"+
                                            "<rect width='14' height='14' fill='white'/>"+
                                        "</clipPath>"+
                                    "</defs>"+
                                "</svg>"+
                            "</div>"+
                    "</div>"+
                "</td>"
            );
            const dvTinh = $(
                "<td class='border-right p-2 text-13 align-top'>"+
                    "<input type='text' autocomplete='off' class='border-0 px-2 py-1 w-100 product_unit' required name='product_unit[]'>"+
                "</td>"
            );
            const soLuong = $(
                "<td class='border-right p-2 text-13 align-top'>" +
                    "<div>"+
                        "<input type='text' class='text-right border-0 px-2 py-1 w-100 quantity-input' autocomplete='off' required name='product_qty[]'>" +
                        "<input type='hidden' class='tonkho'>" +
                    "</div>"+
                    "<div class='mt-3 text-13-blue inventory'>Tồn kho: <span class='pl-1 soTonKho'>35</span></div>"+
                "</td>"
            );
            const donGia = $(
                "<td class='border-right p-2 text-13 align-top'>" +
                "<div>"+
                    "<input type='text' class='text-right border-0 px-2 py-1 w-100 product_price' autocomplete='off' name='product_price[]' required>" +
                "</div>"+
                    "<div class='mt-3 text-13-blue transaction'>Giao dịch gần đây</div>"+
                "</td>"
            );
            const thue = $(
                "<td class='border-right p-2 text-13 align-top'>" +
                    "<select name='product_tax[]' class='border-0 px-2 py-1 w-100 text-left product_tax' required>" +
                        "<option value='0'>0%</option>" +
                        "<option value='8'>8%</option>" +
                        "<option value='10'>10%</option>" +
                        "<option value='99'>NOVAT</option>" +
                    "</select>" +
                "</td>"
            );
            const thanhTien = $(
                "<td class='border-right p-2 text-13 align-top'>"+
                    "<input type='text' readonly class='text-right border-0 px-2 py-1 w-100 total-amount'>" +
                "</td>"
            );
            const ghiChu = $(
                "<td class='border border-bottom-0 position-relative note p-1 align-top'>" +
                "<input type='text' class='border-0 py-1 w-100' placeholder='Nhập ghi chú' name='product_note[]'>" +
                "</td>"
            );
            const option = $(
                "<td class='border-right p-2 align-top'>" +
                    "<svg width='17' height='17' viewBox='0 0 17 17' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
                    "<path fill-rule='evenodd' clip-rule='evenodd' d='M13.1417 6.90625C13.4351 6.90625 13.673 7.1441 13.673 7.4375C13.673 7.47847 13.6682 7.5193 13.6589 7.55918L12.073 14.2992C11.8471 15.2591 10.9906 15.9375 10.0045 15.9375H6.99553C6.00943 15.9375 5.15288 15.2591 4.92702 14.2992L3.34113 7.55918C3.27393 7.27358 3.45098 6.98757 3.73658 6.92037C3.77645 6.91099 3.81729 6.90625 3.85826 6.90625H13.1417ZM9.03125 1.0625C10.4983 1.0625 11.6875 2.25175 11.6875 3.71875H13.8125C14.3993 3.71875 14.875 4.19445 14.875 4.78125V5.3125C14.875 5.6059 14.6371 5.84375 14.3438 5.84375H2.65625C2.36285 5.84375 2.125 5.6059 2.125 5.3125V4.78125C2.125 4.19445 2.6007 3.71875 3.1875 3.71875H5.3125C5.3125 2.25175 6.50175 1.0625 7.96875 1.0625H9.03125ZM9.03125 2.65625H7.96875C7.38195 2.65625 6.90625 3.13195 6.90625 3.71875H10.0938C10.0938 3.13195 9.61805 2.65625 9.03125 2.65625Z' fill='#6B6F76'/>" +
                    "</svg>" +
                "</td>" +
                "<td style='display:none;'><input type='text' class='product_tax1'></td>"
            );
            // 
            // Gắn các phần tử vào hàng mới
            newRow.append(maSanPham, tenSanPham, dvTinh, soLuong, donGia, thue, thanhTien,ghiChu,option);
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
                    .replace(/,/g, ''));
                var deletedProductTax = parseFloat(deletedRow.find('.product_tax1').val()
                    .replace(/,/g, ''));

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
                $('.transaction').hide();
                $('.idProduct').click(function() {
                    var productCode = $(this).closest('tr').find('.product_code');
                    var productName = $(this).closest('tr').find('.product_name');
                    var productUnit = $(this).closest('tr').find('.product_unit');
                    var productPrice = $(this).closest('tr').find('.product_price');
                    var thue = $(this).closest('tr').find('.product_tax');
                    var product_id = $(this).closest('tr').find('.product_id');
                    var tonkho = $(this).closest('tr').find('.tonkho');
                    var soTonKho = $(this).closest('tr').find('.soTonKho');
                    var idProduct = $(this).attr('id');
                    var currentRow = $(this).closest('tr');
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
                                productPrice.val(productData
                                    .product_price_export)
                                thue.val(productData.product_tax);
                                product_id.val(productData.id);
                                tonkho.val(productData.product_inventory);
                                soTonKho.text(formatNumber(productData
                                    .product_inventory == null ? 0 :
                                    productData
                                    .product_inventory));
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
                                                                        );
                                                                    }
                                                                );
                                                            var isChecked =
                                                                selectedSerialNumbersForProductInt
                                                                .includes(
                                                                    snId
                                                                );
                                                            var newRow = `<tr style="">
                                                                <td class="ui-sortable-handle">
                                                                    <input type="checkbox" class="check-item" value="${sn.id}" ${isChecked ? 'checked' : ''}>
                                                                </td>
                                                                <td class="ui-sortable-handle">${currentIndex}</td>
                                                                <td class="ui-sortable-handle">
                                                                    <input readonly class="form-control w-25" type="text" value="${sn.serinumber}">
                                                                </td>
                                                            </tr>`;
                                                            currentIndex++;
                                                            $("#exampleModal0 .modal-body tbody")
                                                                .append(
                                                                    newRow
                                                                );
                                                        }
                                                    );
                                                $('.check-item')
                                                    .on('change',
                                                        function() {
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
                                                                        .push(
                                                                            serialNumberId
                                                                        );

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
                                                                    // Nếu checkbox bị bỏ chọn, loại bỏ Serial Number khỏi danh sách cho sản phẩm
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
                                                                                    return item !==
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
                                                                    showNotification
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

                                                // Xoá sự kiện click trước đó nếu có
                                                $('.btnclose')
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
                                                                    showNotification
                                                                        ('warning',
                                                                            'Vui lòng chọn đủ serial number theo số lượng xuất!'
                                                                        );
                                                                    // Không cho phép đóng modal khi có lỗi
                                                                    return false;
                                                                } else if (
                                                                    checkedCheckboxes ==
                                                                    qty_enter
                                                                ) {
                                                                    $('.btnclose')
                                                                        .attr(
                                                                            'data-dismiss',
                                                                            'modal'
                                                                        );
                                                                }
                                                            } else {
                                                                $('.btnclose')
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
                                        $(".bg-white.addProduct")
                                            .each(function() {
                                                var checkbox =
                                                    $(this)
                                                    .find(
                                                        ".check-add-sn"
                                                    );
                                                // Trường hợp chọn seri
                                                if (checkbox
                                                    .prop(
                                                        "checked"
                                                    ) &&
                                                    checkbox
                                                    .prop(
                                                        "disabled"
                                                    )) {
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
                                                        )
                                                        .val();
                                                    var productName =
                                                        $(this)
                                                        .find(
                                                            ".product_name"
                                                        )
                                                        .val();

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
                                            });

                                        // Nếu có sản phẩm không đủ "seri", hiển thị thông báo
                                        if (insufficientSeriProducts
                                            .length > 0) {
                                            alert(
                                                `Số lượng "seri" không đủ cho các sản phẩm: ${insufficientSeriProducts.join(", ")}`
                                            );
                                            e.preventDefault();
                                        } else {
                                            var allFieldsFilled = true;

                                            $('.addProduct').each(
                                                function() {
                                                    var productName =
                                                        $(this)
                                                        .find(
                                                            '.product_name'
                                                        ).val();
                                                    var productUnit =
                                                        $(this)
                                                        .find(
                                                            '.product_unit'
                                                        ).val();
                                                    var productQty =
                                                        $(this)
                                                        .find(
                                                            '.quantity-input'
                                                        ).val();

                                                    if (productName ===
                                                        '' ||
                                                        productUnit ===
                                                        '' ||
                                                        productQty ===
                                                        '') {
                                                        allFieldsFilled
                                                            = false;
                                                        return false;
                                                    }
                                                });
                                            if (allFieldsFilled) {
                                                $('.check-add-sn:checked[disabled]')
                                                    .prop('disabled',
                                                        false);
                                            } else {
                                                console.log(
                                                    'Vui lòng điền đầy đủ thông tin cho mỗi sản phẩm.'
                                                );
                                            }
                                        }
                                    });
                                $('#giaoHang').off('click').on('click',
                                    function(e) {
                                        var
                                            insufficientSeriProducts = [];
                                        var
                                            invalidInventoryProducts = [];

                                        $(".bg-white.addProduct").each(
                                            function() {
                                                var soTonKho =
                                                    parseFloat($(
                                                            this)
                                                        .find(
                                                            ".soTonKho"
                                                        ).text()
                                                    );
                                                var checkbox = $(
                                                    this).find(
                                                    ".check-add-sn"
                                                );

                                                var quantity =
                                                    parseFloat(
                                                        $(this)
                                                        .find(
                                                            ".quantity-input"
                                                        )
                                                        .val());
                                                var productNameInventory =
                                                    $(this)
                                                    .find(
                                                        ".product_name"
                                                    ).val();
                                                // Kiểm tra số lượng tồn kho
                                                if (quantity >
                                                    soTonKho) {
                                                    invalidInventoryProducts
                                                        .push(
                                                            productNameInventory
                                                        );
                                                }

                                                if (checkbox.prop(
                                                        "checked"
                                                    ) &&
                                                    checkbox.prop(
                                                        "disabled")
                                                ) {
                                                    var quantityValue =
                                                        parseFloat(
                                                            $(this)
                                                            .find(
                                                                ".quantity-input"
                                                            )
                                                            .val());
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
                                            });

                                        // Hiển thị thông báo nếu có sản phẩm không đủ "seri"
                                        if (insufficientSeriProducts
                                            .length > 0) {
                                            alert(
                                                `Số lượng "seri" không đủ cho các sản phẩm: ${insufficientSeriProducts.join(", ")}`
                                            );
                                            e.preventDefault();
                                        } else {
                                            // Hiển thị thông báo nếu không đủ số lượng tồn kho
                                            if (invalidInventoryProducts
                                                .length > 0) {
                                                alert("Không đủ số lượng tồn kho cho các sản phẩm:\n" +
                                                    invalidInventoryProducts
                                                    .join(', '));
                                                e.preventDefault();
                                            } else {
                                                // Tiếp tục kiểm tra thông tin sản phẩm và submit form nếu hợp lệ
                                                var allFieldsFilled =
                                                    true;

                                                $('.addProduct').each(
                                                    function() {
                                                        var productName =
                                                            $(this)
                                                            .find(
                                                                '.product_name'
                                                            )
                                                            .val();
                                                        var productUnit =
                                                            $(this)
                                                            .find(
                                                                '.product_unit'
                                                            )
                                                            .val();
                                                        var productQty =
                                                            $(this)
                                                            .find(
                                                                '.quantity-input'
                                                            )
                                                            .val();

                                                        if (productName ===
                                                            '' ||
                                                            productUnit ===
                                                            '' ||
                                                            productQty ===
                                                            '') {
                                                            allFieldsFilled
                                                                =
                                                                false;
                                                            return false;
                                                        }
                                                    });

                                                if (allFieldsFilled) {
                                                    $('.check-add-sn:checked[disabled]')
                                                        .prop(
                                                            'disabled',
                                                            false);
                                                    document
                                                        .getElementById(
                                                            'deliveryForm'
                                                        ).submit();
                                                } else {
                                                    console.log(
                                                        'Vui lòng điền đầy đủ thông tin cho mỗi sản phẩm.'
                                                    );
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
                    $('.idRepresent').val(data.represent_id)
                    $('.numberQute').val(data.quotation_number)
                    $('.nameGuest').val(data.guest_name_display)
                    $('.represent_name').val(data.represent_name)
                    $('#show-info-guest').show();
                    $('#show-title-guest').show();
                    $.ajax({
                        url: '{{ route('getProductQuote') }}',
                        type: 'GET',
                        data: {
                            idQuote: idQuote
                        },
                        success: function(data) {
                            $(".addProduct").remove();
                            $.each(data, function(index, item) {
                                var totalTax = parseFloat(item
                                    .total_tax) || 0;
                                var totalPrice = parseFloat(item
                                    .total_price) || 0;
                                var grandTotal = totalTax + totalPrice;
                                var tax = (item.price_export * item
                                    .soLuongCanGiao * (item
                                        .product_tax == 99 ? 0 :
                                        item
                                        .product_tax)) / 100;
                                $(".idGuest").val(item.guest_id);
                                $("#detailexport_id").val(item.maXuat);
                                $("#total-amount-sum").text(
                                    formatCurrency(totalPrice));
                                $("#product-tax").text(formatCurrency(
                                    totalTax));
                                $("#grand-total").text(formatCurrency(
                                    grandTotal));
                                $("#voucher").val(formatCurrency(item
                                    .discount == null ? 0 : item
                                    .discount));
                                $("#transport_fee").val(formatCurrency(
                                    item.transfer_fee == null ?
                                    0 : item.transfer_fee));
                                var newRow = `
                                    <tr id="dynamic-row-${item.maSP}" class="bg-white addProduct" style="height:80px">
                                            <td class='border-right p-2 text-13 align-top'>
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
                                                    <input type="text" value="${item.product_code == null ? '' : item.product_code}" readonly autocomplete="off" class="border-0 px-2 py-1 w-75 product_code" name="product_code[]">
                                                </div>
                                            </td>
                                            <td class="border-right p-2 text-13 align-top">
                                                <div class='d-flex align-items-center'>
                                                    <input type='text' class='border-0 px-2 py-1 w-100 product_name'
                                                            value="${item.product_name}" readonly
                                                            autocomplete='off' required name='product_name[]'>
                                                    <input type='hidden' value="${item.maSP}"
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
                                            <td class="border-right p-2 text-13 align-top">
                                                <input type="text" value="${item.product_unit}" readonly autocomplete="off" 
                                                    class="border-0 px-2 py-1 w-100 product_unit" required="" name="product_unit[]">
                                            </td>
                                            <td class="border-right p-2 text-13 align-top">
                                                    <div>
                                                        <input type='text' value="${item.soLuongCanGiao}" data-product-id="${item.maSP}"
                                                            class='border-0 px-2 py-1 w-100 quantity-input' autocomplete='off' required name='product_qty[]'>
                                                        <input type='hidden' class='tonkho'>
                                                    </div>
                                                    <div class='mt-3 text-13-blue inventory'>Tồn kho: <span class='pl-1 soTonKho'>${formatNumber(item.product_inventory == null ? 0 : item.product_inventory)}</span></div>
                                            </td>
                                            <td class="border-right p-2 text-13 align-top">
                                                <div>
                                                    <input type='text' class='text-right border-0 px-2 py-1 w-100 product_price' 
                                                        value="${formatCurrency(item.price_export)}"
                                                        autocomplete='off' name='product_price[]' required>
                                                </div>
                                                <div class='mt-3 text-13-blue transaction'>Giao dịch gần đây</div>
                                            
                                            </td>
                                            <td class="border-right p-2 text-13 align-top">
                                                <select name="product_tax[]" class="border-0 text-center product_tax" required="" disabled>
                                                    <option value="0" ${(item.product_tax == 0) ? 'selected' : ''}>0%</option>
                                                    <option value="8" ${(item.product_tax == 8) ? 'selected' : ''}>8%</option>
                                                    <option value="10" ${(item.product_tax == 10) ? 'selected' : ''}>10%</option>
                                                    <option value="99" ${(item.product_tax == 99) ? 'selected' : ''}>NOVAT</option>
                                                </select>
                                            </td>

                                            <td class="border-right p-2 text-13 align-top">
                                                <input type='text'
                                                        value="${formatCurrency(item.product_total)}" readonly 
                                                        class="border-0 px-2 py-1 w-100 total-amount" >
                                            </td>
                                            
                                            <td class="border-right p-2 text-13 align-top">
                                                <input type="text" placeholder='Nhập ghi chú'
                                                        readonly value="${(item.product_note == null) ? '' : item.product_note}" 
                                                        class="border-0 py-1 w-100" name="product_note[]">
                                            </td>
                                            <td class="border-right p-2 text-13 align-top deleteProduct">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5454 5C10.2442 5 9.99999 5.24421 9.99999 5.54545C9.99999 5.8467 10.2442 6.09091 10.5454 6.09091H13.4545C13.7558 6.09091 14 5.8467 14 5.54545C14 5.24421 13.7558 5 13.4545 5H10.5454ZM6 7.72726C6 7.42601 6.24421 7.18181 6.54545 7.18181H7.63637H16.3636H17.4545C17.7558 7.18181 18 7.42601 18 7.72726C18 8.02851 17.7558 8.27272 17.4545 8.27272H16.9091V17C16.9091 18.2113 15.9118 19.1818 14.7135 19.1818H9.25891C8.97278 19.1816 8.68906 19.1247 8.42499 19.0145C8.16092 18.9044 7.92126 18.7431 7.71979 18.5399C7.51833 18.3367 7.35905 18.0957 7.25112 17.8307C7.14347 17.5664 7.08903 17.2834 7.09091 16.9981V8.27272H6.54545C6.24421 8.27272 6 8.02851 6 7.72726ZM8.18182 17.0041V8.27272H15.8182V17C15.8182 17.5966 15.3216 18.0909 14.7135 18.0909H9.25938C9.11713 18.0908 8.97632 18.0625 8.84503 18.0077C8.71375 17.953 8.5946 17.8728 8.49444 17.7718C8.39429 17.6707 8.3151 17.5509 8.26144 17.4192C8.20779 17.2874 8.18074 17.1464 8.18182 17.0041ZM13.4545 10.0909C13.7558 10.0909 14 10.3351 14 10.6364V15.7273C14 16.0285 13.7558 16.2727 13.4545 16.2727C13.1533 16.2727 12.9091 16.0285 12.9091 15.7273V10.6364C12.9091 10.3351 13.1533 10.0909 13.4545 10.0909ZM11.0909 10.6364C11.0909 10.3351 10.8467 10.0909 10.5454 10.0909C10.2442 10.0909 9.99999 10.3351 9.99999 10.6364V15.7273C9.99999 16.0285 10.2442 16.2727 10.5454 16.2727C10.8467 16.2727 11.0909 16.0285 11.0909 15.7273V10.6364Z" fill="#42526E"></path>
                                                </svg>
                                            </td>
                                            <td style="display:none;" class="><input type="text" class="product_tax1"></td>
                                            <td style="display:none;"><input type="text" class="product_tax1"></td>
                                            <td style='display:none;'><ul class ='seri_pro'></ul></td>
                                    </tr>`;
                                $("#dynamic-fields").before(newRow);
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

                                        $(".bg-white.addProduct")
                                            .each(function() {
                                                var checkbox =
                                                    $(this)
                                                    .find(
                                                        ".check-add-sn"
                                                    );
                                                var isCheckedAndNotDisabled =
                                                    checkbox
                                                    .prop(
                                                        "checked"
                                                    ) && !
                                                    checkbox
                                                    .prop(
                                                        "disabled"
                                                    );
                                                // Trường hợp chọn seri
                                                if (checkbox
                                                    .prop(
                                                        "checked"
                                                    ) &&
                                                    checkbox
                                                    .prop(
                                                        "disabled"
                                                    )) {
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
                                                        )
                                                        .val();
                                                    var productName =
                                                        $(this)
                                                        .find(
                                                            ".product_name"
                                                        )
                                                        .val();

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
                                            });
                                        // Nếu có sản phẩm không đủ "seri", hiển thị thông báo
                                        if (insufficientSeriProducts
                                            .length > 0) {
                                            alert(
                                                `Số lượng "seri" không đủ cho các sản phẩm: ${insufficientSeriProducts.join(", ")}`
                                            );
                                            e.preventDefault();
                                        } else {
                                            // Hủy disabled cho các checkbox được chọn
                                            var allFieldsFilled =
                                                true;
                                            $('.addProduct').each(
                                                function() {
                                                    var productName =
                                                        $(this)
                                                        .find(
                                                            '.product_name'
                                                        ).val();
                                                    var productUnit =
                                                        $(this)
                                                        .find(
                                                            '.product_unit'
                                                        ).val();
                                                    var productQty =
                                                        $(this)
                                                        .find(
                                                            '.quantity-input'
                                                        ).val();

                                                    if (productName ===
                                                        '' ||
                                                        productUnit ===
                                                        '' ||
                                                        productQty ===
                                                        '') {
                                                        allFieldsFilled
                                                            =
                                                            false;
                                                        return false;
                                                    }
                                                });
                                            if (allFieldsFilled) {
                                                $('.check-add-sn:checked[disabled]')
                                                    .prop(
                                                        'disabled',
                                                        false);
                                            } else {
                                                console.log(
                                                    'Vui lòng điền đầy đủ thông tin cho mỗi sản phẩm.'
                                                );
                                            }
                                        }
                                    });
                                $('#giaoHang').off('click').on('click',
                                    function(e) {
                                        var
                                            insufficientSeriProducts = [];
                                        var
                                            invalidInventoryProducts = [];

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
                                                    var productNameInventory =
                                                        $(this)
                                                        .find(
                                                            ".product_name"
                                                        ).val();
                                                    // Kiểm tra số lượng tồn kho
                                                    if (quantity >
                                                        soTonKho) {
                                                        invalidInventoryProducts
                                                            .push(
                                                                productNameInventory
                                                            );
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
                                                });

                                        // Hiển thị thông báo nếu có sản phẩm không đủ "seri"
                                        if (insufficientSeriProducts
                                            .length > 0) {
                                            alert(
                                                `Số lượng "seri" không đủ cho các sản phẩm: ${insufficientSeriProducts.join(", ")}`
                                            );
                                            e.preventDefault();
                                        } else {
                                            // Hiển thị thông báo nếu không đủ số lượng tồn kho
                                            if (invalidInventoryProducts
                                                .length > 0) {
                                                alert("Không đủ số lượng tồn kho cho các sản phẩm:\n" +
                                                    invalidInventoryProducts
                                                    .join(', '));
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
                                                            false);
                                                    document
                                                        .getElementById(
                                                            'deliveryForm'
                                                        ).submit();
                                                } else {
                                                    console.log(
                                                        'Vui lòng điền đầy đủ thông tin cho mỗi sản phẩm.'
                                                    );
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
                                                alert(
                                                    'Serinumber đang được bỏ trống hoặc chưa được nhập đủ số lượng!'
                                                );
                                                $(this).attr(
                                                    'data-dismiss',
                                                    '');
                                            } else {
                                                $(this).attr(
                                                    'data-dismiss',
                                                    'modal');
                                            }
                                        } else {
                                            alert(
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
                                                            var selectedSerialNumbersForProductInt =
                                                                selectedSerialNumbersForProduct
                                                                .map(
                                                                    function(
                                                                        value
                                                                    ) {
                                                                        return parseInt(
                                                                            value
                                                                        );
                                                                    }
                                                                );
                                                            var isChecked =
                                                                selectedSerialNumbersForProductInt
                                                                .includes(
                                                                    snId
                                                                );
                                                            var newRow = `
                    <tr style="">
                        <td class="ui-sortable-handle">
                            <input type="checkbox" class="check-item" value="${sn.id}" ${isChecked ? 'checked' : ''}>
                        </td>
                        <td class="ui-sortable-handle">${currentIndex}</td>
                        <td class="ui-sortable-handle">
                            <input readonly class="form-control w-25" type="text" value="${sn.serinumber}">
                        </td>
                    </tr>`;
                                                            currentIndex++;
                                                            $("#exampleModal0 .modal-body tbody")
                                                                .append(
                                                                    newRow
                                                                );
                                                        }
                                                    );
                                                $('.check-item')
                                                    .on('change',
                                                        function() {
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
                                                                        .push(
                                                                            serialNumberId
                                                                        );

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
                                                                    // Nếu checkbox bị bỏ chọn, loại bỏ Serial Number khỏi danh sách cho sản phẩm
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
                                                                                    return item !==
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
                                                                    alert
                                                                        (
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

                                                // Xoá sự kiện click trước đó nếu có
                                                $('.btnclose')
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
                                                                    alert
                                                                        (
                                                                            'Vui lòng chọn đủ serial number theo số lượng xuất!'
                                                                        );
                                                                    // Không cho phép đóng modal khi có lỗi
                                                                    return false;
                                                                } else if (
                                                                    checkedCheckboxes ==
                                                                    qty_enter
                                                                ) {
                                                                    $('.btnclose')
                                                                        .attr(
                                                                            'data-dismiss',
                                                                            'modal'
                                                                        );
                                                                }
                                                            } else {
                                                                $('.btnclose')
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

    $(document).on('input', '.quantity-input, [name^="product_price"], .product_tax', function() {
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
        var hasProducts = false;

        for (var i = 1; i < rows.length; i++) {
            if (rows[i].classList.contains('addProduct')) {
                hasProducts = true;
            }
        }

        var inputValue = $('.idGuest').val();

        if ($.trim(inputValue) === '') {
            showNotification('warning', 'Vui lòng chọn số báo giá từ danh sách!');
            event.preventDefault();
        } else {
            // Hiển thị thông báo nếu không có sản phẩm
            if (!hasProducts) {
                showNotification('warning', 'Không có sản phẩm để báo giá');
                event.preventDefault();
            }
        }
    }
</script>
</body>

</html>
