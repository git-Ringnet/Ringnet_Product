<x-navbar :title="$title" activeGroup="buy" activeName="receive"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<form action="{{ route('receive.update', ['workspace' => $workspacename, 'receive' => $receive->id]) }}" method="POST"
    id="formSubmit" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="content-wrapper1 py-0 border-bottom px-4">
        <!-- Content Header (Page header) -->

        <input type="hidden" name="detailimport_id" id="detailimport_id">
        <input type="hidden" value="" name="action" id="getAction">
        <input type="hidden" name="detail_id" value="{{ $receive->id }}">
        <input type="hidden" name="table_name" value="DNH">


        <div class="d-flex justify-content-between align-items-center">
            <div class="container-fluided">
                <div class="mb-3">
                    <span class="font-weight-bold">Mua hàng</span>
                    <span class="mx-2">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8"></path>
                        </svg>
                    </span>
                    <span class="font-weight-bold">Đơn nhận hàng</span>
                    <span class="mx-2">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8"></path>
                        </svg>
                    </span>
                    <span>{{ $receive->id }}</span>
                    <span class="border ml-2 p-1 text-nav text-secondary shadow-sm rounded">
                        @if ($receive->status == 1)
                            Chưa giao
                        @else
                            Đã giao
                        @endif
                    </span>
                </div>
            </div>
            <div class="container-fluided">
                <div class="row m-0 mb-3">
                    <a href="{{ route('receive.index', $workspacename) }}">
                        <button type="button" class="btn-save-print rounded d-flex align-items-center h-100"
                            style="margin-right:10px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="8" viewBox="0 0 10 8"
                                fill="none" class="mr-2">
                                <path
                                    d="M2.6738 7.48012C2.939 7.79833 3.41191 7.84132 3.73012 7.57615C4.04833 7.31097 4.09132 6.83805 3.82615 6.51984L2.3513 4.75L9.25 4.75C9.66421 4.75 10 4.41421 10 4C10 3.58579 9.66421 3.25 9.25 3.25L2.3512 3.25L3.82615 1.4801C4.09132 1.1619 4.04833 0.688999 3.73012 0.423799C3.41191 0.158599 2.939 0.201599 2.6738 0.519799L0.1738 3.51984C-0.0579996 3.79798 -0.0579996 4.20198 0.1738 4.48012L2.6738 7.48012Z"
                                    fill="#6D7075"></path>
                            </svg>
                            <span>Trở về</span>
                        </button>
                    </a>

                    <div class="dropdown">
                        <button type="button" data-toggle="dropdown"
                            class="btn-save-print d-flex align-items-center h-100 dropdown-toggle rounded"
                            style="margin-right:10px">
                            <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.75528 1.6875H5.99476H11.9948H12.123C12.3939 1.6875 12.6621 1.74088 12.9123 1.84459C13.1626 1.94829 13.3899 2.10029 13.5814 2.29189L15.7022 4.41269C16.089 4.79939 16.3064 5.32394 16.3065 5.87088V14.25C16.3065 14.797 16.0892 15.3216 15.7024 15.7084C15.3156 16.0952 14.791 16.3125 14.244 16.3125H12.75H5.25H3.83328C3.28894 16.3125 2.76666 16.0973 2.38031 15.7139C1.99396 15.3304 1.77486 14.8098 1.77078 14.2655L1.69278 3.76547C1.69074 3.49333 1.74258 3.22344 1.84531 2.97143C1.94805 2.71941 2.09965 2.49021 2.29137 2.29705C2.4831 2.10389 2.71115 1.95058 2.9624 1.84597C3.21364 1.74135 3.48312 1.68749 3.75528 1.6875ZM5.8125 15.1875H12.1875V9.9645C12.1875 9.74238 12.0071 9.5625 11.7862 9.5625H6.2145C5.99266 9.5625 5.8125 9.74266 5.8125 9.9645V15.1875ZM13.3125 15.1875V9.9645C13.3125 9.12163 12.6289 8.4375 11.7862 8.4375H6.2145C5.37134 8.4375 4.6875 9.12134 4.6875 9.9645V15.1875H3.83326C3.58582 15.1875 3.34842 15.0897 3.17281 14.9154C2.9972 14.7411 2.89761 14.5044 2.89574 14.257L2.81774 3.75703C2.81682 3.63333 2.84038 3.51066 2.88708 3.39611C2.93378 3.28155 3.00269 3.17737 3.08983 3.08957C3.17698 3.00177 3.28064 2.93208 3.39485 2.88453C3.50905 2.83698 3.63154 2.8125 3.75524 2.8125H5.43226V5.18175C5.43226 5.52985 5.57054 5.86369 5.81668 6.10983C6.06282 6.35597 6.39666 6.49425 6.74476 6.49425H11.2448C11.5929 6.49425 11.9267 6.35597 12.1728 6.10983C12.419 5.86369 12.5573 5.52985 12.5573 5.18175V2.91925C12.6414 2.96326 12.7185 3.01991 12.7858 3.08725L14.9068 5.20831C15.0826 5.38405 15.1814 5.62254 15.1815 5.87112V14.25C15.1815 14.4986 15.0827 14.7371 14.9069 14.9129C14.7311 15.0887 14.4926 15.1875 14.244 15.1875H13.3125ZM11.4323 5.18175V2.8125H6.55726V5.18175C6.55726 5.23148 6.57701 5.27917 6.61218 5.31433C6.64734 5.3495 6.69503 5.36925 6.74476 5.36925H11.2448C11.2945 5.36925 11.3422 5.3495 11.3773 5.31433C11.4125 5.27917 11.4323 5.23148 11.4323 5.18175Z"
                                    fill="white" />
                            </svg>
                            <span>In</span>
                        </button>
                        <div class="dropdown-menu" style="z-index: 9999;">
                            <a class="dropdown-item" href="#">Xuất Excel</a>
                            <a class="dropdown-item" href="#">Xuất PDF</a>
                        </div>
                    </div>


                    <label class="custom-btn d-flex align-items-center h-100 m-0 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                            fill="none" class="mr-2">
                            <path
                                d="M8.30541 9.20586C8.57207 9.47246 8.5943 9.89106 8.37208 10.183L8.30541 10.2593L5.84734 12.7174C4.58675 13.978 2.54294 13.978 1.28235 12.7174C0.0652319 11.5003 0.0232719 9.55296 1.15644 8.2855L1.28235 8.15237L3.74042 5.69429C4.03133 5.40339 4.50298 5.40339 4.79388 5.69429C5.06054 5.96096 5.08277 6.37949 4.86055 6.67147L4.79388 6.74775L2.33581 9.20586C1.65703 9.88456 1.65703 10.9852 2.33581 11.6639C2.98065 12.3088 4.00611 12.341 4.68901 11.7607L4.79388 11.6639L7.25195 9.20586C7.54286 8.91492 8.01451 8.91492 8.30541 9.20586ZM8.82965 5.17005C9.12053 5.46095 9.12053 5.9326 8.82965 6.22351L6.34904 8.70413C6.05813 8.99504 5.58648 8.99504 5.29558 8.70413C5.00467 8.41323 5.00467 7.94158 5.29558 7.65067L7.7762 5.17005C8.0671 4.87914 8.53875 4.87914 8.82965 5.17005ZM12.7173 1.28236C13.9344 2.49948 13.9764 4.44674 12.8432 5.71422L12.7173 5.84735L10.2592 8.30543C9.96833 8.59633 9.49673 8.59633 9.20583 8.30543C8.93914 8.03877 8.91692 7.62023 9.13913 7.32825L9.20583 7.25197L11.6638 4.79389C12.3426 4.11511 12.3426 3.0146 11.6638 2.33582C11.019 1.69098 9.99363 1.65874 9.31073 2.23909L9.20583 2.33582L6.74774 4.79389C6.45683 5.0848 5.98518 5.0848 5.69428 4.79389C5.42762 4.52723 5.40539 4.10869 5.62761 3.81672L5.69428 3.74043L8.15235 1.28236C9.41293 0.0217665 11.4567 0.0217665 12.7173 1.28236Z"
                                fill="white"></path>
                        </svg>
                        <span>Đính kèm file</span><input type="file" style="display: none;" id="file_restore"
                            accept="*" name="file">
                    </label>

                    <a href="#" onclick="getAction(this)">
                        <button value="2" type="submit"
                            class="btn-save-print d-flex align-items-center h-100 rounded" style="margin-right:10px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                                fill="none" class="mr-2">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM10.7836 5.42901C11.0858 5.08709 11.0695 4.55006 10.7472 4.22952C10.4248 3.90897 9.9186 3.9263 9.6164 4.26821L6.14921 8.19122L4.3315 6.4773C4.00127 6.16593 3.49561 6.19748 3.20208 6.54777C2.90855 6.89806 2.93829 7.43445 3.26852 7.74581L5.28032 9.6427C5.82041 10.152 6.64463 10.1122 7.13886 9.553L10.7836 5.42901Z"
                                    fill="#6D7075" />
                            </svg>
                            <span>Nhận hàng</span>
                        </button>
                    </a>

                    <a href="#" id="delete_receive"
                        class="d-flex align-items-center h-100 btn-danger mr-2 rounded" style="padding: 6px 8px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                            fill="none" class="mr-2">
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
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <section class="content-wrapper1 p-2 position-relative" style="margin-top:2px; margin-bottom: 2px;">
        <div class="d-flex justify-content-between">
            <ul class="nav nav-tabs bg-filter-search border-0 py-2 rounded ml-3">
                <li class="text-nav"><a data-toggle="tab" href="#info" class="active text-secondary">Thông
                        tin</a>
                </li>
                <li class="text-nav">
                    <a data-toggle="tab" href="#files" class="text-secondary">File đính kèm</a>
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
                    <div class="bg-filter-search border-bottom-0 text-center py-2">
                        <span class="font-weight-bold text-secondary text-nav">THÔNG TIN SẢN PHẨM</span>
                    </div>
                    <div class="col-12">
                        <section class="content">
                            <div class="container-fluided order_content">
                                <table id="inputcontent" class="table table-hover bg-white rounded">
                                    <thead>
                                        <tr>
                                            <th class="border-right p-1" style="width:15%;"><input type="checkbox">
                                                <span class="text-table text-secondary">Mã sản phẩm</span>
                                            </th>
                                            <th class="border-right p-1" style="width:25%;">
                                                <span class="text-table text-secondary"> Tên sản phẩm</span>
                                            </th>
                                            <th class="border-right p-1" style="width:10%;">
                                                <span class="text-table text-secondary">Đơn vị</span>
                                            </th>
                                            <th class="border-right p-1" style="width:15%;">
                                                <span class="text-table text-secondary">Số lượng</span>
                                            </th>
                                            <th class="border-right p-1" style="width:10%;">
                                                <span class="text-table text-secondary">Quản lý S/N</span>
                                            </th>
                                            <th class="border-right p-1" style="width:10%;">
                                                <span class="text-table text-secondary">Ghi chú</span>
                                            </th>
                                            <th class="border-top border-right p-1" style="width:1%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $st = 0; ?>
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
                                                        <input type="checkbox">
                                                        <input readonly type="text" name="product_code[]"
                                                            id=""
                                                            class="border-0 px-3 py-2 w-75 searchProduct">
                                                        {{ $item->product_code }}
                                                    </div>
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 position-relative">
                                                    <div class="d-flex w-100 justify-content-between align-items-center">
                                                        <input type="text"
                                                            class="searchProductName border-0 px-3 py-2 w-100"
                                                            name="product_name[]" value="{{ $item->product_name }}"
                                                            readonly>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 16 16" fill="none">
                                                            <path
                                                                d="M8.0002 1.69571C6.32827 1.69571 4.72483 2.35988 3.5426 3.54211C2.36037 4.72434 1.6962 6.32779 1.6962 7.99971C1.6962 9.67164 2.36037 11.2751 3.5426 12.4573C4.72483 13.6395 6.32827 14.3037 8.0002 14.3037C9.67212 14.3037 11.2756 13.6395 12.4578 12.4573C13.64 11.2751 14.3042 9.67164 14.3042 7.99971C14.3042 6.32779 13.64 4.72434 12.4578 3.54211C11.2756 2.35988 9.67212 1.69571 8.0002 1.69571ZM0.304199 7.99971C0.304199 5.9586 1.11503 4.0011 2.55831 2.55782C4.00159 1.11454 5.95909 0.303711 8.0002 0.303711C10.0413 0.303711 11.9988 1.11454 13.4421 2.55782C14.8854 4.0011 15.6962 5.9586 15.6962 7.99971C15.6962 10.0408 14.8854 11.9983 13.4421 13.4416C11.9988 14.8849 10.0413 15.6957 8.0002 15.6957C5.95909 15.6957 4.00159 14.8849 2.55831 13.4416C1.11503 11.9983 0.304199 10.0408 0.304199 7.99971Z"
                                                                fill="#282A30" />
                                                            <path
                                                                d="M8.08026 4.96571C7.92018 4.95474 7.75956 4.97681 7.60838 5.03055C7.4572 5.08429 7.31869 5.16855 7.20146 5.2781C7.08422 5.38764 6.99077 5.52012 6.92691 5.66732C6.86306 5.81451 6.83015 5.97327 6.83026 6.13371C6.83026 6.31844 6.75688 6.49559 6.62626 6.62621C6.49564 6.75683 6.31848 6.83021 6.13376 6.83021C5.94903 6.83021 5.77188 6.75683 5.64126 6.62621C5.51064 6.49559 5.43726 6.31844 5.43726 6.13371C5.43716 5.6638 5.56625 5.20289 5.81043 4.8014C6.05461 4.3999 6.40447 4.07326 6.82176 3.85719C7.23906 3.64111 7.70773 3.54393 8.17653 3.57625C8.64534 3.60856 9.09623 3.76915 9.47993 4.04044C9.86363 4.31174 10.1654 4.6833 10.3521 5.1145C10.5389 5.54571 10.6035 6.01997 10.5389 6.48542C10.4744 6.95088 10.283 7.38963 9.98593 7.75369C9.68881 8.11776 9.29732 8.39314 8.85426 8.54971C8.80815 8.56625 8.76829 8.59666 8.74018 8.63678C8.71206 8.67689 8.69707 8.72473 8.69726 8.77371V9.39971C8.69726 9.58444 8.62387 9.76159 8.49326 9.89221C8.36264 10.0228 8.18548 10.0962 8.00076 10.0962C7.81603 10.0962 7.63888 10.0228 7.50826 9.89221C7.37764 9.76159 7.30426 9.58444 7.30426 9.39971V8.77371C7.30416 8.43668 7.40854 8.10791 7.60303 7.83265C7.79752 7.5574 8.07255 7.3492 8.39026 7.23671C8.64378 7.14687 8.85861 6.97241 8.99857 6.74271C9.13853 6.51302 9.19507 6.24211 9.15867 5.97561C9.12228 5.70911 8.99517 5.46328 8.79875 5.27952C8.60233 5.09576 8.34859 4.98429 8.08026 4.96571Z"
                                                                fill="#282A30" />
                                                            <path
                                                                d="M8.05029 11.5707C8.00282 11.5707 7.95729 11.5896 7.92372 11.6231C7.89015 11.6567 7.87129 11.7022 7.87129 11.7497C7.87129 11.7972 7.89015 11.8427 7.92372 11.8763C7.95729 11.9099 8.00282 11.9287 8.05029 11.9287C8.09777 11.9287 8.1433 11.9099 8.17686 11.8763C8.21043 11.8427 8.22929 11.7972 8.22929 11.7497C8.22929 11.7022 8.21043 11.6567 8.17686 11.6231C8.1433 11.5896 8.09777 11.5707 8.05029 11.5707ZM8.05029 12.4997C8.14878 12.4997 8.24631 12.4803 8.33731 12.4426C8.4283 12.4049 8.51098 12.3497 8.58062 12.28C8.65027 12.2104 8.70551 12.1277 8.7432 12.0367C8.78089 11.9457 8.80029 11.8482 8.80029 11.7497C8.80029 11.6512 8.78089 11.5537 8.7432 11.4627C8.70551 11.3717 8.65027 11.289 8.58062 11.2194C8.51098 11.1497 8.4283 11.0945 8.33731 11.0568C8.24631 11.0191 8.14878 10.9997 8.05029 10.9997C7.85138 10.9997 7.66061 11.0787 7.51996 11.2194C7.37931 11.36 7.30029 11.5508 7.30029 11.7497C7.30029 11.9486 7.37931 12.1394 7.51996 12.28C7.66061 12.4207 7.85138 12.4997 8.05029 12.4997Z"
                                                                fill="#282A30" />
                                                        </svg>
                                                    </div>

                                                </td>
                                                <td class="border border-top-0 border-bottom-0">
                                                    {{ $item->product_unit }}
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 border-right-0">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <input @if ($receive->status == 2) readonly @endif
                                                            type="text"
                                                            class="border-0 px-3 py-2 w-100 quantity-input"
                                                            name="product_qty[]" {{-- oninput="checkQty(this,{{ $item->product_qty }})"  --}} readonly
                                                            value="{{ number_format($item->product_qty) }}">
                                                        @if ($item->cbSN == 1)
                                                            <button type="button" class="btn btn-primary"
                                                                data-toggle="modal"
                                                                data-target="#exampleModal{{ $st }}"
                                                                style="background:transparent; border:none;">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                                    height="32" viewBox="0 0 32 32"
                                                                    fill="none">
                                                                    <rect width="32" height="32"
                                                                        rx="4" fill="white">
                                                                    </rect>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M11.9062 10.643C11.9062 10.2092 12.258 9.85742 12.6919 9.85742H24.2189C24.6528 9.85742 25.0045 10.2092 25.0045 10.643C25.0045 11.0769 24.6528 11.4286 24.2189 11.4286H12.6919C12.258 11.4286 11.9062 11.0769 11.9062 10.643Z"
                                                                        fill="#0095F6">
                                                                    </path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M11.9062 16.4707C11.9062 16.0368 12.258 15.6851 12.6919 15.6851H24.2189C24.6528 15.6851 25.0045 16.0368 25.0045 16.4707C25.0045 16.9045 24.6528 17.2563 24.2189 17.2563H12.6919C12.258 17.2563 11.9062 16.9045 11.9062 16.4707Z"
                                                                        fill="#0095F6">
                                                                    </path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M11.9062 22.2978C11.9062 21.8639 12.258 21.5122 12.6919 21.5122H24.2189C24.6528 21.5122 25.0045 21.8639 25.0045 22.2978C25.0045 22.7317 24.6528 23.0834 24.2189 23.0834H12.6919C12.258 23.0834 11.9062 22.7317 11.9062 22.2978Z"
                                                                        fill="#0095F6">
                                                                    </path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M6.6665 10.6431C6.6665 9.91981 7.25282 9.3335 7.97607 9.3335C8.69932 9.3335 9.28563 9.91981 9.28563 10.6431C9.28563 11.3663 8.69932 11.9526 7.97607 11.9526C7.25282 11.9526 6.6665 11.3663 6.6665 10.6431ZM6.6665 16.4705C6.6665 15.7473 7.25282 15.161 7.97607 15.161C8.69932 15.161 9.28563 15.7473 9.28563 16.4705C9.28563 17.1938 8.69932 17.7801 7.97607 17.7801C7.25282 17.7801 6.6665 17.1938 6.6665 16.4705ZM7.97607 20.9884C7.25282 20.9884 6.6665 21.5747 6.6665 22.298C6.6665 23.0212 7.25282 23.6075 7.97607 23.6075C8.69932 23.6075 9.28563 23.0212 9.28563 22.298C9.28563 21.5747 8.69932 20.9884 7.97607 20.9884Z"
                                                                        fill="#0095F6">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td
                                                    class="border border-top-0 border-bottom-0 border-right-0 text-center">
                                                    <input type="checkbox" name="cbSeri[]" disabled
                                                        value="{{ $item->cbSN }}"
                                                        @if ($item->cbSN == 1) {{ 'checked' }} @endif>
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 d-none">
                                                    <input type="text"
                                                        class="border-0 px-3 py-2 w-100 price_export"
                                                        name="price_export[]"
                                                        value="{{ fmod($item->price_export, 1) > 0 ? number_format($item->price_export, 2, '.', ',') : number_format($item->price_export) }}"
                                                        readonly>
                                                </td>
                                                <td class="d-none">
                                                    <input type="text" class="border-0 px-3 py-2 w-100 product_tax"
                                                        name="product_tax[]" value="{{ $item->product_tax }}"
                                                        readonly>
                                                </td>
                                                <input type="hidden" class="product_tax1">
                                                <td class="border border-top-0 border-bottom-0 border-right-0 d-none">
                                                    <input type="text" class="border-0 px-3 py-2 w-100 total_price"
                                                        name="total_price[]"
                                                        value="{{ fmod($item->product_total, 1) > 0 ? number_format($item->product_total, 2, '.', ',') : number_format($item->product_total) }}"
                                                        readonly>
                                                </td>
                                                <td class="border border-top-0 border-bottom-0">
                                                    <input type="text" class="border-0 px-3 py-2 w-100"
                                                        name="product_note[]" value="{{ $item->product_note }}"
                                                        readonly>
                                                </td>
                                                <td
                                                    class="border border-top-0 @if ($receive->status == 3) deleteRow @endif">
                                                    <svg width="17" height="17" viewBox="0 0 17 17"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M13.1417 6.90625C13.4351 6.90625 13.673 7.1441 13.673 7.4375C13.673 7.47847 13.6682 7.5193 13.6589 7.55918L12.073 14.2992C11.8471 15.2591 10.9906 15.9375 10.0045 15.9375H6.99553C6.00943 15.9375 5.15288 15.2591 4.92702 14.2992L3.34113 7.55918C3.27393 7.27358 3.45098 6.98757 3.73658 6.92037C3.77645 6.91099 3.81729 6.90625 3.85826 6.90625H13.1417ZM9.03125 1.0625C10.4983 1.0625 11.6875 2.25175 11.6875 3.71875H13.8125C14.3993 3.71875 14.875 4.19445 14.875 4.78125V5.3125C14.875 5.6059 14.6371 5.84375 14.3438 5.84375H2.65625C2.36285 5.84375 2.125 5.6059 2.125 5.3125V4.78125C2.125 4.19445 2.6007 3.71875 3.1875 3.71875H5.3125C5.3125 2.25175 6.50175 1.0625 7.96875 1.0625H9.03125ZM9.03125 2.65625H7.96875C7.38195 2.65625 6.90625 3.13195 6.90625 3.71875H10.0938C10.0938 3.13195 9.61805 2.65625 9.03125 2.65625Z"
                                                            fill="#6B6F76"></path>
                                                    </svg>
                                                </td>
                                            </tr>
                                            <?php $st++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </section>
                        <?php $import = '123'; ?>
                        <x-formsynthetic :import="$import"></x-formsynthetic>
                    </div>
                </div>

                <section id="files" class="tab-pane fade">
                    <div class="bg-filter-search border-bottom-0 text-center py-2">
                        <span class="font-weight-bold text-secondary text-nav">File đính kèm</span>
                    </div>
                    <x-form-attachment :value="$receive" name="DNH"></x-form-attachment>
                </section>


                <div class="content-wrapper2 px-0 py-0">
                    <div id="mySidenav" class="sidenavshow" style="top: 137px;">
                        <div id="show_info_Guest">
                            <div class="bg-filter-search border-top-0 py-2 text-center">
                                <span class="font-weight-bold text-secondary">THÔNG TIN NHÀ
                                    CUNG CẤP</span>
                            </div>
                            <div
                                class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                <span class="text-table mr-3">Đơn mua hàng</span>
                                <input id="search_quotation" type="text" placeholder="Nhập thông tin"
                                    name="quotation_number"
                                    class="border-0 bg w-50 bg-input-guest py-0 px-0 nameGuest search_quotation"
                                    autocomplete="off" required
                                    value="{{ $receive->quotation_number == null ? $receive->id : $receive->quotation_number }}"
                                    readonly>
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

                            {{-- Nhà cung cấp --}}
                            <div
                                class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                <span class="text-table mr-3">Nhà cung cấp</span>
                                <input readonly type="text" id="provide_name" placeholder="Nhập thông tin"
                                    class="border-0 bg w-50 bg-input-guest py-0 px-0 nameGuest"
                                    value="{{ $receive->getNameProvide->provide_name_display }}">
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
                                class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                <span class="text-table mr-3">Người đại diện</span>
                                <input readonly type="text" placeholder="Chọn thông tin"
                                    class="border-0 bg w-50 bg-input-guest py-0 px-0 nameGuest" autocomplete="off"
                                    id="represent">
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
                                class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                <span class="text-table mr-3">Mã thanh toán</span>
                                <input readonly type="text" placeholder="Chọn thông tin" name="reference_number"
                                    class="border-0 bg w-50 bg-input-guest py-0 px-0 nameGuest" autocomplete="off">
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
                            {{-- Đơn vị vận chuyển --}}
                            <div
                                class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                <span class="text-table mr-3">Đơn vị vận chuyển</span>
                                <input type="text" placeholder="Nhập thông tin" name="shipping_unit"
                                    class="border-0 bg w-50 bg-input-guest py-0 px-0 nameGuest"
                                    value="{{ $receive->shipping_unit }}"
                                    @if ($receive->status == 2) readonly @endif>
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
                            {{-- Phí giao hàng --}}
                            <div
                                class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                <span class="text-table mr-3">Phí giao hàng</span>
                                <input type="text" placeholder="Nhập thông tin" name="delivery_charges"
                                    class="border-0 bg w-50 bg-input-guest py-0 px-0 nameGuest"
                                    value="{{ number_format($receive->delivery_charges) }}"
                                    @if ($receive->status == 2) readonly @endif>
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
                                class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                <span class="text-table mr-3">Ngày nhận hàng</span>
                                <input type="date" placeholder="Nhập thông tin" name="received_date"
                                    class="border-0 bg w-50 bg-input-guest py-0 px-0 nameGuest"
                                    value="{{ $receive->created_at->toDateString() }}"
                                    @if ($receive->status == 2) readonly @endif>
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
    <x-formmodalseri :product="$product"></x-formmodalseri>
