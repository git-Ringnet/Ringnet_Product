<x-navbar :title="$title" activeGroup="buy" activeName="import"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<form action="{{ route('import.update', ['workspace' => $workspacename, 'import' => $import->id]) }}" method="POST">
    <div class="content-wrapper--2Column m-0">
        <!-- Content Header (Page header) -->
        @method('PUT')
        @csrf
        <input type="hidden" id="provides_id" name="provides_id" value="{{ $import->provide_id }}">
        <input type="hidden" id="project_id" name="project_id" value="{{ $import->project_id }}">
        <input type="hidden" id="represent_id" name="represent_id" value="{{ $import->represent_id }}">
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
                    <span class="last-span">Chỉnh sửa đơn mua hàng</span>
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <a href="{{ route('import.index', $workspacename) }}">
                            <button type="button" class="btn-destroy btn-light mx-2 d-flex align-items-center h-100"
                                style="margin-right:10px">
                                <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z"
                                        fill="#6D7075" />
                                </svg>
                                <span class="text-btnIner-primary ml-2">Hủy</span>
                            </button>
                        </a>

                        @if ($import->status == 1)
                            <a href="#" onclick="getAction(this)">
                                <button name="action" value="action_1" type="submit"
                                    class="custom-btn d-flex align-items-center h-100">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    <span class="text-btnIner-primary ml-2">Lưu</span>
                                </button>
                            </a>
                        @endif

                        {{-- @if ($import->status == 2)
                            <a href="{{ route('import.index', $workspacename) }}" class="">
                                <button type="button"
                                    class="btn-destroy btn-light mx-2 d-flex align-items-center h-100">
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
                        @endif --}}

                        <button id="sideGuest" type="button" class="btn-option border-0">
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
                    <input type="hidden" value="action_1" name="action" id="getAction">
                </div>
            </div>
        </div>
        <!-- Main content -->
        <x-formprovides> </x-formprovides>

        <div class="content margin-top-38" id="main">
            <section class="content margin-250">
                <div class="container-fluided">
                    <div class="tab-content">
                        <div id="info" class="content tab-pane in active">
                            <div id="title--fixed"
                                class="content-title--fixed bg-filter-search border-top-0 text-center border-custom">
                                <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN
                                    SẢN PHẨM</p>
                            </div>
                            <section class="content margin-top-72">
                                <div class="content-info text-nowrap">
                                    <table id="inputcontent" class="table table-hover bg-white rounded">
                                        <thead>
                                            <tr style="height:44px;">
                                                <th class="border-right px-2 p-0"
                                                    style="width: 15%;padding-left:2rem;">
                                                    <span class="ml-1 mr-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                            height="14" viewBox="0 0 14 14" fill="none">
                                                            <path
                                                                d="M6.37 7.63C6.49289 7.75305 6.56192 7.91984 6.56192 8.09375C6.56192 8.26766 6.49289 8.43445 6.37 8.5575L4.375 10.5L5.46875 11.5938C5.46875 11.7678 5.39961 11.9347 5.27654 12.0578C5.15347 12.1809 4.98655 12.25 4.8125 12.25H2.40625C2.2322 12.25 2.06528 12.1809 1.94221 12.0578C1.81914 11.9347 1.75 11.7678 1.75 11.5938V9.1875C1.75 9.01345 1.81914 8.84653 1.94221 8.72346C2.06528 8.60039 2.2322 8.53125 2.40625 8.53125L3.5 9.625L5.4425 7.63C5.56555 7.50711 5.73234 7.43808 5.90625 7.43808C6.08016 7.43808 6.24695 7.50711 6.37 7.63ZM7.63 6.37C7.50711 6.24695 7.43808 6.08016 7.43808 5.90625C7.43808 5.73234 7.50711 5.56555 7.63 5.4425L9.625 3.5L8.53125 2.40625C8.53125 2.2322 8.60039 2.06528 8.72346 1.94221C8.84653 1.81914 9.01345 1.75 9.1875 1.75H11.5938C11.7678 1.75 11.9347 1.81914 12.0578 1.94221C12.1809 2.06528 12.25 2.2322 12.25 2.40625V4.8125C12.25 4.98655 12.1809 5.15347 12.0578 5.27654C11.9347 5.39961 11.7678 5.46875 11.5938 5.46875L10.5 4.375L8.5575 6.37C8.43445 6.49289 8.26766 6.56192 8.09375 6.56192C7.91984 6.56192 7.75305 6.49289 7.63 6.37Z"
                                                                fill="#26273B" fill-opacity="0.8" />
                                                        </svg>
                                                    </span>
                                                    <input type='checkbox' class='checkall-btn'id="checkall" />
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
                                                    <td class="border-right p-2 text-13 align-top">
                                                        <input type="hidden" readonly value="{{ $item->id }}"
                                                            name="listProduct[]">
                                                        <span class="ml-2 mr-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="6"
                                                                height="10" viewBox="0 0 6 10" fill="none">
                                                                <g clip-path="url(#clip0_1710_10941)">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z"
                                                                        fill="#282A30" />
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_1710_10941">
                                                                        <rect width="6" height="10"
                                                                            fill="white" />
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        </span>
                                                        <input type="checkbox" class="cb-element checkall-btn">
                                                        <input type="text" name="product_code[]"
                                                            class="border-0 pl-0 pr-2 py-1 w-75 searchProduct"
                                                            value="{{ $item->product_code }}"
                                                            @if ($import->status == 2) echo readonly @endif>
                                                        <ul id="listProductCode"
                                                            class="listProductCode bg-white position-absolute w-100 rounded shadow p-0 scroll-data"
                                                            style="z-index: 99; left: 24%; top: 75%;">
                                                        </ul>
                                                    </td>
                                                    <td class="border-right p-2 text-13 align-top position-relative">
                                                        <input id="searchProductName" type="text"
                                                            name="product_name[]"
                                                            class="searchProductName border-0 px-2 py-1 w-100"
                                                            value="{{ $item->product_name }}"
                                                            @if ($import->status == 2) echo readonly @endif>
                                                        <ul id="listProductName"
                                                            class="listProductName bg-white position-absolute w-100 rounded shadow p-0 scroll-data"
                                                            style="z-index: 99; left: 1%; top: 74%; display: none;">
                                                        </ul>
                                                    </td>
                                                    <td class="border-right p-2 text-13 align-top">
                                                        <input type="text" name="product_unit[]"
                                                            class="border-0 px-2 py-1 w-100 product_unit"
                                                            value="{{ $item->product_unit }}"
                                                            @if ($import->status == 2) echo readonly @endif>
                                                    </td>
                                                    <td class="border-right p-2 text-13 align-top">
                                                        <div class="">
                                                            <input {{-- oninput="checkQty(this,{{ $item->product_qty }})" --}} type="text"
                                                                name="product_qty[]"
                                                                class="border-0 px-2 py-1 w-100 quantity-input text-right"
                                                                value="{{ number_format($item->product_qty) }}"
                                                                @if ($import->status == 2) echo readonly @endif>
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
                                                            class="border-0 px-2 py-1 w-100 price_export text-right"
                                                            value="{{ fmod($item->price_export, 2) > 0 && fmod($item->price_export, 1) > 0 ? number_format($item->price_export, 2, '.', ',') : number_format($item->price_export) }}"
                                                            @if ($import->status == 2) echo readonly @endif>
                                                        <div class='mt-3 text-13-blue text-right transaction'
                                                            id="transaction" data-toggle="modal"
                                                            data-target="#recentModal">Giao dịch gần đây
                                                        </div>
                                                    </td>
                                                    <input type="hidden" class="product_tax1">
                                                    <td class="border-right pt-0 p-2 text-13 align-top">
                                                        <select name="product_tax[]" id=""
                                                            class="border-0 text-center product_tax mt-1">
                                                            {{-- <option value="0"
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
                                                            </option> --}}
                                                            @if ($item->product_tax == 0)
                                                                <option value="0">0%</option>
                                                            @elseif($item->product_tax == 8)
                                                                <option value="8">8%</option>
                                                            @elseif($item->product_tax == 10)
                                                                <option value="10">10%</option>
                                                            @else
                                                                <option value="99">NOVAT</option>
                                                            @endif
                                                        </select>
                                                    </td>
                                                    <td class="border-right p-2 text-13 align-top position-relative">
                                                        <input type="text" name="total_price[]"
                                                            class="text-right border-0 px-2 py-1 w-100 total_price"
                                                            readonly
                                                            value="{{ fmod($item->product_total, 2) > 0 && fmod($item->product_total, 1) > 0 ? number_format($item->product_total, 2, '.', ',') : number_format($item->product_total) }}">
                                                    </td>
                                                    <td class="border-right p-2 text-13 align-top">
                                                        <input placeholder="Nhập ghi chú" type="text"
                                                            name="product_note[]" class="border-0 px-2 py-1 w-100"
                                                            value="{{ $item->product_note }}"
                                                            @if ($import->status == 2) echo readonly @endif>
                                                    </td>
                                                    <td class="border-right p-2 text-13 align-top deleteRow">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="15" viewBox="0 0 16 15" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M12.3687 6.09375C12.6448 6.09375 12.8687 6.30362 12.8687 6.5625C12.8687 6.59865 12.8642 6.63468 12.8554 6.66986L11.3628 12.617C11.1502 13.4639 10.3441 14.0625 9.41597 14.0625H6.58403C5.65593 14.0625 4.84977 13.4639 4.6372 12.617L3.14459 6.66986C3.08135 6.41786 3.24798 6.16551 3.51678 6.10621C3.55431 6.09793 3.59274 6.09375 3.6313 6.09375H12.3687ZM8.5 0.9375C9.88071 0.9375 11 1.98683 11 3.28125H13C13.5523 3.28125 14 3.70099 14 4.21875V4.6875C14 4.94638 13.7761 5.15625 13.5 5.15625H2.5C2.22386 5.15625 2 4.94638 2 4.6875V4.21875C2 3.70099 2.44772 3.28125 3 3.28125H5C5 1.98683 6.11929 0.9375 7.5 0.9375H8.5ZM8.5 2.34375H7.5C6.94772 2.34375 6.5 2.76349 6.5 3.28125H9.5C9.5 2.76349 9.05228 2.34375 8.5 2.34375Z"
                                                                fill="#6B6F76"></path>
                                                        </svg>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                        </div>
                        <div class="content mt-3 ml-3">
                            <span class="text-perpage">
                                <section class="content">
                                    <div class="container-fluided">
                                        <div class="d-flex">
                                            <button type="button" data-toggle="dropdown"
                                                class="btn-save-print d-flex align-items-center h-100 py-1 px-2 rounded"
                                                id="addRowTable" style="margin-right:10px">
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

                                            <button type="button" data-toggle="dropdown"
                                                class="btn-save-print d-flex align-items-center h-100 py-1 px-2 rounded"
                                                id="" style="margin-right:10px">
                                                <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="14"
                                                    height="14" viewBox="0 0 18 18" fill="none">
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
                                                id="" style="margin-right:10px">
                                                <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="14"
                                                    height="14" viewBox="0 0 18 18" fill="none">
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
                                                <svg width="24" height="24" viewBox="0 0 24 24"
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
                                            </button>
                                        </div>
                                    </div>
                                </section>
                            </span>
                        </div>
                        <x-formsynthetic :import="''"></x-formsynthetic>
                    </div>
                </div>
            </section>
        </div>
        <div class="content-wrapper2 px-0 py-0">
            <div id="mySidenav" class="sidenav border">
                <div id="show_info_Guest">
                    <div class="bg-filter-search border-top-0 text-center border-custom">
                        <p class="font-weight-bold text-uppercase info-chung--heading text-center">THÔNG TIN SẢN PHẨM
                        </p>
                    </div>
                    <div class="d-flex justify-content-between py-2 px-3 border align-items-center text-left text-nowrap position-relative"
                        style="height:44px;" style="height:44px;">
                        <span class="text-13 btn-click" style="flex: 1.5;">
                            Nhà cung cấp
                        </span>
                        <span class="mx-1 text-13" style="flex: 2;">
                            <input type="text" placeholder="Chọn thông tin" {{-- value="{{ $import->getProvideName->provide_name_display }}" --}}
                                value="{{ $import->provide_name }}"
                                class="border-0 w-100 bg-input-guest py-0 py-2 px-2 nameGuest" id="myInput"
                                style="background-color:#F0F4FF; border-radius:4px;" autocomplete="off" required
                                name="provides_name" readonly>
                        </span>
                        <div class="d-flex align-items-center justify-content-between border-0">
                            <div id="myUL"
                                class="bg-white position-absolute rounded shadow p-1 list-guest z-index-block"
                                style="z-index: 99;display: none;">
                                <div class="p-1">
                                    <div class="position-relative">
                                        <input type="text" placeholder="Nhập thông tin"
                                            class="pr-4 w-100 input-search bg-input-guest" id="provideFilter">
                                        <span id="search-icon" class="search-icon"><i
                                                class="fas fa-search text-table" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <ul class="m-0 p-0 scroll-data">
                                    @foreach ($provides as $item)
                                        <li class="p-2 align-items-center text-wrap"
                                            style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                            <a href="javascript:void(0)" style="flex:2;" id="{{ $item->id }}"
                                                name="search-info" class="search-info">
                                                <span class="text-13-black">{{ $item->provide_name_display }}</span>
                                            </a>
                                            <a type="button" data-toggle="modal" data-target="#editProvide"
                                                data-id="{{ $item->id }}" class="search-infoEdit">
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
                                <a type="button"
                                    class="d-flex align-items-center p-2 position-sticky addGuestNew mt-2"
                                    data-toggle="modal" data-target="#provideModal"
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
                                        nhà cung cấp</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <ul class="p-0 m-0">
                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left position-relative"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Người đại diện</span>
                                <input readonly class="text-13-black w-50 border-0 bg-input-guest nameGuest"
                                    style="flex:2;" id="represent" {{-- value="@if ($import->getNameRepresent) {{ $import->getNameRepresent->represent_name }} @endif" --}}
                                    value="{{ $import->represent_name }}" name="represent_name" />
                                <ul id="listRepresent"
                                    class="bg-white position-absolute rounded shadow p-1 list-guest z-index-block scroll-data"
                                    style="z-index: 99;">
                                    <div class="p-1">
                                        <div class="position-relative">
                                            <input type="text" placeholder="Nhập thông tin"
                                                class="pr-4 w-100 input-search bg-input-guest" id="searchRepresent">
                                            <span id="search-icon" class="search-icon">
                                                <i class="fas fa-search text-table" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <ul class="m-0 p-0 scroll-data">
                                        @if ($represent)
                                            @foreach ($represent as $value)
                                                <li class="border" id="{{ $value->id }}">
                                                    <a href="javascript:void(0)"
                                                        class="text-dark d-flex justify-content-between p-2 search-info w-100 search-represent"
                                                        id="{{ $value->id }}" name="search-represent">
                                                        <span
                                                            class="w-100 text-nav text-dark overflow-hidden">{{ $value->represent_name }}</span>
                                                    </a>

                                                    <div class="dropdown">
                                                        <button type="button" data-toggle="dropdown"
                                                            class="btn-save-print d-flex align-items-center h-100"
                                                            style="margin-right:10px">
                                                            <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu date-form-setting"
                                                            style="z-index: 100;">
                                                            <a class="dropdown-item search-date-form"
                                                                data-toggle="modal" data-target="#modalAddRepresent"
                                                                data-name="represent" data-id="{{ $value->id }}"
                                                                id="{{ $value->id }}"><i
                                                                    class="fa-regular fa-pen-to-square"
                                                                    aria-hidden="true"></i></a>
                                                            <a class="dropdown-item delete-item" href="#"
                                                                data-id="{{ $value->id }}"
                                                                data-name="represent"><i class="fa-solid fa-trash-can"
                                                                    aria-hidden="true"></i></a>
                                                            <a class="dropdown-item set-default default-id {{ $value->represent_name }}"
                                                                id="default-id{{ $value->id }}" href="#"
                                                                data-name="represent" data-id="{{ $value->id }}">
                                                                <i class="fa-solid fa-link-slash"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                                {{-- <li class="p-2 align-items-center text-wrap"
                                                    style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                    <a href="javascript:void(0)" style="flex:2;"
                                                        id="{{ $value->id }}" name="search-represent"
                                                        class="search-represent">
                                                        <span
                                                            class="text-13-black">{{ $value->represent_name }}</span>
                                                    </a>
                                                    <a data-toggle="modal" data-target="#modalAddRepresent"
                                                        data-name="represent" data-id="{{ $value->id }}"
                                                        id="{{ $value->id }}" class="search-date-form"
                                                        style="flex:0;">
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
                                                </li> --}}
                                            @endforeach
                                        @endif
                                    </ul>
                                    <a type="button"
                                        class="d-flex align-items-center p-2 position-sticky addRepresent mt-2"
                                        data-toggle="modal" data-target="#modalAddRepresent"
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
                                            style="font-weight: 600 !important;">Thêm người đại diện</span>
                                    </a>
                                </ul>
                            </li>
                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left position-relative"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Đơn mua hàng</span>

                                <input tye="text" class="text-13-black w-50 border-0 bg-input-guest"
                                    name="quotation_number" style="flex:2;" placeholder="Chọn thông tin"
                                    value="{{ $import->quotation_number }}">
                            </li>
                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left position-relative"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Số tham chiếu</span>

                                <input tye="text" class="text-13-black w-50 border-0 bg-input-guest"
                                    name="reference_number" style="flex:2;" placeholder="Chọn thông tin"
                                    value="{{ $import->reference_number }}">
                            </li>
                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left position-relative"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Ngày báo giá</span>

                                <input tye="text" class="text-13-black w-50 border-0 bg-input-guest"
                                    id="datePicker" style="flex:2;" placeholder="Chọn thông tin"
                                    value="{{ date_format(new DateTime($import->created_at), 'd/m/Y') }}">
                                <input type="hidden" id="hiddenDateInput" name="date_quote"
                                    value="{{ $import->created_at->toDateString() }}">
                            </li>
                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left position-relative"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Hiệu lực báo giá</span>

                                <input tye="text" class="text-13-black w-50 border-0 bg-input-guest"
                                    id="price_effect" value="{{ $import->price_effect }}" name="price_effect"
                                    style="flex:2;" placeholder="Chọn thông tin" readonly
                                    @if ($id_priceeffect) data-id="{{ $id_priceeffect->id }}" @endif>
                                <ul id="listPriceEffect"
                                    class="bg-white position-absolute rounded shadow p-1 list-guest z-index-block scroll-data"
                                    style="z-index: 99;">
                                    <div class="p-1">
                                        <div class="position-relative">
                                            <input type="text" placeholder="Nhập thông tin"
                                                class="pr-4 w-100 input-search bg-input-guest" id="searchPriceEffect">
                                            <span id="search-icon" class="search-icon">
                                                <i class="fas fa-search text-table" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <ul class="m-0 p-0 scroll-data">
                                        @if ($price_effect)
                                            @foreach ($price_effect as $price)
                                                <li class="p-2 align-items-center text-wrap"
                                                    style="border-radius:4px;border-bottom: 1px solid #d6d6d6;"
                                                    id="{{ $price->id }}">
                                                    <a href="javascript:void(0)" style="flex:2;"
                                                        id="{{ $price->id }}" name="search-price-effect"
                                                        class="search-priceeffect search-price-effect">
                                                        <span class="text-13-black">{{ $price->form_name }}</span>
                                                    </a>

                                                    <div class="dropdown">
                                                        <button type="button" data-toggle="dropdown"
                                                            class="btn-save-print d-flex align-items-center h-100"
                                                            style="margin-right:10px">
                                                            <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu date-form-setting"
                                                            style="z-index: 100;">
                                                            <a class="dropdown-item search-date-form"
                                                                data-toggle="modal" data-target="#formModalquote"
                                                                data-name="import" data-id="{{ $price->id }}"
                                                                id="{{ $price->id }}"><i
                                                                    class="fa-regular fa-pen-to-square"
                                                                    aria-hidden="true"></i></a>
                                                            <a class="dropdown-item delete-item" href="#"
                                                                data-id="{{ $price->id }}"
                                                                data-name="priceeffect"><i
                                                                    class="fa-solid fa-trash-can"
                                                                    aria-hidden="true"></i></a>
                                                            <a class="dropdown-item set-default default-id"
                                                                id="default-id{{ $price->id }}" href="#"
                                                                data-name="import" data-id="{{ $price->id }}">
                                                                <i class="fa-solid fa-link" aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    {{-- <a type="button" data-target="#formModalquote"
                                                        data-name="import" data-id="{{ $price->id }}"
                                                        id="{{ $price->id }}" class="edit-guest">
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
                                                    </a> --}}
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                    <a type="button"
                                        class="d-flex align-items-center p-2 position-sticky addRepresent mt-2"
                                        data-toggle="modal" data-target="#formModalquote"
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
                                            style="font-weight: 600 !important;">Thêm hiệu lực báo giá</span>
                                    </a>
                                </ul>
                            </li>
                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left position-relative"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Điều khoản</span>
                                <input tye="text" class="text-13-black w-50 border-0 bg-input-guest"
                                    value="{{ $import->terms_pay }}" id="terms_pay" name="terms_pay"
                                    style="flex:2;" placeholder="Chọn thông tin" readonly
                                    @if ($id_termpay) data-id="{{ $id_termpay->id }}" @endif>
                                <ul id="listTermsPay"
                                    class="bg-white position-absolute rounded shadow p-1 list-guest z-index-block scroll-data"
                                    style="z-index: 99;">
                                    <div class="p-1">
                                        <div class="position-relative">
                                            <input type="text" placeholder="Nhập thông tin"
                                                class="pr-4 w-100 input-search bg-input-guest" id="searchTermsPay">
                                            <span id="search-icon" class="search-icon">
                                                <i class="fas fa-search text-table" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <ul class="m-0 p-0 scroll-data">
                                        @if ($terms_pay)
                                            @foreach ($terms_pay as $term)
                                                <li class="p-2 align-items-center text-wrap"
                                                    style="border-radius:4px;border-bottom: 1px solid #d6d6d6;"
                                                    id="{{ $term->id }}">
                                                    <a href="javascript:void(0)" style="flex:2;"
                                                        id="{{ $term->id }}" name="search-term-pay"
                                                        class="search-termpay search-term-pay">
                                                        <span class="text-13-black">{{ $term->form_name }}</span>
                                                    </a>

                                                    <div class="dropdown">
                                                        <button type="button" data-toggle="dropdown"
                                                            class="btn-save-print d-flex align-items-center h-100"
                                                            style="margin-right:10px">
                                                            <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu date-form-setting"
                                                            style="z-index: 100;">
                                                            <a class="dropdown-item search-date-form"
                                                                data-toggle="modal" data-target="#formModalquote"
                                                                data-name="import" data-id="{{ $term->id }}"
                                                                id="{{ $term->id }}"><i
                                                                    class="fa-regular fa-pen-to-square"
                                                                    aria-hidden="true"></i></a>
                                                            <a class="dropdown-item delete-item" href="#"
                                                                data-id="{{ $term->id }}"
                                                                data-name="priceeffect"><i
                                                                    class="fa-solid fa-trash-can"
                                                                    aria-hidden="true"></i></a>
                                                            <a class="dropdown-item set-default default-id"
                                                                id="default-id{{ $term->id }}" href="#"
                                                                data-name="import" data-id="{{ $term->id }}">
                                                                <i class="fa-solid fa-link" aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    {{-- <a type="button" data-target="#formModalquote"
                                                        data-name="import" data-id="{{ $term->id }}"
                                                        id="{{ $term->id }}" class="edit-guest">
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
                                                    </a> --}}
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                    <a type="button"
                                        class="d-flex align-items-center p-2 position-sticky addRepresent mt-2"
                                        data-toggle="modal" data-target="#formModalTermPay"
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
                                            style="font-weight: 600 !important;">Thêm điều khoản</span>
                                    </a>
                                </ul>
                            </li>
                            <li class="d-flex justify-content-between py-2 px-3 border align-items-center text-left position-relative"
                                style="height:44px;">
                                <span class="text-13 text-nowrap mr-3" style="flex: 1.5;">Dự án</span>

                                <input tye="text" class="text-13-black w-50 border-0 bg-input-guest"
                                    id="inputProject"
                                    value="@if ($import->getProjectName) {{ $import->getProjectName->project_name }} @endif"
                                    style="flex:2;" placeholder="Chọn thông tin">

                                <ul id="listProject"
                                    class="bg-white position-absolute rounded shadow p-1 list-guest z-index-block scroll-data"
                                    style="z-index: 99;">
                                    <div class="p-1">
                                        <div class="position-relative">
                                            <input type="text" placeholder="Nhập thông tin"
                                                class="pr-4 w-100 input-search bg-input-guest" id="searchTermsPay">
                                            <span id="search-icon" class="search-icon">
                                                <i class="fas fa-search text-table" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <ul class="m-0 p-0 scroll-data">
                                        @foreach ($project as $va)
                                            <li class="p-2 align-items-center text-wrap"
                                                style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                                <a href="javascript:void(0)" style="flex:2;"
                                                    id="{{ $va->id }}" name="project_name"
                                                    class="project_name">
                                                    <span class="text-13-black">{{ $va->project_name }}</span>
                                                </a>
                                                <!-- <a type="button" data-target="#formModalquote" data-name="import"
                                                        data-id="" id="" class="edit-guest">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                                <path d="M4.15625 1.75006C2.34406 1.75006 0.875 3.21912 0.875 5.03131V9.84377C0.875 11.656 2.34406 13.125 4.15625 13.125H8.96884C10.781 13.125 12.2501 11.656 12.2501 9.84377V7.00006C12.2501 6.63763 11.9563 6.34381 11.5938 6.34381C11.2314 6.34381 10.9376 6.63763 10.9376 7.00006V9.84377C10.9376 10.9311 10.0561 11.8125 8.96884 11.8125H4.15625C3.06894 11.8125 2.1875 10.9311 2.1875 9.84377V5.03131C2.1875 3.944 3.06894 3.06256 4.15625 3.06256H6.125C6.48743 3.06256 6.78125 2.76874 6.78125 2.40631C6.78125 2.04388 6.48743 1.75006 6.125 1.75006H4.15625Z" fill="black"/>
                                                                <path d="M10.6172 4.54529L9.37974 3.30785L5.7121 6.97547C5.05037 7.6372 4.5993 8.48001 4.41577 9.3977C4.40251 9.46402 4.46099 9.52247 4.52733 9.50926C5.44499 9.32568 6.2878 8.87462 6.94954 8.21291L10.6172 4.54529Z" fill="black"/>
                                                                <path d="M11.7739 1.27469C11.608 1.21937 11.4249 1.26257 11.3013 1.38627L10.3077 2.37977L11.5452 3.61721L12.5387 2.62371C12.6625 2.5 12.7056 2.31702 12.6503 2.15105C12.5124 1.73729 12.1877 1.41261 11.7739 1.27469Z" fill="black"/>
                                                            </svg>
                                                        </span>
                                                    </a> -->
                                            </li>
                                        @endforeach
                                    </ul>
                                    <a type="button"
                                        class="d-flex align-items-center p-2 position-sticky addRepresent mt-2"
                                        data-toggle="modal" data-target="#formModalTermPay"
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
                                            style="font-weight: 600 !important;">Thêm điều khoản</span>
                                    </a>
                                </ul>
                            </li>
                        </ul>
                    </div>
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


