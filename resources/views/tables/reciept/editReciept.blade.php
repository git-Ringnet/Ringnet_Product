<x-navbar :title="$title" activeGroup="buy" activeName="reciept"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<form action="{{ route('reciept.update', ['workspace' => $workspacename, 'reciept' => $reciept->id]) }}" method="POST"
    id="formSubmit" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="content-wrapper1 py-2 border border-top-0 border-left-0 border-right-0">
        <!-- Content Header (Page header) -->

        <input type="hidden" name="detailimport_id" id="detailimport_id" value="{{ $reciept->detailimport_id }}">
        <input type="hidden" name="detail_id" value="{{ $reciept->id }}">
        <input type="hidden" name="table_name" value="HDMH">
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
                    <span class="font-weight-bold">Hóa đơn mua hàng</span>
                    <span class="mx-2">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8"></path>
                        </svg>
                    </span>
                    <span>{{ $reciept->id }} </span>
                    <span class="border ml-2 p-1 text-nav text-secondary shadow-sm rounded">
                        @if ($reciept->status == 1)
                            Nháp
                        @else
                            Chính thức
                        @endif

                    </span>
                </div>
            </div>

            <div class="container-fluided z-index-block">
                <div class="row m-0">
                    <a href="{{ route('reciept.index', $workspacename) }}" style="margin-right:10px;">
                        <button class="btn-save-print rounded d-flex align-items-center h-100" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                fill="none">
                                <path
                                    d="M5.6738 11.4801C5.939 11.7983 6.41191 11.8413 6.73012 11.5761C7.04833 11.311 7.09132 10.838 6.82615 10.5198L5.3513 8.75H12.25C12.6642 8.75 13 8.41421 13 8C13 7.58579 12.6642 7.25 12.25 7.25L5.3512 7.25L6.82615 5.4801C7.09132 5.1619 7.04833 4.689 6.73012 4.4238C6.41191 4.1586 5.939 4.2016 5.6738 4.5198L3.1738 7.51984C2.942 7.79798 2.942 8.20198 3.1738 8.48012L5.6738 11.4801Z"
                                    fill="#6D7075"></path>
                            </svg>
                            <span class="">Trở về</span>
                        </button>
                    </a>

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
                            <a class="dropdown-item text-nav" href="http://127.0.0.1:8000/excel/4">Xuất
                                Excel</a>
                            <a class="dropdown-item text-nav border-top" href="http://127.0.0.1:8000/pdf/4">Xuất
                                PDF</a>
                        </div>
                    </div>

                    <label class="custom-btn d-flex align-items-center h-100 m-0 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                            fill="none" class="mx-1">
                            <path
                                d="M8.30541 9.20586C8.57207 9.47246 8.5943 9.89106 8.37208 10.183L8.30541 10.2593L5.84734 12.7174C4.58675 13.978 2.54294 13.978 1.28235 12.7174C0.0652319 11.5003 0.0232719 9.55296 1.15644 8.2855L1.28235 8.15237L3.74042 5.69429C4.03133 5.40339 4.50298 5.40339 4.79388 5.69429C5.06054 5.96096 5.08277 6.37949 4.86055 6.67147L4.79388 6.74775L2.33581 9.20586C1.65703 9.88456 1.65703 10.9852 2.33581 11.6639C2.98065 12.3088 4.00611 12.341 4.68901 11.7607L4.79388 11.6639L7.25195 9.20586C7.54286 8.91492 8.01451 8.91492 8.30541 9.20586ZM8.82965 5.17005C9.12053 5.46095 9.12053 5.9326 8.82965 6.22351L6.34904 8.70413C6.05813 8.99504 5.58648 8.99504 5.29558 8.70413C5.00467 8.41323 5.00467 7.94158 5.29558 7.65067L7.7762 5.17005C8.0671 4.87914 8.53875 4.87914 8.82965 5.17005ZM12.7173 1.28236C13.9344 2.49948 13.9764 4.44674 12.8432 5.71422L12.7173 5.84735L10.2592 8.30543C9.96833 8.59633 9.49673 8.59633 9.20583 8.30543C8.93914 8.03877 8.91692 7.62023 9.13913 7.32825L9.20583 7.25197L11.6638 4.79389C12.3426 4.11511 12.3426 3.0146 11.6638 2.33582C11.019 1.69098 9.99363 1.65874 9.31073 2.23909L9.20583 2.33582L6.74774 4.79389C6.45683 5.0848 5.98518 5.0848 5.69428 4.79389C5.42762 4.52723 5.40539 4.10869 5.62761 3.81672L5.69428 3.74043L8.15235 1.28236C9.41293 0.0217665 11.4567 0.0217665 12.7173 1.28236Z"
                                fill="white"></path>
                        </svg>
                        <span>Đính kèm file</span><input type="file" style="display: none;" id="file_restore"
                            accept="*" name="file">
                    </label>

                    @if ($reciept->status == 1)
                        <a href="#">
                            <button type="submit" class="custom-btn d-flex align-items-center h-100 rounded"
                                style="margin-right:10px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 14 14" fill="none" class="mr-1">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                        fill="white"></path>
                                </svg>
                                <span>Xác nhận</span>
                            </button>
                        </a>
                    @endif

                    <a href="#" id="delete_reciept"
                        class="custom-btn-danger d-flex align-items-center h-100 py-1 px-2"
                        style="margin-right: 10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                            fill="none" class="mx-1">
                            <path
                                d="M0.96967 0.969668C1.26256 0.676777 1.73744 0.676777 2.03033 0.969668L6 4.939L9.9697 0.969668C10.2626 0.676777 10.7374 0.676777 11.0303 0.969668C11.3232 1.26256 11.3232 1.73744 11.0303 2.03033L7.061 6L11.0303 9.9697C11.2966 10.2359 11.3208 10.6526 11.1029 10.9462L11.0303 11.0303C10.7374 11.3232 10.2626 11.3232 9.9697 11.0303L6 7.061L2.03033 11.0303C1.73744 11.3232 1.26256 11.3232 0.96967 11.0303C0.67678 10.7374 0.67678 10.2626 0.96967 9.9697L4.939 6L0.96967 2.03033C0.7034 1.76406 0.6792 1.3474 0.89705 1.05379L0.96967 0.969668Z"
                                fill="white"></path>
                        </svg>
                        <span>Xóa</span>
                    </a>

                    <span id="sideProvide" class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                            fill="none">
                            <path
                                d="M14 10C14 12.2091 12.2091 14 10 14L4 14C1.7909 14 0 12.2091 0 10L0 4C0 1.79086 1.7909 0 4 0L10 0C12.2091 0 14 1.79086 14 4L14 10ZM9 12.5L9 1.5L4 1.5C2.6193 1.5 1.5 2.61929 1.5 4L1.5 10C1.5 11.3807 2.6193 12.5 4 12.5H9Z"
                                fill="#26273B" fill-opacity="0.8"></path>
                        </svg>
                    </span>

                </div>
            </div>
        </div>
    </div>
    </div>

    <section class="content-wrapper1 p-2 position-relative">
        <div class="d-flex justify-content-between">
            <ul class="nav nav-tabs bg-filter-search border-0 py-2 rounded ml-3">
                <li class="text-nav"><a data-toggle="tab" href="#info" class="active text-secondary">Thông
                        tin</a>
                </li>
                <li class="text-nav">
                    <a data-toggle="tab" href="#files" class="text-secondary mx-4">File đính kèm</a>
                </li>
            </ul>
            <div class="d-flex position-sticky" style="right: 10px; top: 80px;">
            </div>
        </div>
    </section>


    <div class="content-wrapper1 py-0 pl-0 px-0" id="main">
        <div class="container-fluided">
            <div class="tab-content">
                <div id="info" class="content tab-pane in active">
                    <div class="bg-filter-search text-center py-2 border-right-0 border-left-0">
                        <span class="font-weight-bold text-secondary text-nav">THÔNG TIN SẢN PHẨM</span>
                    </div>
                    <section class="content">
                        <div class="container-fluided order_content">
                            <table id="inputcontent" class="table table-hover bg-white rounded">
                                <thead>
                                    <tr>
                                        <th class="border-right p-1 border-top-0" style="width:15%;">
                                            <input type="checkbox" class="ml-4 border-danger">
                                            <span class="text-table text-secondary">Mã sản phẩm</span>
                                        </th>
                                        <th class="border-right p-1 border-top-0" style="width:25%;">
                                            <span class="text-table text-secondary"> Tên sản phẩm</span>
                                        </th>
                                        <th class="border-right p-1 border-top-0" style="width:10%;">
                                            <span class="text-table text-secondary">Đơn vị</span>
                                        </th>
                                        <th class="border-right p-1 border-top-0" style="width:10%;">
                                            <span class="text-table text-secondary">Số lượng</span>
                                        </th>
                                        <th class="border-right p-1 border-top-0" style="width:10%;">
                                            <span class="text-table text-secondary">Đơn giá</span>
                                        </th>
                                        <th class="border-right p-1 border-top-0" style="width:10%;">
                                            <span class="text-table text-secondary">Thuế</span>
                                        </th>
                                        <th class="border-right p-1 border-top-0" style="width:10%;">
                                            <span class="text-table text-secondary">Thành tiền</span>
                                        </th>
                                        <th class="border-right p-1 border-top-0" style="width:10%;">
                                            <span class="text-table text-secondary">Ghi chú</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $item)
                                        <tr class="bg-white">
                                            <td class="border border-left-0 border-top-0 border-bottom-0">
                                                <div
                                                    class="d-flex w-100 justify-content-between align-items-center position-relative">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9 3C7.89543 3 7 3.89543 7 5C7 6.10457 7.89543 7 9 7C10.1046 7 11 6.10457 11 5C11 3.89543 10.1046 3 9 3Z"
                                                            fill="#42526E"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9 10C7.89543 10 7 10.8954 7 12C7 13.1046 7.89543 14 9 14C10.1046 14 11 13.1046 11 12C11 10.8954 10.1046 10 9 10Z"
                                                            fill="#42526E"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9 17C7.89543 17 7 17.8954 7 19C7 20.1046 7.89543 21 9 21C10.1046 21 11 20.1046 11 19C11 17.8954 10.1046 17 9 17Z"
                                                            fill="#42526E"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M15 3C13.8954 3 13 3.89543 13 5C13 6.10457 13.8954 7 15 7C16.1046 7 17 6.10457 17 5C17 3.89543 16.1046 3 15 3Z"
                                                            fill="#42526E"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M15 10C13.8954 10 13 10.8954 13 12C13 13.1046 13.8954 14 15 14C16.1046 14 17 13.1046 17 12C17 10.8954 16.1046 10 15 10Z"
                                                            fill="#42526E"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M15 17C13.8954 17 13 17.8954 13 19C13 20.1046 13.8954 21 15 21C16.1046 21 17 20.1046 17 19C17 17.8954 16.1046 17 15 17Z"
                                                            fill="#42526E"></path>
                                                    </svg>
                                                    <input type="checkbox" name="" id="">
                                                    <input readonly type="text"
                                                        class="border-0 px-2 py-1 w-75 searchProduct"
                                                        value="{{ $item->product_code }}">
                                                </div>
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 position-relative">
                                                <div class="d-flex w-100 justify-content-between align-items-center">
                                                    <input readonly type="text"
                                                        class="searchProductName border-0 px-2 py-1 w-100"
                                                        value="{{ $item->product_name }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" viewBox="0 0 16 16" fill="none">
                                                        <path
                                                            d="M8.0002 1.69571C6.32827 1.69571 4.72483 2.35988 3.5426 3.54211C2.36037 4.72434 1.6962 6.32779 1.6962 7.99971C1.6962 9.67164 2.36037 11.2751 3.5426 12.4573C4.72483 13.6395 6.32827 14.3037 8.0002 14.3037C9.67212 14.3037 11.2756 13.6395 12.4578 12.4573C13.64 11.2751 14.3042 9.67164 14.3042 7.99971C14.3042 6.32779 13.64 4.72434 12.4578 3.54211C11.2756 2.35988 9.67212 1.69571 8.0002 1.69571ZM0.304199 7.99971C0.304199 5.9586 1.11503 4.0011 2.55831 2.55782C4.00159 1.11454 5.95909 0.303711 8.0002 0.303711C10.0413 0.303711 11.9988 1.11454 13.4421 2.55782C14.8854 4.0011 15.6962 5.9586 15.6962 7.99971C15.6962 10.0408 14.8854 11.9983 13.4421 13.4416C11.9988 14.8849 10.0413 15.6957 8.0002 15.6957C5.95909 15.6957 4.00159 14.8849 2.55831 13.4416C1.11503 11.9983 0.304199 10.0408 0.304199 7.99971Z"
                                                            fill="#282A30"></path>
                                                        <path
                                                            d="M8.08026 4.96571C7.92018 4.95474 7.75956 4.97681 7.60838 5.03055C7.4572 5.08429 7.31869 5.16855 7.20146 5.2781C7.08422 5.38764 6.99077 5.52012 6.92691 5.66732C6.86306 5.81451 6.83015 5.97327 6.83026 6.13371C6.83026 6.31844 6.75688 6.49559 6.62626 6.62621C6.49564 6.75683 6.31848 6.83021 6.13376 6.83021C5.94903 6.83021 5.77188 6.75683 5.64126 6.62621C5.51064 6.49559 5.43726 6.31844 5.43726 6.13371C5.43716 5.6638 5.56625 5.20289 5.81043 4.8014C6.05461 4.3999 6.40447 4.07326 6.82176 3.85719C7.23906 3.64111 7.70773 3.54393 8.17653 3.57625C8.64534 3.60856 9.09623 3.76915 9.47993 4.04044C9.86363 4.31174 10.1654 4.6833 10.3521 5.1145C10.5389 5.54571 10.6035 6.01997 10.5389 6.48542C10.4744 6.95088 10.283 7.38963 9.98593 7.75369C9.68881 8.11776 9.29732 8.39314 8.85426 8.54971C8.80815 8.56625 8.76829 8.59666 8.74018 8.63678C8.71206 8.67689 8.69707 8.72473 8.69726 8.77371V9.39971C8.69726 9.58444 8.62387 9.76159 8.49326 9.89221C8.36264 10.0228 8.18548 10.0962 8.00076 10.0962C7.81603 10.0962 7.63888 10.0228 7.50826 9.89221C7.37764 9.76159 7.30426 9.58444 7.30426 9.39971V8.77371C7.30416 8.43668 7.40854 8.10791 7.60303 7.83265C7.79752 7.5574 8.07255 7.3492 8.39026 7.23671C8.64378 7.14687 8.85861 6.97241 8.99857 6.74271C9.13853 6.51302 9.19507 6.24211 9.15867 5.97561C9.12228 5.70911 8.99517 5.46328 8.79875 5.27952C8.60233 5.09576 8.34859 4.98429 8.08026 4.96571Z"
                                                            fill="#282A30"></path>
                                                        <path
                                                            d="M8.05029 11.5707C8.00282 11.5707 7.95729 11.5896 7.92372 11.6231C7.89015 11.6567 7.87129 11.7022 7.87129 11.7497C7.87129 11.7972 7.89015 11.8427 7.92372 11.8763C7.95729 11.9099 8.00282 11.9287 8.05029 11.9287C8.09777 11.9287 8.1433 11.9099 8.17686 11.8763C8.21043 11.8427 8.22929 11.7972 8.22929 11.7497C8.22929 11.7022 8.21043 11.6567 8.17686 11.6231C8.1433 11.5896 8.09777 11.5707 8.05029 11.5707ZM8.05029 12.4997C8.14878 12.4997 8.24631 12.4803 8.33731 12.4426C8.4283 12.4049 8.51098 12.3497 8.58062 12.28C8.65027 12.2104 8.70551 12.1277 8.7432 12.0367C8.78089 11.9457 8.80029 11.8482 8.80029 11.7497C8.80029 11.6512 8.78089 11.5537 8.7432 11.4627C8.70551 11.3717 8.65027 11.289 8.58062 11.2194C8.51098 11.1497 8.4283 11.0945 8.33731 11.0568C8.24631 11.0191 8.14878 10.9997 8.05029 10.9997C7.85138 10.9997 7.66061 11.0787 7.51996 11.2194C7.37931 11.36 7.30029 11.5508 7.30029 11.7497C7.30029 11.9486 7.37931 12.1394 7.51996 12.28C7.66061 12.4207 7.85138 12.4997 8.05029 12.4997Z"
                                                            fill="#282A30"></path>
                                                    </svg>
                                                </div>
                                            </td>
                                            <td class="border border-top-0 border-bottom-0">
                                                <input readonly type="text"
                                                    class="border-0 px-2 py-1 w-100 product_unit"
                                                    value="{{ $item->product_unit }}">
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 border-right-0">
                                                <input readonly type="text"
                                                    class="border-0 px-2 py-1 w-100 quantity-input"
                                                    value="{{ number_format($item->product_qty) }}">
                                            </td>
                                            <td class="border border-top-0 border-bottom-0">
                                                <input readonly type="text" name="price_export[]"
                                                    class="border-0 px-2 py-1 w-100 price_export"
                                                    value="{{ number_format($item->price_export) }}">
                                            </td>
                                            <td class="border border-top-0 border-bottom-0 border-right-0">
                                                <input readonly type="text"
                                                    class="border-0 px-2 py-1 w-100 product_tax"
                                                    value="{{ $item->product_tax == 99 ? 'NOVAT' : $item->product_tax }}"
                                                    disabled>
                                            </td>
                                            <input type="hidden" class="product_tax1">
                                            <td class="border border-top-0 border-bottom-0 border-right-0">
                                                <input readonly type="text" name="" id=""
                                                    class="border-0 px-2 py-1 w-100 total_price"
                                                    value="{{ number_format($item->product_total) }}">
                                            </td>
                                            <td class="border border-top-0 border-bottom-0">
                                                <input readonly type="text" class="border-0 px-2 py-1 w-100"
                                                    value="{{ $item->product_note }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>
                    <?php $import = '123'; ?>
                    <x-formsynthetic :import="$import"></x-formsynthetic>
                </div>

                <section id="files" class="tab-pane fade">
                    <div class="bg-filter-search border-bottom-0 text-center py-2">
                        <span class="font-weight-bold text-secondary text-nav">FILE ĐÍNH KÈM</span>
                    </div>
                    <x-form-attachment :value="$reciept" name="HDMH"></x-form-attachment>
                </section>


                <div class="content-wrapper2 px-0 py-0">
                    <div id="mySidenav" class="sidenavshow border" style="top: 98px;">
                        <div id="show_info_Guest">
                            <div class="bg-filter-search border-top-0 py-2 text-center">
                                <span class="font-weight-bold text-secondary">THÔNG TIN NHÀ
                                    CUNG CẤP</span>
                            </div>

                            <div class="d-flex">
                                <div style="width:55%;">
                                    <div class="border border-right-0 py-1 border-left-0">
                                        <span class="text-table ml-2">Đơn mua hàng</span>
                                    </div>
                                    <div class="border border-right-0 py-1 border-left-0">
                                        <span class="text-table ml-2">Nhà cung cấp</span>
                                    </div>
                                    <div class="border border-right-0 py-1 border-left-0">
                                        <span class="text-table ml-2">Người đại diện</span>
                                    </div>
                                    <div class="border border-right-0 py-1 border-left-0">
                                        <span class="text-table ml-2">Số hóa đơn</span>
                                    </div>
                                    <div class="border border-right-0 py-1 border-left-0">
                                        <span class="text-table ml-2">Ngày hóa đơn</span>
                                    </div>
                                </div>
                                <div class="">
                                    <div
                                        class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                                        <input id="search_quotation" type="text" placeholder="Nhập thông tin"
                                            name="quotation_number"
                                            class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0 search_quotation"
                                            autocomplete="off" required
                                            @if ($reciept->status == 2) readonly @endif
                                            value="{{ $reciept->getQuotation->quotation_number == null ? $reciept->getQuotation->id : $reciept->getQuotation->quotation_number }}">
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

                                    <div
                                        class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                                        <input readonly type="text" id="provide_name" placeholder="Nhập thông tin"
                                            class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0"
                                            value="{{ $reciept->getProvideName->provide_name_display }}">
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

                                    <div
                                        class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                                        <input readonly type="text" placeholder="Chọn thông tin"
                                            class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0"
                                            autocomplete="off" id="represent"
                                            @if ($nameRepresent) value="{{ $nameRepresent }}" @endif>
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

                                    <div
                                        class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                                        <input required type="text" placeholder="Nhập thông tin"
                                            name="number_bill"
                                            class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0"
                                            @if ($reciept->status == 2) readonly @endif
                                            value="{{ $reciept->number_bill }}">
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

                                    <div
                                        class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                                        <input id="datePicker" required type="text" placeholder="Nhập thông tin"
                                            class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0"
                                            @if ($reciept->status == 2) readonly @endif
                                            value="{{ date_format(new DateTime($reciept->date_bill), 'd/m/Y') }}">
                                        <input type="hidden" name="date_bill" id="hiddenDateInput"
                                            value="{{ Carbon\Carbon::parse($reciept->date_bill)->toDateString() }}">
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
        </div>
    </div>
