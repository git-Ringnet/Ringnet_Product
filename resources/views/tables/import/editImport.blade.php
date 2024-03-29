<x-navbar :title="$title" activeGroup="buy" activeName="import"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<form action="{{ route('import.update', ['workspace' => $workspacename, 'import' => $import->id]) }}" method="POST">
    <div class="content-wrapper1 py-2">
        <!-- Content Header (Page header) -->
        @method('PUT')
        @csrf
        <input type="hidden" id="provides_id" name="provides_id" value="{{ $import->provide_id }}">
        <input type="hidden" id="project_id" name="project_id" value="{{ $import->project_id }}">
        <input type="hidden" id="represent_id" name="represent_id" value="{{ $import->represent_id }}">
        <div class="d-flex justify-content-between align-items-center pl-4 ml-1">
            <div class="container-fluided">
                <div class="mb">
                    <span class="font-weight-bold">Mua hàng</span>
                    <span class="mx-2">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8"></path>
                        </svg>
                    </span>
                    <span class="font-weight-bold">Đơn mua hàng</span>
                    <span class="mx-2">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8"></path>
                        </svg>
                    </span>
                    <span>Chỉnh sửa đơn mua hàng</span>
                </div>
            </div>
            <div class="container-fluided z-index-block">
                <div class="row m-0">
                    <a href="{{ route('import.index', $workspacename) }}">
                        <button type="button" class="btn-save-print rounded d-flex align-items-center h-100"
                            style="margin-right:10px">
                            <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z"
                                    fill="#6D7075"></path>
                            </svg>
                            <span class="text-button">Hủy</span>
                        </button>
                    </a>

                    @if ($import->status == 1)
                        <a href="#" onclick="getAction(this)">
                            <button name="action" value="action_1" type="submit"
                                class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                                <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M3.75528 1.6875H5.99476H11.9948H12.123C12.3939 1.6875 12.6621 1.74088 12.9123 1.84459C13.1626 1.94829 13.3899 2.10029 13.5814 2.29189L15.7022 4.41269C16.089 4.79939 16.3064 5.32394 16.3065 5.87088V14.25C16.3065 14.797 16.0892 15.3216 15.7024 15.7084C15.3156 16.0952 14.791 16.3125 14.244 16.3125H12.75H5.25H3.83328C3.28894 16.3125 2.76666 16.0973 2.38031 15.7139C1.99396 15.3304 1.77486 14.8098 1.77078 14.2655L1.69278 3.76547C1.69074 3.49333 1.74258 3.22344 1.84531 2.97143C1.94805 2.71941 2.09965 2.49021 2.29137 2.29705C2.4831 2.10389 2.71115 1.95058 2.9624 1.84597C3.21364 1.74135 3.48312 1.68749 3.75528 1.6875ZM5.8125 15.1875H12.1875V9.9645C12.1875 9.74238 12.0071 9.5625 11.7862 9.5625H6.2145C5.99266 9.5625 5.8125 9.74266 5.8125 9.9645V15.1875ZM13.3125 15.1875V9.9645C13.3125 9.12163 12.6289 8.4375 11.7862 8.4375H6.2145C5.37134 8.4375 4.6875 9.12134 4.6875 9.9645V15.1875H3.83326C3.58582 15.1875 3.34842 15.0897 3.17281 14.9154C2.9972 14.7411 2.89761 14.5044 2.89574 14.257L2.81774 3.75703C2.81682 3.63333 2.84038 3.51066 2.88708 3.39611C2.93378 3.28155 3.00269 3.17737 3.08983 3.08957C3.17698 3.00177 3.28064 2.93208 3.39485 2.88453C3.50905 2.83698 3.63154 2.8125 3.75524 2.8125H5.43226V5.18175C5.43226 5.52985 5.57054 5.86369 5.81668 6.10983C6.06282 6.35597 6.39666 6.49425 6.74476 6.49425H11.2448C11.5929 6.49425 11.9267 6.35597 12.1728 6.10983C12.419 5.86369 12.5573 5.52985 12.5573 5.18175V2.91925C12.6414 2.96326 12.7185 3.01991 12.7858 3.08725L14.9068 5.20831C15.0826 5.38405 15.1814 5.62254 15.1815 5.87112V14.25C15.1815 14.4986 15.0827 14.7371 14.9069 14.9129C14.7311 15.0887 14.4926 15.1875 14.244 15.1875H13.3125ZM11.4323 5.18175V2.8125H6.55726V5.18175C6.55726 5.23148 6.57701 5.27917 6.61218 5.31433C6.64734 5.3495 6.69503 5.36925 6.74476 5.36925H11.2448C11.2945 5.36925 11.3422 5.3495 11.3773 5.31433C11.4125 5.27917 11.4323 5.23148 11.4323 5.18175Z"
                                        fill="white" />
                                </svg>
                                <span class="text-button">Lưu</span>
                            </button>
                        </a>
                    @endif

                    @if ($import->status == 2)
                        <a href="{{ route('import.index', $workspacename) }}" class="mr-2">
                            <span class="btn-secondary d-flex align-items-center h-100">
                                <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="10"
                                    viewBox="0 0 6 10" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.76877 0.231232C6.07708 0.53954 6.07708 1.03941 5.76877 1.34772L2.11648 5L5.76877 8.65228C6.07708 8.96059 6.07708 9.46046 5.76877 9.76877C5.46046 10.0771 4.96059 10.0771 4.65228 9.76877L0.441758 5.55824C0.13345 5.24993 0.13345 4.75007 0.441758 4.44176L4.65228 0.231231C4.96059 -0.0770772 5.46046 -0.0770772 5.76877 0.231232Z"
                                        fill="#42526E" />
                                </svg>
                                <span>Trở về</span>
                            </span>
                        </a>
                    @endif

                    <span id="sideProvide" class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                            fill="none">
                            <path
                                d="M14 10C14 12.2091 12.2091 14 10 14L4 14C1.7909 14 0 12.2091 0 10L0 4C0 1.79086 1.7909 0 4 0L10 0C12.2091 0 14 1.79086 14 4L14 10ZM9 12.5L9 1.5L4 1.5C2.6193 1.5 1.5 2.61929 1.5 4L1.5 10C1.5 11.3807 2.6193 12.5 4 12.5H9Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                </div>
                <input type="hidden" value="action_1" name="action" id="getAction">
            </div>
        </div>
    </div>
    <!-- Main content -->
    <x-formprovides> </x-formprovides>

    <div class="content-wrapper1 py-0 pl-0 px-0" id="main">
        <section class="content">
            <div class="container-fluided">
                <div class="tab-content">
                    <div id="info" class="content tab-pane in active">
                        <div class="bg-filter-search border-top-0 text-center py-2">
                            <span class="font-weight-bold text-secondary text-nav">THÔNG TIN SẢN PHẨM</span>
                        </div>
                        <section class="content">
                            <div class="container-fluided order_content">
                                <table id="inputcontent" class="table table-hover bg-white rounded">
                                    <thead>
                                        <tr>
                                            <th class="border-right p-1 border-bottom" style="width: 15%;">
                                                <input class="ml-4 border-danger" id="checkall" type="checkbox">
                                                <span class="text-table text-secondary">Mã sản phẩm</span>
                                            </th>
                                            <th class="border-right p-1 border-bottom" style="width: 15%;">
                                                <span class="text-table text-secondary">Tên sản phẩm</span>
                                            </th>
                                            <th class="border-right p-1 border-bottom" style="width: 8%;">
                                                <span class="text-table text-secondary">Đơn vị</span>
                                            </th>
                                            <th class="border-right p-1 border-bottom" style="width: 8%;">
                                                <span class="text-table text-secondary">Số lượng</span>
                                            </th>
                                            <th class="border-right p-1 border-bottom" style="width: 10%;">
                                                <span class="text-table text-secondary">Đơn giá</span>
                                            </th>
                                            <th class="border-right p-1 border-bottom" style="width: 8%;">
                                                <span class="text-table text-secondary">Thuế</span>
                                            </th>
                                            <th class="border-right p-1 border-bottom" style="width: 10%;">
                                                <span class="text-table text-secondary">Thành
                                                    tiền</span>
                                            </th>
                                            <th class="border-right note p-1 border-bottom">
                                                <span class="text-table text-secondary">Ghi chú</span>
                                            </th>
                                            <th class="border-right border-bottom"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product as $item)
                                            <tr class="bg-white">
                                                <td class="border border-left-0 border-bottom-0">
                                                    <input type="hidden" readonly value="{{ $item->id }}"
                                                        name="listProduct[]">
                                                    <div
                                                        class="d-flex w-100 justify-content-between align-items-center position-relative">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9 3C7.89543 3 7 3.89543 7 5C7 6.10457 7.89543 7 9 7C10.1046 7 11 6.10457 11 5C11 3.89543 10.1046 3 9 3Z"
                                                                fill="#42526E" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9 10C7.89543 10 7 10.8954 7 12C7 13.1046 7.89543 14 9 14C10.1046 14 11 13.1046 11 12C11 10.8954 10.1046 10 9 10Z"
                                                                fill="#42526E" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9 17C7.89543 17 7 17.8954 7 19C7 20.1046 7.89543 21 9 21C10.1046 21 11 20.1046 11 19C11 17.8954 10.1046 17 9 17Z"
                                                                fill="#42526E" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M15 3C13.8954 3 13 3.89543 13 5C13 6.10457 13.8954 7 15 7C16.1046 7 17 6.10457 17 5C17 3.89543 16.1046 3 15 3Z"
                                                                fill="#42526E" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M15 10C13.8954 10 13 10.8954 13 12C13 13.1046 13.8954 14 15 14C16.1046 14 17 13.1046 17 12C17 10.8954 16.1046 10 15 10Z"
                                                                fill="#42526E" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M15 17C13.8954 17 13 17.8954 13 19C13 20.1046 13.8954 21 15 21C16.1046 21 17 20.1046 17 19C17 17.8954 16.1046 17 15 17Z"
                                                                fill="#42526E" />
                                                        </svg>
                                                        <input type="checkbox">
                                                        <input type="text" name="product_code[]"
                                                            class="border-0 px-2 py-1 w-75 searchProduct"
                                                            value="{{ $item->product_code }}"
                                                            @if ($import->status == 2) echo readonly @endif>
                                                        <ul id="listProductCode"
                                                            class="listProductCode bg-white position-absolute w-100 rounded shadow p-0 scroll-data"
                                                            style="z-index: 99; left: 24%; top: 75%;">
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td class="border border-bottom-0 position-relative">
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
                                                <td class="border border-bottom-0">
                                                    <input type="text" name="product_unit[]"
                                                        class="border-0 px-2 py-1 w-100 product_unit"
                                                        value="{{ $item->product_unit }}"
                                                        @if ($import->status == 2) echo readonly @endif>
                                                </td>
                                                <td class="border border-bottom-0 border-right-0">
                                                    <input
                                                     {{-- oninput="checkQty(this,{{ $item->product_qty }})" --}}
                                                        type="text" name="product_qty[]"
                                                        class="border-0 px-2 py-1 w-100 quantity-input"
                                                        value="{{ number_format($item->product_qty) }}"
                                                        @if ($import->status == 2) echo readonly @endif>
                                                </td>
                                                <td class="border border-bottom-0 border-right-0">
                                                    <input type="text" name="price_export[]"
                                                        class="border-0 px-2 py-1 w-100 price_export"
                                                        value="{{ (fmod($item->price_export, 2) > 0 && fmod($item->price_export,1) > 0) ? number_format($item->price_export, 2, '.', ',') : number_format($item->price_export) }}"
                                                        @if ($import->status == 2) echo readonly @endif>
                                                </td>
                                                <input type="hidden" class="product_tax1">
                                                <td class="border border-bottom-0 border-right-0">
                                                    <select name="product_tax[]" id=""
                                                        class="product_tax border-0">
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
                                                <td class="border border-bottom-0 border-right-0">
                                                    <input type="text" name="total_price[]"
                                                        class="border-0 px-2 py-1 w-100 total_price" readonly
                                                        value="{{ (fmod($item->product_total, 2) > 0 && fmod($item->product_total,1) > 0) ? number_format($item->product_total, 2, '.', ',') : number_format($item->product_total) }}">
                                                </td>
                                                <td class="border border-bottom-0">
                                                    <input placeholder="Nhập ghi chú" type="text"
                                                        name="product_note[]" class="border-0 px-2 py-1 w-100"
                                                        value="{{ $item->product_note }}"
                                                        @if ($import->status == 2) echo readonly @endif>
                                                </td>
                                                <td class="border deleteRow">
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
                        <div class="ml-3">
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
            </div>
        </section>
    </div>

    <div class="content-wrapper2 px-0 py-0">
        <div id="mySidenav" class="sidenavadd border">
            <div id="show_info_Guest">
                <div class="bg-filter-search border-0 py-2 text-center">
                    <span class="font-weight-bold text-secondary text-nav">THÔNG TIN KHÁCH HÀNG</span>
                </div>
                <div class="d-flex">
                    <div style="width:55%;">
                        <div class="border border-right-0 py-1 border-left-0">
                            <span class="text-table ml-2">Nhà cung cấp</span>
                        </div>
                        <div class="border border-right-0 py-1 border-left-0">
                            <span class="text-table ml-2">Người đại diện</span>
                        </div>
                        <div class="border border-right-0 py-1 border-left-0">
                            <span class="text-table ml-2">Đơn mua hàng</span>
                        </div>
                        <div class="border border-right-0 py-1 border-left-0">
                            <span class="text-table ml-2">Số tham chiếu</span>
                        </div>
                        <div class="border border-right-0 py-1 border-left-0">
                            <span class="text-table ml-2">Ngày báo giá</span>
                        </div>
                        <div class="border border-right-0 py-1 border-left-0">
                            <span class="text-table ml-2">Hiệu lực báo giá</span>
                        </div>
                        <div class="border border-right-0 py-1 border-left-0">
                            <span class="text-table ml-2">Điều khoản</span>
                        </div>
                        <div class="border border-right-0 py-1 border-left-0">
                            <span class="text-table ml-2">Dự án</span>
                        </div>
                    </div>

                    <div class="">
                        <div class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                            <input readonly type="text" placeholder="Chọn thông tin"
                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0" autocomplete="off"
                                id="myInput" value="{{ $import->getProvideName->provide_name_display }}">
                            <ul id="myUL"
                                class="bg-white position-absolute rounded shadow p-0 scroll-data list-guest"
                                style="z-index: 99;">
                                <div class="p-1">
                                    <div class="position-relative">
                                        <input type="text" placeholder="Nhập công ty"
                                            class="pr-4 w-100 input-search" id="provideFilter">
                                        <span id="search-icon" class="search-icon"><i
                                                class="fas fa-search text-table" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                @foreach ($provides as $item)
                                    <li>
                                        <a href="javascript:void(0)"
                                            class="text-dark d-flex justify-content-between p-2 search-info w-100"
                                            id="{{ $item->id }}" name="search-info">
                                            <span class="w-50">{{ $item->provide_name_display }}</span>
                                        </a>
                                    </li>
                                @endforeach
                                <a type="button"
                                    class="d-flex justify-content-center align-items-center p-2 position-sticky addGuestNew"
                                    data-toggle="modal" data-target="#provideModal" style="bottom: 0;">
                                    <span class="text-table text-center font-weight-bold">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                                fill="#282A30"></path>
                                        </svg>
                                        Thêm nhà cung cấp
                                    </span>
                                </a>
                            </ul>
                            <div class="">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
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
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                            <input readonly="" type="text" placeholder="Chọn thông tin"
                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0" autocomplete="off"
                                id="represent"
                                value="@if ($import->getNameRepresent) {{ $import->getNameRepresent->represent_name }} @endif">
                            <ul id="listRepresent"
                                class="bg-white position-absolute rounded shadow p-0 scroll-data list-guest"
                                style="z-index: 99;">
                                <div class="p-1">
                                    <div class="position-relative">
                                        <input type="text" placeholder="Nhập thông tin"
                                            class="pr-4 w-100 input-search" id="searchRepresent">
                                        <span id="search-icon" class="search-icon">
                                            <i class="fas fa-search text-table" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                                @if ($represent)
                                    @foreach ($represent as $value)
                                        <li class="border" id="{{ $value->id }}">
                                            <a href="javascript:void(0)"
                                                class="text-dark d-flex justify-content-between p-2 search-represent w-100 search-represent"
                                                id="{{ $value->id }}" name="search-represent">
                                                <span
                                                    class="w-100 text-nav text-dark overflow-hidden">{{ $value->represent_name }}</span>
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
                                                        data-id="{{ $value->id }}" id="{{ $value->id }}"><i
                                                            class="fa-regular fa-pen-to-square"></i></a>
                                                    <a class="dropdown-item delete-item" href="#"
                                                        data-id="{{ $value->id }}" data-name="represent"><i
                                                            class="fa-solid fa-trash-can"></i></a>
                                                    <a class="dropdown-item set-default default-id {{ $value->represent_name }}"
                                                        id="default-id{{ $value->id }}" href="#"
                                                        data-name="represent" data-id="{{ $value->id }}">
                                                        @if ($value->default == 0)
                                                            <i class="fa-solid fa-link-slash"></i>
                                                        @else
                                                            <i class="fa-solid fa-link"></i>
                                                        @endif
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                                <a type="button"
                                    class="d-flex justify-content-center align-items-center p-2 position-sticky addRepresent"
                                    data-toggle="modal" data-target="#modalAddRepresent" style="bottom: 0;">
                                    <span class="text-table text-center font-weight-bold">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                                fill="#282A30"></path>
                                        </svg>
                                        Thêm mới
                                    </span>
                                </a>
                            </ul>
                            <div class="">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
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
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                            <input type="text" placeholder="Chọn thông tin" name="quotation_number"
                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0" autocomplete="off"
                                value="{{ $import->quotation_number }}">
                            <div class="">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
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
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                            <input type="text" placeholder="Chọn thông tin" name="reference_number"
                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0" autocomplete="off"
                                value="{{ $import->reference_number }}">
                            <div class="">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
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
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                            <input id="datePicker" type="text" placeholder="Chọn thông tin"
                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0" autocomplete="off"
                                value="{{ date_format(new DateTime($import->created_at), 'd/m/Y') }}">
                            {{-- value="{{ $import->created_at->toDateString() }}" readonly> --}}
                            <input type="hidden" id="hiddenDateInput" name="date_quote"
                                value="{{ $import->created_at->toDateString() }}">
                            <div class="">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
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
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                            {{-- <input readonly type="text" placeholder="Chọn thông tin" name="price_effect"
                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0" autocomplete="off"
                                value="" id="price_effect"> --}}

                            <input readonly="" type="text" placeholder="Chọn thông tin"
                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0" autocomplete="off"
                                id="price_effect" value="{{ $import->price_effect }}" name="price_effect">


                            <ul id="listPriceEffect"
                                class="bg-white position-absolute rounded shadow p-0 scroll-data list-guest"
                                style="z-index: 99;">
                                <div class="p-1">
                                    <div class="position-relative">
                                        <input type="text" placeholder="Nhập thông tin"
                                            class="pr-4 w-100 input-search" id="searchPriceEffect">
                                        <span id="search-icon" class="search-icon">
                                            <i class="fas fa-search text-table" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                                @if ($price_effect)
                                    @foreach ($price_effect as $price)
                                        <li class="border" id="{{ $price->id }}">
                                            <a href="javascript:void(0)"
                                                class="text-dark d-flex justify-content-between p-2 search-priceeffect w-100 search-price-effect"
                                                id="{{ $price->id }}" name="search-price-effect">
                                                <span
                                                    class="w-100 text-nav text-dark overflow-hidden">{{ $price->form_desc }}</span>
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
                                                        data-id="{{ $price->id }}" id="{{ $price->id }}"><i
                                                            class="fa-regular fa-pen-to-square"></i></a>
                                                    <a class="dropdown-item delete-item" href="#"
                                                        data-id="{{ $price->id }}" data-name="priceeffect"><i
                                                            class="fa-solid fa-trash-can"></i></a>
                                                    <a class="dropdown-item set-default default-id{{ $price->form_desc }}"
                                                        id="default-id{{ $price->id }}" href="#"
                                                        data-name="import" data-id="{{ $price->id }}">
                                                        @if ($price->default_form == 1)
                                                            <i class="fa-solid fa-link-slash"></i>
                                                        @else
                                                            <i class="fa-solid fa-link"></i>
                                                        @endif
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                                <a type="button"
                                    class="d-flex justify-content-center align-items-center p-2 position-sticky addRepresent"
                                    data-toggle="modal" data-target="#formModalquote" style="bottom: 0;">
                                    <span class="text-table text-center font-weight-bold">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                                fill="#282A30"></path>
                                        </svg>
                                        Thêm mới
                                    </span>
                                </a>
                            </ul>
                            <div class="">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
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
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                            <input readonly="" type="text" placeholder="Chọn thông tin" name="terms_pay"
                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0" autocomplete="off"
                                value="{{ $import->terms_pay }}" id="terms_pay">
                            <ul id="listTermsPay"
                                class="bg-white position-absolute rounded shadow p-0 scroll-data list-guest"
                                style="z-index: 99;">
                                <div class="p-1">
                                    <div class="position-relative">
                                        <input type="text" placeholder="Nhập thông tin"
                                            class="pr-4 w-100 input-search" id="searchTermsPay">
                                        <span id="search-icon" class="search-icon"><i
                                                class="fas fa-search text-table" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                @if ($terms_pay)
                                    @foreach ($terms_pay as $term)
                                        <li class="border" id="{{ $term->id }}">
                                            <a href="javascript:void(0)"
                                                class="text-dark d-flex justify-content-between p-2 search-termpay w-100 search-term-pay"
                                                id="{{ $term->id }}" name="search-term-pay">
                                                <span
                                                    class="w-100 text-nav text-dark overflow-hidden">{{ $term->form_desc }}</span>
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
                                                        data-id="{{ $term->id }}" id="{{ $term->id }}"><i
                                                            class="fa-regular fa-pen-to-square"></i></a>
                                                    <a class="dropdown-item delete-item" href="#"
                                                        data-id="{{ $term->id }}" data-name="termpay"><i
                                                            class="fa-solid fa-trash-can"></i></a>
                                                    <a class="dropdown-item set-default default-id{{ $term->form_desc }}"
                                                        id="default-id{{ $term->id }}" href="#"
                                                        data-name="termpay" data-id="{{ $term->id }}">
                                                        @if ($term->default_form == 1)
                                                            <i class="fa-solid fa-link-slash"></i>
                                                        @else
                                                            <i class="fa-solid fa-link"></i>
                                                        @endif
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif

                                <a type="button"
                                    class="d-flex justify-content-center align-items-center p-2 position-sticky addRepresent"
                                    data-toggle="modal" data-target="#formModalTermPay" style="bottom: 0;">
                                    <span class="text-table text-center font-weight-bold">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.75 3C8.75 2.58579 8.41421 2.25 8 2.25C7.58579 2.25 7.25 2.58579 7.25 3V7.25H3C2.58579 7.25 2.25 7.58579 2.25 8C2.25 8.41421 2.58579 8.75 3 8.75H7.25V13C7.25 13.4142 7.58579 13.75 8 13.75C8.41421 13.75 8.75 13.4142 8.75 13V8.75H13C13.4142 8.75 13.75 8.41421 13.75 8C13.75 7.58579 13.4142 7.25 13 7.25H8.75V3Z"
                                                fill="#282A30"></path>
                                        </svg>
                                        Thêm mới
                                    </span>
                                </a>
                            </ul>

                            <div class="">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
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
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                            <input type="text" placeholder="Chọn thông tin" id="inputProject"
                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0" autocomplete="off"
                                value="@if ($import->getProjectName) {{ $import->getProjectName->project_name }} @endif">
                            <ul id="listProject"
                                class="bg-white position-absolute w-50 rounded shadow p-0 scroll-data"
                                style="z-index: 99;left: 23%;top: 96%;">
                                @foreach ($project as $va)
                                    <li>
                                        <a href="javascript:void(0)"
                                            class="text-dark d-flex justify-content-between p-2 project_name w-100"
                                            id="{{ $va->id }}" name="project_name">
                                            <span class="w-100">{{ $va->project_name }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>
</div>
<x-form-modal-import title="Thêm mới người đại diện" name="addRepresent"
    idModal="modalAddRepresent"></x-form-modal-import>
<x-form-modal-import title="Hiệu lực báo giá" name="import" idModal="formModalquote"></x-form-modal-import>
<x-form-modal-import title="Điều khoản thanh toán" name="termpay" idModal="formModalTermPay"></x-form-modal-import>
<script src="{{ asset('/dist/js/products.js') }}"></script>
<script src="{{ asset('/dist/js/import.js') }}"></script>
<script>
    flatpickr("#datePicker", {
        locale: "vn",
        dateFormat: "d/m/Y",
        onChange: function(selectedDates, dateStr, instance) {
            // Cập nhật giá trị của trường ẩn khi người dùng chọn ngày
            document.getElementById("hiddenDateInput").value = instance.formatDate(selectedDates[0],
                "Y-m-d");
        }
    });

    getKeyProvide($('#myInput'));
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
                            .val(data[table].form_desc)
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
                } else {
                    $(data['import'] ? '#price_effect' : '#terms_pay').val(
                        (data['import'] ? data['import'] : data['termpay']).form_desc)
                    $(data['import'] ? '#listPriceEffect' : '#listTermsPay').hide()
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
                $('#' + data.list + ' li#' + data.id).remove();
                showNotification('success', data.msg)
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

    function actionForm(id, routeAdd, routeEdit) {
        $('#' + id).click(function() {
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
                                    $('.closeModal').click();
                                    $('#represent_id').val(data.id);
                                    $('#represent').val(data.data)
                                    showNotification('success', data.msg)
                                } else {
                                    showNotification('warning', data.msg)
                                }
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
                                $('.btn.btn-default').click();
                                $('#form-name-' + id).val('')
                                $('#form-desc-' + id).val('')
                                if (data.success) {
                                    $(id == "import" ? '#price_effect' : '#terms_pay').val(data
                                        .data);
                                    $('.closeModal').click();
                                    showNotification('success', data.msg)
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
                            $('.closeModal').click()
                            if (data.success) {
                                showNotification('suscess', data.msg)
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
                            $('.closeModal').click()
                            if (data.success) {
                                showNotification('suscess', data.msg)
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
        if (provide_name_display == '') {
            showNotification('warning','Vui lòng nhập Tên hiển thị')
            check = true;
            return false;
        }
        if (provide_code == '') {
            showNotification('warning','Vui lòng nhập Mã số thuế')
            check = true;
            return false;
        }
        if (provide_address == '') {
            showNotification('warning','Vui lòng nhập Địa chỉ nhà cung cấp')
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
                        showNotification('success',data.msg)
                        $('.modal [data-dismiss="modal"]').click();
                        $("input[name='provide_name_display']").val('');
                        $("input[name='provide_code']").val('');
                        $("input[name='provide_address']").val('');
                        $("input[name='provide_name']").val('');
                        $("input[name='provide_represent']").val('');
                        $("input[name='provide_email']").val('');
                        $("input[name='provide_phone']").val('');
                        $("input[name='provide_address_delivery']").val('');
                        $('#more_info').show();
                    } else {
                        showNotification('warning',data.msg)
                    }
                }
            });
        }
    })

    getProduct('searchProductName ');

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
                    // inputUnit.val('');
                    // inputPriceExprot.val('')
                    // inputRatio.val('')
                    // inputPriceImport.val('')
                    // selectTax.val('0')
                    var createLi =
                        '<a class="bg-dark d-flex justify-content-between p-2 position-sticky">' +
                        '<span class="w-100 text-white">Thêm mới</span>' +
                        '</a>';
                    result.forEach(element => {
                        var UL = '<li>' +
                            '<a href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-name" id="' +
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
                        checkDuplicateRows()
                    })


                    // $('.search-product').on('click', function() {
                    //     inputName.val('');
                    //     inputCode.val($(this).closest('li').find('span').text())
                    //     var dataId = $(this).attr('id'); // Lấy giá trị data-id
                    //     $.ajax({
                    //         url: "{{ route('showProductName') }}",
                    //         type: "get",
                    //         data: {
                    //             dataId: dataId
                    //         },
                    //         success: function(data) {
                    //             listProductName.empty();
                    //             data.forEach(element => {
                    //                 var UL = '<li>' +
                    //                     '<a data-unit="' + element
                    //                     .product_unit +
                    //                     '" data-priceExport= "' +
                    //                     element.product_price_export +
                    //                     '" data-ratio="' + element
                    //                     .product_ratio +
                    //                     '" data-priceImport="' + element
                    //                     .product_price_import +
                    //                     '" href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-name" id="' +
                    //                     element.id +
                    //                     '" data-tax="' + element
                    //                     .product_tax +
                    //                     '" name="search-product">' +
                    //                     '<span class="w-100" data-id="' +
                    //                     element.id + '">' + element
                    //                     .product_name + '</span>' +
                    //                     '</a>' +
                    //                     '</li>';
                    //                 listProductName.append(UL);
                    //             })
                    //             $('.search-name').on('click', function() {
                    //                 inputName.val($(this).closest('li')
                    //                     .find('span')
                    //                     .text());
                    //                 inputUnit.val($(this).attr(
                    //                         'data-unit') == null ?
                    //                     "" : $(this).attr(
                    //                         'data-unit'));
                    //                 inputPriceExprot.val($(this).attr(
                    //                         'data-priceExport') ==
                    //                     "null" ? "" :
                    //                     formatCurrency($(this).attr(
                    //                         'data-priceExport')))
                    //                 inputRatio.val($(this).attr(
                    //                         'data-ratio') ==
                    //                     "null" ? "" : $(this).attr(
                    //                         'data-ratio'))
                    //                 inputPriceImport.val($(this).attr(
                    //                         'data-priceImport') ==
                    //                     "null" ? "" :
                    //                     formatCurrency($(this).attr(
                    //                         'data-priceImport')))
                    //                 selectTax.val($(this).attr(
                    //                     'data-tax'))
                    //                 listProductName.hide();
                    //                 checkDuplicateRows()
                    //             })
                    //         }
                    //     })
                    // })
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
                    showNotification('warning','Số báo giá đã tồn tại')
                } else {
                    $('form')[0].submit();
                }
            }
        })

    })
</script>
</body>

</html>