<x-form-modal-import title="Thêm mới người đại diện" name="addRepresent"
    idModal="modalAddRepresent"></x-form-modal-import>
<x-form-modal-import title="Hiệu lực báo giá" name="import" idModal="formModalquote"></x-form-modal-import>
<x-form-modal-import title="Điều khoản thanh toán" name="termpay" idModal="formModalTermPay"></x-form-modal-import>
<x-form-modal-import title="Chỉnh sửa nhà cung cấp" name="provide" idModal="editProvide"></x-form-modal-import>
<script src="{{ asset('/dist/js/products.js') }}"></script>
<script src="{{ asset('/dist/js/import.js') }}"></script>
<script>
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

    flatpickr("#datePicker", {
        locale: "vn",
        dateFormat: "d/m/Y",
        onChange: function(selectedDates, dateStr, instance) {
            // Cập nhật giá trị của trường ẩn khi người dùng chọn ngày
            document.getElementById("hiddenDateInput").value = instance.formatDate(selectedDates[0],
                "Y-m-d");
        }
    });

    getKeyProvide($('#getKeyProvide'));
    getKeyProvide($('#getKeyProvide1'));

    $('#addRowTable').off('click').on('click', function() {
        addRowTable(1);
    })

    $(document).click(function(event) {
        if ((!$(event.target).closest("#searchRepresent").length && !$(event.target).closest('#represent')
                .length) && !$(event.target).closest('.dropdown').length) {
            $('#listRepresent').hide();
        }
        if ((!$(event.target).closest('#price_effect').length && !$(event.target).closest('#searchPriceEffect')
                .length) && !$(event.target).closest('.dropdown').length) {
            $('#listPriceEffect').hide();
        }
        if ((!$(event.target).closest('#terms_pay').length && !$(event.target).closest('#searchTermsPay')
                .length) && !$(event.target).closest('.dropdown').length) {
            $('#listTermsPay').hide();
        }
    });

    function getAction(e) {
        $('#getAction').val($(e).find('button').val());
    }

    $('.search-info').click(function() {
        var provides_id = $(this).attr('id');
        var quotation_number = "{{ $import->quotation_number }}"
        var old_provide = {{ $import->provide_id }}
        $.ajax({
            url: "{{ route('show_provide') }}",
            type: "get",
            data: {
                provides_id: provides_id,
            },
            success: function(data) {
                if (data.key) {
                    if (old_provide == data['provide'].id) {
                        quotation = quotation_number
                    } else {
                        quotation = getQuotation(data.key, data['count'], data['date']);
                    }
                } else {
                    quotation = getQuotation(data['provide'].provide_name_display, data['count'],
                        data['date'])
                }
                $('input[name="quotation_number"]').val(quotation);
                $('#myInput').val(data['provide'].provide_name_display);
                $('#provides_id').val(data['provide'].id);


                $.ajax({
                    url: "{{ route('getDataForm') }}",
                    type: "get",
                    data: {
                        id: data['provide'].id,
                        status: 'add'
                    },
                    success: function(data) {
                        $('#listRepresent li').empty()
                        $('#listPriceEffect li').empty()
                        $('#listTermsPay li').empty()
                        $('#represent_id').val('')
                        $('#price_effect').val("")
                        $('#represent').val('')
                        $('#terms_pay').val("")
                        if (data['default_price'][0]) {
                            $('#price_effect').val(data['default_price'][0].form_desc)
                        }
                        if (data['default_term'][0]) {
                            $('#terms_pay').val(data['default_term'][0].form_desc)
                        }

                        data['represent'].forEach(function(element) {
                            var li =
                                `
                            <li class="border">
                                <a href="javascript:void(0)"
                                    class="text-dark d-flex justify-content-between p-2 search-represent w-100 search-represent"
                                    id="` + element.id + `" name="search-represent">
                                    <span class="w-100 text-nav text-dark overflow-hidden">` + element.represent_name + `</span>
                                </a>

                                <div class="dropdown">
                                    <button type="button" data-toggle="dropdown"
                                        class="btn-save-print d-flex align-items-center h-100"
                                        style="margin-right:10px">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                        <a class="dropdown-item search-date-form" data-toggle="modal"
                                            data-target="#modalAddRepresent" data-name="represent"
                                            data-id="` + element.id + `" id="` + element.id + `"><i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                        <a class="dropdown-item delete-item" href="#"
                                            data-id="` + element.id + `"
                                            data-name="represent"><i
                                            class="fa-solid fa-trash-can"></i></a>
                                        <a class="dropdown-item set-default default-id ` + element.represent_name + `"
                                            id="default-id` + element.id + `" href="#"
                                            data-name="represent"
                                            data-id="` + element.id + `">
                                            ` + (element.default === 1 ? '<i class="fa-solid fa-link-slash"></i>' :
                                    '<i class="fa-solid fa-link"></i>') + ` 
                                        </a>
                                    </div>
                                </div>
                            </li>
                            `;
                            $('#listRepresent .p-1').after(li);
                            if (element.default == 1) {
                                $('#represent').val(element.represent_name);
                                $('#represent_id').val(element.id);
                            }
                        });

                        data['price_effect'].forEach(function(element) {
                            var li =
                                `
                            <li class="border">
                                <a href="javascript:void(0)"
                                    class="text-dark d-flex justify-content-between p-2 search-priceeffect w-100 search-price-effect"
                                    id="` + element.id + `" name="search-price-effect">
                                    <span class="w-100 text-nav text-dark overflow-hidden">` + element.form_desc + `</span>
                                </a>

                                <div class="dropdown">
                                    <button type="button" data-toggle="dropdown"
                                        class="btn-save-print d-flex align-items-center h-100"
                                        style="margin-right:10px">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                        <a class="dropdown-item search-date-form" data-toggle="modal"
                                            data-target="#formModalquote" data-name="import"
                                            data-id="` + element.id + `" id="` + element.id + `"><i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                        <a class="dropdown-item delete-item" href="#"
                                            data-id="` + element.id + `"
                                            data-name="priceeffect"><i
                                            class="fa-solid fa-trash-can"></i></a>
                                        <a class="dropdown-item set-default default-id ` + element.form_desc + `"
                                            id="default-id` + element.id + `" href="#"
                                            data-name="import"
                                            data-id="` + element.id + `">
                                            ` + (element.default_form === 1 ?
                                    '<i class="fa-solid fa-link-slash"></i>' :
                                    '<i class="fa-solid fa-link"></i>') + ` 
                                        </a>
                                    </div>
                                </div>
                            </li>
                            `;
                            $('#listPriceEffect .p-1').after(li);
                        });

                        data['terms_pay'].forEach(function(element) {
                            var li =
                                `
                            <li class="border">
                                <a href="javascript:void(0)"
                                    class="text-dark d-flex justify-content-between p-2 search-termpay w-100 search-term-pay"
                                    id="` + element.id + `" name="search-term-pay">
                                    <span class="w-100 text-nav text-dark overflow-hidden">` + element.form_desc + `</span>
                                </a>

                                <div class="dropdown">
                                    <button type="button" data-toggle="dropdown"
                                        class="btn-save-print d-flex align-items-center h-100"
                                        style="margin-right:10px">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                        <a class="dropdown-item search-date-form" data-toggle="modal"
                                            data-target="#formModalquote" data-name="import"
                                            data-id="` + element.id + `" id="` + element.id + `"><i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                        <a class="dropdown-item delete-item" href="#"
                                            data-id="` + element.id + `"
                                            data-name="termpay"><i
                                            class="fa-solid fa-trash-can"></i></a>
                                        <a class="dropdown-item set-default default-id ` + element.form_desc + `"
                                            id="default-id` + element.id + `" href="#"
                                            data-name="termpay"
                                            data-id="` + element.id + `">
                                            ` + (element.default_form === 1 ?
                                    '<i class="fa-solid fa-link-slash"></i>' :
                                    '<i class="fa-solid fa-link"></i>') + ` 
                                        </a>
                                    </div>
                                </div>
                            </li>
                            `;
                            $('#listTermsPay .p-1').after(li);
                        });
                    }
                })
            }
        });
    });

    function showData(classname, inputShow, inputHide) {
        $(document).on('click', '.' + classname, function(e) {
            e.preventDefault();
            id = $(this).attr('id');
            table = $(this).attr('name');
            $.ajax({
                url: "{{ route('showData') }}",
                type: "get",
                data: {
                    id: id,
                    table: table,
                },
                success: function(data) {
                    if (data['table'] == "search-represent") {
                        $('#' + inputShow).val(data[table].represent_name)
                        $('#' + inputHide).val(data[table].id)
                    } else {
                        $(data['table'] == "search-price-effect" ? '#price_effect' : '#terms_pay')
                            .val(data[table].form_desc).attr('data-id', data[table].id)
                    }
                }
            })
        })
    }

    showData('search-represent', 'represent', 'represent_id')
    showData('search-price-effect', 'price_effect', '')
    showData('search-term-pay', 'terms_pay', '')



    // Ghim 
    $(document).on('click', '.set-default', function() {
        id = $(this).attr('data-id');
        form = $(this).attr('data-name');
        provides_id = $('#provides_id').val();
        $.ajax({
            url: "{{ route('setDefault') }}",
            type: "get",
            data: {
                id: id,
                provides_id: provides_id,
                form: form
            },
            success: function(data) {
                if (data['represent']) {
                    $('#represent').val(data['represent'].represent_name)
                    $('#represent_id').val(data['represent'].id)
                    $('#listRepresent').hide()

                    $.ajax({
                        url: "{{ route('addUserFlow') }}",
                        type: "get",
                        data: {
                            type: "DMH",
                            des: (data.status == 1 ? "Ghim người đại diện" :
                                "Xóa ghim người đại diện")
                        },
                        success: function(data) {}
                    })
                } else {
                    $(data['import'] ? '#price_effect' : '#terms_pay').val(
                        (data['import'] ? data['import'] : data['termpay']).form_desc)
                    $(data['import'] ? '#listPriceEffect' : '#listTermsPay').hide()

                    $.ajax({
                        url: "{{ route('addUserFlow') }}",
                        type: "get",
                        data: {
                            type: "DMH",
                            des: (data['price_effect'] ?
                                (data.status == 1 ? "Ghim hiệu lực báo giá" :
                                    "Xóa ghim hiệu lực báo giá") :
                                (data.status == 1 ? "Ghim điều khoản thanh toán" :
                                    "Xóa ghim điều khoản thanh toán"))
                        },
                        success: function(data) {}
                    })
                }

            }
        })
    })

    // Xóa người đại diện
    $(document).on('click', '.delete-item', function() {
        id = $(this).attr('data-id')
        table = $(this).attr('data-name')
        $.ajax({
            url: "{{ route('deleteForm') }}",
            type: "get",
            data: {
                id: id,
                table: table
            },
            success: function(data) {
                if (data.success) {
                    if (data.list == "represent") {
                        var inputName = $('#represent')
                    } else if (data.list == "listPriceEffect") {
                        var inputName = $('#price_effect')
                    } else {
                        var inputName = $('#terms_pay')
                    }
                    if (data.id == $(inputName).attr('data-id')) {
                        $(inputName).val('')
                    }
                    $('#' + data.list + ' li#' + data.id).remove();
                    showNotification('success', data.msg)

                    $.ajax({
                        url: "{{ route('addUserFlow') }}",
                        type: "get",
                        data: {
                            type: "DMH",
                            des: "Xóa người đại diện"
                        },
                        success: function(data) {}
                    })
                } else {
                    showNotification('warning', data.msg)
                }
            }
        })
    })


    // Chỉnh sửa thông tin
    $(document).on('click', '.search-date-form', function() {
        var id = $(this).data('id');
        var table = $(this).attr('data-name')
        if (id) {
            $.ajax({
                url: "{{ route('getDataForm') }}",
                type: "get",
                data: {
                    id: id,
                    status: 'eidt',
                    table: table
                },
                success: function(data) {
                    if (data['represent']) {
                        $('input[name="provide_represent_new"]').val(data['represent']
                            .represent_name)
                        $('input[name="provide_email_new"]').val(data['represent'].represent_email)
                        $('input[name="provide_phone_new"]').val(data['represent'].represent_phone)
                        $('input[name="provide_address_delivery_new"]').val(data['represent']
                            .represent_address)
                        $('#modalAddRepresent #exampleModalLabel').text('Cập nhật')
                        $('#addRepresent').attr('data-id', data['represent'].id).text('Cập nhật')
                    } else {
                        $('#form-name-' + data['table']).val(data[data['table']].form_name)
                        $('#form-desc-' + data['table']).val(data[data['table']].form_desc)
                        $('#form_field').val(data[data['table']].form_field)
                        $('#formModalquote #exampleModalLabel').text('Cập nhật')
                        $('#' + data['table']).attr('data-id', data[data['table']].id).text(
                            'Cập nhật')
                    }
                }
            })

        }
    })

    $(document).on('click', '.search-infoEdit', function() {
        var id = $(this).data('id');
        if (id) {
            $.ajax({
                url: "{{ route('getDataForm') }}",
                type: "get",
                data: {
                    id: id,
                    status: 'eidt',
                },
                success: function(data) {
                    $('#editProvide input[name="provide_name_display"]').val(data
                        .provide_name_display)
                    $('#editProvide input[name="provide_code"]').val(data.provide_code)
                    $('#editProvide input[name="provide_address"]').val(data.provide_address)
                    $('#editProvide input[name="key"]').val(data.key)
                    $('#editProvide input[name="provide_name"]').val(data.provide_name)
                    $('#editProvide #editProvide').attr('data-id', data.id)
                }
            })
        }
    })


    function actionForm(id, routeAdd, routeEdit) {
        $('#' + id).click(function() {
            // console.log(id);
            var status = $(this).text().trim();
            var provide_represent = $("input[name='provide_represent_new']").val().trim();
            var provide_email = $("input[name='provide_email_new']").val().trim();
            var provide_phone = $("input[name='provide_phone_new']").val().trim();
            var provide_address_delivery = $("input[name='provide_address_delivery_new']").val().trim();

            if (status == 'Thêm mới') {
                if ((provides_id == "" || provide_represent == "") && id == 'addRepresent') {
                    showNotification('warning', 'Vui lòng nhập tên người đại diện')
                } else {
                    if (id == 'addRepresent') {
                        provides_id = $('#provides_id').val();
                        $.ajax({
                            url: routeAdd,
                            type: "get",
                            data: {
                                table: id,
                                provides_id: provides_id,
                                provide_represent: provide_represent,
                                provide_email: provide_email,
                                provide_phone: provide_phone,
                                provide_address_delivery: provide_address_delivery
                            },
                            success: function(data) {
                                if (data.success) {
                                    $("input[name='provide_represent_new']").val('')
                                    $("input[name='provide_email_new']").val('')
                                    $("input[name='provide_phone_new']").val('')
                                    $("input[name='provide_address_delivery_new']").val('')
                                    $('#' + id).closest('div').find('.closeModal')[0].click()
                                    $('#represent_id').val(data.id)
                                    $('#represent').val(data.data)
                                    var newli = `
                                    <li class="border" id="` + data.id +
                                        `">
                                    <a href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-info w-100 search-represent" id="` +
                                        data.id + `" name="search-represent">
                                        <span class="w-100 text-nav text-dark overflow-hidden">` + data.data +
                                        `</span>
                                    </a>

                                    <div class="dropdown">
                                        <button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100" style="margin-right:10px">
                                            <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                        </button>
                                    <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                        <a class="dropdown-item search-date-form" data-toggle="modal" data-target="#modalAddRepresent" data-name="represent" data-id="` +
                                        data.id + `" id="` + data.id + `"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>
                                        <a class="dropdown-item delete-item" href="#" data-id="` + data.id + `" data-name="represent"><i class="fa-solid fa-trash-can" aria-hidden="true"></i></a>
                                        <a class="dropdown-item set-default default-id ` + data.data +
                                        `" id="default-id` + data.id +
                                        `" href="#" data-name="represent" data-id="` + data.id + `">
                                            <i class="fa-solid fa-link-slash" aria-hidden="true"></i> 
                                        </a>
                                    </div>
                                    </div>
                                    </li>
                                    `
                                    $('#listRepresent .p-1').after(newli)
                                }
                                showNotification('success', data.msg)
                                $.ajax({
                                    url: "{{ route('addUserFlow') }}",
                                    type: "get",
                                    data: {
                                        type: "DMH",
                                        des: "Thêm mới người đại diện"
                                    },
                                    success: function(data) {}
                                })
                            }
                        })
                    } else {
                        inputName = $('#form-name-' + id).val().trim();
                        inputDesc = $('#form-desc-' + id).val()
                        $.ajax({
                            url: routeAdd,
                            type: "get",
                            data: {
                                table: id,
                                inputName: inputName,
                                inputDesc: inputDesc,
                            },
                            success: function(data) {
                                if (data.success) {
                                    $('#form-name-' + id).val('')
                                    $('#form-desc-' + id).val('')
                                    $('#' + id).closest('div').find('.closeModal')[0].click()
                                    $(id == "import" ? '#price_effect' : '#terms_pay').val(data
                                        .data);
                                    $(id == "import" ? '#price_effect' : '#terms_pay').attr(
                                        'data-id', data.id);
                                    if (id == "import") {
                                        var price_effect = `
                                        <li class="border" id="` + data.id +
                                            `">
                                            <a href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-info w-100 search-price-effect" id="` +
                                            data.id + `" name="search-price-effect">
                                                <span class="w-100 text-nav text-dark overflow-hidden">` + data
                                            .inputName +
                                            `</span>
                                            </a>

                                            <div class="dropdown">
                                                <button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100" style="margin-right:10px">
                                                    <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                                </button>
                                                <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                                    <a class="dropdown-item search-date-form" data-toggle="modal" data-target="#formModalquote" data-name="import" data-id="` +
                                            data.id + `" id="` + data.id + `"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>
                                                    <a class="dropdown-item delete-item" href="#" data-id="` + data
                                            .id + `" data-name="priceeffect"><i class="fa-solid fa-trash-can" aria-hidden="true"></i></a>
                                                    <a class="dropdown-item set-default default-id ` + data.data +
                                            `" id="default-id` + data.id +
                                            `" href="#" data-name="import" data-id="` + data.id + `">
                                                        <i class="fa-solid fa-link" aria-hidden="true"></i> 
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        `
                                    } else {
                                        var term_pay = `
                                        <li class="border" id="` + data.id +
                                            `">
                                            <a href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-info w-100 search-term-pay" id="` +
                                            data.id + `" name="search-term-pay">
                                                <span class="w-100 text-nav text-dark overflow-hidden">` + data
                                            .inputName +
                                            `</span>
                                            </a>

                                            <div class="dropdown">
                                                <button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100" style="margin-right:10px">
                                                    <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                                </button>
                                                <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                                    <a class="dropdown-item search-date-form" data-toggle="modal" data-target="#formModalquote" data-name="import" data-id="` +
                                            data.id + `" id="` + data.id + `"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>
                                                    <a class="dropdown-item delete-item" href="#" data-id="` + data
                                            .id + `" data-name="termpay"><i class="fa-solid fa-trash-can" aria-hidden="true"></i></a>
                                                    <a class="dropdown-item set-default default-id ` + data.data +
                                            `" id="default-id` + data.id +
                                            `" href="#" data-name="termpay" data-id="` + data.id + `">
                                                        <i class="fa-solid fa-link" aria-hidden="true"></i> 
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        `
                                    }
                                    $(id == "import" ? $('#listPriceEffect .p-1').after(
                                        price_effect) : $('#listTermsPay .p-1').after(
                                        term_pay))

                                    showNotification('success', data.msg)

                                    $.ajax({
                                        url: "{{ route('addUserFlow') }}",
                                        type: "get",
                                        data: {
                                            type: "DMH",
                                            des: (id == "import" ?
                                                "Thêm mới hiệu lực báo giá" :
                                                "Thêm mới điều khoản")
                                        },
                                        success: function(data) {}
                                    })
                                } else {
                                    showNotification('warning', data.msg)
                                }
                            }
                        })
                    }
                }
            } else {
                present_id = $(this).attr('data-id');
                if (id == 'addRepresent') {
                    $.ajax({
                        url: routeEdit,
                        type: "get",
                        data: {
                            table: id,
                            present_id: present_id,
                            provide_represent: provide_represent,
                            provide_email: provide_email,
                            provide_phone: provide_phone,
                            provide_address_delivery: provide_address_delivery
                        },
                        success: function(data) {
                            if (data.success) {
                                $('#' + id).closest('div').find('.closeModal')[0].click()
                                showNotification('success', data.msg)
                                if (data.id == $('#represent_id').val()) {
                                    $('#represent').val(data.data)
                                }
                                $('#listRepresent').find('li#' + data.id + " span").text(data.data)
                                $.ajax({
                                    url: "{{ route('addUserFlow') }}",
                                    type: "get",
                                    data: {
                                        type: "DMH",
                                        des: "Chỉnh sửa người đại diện"
                                    },
                                    success: function(data) {}
                                })
                            } else {
                                showNotification('warning', data.msg)
                            }
                        }
                    })
                } else {
                    inputName = $('#form-name-' + id).val().trim();
                    inputDesc = $('#form-desc-' + id).val()
                    inputField = $('#form_field').val()
                    $.ajax({
                        url: routeEdit,
                        type: "get",
                        data: {
                            table: id,
                            present_id: present_id,
                            inputName: inputName,
                            inputDesc: inputDesc,
                            inputField: inputField
                        },
                        success: function(data) {
                            if (data.success) {
                                var get_dataID = (inputField == "import" ? $('#price_effect').data(
                                    'id') : $('#terms_pay').data('id'))
                                if (get_dataID != null) {
                                    if (get_dataID == data.id) {
                                        $('#' + (inputField == "import" ? "price_effect" :
                                                "terms_pay"))
                                            .val(data.form_desc)
                                    }
                                }
                                $('#' + (inputField == "import" ? "listPriceEffect" :
                                    "listTermsPay")).find(
                                    'li#' + data.id + " span").text(data.form_name)
                                $('#' + id).closest('div').find('.closeModal')[0].click()
                                showNotification('success', data.msg)

                                $.ajax({
                                    url: "{{ route('addUserFlow') }}",
                                    type: "get",
                                    data: {
                                        type: "DMH",
                                        des: (id == "import" ?
                                            "Chỉnh sửa hiệu lực báo giá" :
                                            "Chỉnh sửa điều khoản")
                                    },
                                    success: function(data) {}
                                })
                            } else {
                                showNotification('warning', data.msg)
                            }
                        }
                    })
                }
            }
        })

    }

    actionForm('addRepresent', '{{ route('addNewForm') }}', '{{ route('updateForm') }}')
    actionForm('import', '{{ route('addNewForm') }}', '{{ route('updateForm') }}')
    actionForm('termpay', '{{ route('addNewForm') }}', '{{ route('updateForm') }}')



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
        var key = $("input[name='key']").val().trim();
        if (provide_name_display == '') {
            showNotification('warning', 'Vui lòng nhập Tên hiển thị')
            check = true;
            return false;
        }
        if (provide_code == '') {
            showNotification('warning', 'Vui lòng nhập Mã số thuế')
            check = true;
            return false;
        }
        if (provide_address == '') {
            showNotification('warning', 'Vui lòng nhập Địa chỉ nhà cung cấp')
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
                    provide_address_delivery: provide_address_delivery,
                    key : key
                },
                success: function(data) {
                    $('#listPriceEffect li').empty();
                    $('#listTermsPay li').empty();
                    if (data.success == true) {
                        quotation = getQuotation(data.key, '1')
                        $('#myInput').val(data.name);
                        $('#provides_id').val(data.id);
                        showNotification('success', data.msg)
                        $('.modal [data-dismiss="modal"]').click();
                        $("input[name='provide_name_display']").val('');
                        $("input[name='provide_code']").val('');
                        $("input[name='provide_address']").val('');
                        $("input[name='provide_name']").val('');
                        $("input[name='provide_represent']").val('');
                        $("input[name='provide_email']").val('');
                        $("input[name='provide_phone']").val('');
                        $("input[name='provide_address_delivery']").val('');
                        if (data.id) {
                            var newLi = `
                            <li class="p-2 align-items-center text-wrap" style="border-radius:4px;border-bottom: 1px solid #d6d6d6;">
                                            <a href="javascript:void(0)" style="flex:2" id="` + data.id + `" name="search-info" class="search-info">
                                                <span class="text-13-black">` + data.name +
                                `</span>
                                            </a>
                                            <a id="" class="search-infoEdit" type="button" data-toggle="modal" data-target="#editProvide" data-id="` +
                                data.id + `">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                        <path d="M4.15625 1.75006C2.34406 1.75006 0.875 3.21912 0.875 5.03131V9.84377C0.875 11.656 2.34406 13.125 4.15625 13.125H8.96884C10.781 13.125 12.2501 11.656 12.2501 9.84377V7.00006C12.2501 6.63763 11.9563 6.34381 11.5938 6.34381C11.2314 6.34381 10.9376 6.63763 10.9376 7.00006V9.84377C10.9376 10.9311 10.0561 11.8125 8.96884 11.8125H4.15625C3.06894 11.8125 2.1875 10.9311 2.1875 9.84377V5.03131C2.1875 3.944 3.06894 3.06256 4.15625 3.06256H6.125C6.48743 3.06256 6.78125 2.76874 6.78125 2.40631C6.78125 2.04388 6.48743 1.75006 6.125 1.75006H4.15625Z" fill="black"></path>
                                                        <path d="M10.6172 4.54529L9.37974 3.30785L5.7121 6.97547C5.05037 7.6372 4.5993 8.48001 4.41577 9.3977C4.40251 9.46402 4.46099 9.52247 4.52733 9.50926C5.44499 9.32568 6.2878 8.87462 6.94954 8.21291L10.6172 4.54529Z" fill="black"></path>
                                                        <path d="M11.7739 1.27469C11.608 1.21937 11.4249 1.26257 11.3013 1.38627L10.3077 2.37977L11.5452 3.61721L12.5387 2.62371C12.6625 2.5 12.7056 2.31702 12.6503 2.15105C12.5124 1.73729 12.1877 1.41261 11.7739 1.27469Z" fill="black"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </li>
                            `;
                            $('#myUL .p-1').after(newLi)
                        }

                        if (data.price_effect) {
                            data.price_effect.forEach(function(element) {
                                var li = `
                            <li class="border" id="` +
                                    element.id +
                                    `">
                                <a href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-info w-100 search-price-effect" id="` +
                                    element.id + `" name="search-price-effect">
                                    <span class="w-100 text-nav text-dark overflow-hidden">` + element.form_name +
                                    `</span>
                                </a>
                                <div class="dropdown">
                                    <button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100" style="margin-right:10px">
                                        <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                        <a class="dropdown-item search-date-form" data-toggle="modal" data-target="#formModalquote" data-name="import" data-id="` +
                                    element.id + `" id="` +
                                    element.id + `"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>
                                        <a class="dropdown-item delete-item" href="#" data-id="` +
                                    element.id + `" data-name="priceeffect"><i class="fa-solid fa-trash-can" aria-hidden="true"></i></a>
                                        <a class="dropdown-item set-default default-id ` +
                                    element.form_name + `" id="default-id` +
                                    element.id + `" href="#" data-name="import" data-id="` +
                                    element.id + `">
                                            <i class="fa-solid fa-link" aria-hidden="true"></i> 
                                        </a>
                                    </div>
                                </div>
                            </li>
                            `;
                                $('#listPriceEffect .p-1').after(li);
                            })

                        }

                        if (data.terms_pay) {
                            data.terms_pay.forEach(function(element) {
                                var li = `
                                <li class="border" id="` + element.id +
                                    `">
                                <a href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-info w-100 search-term-pay" id="` +
                                    element.id + `" name="search-term-pay">
                                    <span class="w-100 text-nav text-dark overflow-hidden">` + element.form_name +
                                    `</span>
                                </a>
                                <div class="dropdown">
                                    <button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100" style="margin-right:10px">
                                        <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                        <a class="dropdown-item search-date-form" data-toggle="modal" data-target="#formModalquote" data-name="import" data-id="2" id="` +
                                    element.id + `"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>
                                        <a class="dropdown-item delete-item" href="#" data-id="` + element.id + `" data-name="termpay"><i class="fa-solid fa-trash-can" aria-hidden="true"></i></a>
                                        <a class="dropdown-item set-default default-id ` + element.form_desc +
                                    `" id="default-id` + element.id +
                                    `" href="#" data-name="termpay" data-id="` + element
                                    .id + `">
                                            <i class="fa-solid fa-link" aria-hidden="true"></i> 
                                        </a>
                                    </div>
                                </div>
                            </li>
                            `;
                                $('#listTermsPay .p-1').after(li);
                            })

                        }

                        if (data.id_represent) {
                            $('#represent').val(data.represent_name)
                            $('#represent_id').val(data.id_represent)
                            var newli = `
                                    <li class="border" id="` + data.id_represent +
                                `">
                                    <a href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-info w-100 search-represent" id="` +
                                data.id_represent + `" name="search-represent">
                                        <span class="w-100 text-nav text-dark overflow-hidden">` + data
                                .represent_name +
                                `</span>
                                    </a>
                                    <div class="dropdown">
                                        <button type="button" data-toggle="dropdown" class="btn-save-print d-flex align-items-center h-100" style="margin-right:10px">
                                            <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                        </button>
                                    <div class="dropdown-menu date-form-setting" style="z-index: 100;">
                                        <a class="dropdown-item search-date-form" data-toggle="modal" data-target="#modalAddRepresent" data-name="represent" data-id="` +
                                data.id_represent + `" id="` + data.id_represent + `"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>
                                        <a class="dropdown-item delete-item" href="#" data-id="` + data.id_represent + `" data-name="represent"><i class="fa-solid fa-trash-can" aria-hidden="true"></i></a>
                                        <a class="dropdown-item set-default default-id ` + data.represent_name +
                                `" id="default-id` + data.id_represent +
                                `" href="#" data-name="represent" data-id="` + data.id_represent + `">
                                            <i class="fa-solid fa-link-slash" aria-hidden="true"></i> 
                                        </a>
                                    </div>
                                    </div>
                                    </li>
                                    `
                            $('#listRepresent .p-1').after(newli)
                        }
                        $('#more_info').show();

                        $.ajax({
                            url: "{{ route('addUserFlow') }}",
                            type: "get",
                            data: {
                                type: "DMH",
                                des: "Thêm mới nhà cung cấp"
                            },
                            success: function(data) {}
                        })
                    } else {
                        if (data.key) {
                            $("input[name='key']").val(data.key)
                            showNotification('warning', data.msg);
                            delayAndShowNotification('success', 'Tên viết tắt đã được thay đổi',
                                500);
                        } else {
                            showNotification('warning', data.msg)
                        }
                    }
                }
            });
        }
    })

    getProduct('searchProductName');

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
            $.ajax({
                url: "{{ route('getAllProducts') }}",
                type: "get",
                success: function(result) {
                    listProductName.empty()
                    var createLi =
                        '<a class="bg-dark d-flex justify-content-between p-2 position-sticky">' +
                        '<span class="w-100 text-white">Thêm mới</span>' +
                        '</a>';
                    result.forEach(element => {
                        var UL = '<li>' +
                            '<a href="javascript:void(0)" class="text-dark d-flex justify-content-between w-100 p-2 search-name" id="' +
                            element.id + ' "data-code="' + element.product_code +
                            '"data-tax="' + element
                            .product_tax +
                            '"data-priceExport= "' +
                            element.product_price_export +
                            '"data-unit="' + element.product_unit + '" "data-name="' +
                            element.product_name +
                            '""name="search-product">' +
                            '<span class="w-100" data-id="' + element.id + '">' + element
                            .product_name + '</span>' +
                            '</a>' +
                            '</li>';
                        listProductName.append(UL);
                    });

                    $('.search-name').on('click', function() {
                        inputCode.val($(this).attr(
                                'data-code') == null ?
                            "" : $(this).attr(
                                'data-code'))
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
                    })
                }
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

    $('form').on('submit', function(e) {
        e.preventDefault();
        var quotetion_number = $('input[name="quotation_number"]').val();
        var detail_id = {{ $import->id }}
        var provide_id = $('#provides_id').val()
        var formSubmit = true;
        if (!checkProduct()) {
            formSubmit = false
        }
        if (formSubmit) {
            $.ajax({
                url: "{{ route('checkQuotetion') }}",
                type: "get",
                data: {
                    quotetion_number: quotetion_number,
                    detail_id: detail_id,
                    provide_id: provide_id
                },
                success: function(data) {
                    if (!data['status']) {
                        showNotification('warning', 'Số báo giá đã tồn tại')
                    } else {
                        $.ajax({
                            url: "{{ route('addUserFlow') }}",
                            type: "get",
                            data: {
                                type: "DMH",
                                des: "Chỉnh sửa đơn mua hàng"
                            },
                            success: function(data) {}
                        })
                        $('form')[1].submit();
                    }
                }
            })
        }
    })

    $(document).on('click', '.closeModal', function(e) {
        e.preventDefault();
        $("input[name='provide_represent_new']").val('')
        $("input[name='provide_email_new']").val('')
        $("input[name='provide_phone_new']").val('')
        $("input[name='provide_address_delivery_new']").val('')
        $("input[name='form-name-import']").val('')
        $("input[name='form-desc-import']").val('')
    })


    $('.modal-dialog #editProvide').on('click', function(e) {
        e.preventDefault();
        var id = $('.modal-dialog #editProvide').data('id');
        var check = false;
        var provide_name_display = $("#editProvide input[name='provide_name_display']").val().trim();
        var provide_code = $("#editProvide input[name='provide_code']").val().trim();
        var provide_address = $("#editProvide input[name='provide_address']").val().trim();
        var key = $("#editProvide input[name='key']").val().trim();
        var provide_name = $("#editProvide input[name='provide_name']").val().trim();
        if (provide_name_display == '') {
            showNotification('warning', 'Vui lòng nhập tên hiển thị')
            check = true;
            return false;
        }
        if (provide_code == '') {
            showNotification('warning', 'Vui lòng nhập mã số thuế')
            check = true;
            return false;
        }
        if (provide_address == '') {
            showNotification('warning', 'Vui lòng nhập địa chỉ nhà cung cấp')
            check = true;
            return false;
        }
        if (!check) {
            $.ajax({
                url: "{{ route('updateProvide') }}",
                type: "get",
                data: {
                    id: id,
                    provide_name_display: provide_name_display,
                    provide_code: provide_code,
                    provide_address: provide_address,
                    key: key,
                    provide_name: provide_name,
                },
                success: function(data) {
                    console.log(data);
                    if (data.success) {
                        $('.btn.btn-secondary').click()
                        if (data.provide_id == $('#provides_id').val()) {
                            $('#myInput').val(provide_name_display)
                            $("input[name='provide_name_display']").val(data.resultNumber)
                        }
                        $('#myUL ul li').find('a#' + data.provide_id + " span").text(
                            provide_name_display)
                        $("#editProvide input[name='provide_name_display']").val('')
                        $("#editProvide input[name='provide_code']").val('')
                        $("#editProvide input[name='provide_address']").val('')
                        $("#editProvide input[name='key']").val('')
                        $("#editProvide input[name='provide_name']").val('')
                        showNotification('success', 'Chỉnh sửa thông tin thành công !')


                        $.ajax({
                            url: "{{ route('addUserFlow') }}",
                            type: "get",
                            data: {
                                type: "DMH",
                                des: "Chỉnh sửa nhà cung cấp"
                            },
                            success: function(data) {}
                        })
                    } else {
                        showNotification('warning', 'Nhà cung cấp đã tồn tại !')
                    }
                }
            })
        }
    })


    function delayAndShowNotification(type, message, delayTime) {
        setTimeout(function() {
            showNotification(type, message);
        }, delayTime);
    }
</script>
</body>

</html>