</form>

<div id="files" class="tab-pane fade">
    <x-form-attachment :value="$reciept" name="HDMH"></x-form-attachment>
</div>
</div>
</div>
</div>
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
    // Xóa đơn hàng
    deleteImport('#delete_reciept',
        '{{ route('reciept.destroy', ['workspace' => $workspacename, 'reciept' => $reciept->id]) }}')
    $('#listReceive').hide();
    $('.search_quotation').on('click', function() {
        $('#listReceive').show();
    })

    $('#file_restore').on('change', function(e) {
        e.preventDefault();
        $('#formSubmit').attr('action', '{{ route('addAttachment') }}');
        $('input[name="_method"]').remove();
        $('#formSubmit')[0].submit();
    })

    // $('.search-receive').on('click', function() {
    //     detail_id = $(this).attr('id');
    //     $.ajax({
    //         url: "{{ route('show_receive') }}",
    //         type: "get",
    //         data: {
    //             detail_id: detail_id
    //         },
    //         success: function(data) {
    //             $('#search_quotation').val(data.quotation_number);
    //             $('#provide_name').val(data.provide_name);
    //             $('#detailimport_id').val(data.id)
    //             $('#listReceive').hide();
    //             $.ajax({
    //                 url: "{{ route('getProduct') }}",
    //                 type: "get",
    //                 data: {
    //                     id: data.id
    //                 },
    //                 success: function(product) {
    //                     $('#inputcontent tbody').empty();
    //                     product.forEach(function(element) {
    //                         var tr =
    //                             `
    //                             <tr class="bg-white">
    //                                 <td class="border border-left-0 border-top-0 border-bottom-0">
    //                                 <input type="hidden" readonly= value="` + element.id +
    //                             `" name="listProduct[]">
    //                                 <div class="d-flex w-100 justify-content-between align-items-center position-relative">
    //                                     <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    //                                         <path fill-rule="evenodd" clip-rule="evenodd" d="M9 3C7.89543 3 7 3.89543 7 5C7 6.10457 7.89543 7 9 7C10.1046 7 11 6.10457 11 5C11 3.89543 10.1046 3 9 3Z" fill="#42526E"></path>
    //                                         <path fill-rule="evenodd" clip-rule="evenodd" d="M9 10C7.89543 10 7 10.8954 7 12C7 13.1046 7.89543 14 9 14C10.1046 14 11 13.1046 11 12C11 10.8954 10.1046 10 9 10Z" fill="#42526E"></path>
    //                                         <path fill-rule="evenodd" clip-rule="evenodd" d="M9 17C7.89543 17 7 17.8954 7 19C7 20.1046 7.89543 21 9 21C10.1046 21 11 20.1046 11 19C11 17.8954 10.1046 17 9 17Z" fill="#42526E"></path>
    //                                         <path fill-rule="evenodd" clip-rule="evenodd" d="M15 3C13.8954 3 13 3.89543 13 5C13 6.10457 13.8954 7 15 7C16.1046 7 17 6.10457 17 5C17 3.89543 16.1046 3 15 3Z" fill="#42526E"></path>
    //                                         <path fill-rule="evenodd" clip-rule="evenodd" d="M15 10C13.8954 10 13 10.8954 13 12C13 13.1046 13.8954 14 15 14C16.1046 14 17 13.1046 17 12C17 10.8954 16.1046 10 15 10Z" fill="#42526E"></path>
    //                                         <path fill-rule="evenodd" clip-rule="evenodd" d="M15 17C13.8954 17 13 17.8954 13 19C13 20.1046 13.8954 21 15 21C16.1046 21 17 20.1046 17 19C17 17.8954 16.1046 17 15 17Z" fill="#42526E"></path>
    //                                     </svg>
    //                                     <input type="checkbox">
    //                                     <input type="text" readonly name="product_code[]" class="border-0 px-3 py-2 w-75 searchProduct" value="">
    //                                     <ul id="listProductCode" class="listProductCode bg-white position-absolute w-100 rounded shadow p-0 scroll-data" style="z-index: 99; left: 24%; top: 75%;">
    //                                     </ul>
    //                                 </div>
    //                             </td> 
    //                             <td class="border border-top-0 border-bottom-0 position-relative">
    //                                 <input readonly id="searchProductName" type="text" name="product_name[]" class="searchProductName border-0 px-3 py-2 w-100" value="` +
    //                             element.product_name +
    //                             `">
    //                             </td>   
    //                             <td> 
    //                                 <input readonly type="text" name="product_unit[]" class="border-0 px-3 py-2 w-100 product_unit" value="` +
    //                             element
    //                             .product_unit +
    //                             `">
    //                             </td>
    //                             <td class="border border-top-0 border-bottom-0 border-right-0">
    //                                 <input readonly type="text" name="product_qty[]" class="border-0 px-3 py-2 w-100 quantity-input" value="` +
    //                             formatCurrency(element.product_qty) +
    //                             `">
    //                             </td>
    //                             <td class="border border-top-0 border-bottom-0 border-right-0">
    //                                 <input readonly type="text" name="price_export[]" class="border-0 px-3 py-2 w-100 price_export" value="` +
    //                             formatCurrency(element
    //                                 .price_export) +
    //                             `">
    //                             </td>
    //                             <td class="border border-top-0 border-bottom-0 border-right-0">
    //                                 <input readonly type="text" name="product_tax[]" class="border-0 px-3 py-2 w-100 product_tax" value="` +
    //                             element.product_tax +
    //                             `%">
    //                             </td>
    //                             <td class="border border-top-0 border-bottom-0 border-right-0">
    //                                 <input readonly type="text" name="total_price[]" class="border-0 px-3 py-2 w-100 total_price" readonly="" value="` +
    //                             formatCurrency(element.product_total) +
    //                             `">
    //                             </td>
    //                             <td class="border border-bottom-0 p-0 bg-secondary"></td>
    //                             <td class="border border-top-0 border-bottom-0 product-ratio">
    //                                 <input readonly required="" type="text" name="product_ratio[]" class="border-0 px-3 py-2 w-100 product_ratio" value="` +
    //                             element.product_ratio +
    //                             `">
    //                             </td>
    //                             <td class="border border-top-0 border-bottom-0 price_import">
    //                                 <input readonly required="" type="text" name="price_import[]" class="border-0 px-3 py-2 w-100 price_import" value="` +
    //                             formatCurrency(element.price_import) +
    //                             `">
    //                             </td>
    //                             <td class="border border-top-0 border-bottom-0">
    //                                 <input readonly type="text" name="product_note[]" class="border-0 px-3 py-2 w-100" value="` +
    //                             (element.product_note == null ? "" : element
    //                                 .product_note) + `">
    //                             </td>
    //                             <td class="border border-top-0 border deleteRow"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    //                                     <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5454 5C10.2442 5 9.99999 5.24421 9.99999 5.54545C9.99999 5.8467 10.2442 6.09091 10.5454 6.09091H13.4545C13.7558 6.09091 14 5.8467 14 5.54545C14 5.24421 13.7558 5 13.4545 5H10.5454ZM6 7.72726C6 7.42601 6.24421 7.18181 6.54545 7.18181H7.63637H16.3636H17.4545C17.7558 7.18181 18 7.42601 18 7.72726C18 8.02851 17.7558 8.27272 17.4545 8.27272H16.9091V17C16.9091 18.2113 15.9118 19.1818 14.7135 19.1818H9.25891C8.97278 19.1816 8.68906 19.1247 8.42499 19.0145C8.16092 18.9044 7.92126 18.7431 7.71979 18.5399C7.51833 18.3367 7.35905 18.0957 7.25112 17.8307C7.14347 17.5664 7.08903 17.2834 7.09091 16.9981V8.27272H6.54545C6.24421 8.27272 6 8.02851 6 7.72726ZM8.18182 17.0041V8.27272H15.8182V17C15.8182 17.5966 15.3216 18.0909 14.7135 18.0909H9.25938C9.11713 18.0908 8.97632 18.0625 8.84503 18.0077C8.71375 17.953 8.5946 17.8728 8.49444 17.7718C8.39429 17.6707 8.3151 17.5509 8.26144 17.4192C8.20779 17.2874 8.18074 17.1464 8.18182 17.0041ZM13.4545 10.0909C13.7558 10.0909 14 10.3351 14 10.6364V15.7273C14 16.0285 13.7558 16.2727 13.4545 16.2727C13.1533 16.2727 12.9091 16.0285 12.9091 15.7273V10.6364C12.9091 10.3351 13.1533 10.0909 13.4545 10.0909ZM11.0909 10.6364C11.0909 10.3351 10.8467 10.0909 10.5454 10.0909C10.2442 10.0909 9.99999 10.3351 9.99999 10.6364V15.7273C9.99999 16.0285 10.2442 16.2727 10.5454 16.2727C10.8467 16.2727 11.0909 16.0285 11.0909 15.7273V10.6364Z" fill="#42526E"></path>
    //                                 </svg>
    //                             </td>
    //                             </tr>
    //                         `;
    //                         $('#inputcontent tbody').append(tr);
    //                         deleteRow()
    //                     })
    //                 }
    //             })
    //         }
    //     })
    // })
</script>