</form>

<script src="{{ asset('/dist/js/products.js') }}"></script>
<script src="{{ asset('/dist/js/import.js') }}"></script>
<script>
    function getAction(e) {
        $('#getAction').val($(e).find('button').val());
    }
    $('#listReceive').hide();
    $('.search_quotation').on('click', function() {
        $('#listReceive').show();
    })
    // Xóa đơn hàng
    deleteImport('#delete_receive',
        '{{ route('receive.destroy', ['workspace' => $workspacename, 'receive' => $receive->id]) }}')

    // $('#addRowTable').off('click').on('click', function() {
    //     addRowTable(2);
    //     $('.searchProductName').on('click', function() {
    //         var id = @php echo $receive->id; @endphp;
    //         $.ajax({
    //             url: "{{ route('getProduct_receive') }}",
    //             type: "get",
    //             data: {
    //                 id: id
    //             },
    //             success: function(data) {
    //                 console.log(data);
    //             }
    //         })
    //     })
    // })



    $('form').on('submit', function(e) {
        e.preventDefault();
        var productSN = {}
        var formSubmit = false;
        var listProductName = [];
        var listQty = [];
        var listSN = [];
        var checkSN = [];
        if ($('#getAction').val() == 2) {
            $('.searchProductName').each(function() {
                checkSN.push($(this).closest('tr').find('input[name^="cbSeri"]').val())
                listProductName.push($(this).val().trim());
                listQty.push($(this).closest('tr').find('.quantity-input').val().trim());
                var count = $($(this).closest('tr').find('button').attr('data-target')).find(
                    'input[name^="seri"]').filter(
                    function() {
                        return $(this).val() !== '';
                    }).length;
                listSN.push(count);
                var oldValue = $(this).val().trim();
                productSN[oldValue] = {
                    sn: []
                };
                SerialNumbers = $($(this).closest('tr').find('button').attr('data-target')).find(
                    'input[name^="seri"]').map(function() {
                    return $(this).val().trim();
                }).get();
                productSN[oldValue].sn.push(...SerialNumbers)
            });
            // Kiểm tra số lượng sn và số lượng sản phẩm
            $.ajax({
                url: "{{ route('checkSN') }}",
                type: "get",
                data: {
                    listProductName: listProductName,
                    listQty: listQty,
                    listSN: listSN,
                    checkSN: checkSN,
                },
                success: function(data) {
                    if (data['status'] == 'false') {
                        alert('Vui lòng nhập đủ số lượng seri sản phẩm ' + data['productName'])
                    } else {
                        // Kiểm tra sản phẩm đã tồn tại seri chưa
                        $.ajax({
                            url: "{{ route('checkduplicateSN') }}",
                            type: "get",
                            data: {
                                value: productSN,
                            },
                            success: function(data) {
                                if (data['success'] == false) {
                                    alert('Sản phảm' + data['msg'] + 'đã tồn tại seri' +
                                        data['data'])
                                } else {
                                    updateProductSN()
                                    $('form')[0].submit();
                                }
                            }
                        })
                    }
                }
            })
        } else {
            $('form')[0].submit();
        }
    })

    // Tạo INPUT SERI
    createRowInput('seri');
    $('#file_restore').on('change', function(e) {
        e.preventDefault();
        $('#formSubmit').attr('action', '{{ route('addAttachment') }}');
        $('input[name="_method"]').remove();
        $('#formSubmit')[0].submit();
    })
</script>
