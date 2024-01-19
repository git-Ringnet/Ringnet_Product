<x-navbar :title="$title" activeGroup="buy" activeName="import"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<form action="{{ route('import.update', ['workspace' => $workspacename, 'import' => $import->id]) }}" method="POST"
    id="formSubmit" enctype="multipart/form-data">
    <div class="content-wrapper1 py-0 border-bottom px-4">
        <!-- Content Header (Page header) -->
        @method('PUT')
        @csrf
        <input type="hidden" name="detail_id" value="{{ $import->id }}">
        <input type="hidden" name="table_name" value="DMH">
        <input type="hidden" id="provides_id" name="provides_id" value="{{ $import->provide_id }}">
        <input type="hidden" id="project_id" name="project_id" value="{{ $import->project_id }}">
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
                    <span class="font-weight-bold">Đơn mua hàng</span>
                    <span class="mx-2">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8"></path>
                        </svg>
                    </span>
                    <span class="font-weight-bold text-secondary">{{ $title }}</span>
                    <span class="border ml-2 p-1 text-nav text-secondary shadow-sm =">
                        @if ($import->status == 1)
                            Nháp
                        @else
                            Chình thức
                        @endif
                    </span>
                </div>
            </div>
            <div class="container-fluided">
                <div class="row m-0 mb-3">
                    <a href="{{route('import.index',$workspacename)}}">
                        <button type="button" class="btn-save-print rounded d-flex align-items-center h-100"
                            style="margin-right:10px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="8" viewBox="0 0 10 8"
                                fill="none" class="mr-2">
                                <path
                                    d="M2.6738 7.48012C2.939 7.79833 3.41191 7.84132 3.73012 7.57615C4.04833 7.31097 4.09132 6.83805 3.82615 6.51984L2.3513 4.75L9.25 4.75C9.66421 4.75 10 4.41421 10 4C10 3.58579 9.66421 3.25 9.25 3.25L2.3512 3.25L3.82615 1.4801C4.09132 1.1619 4.04833 0.688999 3.73012 0.423799C3.41191 0.158599 2.939 0.201599 2.6738 0.519799L0.1738 3.51984C-0.0579996 3.79798 -0.0579996 4.20198 0.1738 4.48012L2.6738 7.48012Z"
                                    fill="#6D7075" />
                            </svg>
                            <span>Trở về</span>
                        </button>
                    </a>

                    <div class="dropdown mr-2">
                        <button type="button" data-toggle="dropdown"
                            class="btn-save-print rounded d-flex align-items-center h-100 dropdown-toggle">
                            <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                    fill="#6D7075"></path>
                            </svg>
                            <span>In</span>
                        </button>
                        <div class="dropdown-menu" style="z-index: 9999;">
                            <a class="dropdown-item" href="#">Xuất Excel</a>
                            <a class="dropdown-item" href="#">Xuất PDF</a>
                        </div>
                    </div>

                    @if ($import->status == 1)
                        <a href="{{ route('import.edit', ['workspace' => $workspacename, 'import' => $import->id]) }}"
                            class="custom-btn d-flex align-items-center h-100 mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                                fill="none" class="mr-2">
                                <path
                                    d="M3.75 1.00007C1.67893 1.00007 0 2.679 0 4.75007V10.25C0 12.3211 1.67893 14 3.75 14H9.2501C11.3212 14 13.0001 12.3211 13.0001 10.25V7.00007C13.0001 6.58586 12.6643 6.25007 12.2501 6.25007C11.8359 6.25007 11.5001 6.58586 11.5001 7.00007V10.25C11.5001 11.4927 10.4927 12.5 9.2501 12.5H3.75C2.50736 12.5 1.5 11.4927 1.5 10.25V4.75007C1.5 3.50743 2.50736 2.50007 3.75 2.50007H6C6.41421 2.50007 6.75 2.16428 6.75 1.75007C6.75 1.33586 6.41421 1.00007 6 1.00007H3.75Z"
                                    fill="white" />
                                <path
                                    d="M11.1339 4.19461L9.71971 2.7804L5.52812 6.97196C4.77185 7.72823 4.25635 8.69144 4.0466 9.74022C4.03144 9.81602 4.09828 9.88282 4.17409 9.86772C5.22285 9.65792 6.18606 9.14242 6.94233 8.38618L11.1339 4.19461Z"
                                    fill="white" />
                                <path
                                    d="M12.4559 0.456792C12.2663 0.393562 12.0571 0.442932 11.9158 0.584312L10.7803 1.71974L12.1945 3.13395L13.33 1.99852C13.4714 1.85714 13.5207 1.64802 13.4575 1.45834C13.2999 0.985472 12.9288 0.614412 12.4559 0.456792Z"
                                    fill="white" />
                            </svg>
                            <span>Sửa</span>
                        </a>
                    @endif

                    <label class="custom-btn d-flex align-items-center h-100 m-0 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                            fill="none" class="mr-2">
                            <path
                                d="M8.30541 9.20586C8.57207 9.47246 8.5943 9.89106 8.37208 10.183L8.30541 10.2593L5.84734 12.7174C4.58675 13.978 2.54294 13.978 1.28235 12.7174C0.0652319 11.5003 0.0232719 9.55296 1.15644 8.2855L1.28235 8.15237L3.74042 5.69429C4.03133 5.40339 4.50298 5.40339 4.79388 5.69429C5.06054 5.96096 5.08277 6.37949 4.86055 6.67147L4.79388 6.74775L2.33581 9.20586C1.65703 9.88456 1.65703 10.9852 2.33581 11.6639C2.98065 12.3088 4.00611 12.341 4.68901 11.7607L4.79388 11.6639L7.25195 9.20586C7.54286 8.91492 8.01451 8.91492 8.30541 9.20586ZM8.82965 5.17005C9.12053 5.46095 9.12053 5.9326 8.82965 6.22351L6.34904 8.70413C6.05813 8.99504 5.58648 8.99504 5.29558 8.70413C5.00467 8.41323 5.00467 7.94158 5.29558 7.65067L7.7762 5.17005C8.0671 4.87914 8.53875 4.87914 8.82965 5.17005ZM12.7173 1.28236C13.9344 2.49948 13.9764 4.44674 12.8432 5.71422L12.7173 5.84735L10.2592 8.30543C9.96833 8.59633 9.49673 8.59633 9.20583 8.30543C8.93914 8.03877 8.91692 7.62023 9.13913 7.32825L9.20583 7.25197L11.6638 4.79389C12.3426 4.11511 12.3426 3.0146 11.6638 2.33582C11.019 1.69098 9.99363 1.65874 9.31073 2.23909L9.20583 2.33582L6.74774 4.79389C6.45683 5.0848 5.98518 5.0848 5.69428 4.79389C5.42762 4.52723 5.40539 4.10869 5.62761 3.81672L5.69428 3.74043L8.15235 1.28236C9.41293 0.0217665 11.4567 0.0217665 12.7173 1.28236Z"
                                fill="white" />
                        </svg>
                        <span>Đính kèm file</span> 
                        <input type="file" style="display: none;" id="file_restore" accept="*"
                            name="file">
                    </label>

                    <a href="#" id="delete_import"
                        class="d-flex align-items-center h-100 btn-danger mr-2 border-0 rounded"
                        style="padding: 6px 8px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                            fill="none" class="mr-2">
                            <path
                                d="M0.96967 0.969668C1.26256 0.676777 1.73744 0.676777 2.03033 0.969668L6 4.939L9.9697 0.969668C10.2626 0.676777 10.7374 0.676777 11.0303 0.969668C11.3232 1.26256 11.3232 1.73744 11.0303 2.03033L7.061 6L11.0303 9.9697C11.2966 10.2359 11.3208 10.6526 11.1029 10.9462L11.0303 11.0303C10.7374 11.3232 10.2626 11.3232 9.9697 11.0303L6 7.061L2.03033 11.0303C1.73744 11.3232 1.26256 11.3232 0.96967 11.0303C0.67678 10.7374 0.67678 10.2626 0.96967 9.9697L4.939 6L0.96967 2.03033C0.7034 1.76406 0.6792 1.3474 0.89705 1.05379L0.96967 0.969668Z"
                                fill="white" />
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

                    {{-- <a href="#" onclick="getAction(this)">
                        <button name="action" value="action_2" type="submit"
                            class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                            <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.75528 1.6875H5.99476H11.9948H12.123C12.3939 1.6875 12.6621 1.74088 12.9123 1.84459C13.1626 1.94829 13.3899 2.10029 13.5814 2.29189L15.7022 4.41269C16.089 4.79939 16.3064 5.32394 16.3065 5.87088V14.25C16.3065 14.797 16.0892 15.3216 15.7024 15.7084C15.3156 16.0952 14.791 16.3125 14.244 16.3125H12.75H5.25H3.83328C3.28894 16.3125 2.76666 16.0973 2.38031 15.7139C1.99396 15.3304 1.77486 14.8098 1.77078 14.2655L1.69278 3.76547C1.69074 3.49333 1.74258 3.22344 1.84531 2.97143C1.94805 2.71941 2.09965 2.49021 2.29137 2.29705C2.4831 2.10389 2.71115 1.95058 2.9624 1.84597C3.21364 1.74135 3.48312 1.68749 3.75528 1.6875ZM5.8125 15.1875H12.1875V9.9645C12.1875 9.74238 12.0071 9.5625 11.7862 9.5625H6.2145C5.99266 9.5625 5.8125 9.74266 5.8125 9.9645V15.1875ZM13.3125 15.1875V9.9645C13.3125 9.12163 12.6289 8.4375 11.7862 8.4375H6.2145C5.37134 8.4375 4.6875 9.12134 4.6875 9.9645V15.1875H3.83326C3.58582 15.1875 3.34842 15.0897 3.17281 14.9154C2.9972 14.7411 2.89761 14.5044 2.89574 14.257L2.81774 3.75703C2.81682 3.63333 2.84038 3.51066 2.88708 3.39611C2.93378 3.28155 3.00269 3.17737 3.08983 3.08957C3.17698 3.00177 3.28064 2.93208 3.39485 2.88453C3.50905 2.83698 3.63154 2.8125 3.75524 2.8125H5.43226V5.18175C5.43226 5.52985 5.57054 5.86369 5.81668 6.10983C6.06282 6.35597 6.39666 6.49425 6.74476 6.49425H11.2448C11.5929 6.49425 11.9267 6.35597 12.1728 6.10983C12.419 5.86369 12.5573 5.52985 12.5573 5.18175V2.91925C12.6414 2.96326 12.7185 3.01991 12.7858 3.08725L14.9068 5.20831C15.0826 5.38405 15.1814 5.62254 15.1815 5.87112V14.25C15.1815 14.4986 15.0827 14.7371 14.9069 14.9129C14.7311 15.0887 14.4926 15.1875 14.244 15.1875H13.3125ZM11.4323 5.18175V2.8125H6.55726V5.18175C6.55726 5.23148 6.57701 5.27917 6.61218 5.31433C6.64734 5.3495 6.69503 5.36925 6.74476 5.36925H11.2448C11.2945 5.36925 11.3422 5.3495 11.3773 5.31433C11.4125 5.27917 11.4323 5.23148 11.4323 5.18175Z"
                                    fill="white" />
                            </svg>
                            <span>Tạo đơn nhận hàng</span>
                        </button>
                    </a> --}}
                    {{-- <a href="#" onclick="getAction(this)">
                        <button name="action" value="action_3" type="submit"
                            class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                            <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.75528 1.6875H5.99476H11.9948H12.123C12.3939 1.6875 12.6621 1.74088 12.9123 1.84459C13.1626 1.94829 13.3899 2.10029 13.5814 2.29189L15.7022 4.41269C16.089 4.79939 16.3064 5.32394 16.3065 5.87088V14.25C16.3065 14.797 16.0892 15.3216 15.7024 15.7084C15.3156 16.0952 14.791 16.3125 14.244 16.3125H12.75H5.25H3.83328C3.28894 16.3125 2.76666 16.0973 2.38031 15.7139C1.99396 15.3304 1.77486 14.8098 1.77078 14.2655L1.69278 3.76547C1.69074 3.49333 1.74258 3.22344 1.84531 2.97143C1.94805 2.71941 2.09965 2.49021 2.29137 2.29705C2.4831 2.10389 2.71115 1.95058 2.9624 1.84597C3.21364 1.74135 3.48312 1.68749 3.75528 1.6875ZM5.8125 15.1875H12.1875V9.9645C12.1875 9.74238 12.0071 9.5625 11.7862 9.5625H6.2145C5.99266 9.5625 5.8125 9.74266 5.8125 9.9645V15.1875ZM13.3125 15.1875V9.9645C13.3125 9.12163 12.6289 8.4375 11.7862 8.4375H6.2145C5.37134 8.4375 4.6875 9.12134 4.6875 9.9645V15.1875H3.83326C3.58582 15.1875 3.34842 15.0897 3.17281 14.9154C2.9972 14.7411 2.89761 14.5044 2.89574 14.257L2.81774 3.75703C2.81682 3.63333 2.84038 3.51066 2.88708 3.39611C2.93378 3.28155 3.00269 3.17737 3.08983 3.08957C3.17698 3.00177 3.28064 2.93208 3.39485 2.88453C3.50905 2.83698 3.63154 2.8125 3.75524 2.8125H5.43226V5.18175C5.43226 5.52985 5.57054 5.86369 5.81668 6.10983C6.06282 6.35597 6.39666 6.49425 6.74476 6.49425H11.2448C11.5929 6.49425 11.9267 6.35597 12.1728 6.10983C12.419 5.86369 12.5573 5.52985 12.5573 5.18175V2.91925C12.6414 2.96326 12.7185 3.01991 12.7858 3.08725L14.9068 5.20831C15.0826 5.38405 15.1814 5.62254 15.1815 5.87112V14.25C15.1815 14.4986 15.0827 14.7371 14.9069 14.9129C14.7311 15.0887 14.4926 15.1875 14.244 15.1875H13.3125ZM11.4323 5.18175V2.8125H6.55726V5.18175C6.55726 5.23148 6.57701 5.27917 6.61218 5.31433C6.64734 5.3495 6.69503 5.36925 6.74476 5.36925H11.2448C11.2945 5.36925 11.3422 5.3495 11.3773 5.31433C11.4125 5.27917 11.4323 5.23148 11.4323 5.18175Z"
                                    fill="white" />
                            </svg>
                            <span>Tạo hóa đơn mua hàng</span>
                        </button>
                    </a> --}}
                    {{-- <a href="#" onclick="getAction(this)">
                        <button name="action" value="action_4" type="submit"
                            class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                            <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.75528 1.6875H5.99476H11.9948H12.123C12.3939 1.6875 12.6621 1.74088 12.9123 1.84459C13.1626 1.94829 13.3899 2.10029 13.5814 2.29189L15.7022 4.41269C16.089 4.79939 16.3064 5.32394 16.3065 5.87088V14.25C16.3065 14.797 16.0892 15.3216 15.7024 15.7084C15.3156 16.0952 14.791 16.3125 14.244 16.3125H12.75H5.25H3.83328C3.28894 16.3125 2.76666 16.0973 2.38031 15.7139C1.99396 15.3304 1.77486 14.8098 1.77078 14.2655L1.69278 3.76547C1.69074 3.49333 1.74258 3.22344 1.84531 2.97143C1.94805 2.71941 2.09965 2.49021 2.29137 2.29705C2.4831 2.10389 2.71115 1.95058 2.9624 1.84597C3.21364 1.74135 3.48312 1.68749 3.75528 1.6875ZM5.8125 15.1875H12.1875V9.9645C12.1875 9.74238 12.0071 9.5625 11.7862 9.5625H6.2145C5.99266 9.5625 5.8125 9.74266 5.8125 9.9645V15.1875ZM13.3125 15.1875V9.9645C13.3125 9.12163 12.6289 8.4375 11.7862 8.4375H6.2145C5.37134 8.4375 4.6875 9.12134 4.6875 9.9645V15.1875H3.83326C3.58582 15.1875 3.34842 15.0897 3.17281 14.9154C2.9972 14.7411 2.89761 14.5044 2.89574 14.257L2.81774 3.75703C2.81682 3.63333 2.84038 3.51066 2.88708 3.39611C2.93378 3.28155 3.00269 3.17737 3.08983 3.08957C3.17698 3.00177 3.28064 2.93208 3.39485 2.88453C3.50905 2.83698 3.63154 2.8125 3.75524 2.8125H5.43226V5.18175C5.43226 5.52985 5.57054 5.86369 5.81668 6.10983C6.06282 6.35597 6.39666 6.49425 6.74476 6.49425H11.2448C11.5929 6.49425 11.9267 6.35597 12.1728 6.10983C12.419 5.86369 12.5573 5.52985 12.5573 5.18175V2.91925C12.6414 2.96326 12.7185 3.01991 12.7858 3.08725L14.9068 5.20831C15.0826 5.38405 15.1814 5.62254 15.1815 5.87112V14.25C15.1815 14.4986 15.0827 14.7371 14.9069 14.9129C14.7311 15.0887 14.4926 15.1875 14.244 15.1875H13.3125ZM11.4323 5.18175V2.8125H6.55726V5.18175C6.55726 5.23148 6.57701 5.27917 6.61218 5.31433C6.64734 5.3495 6.69503 5.36925 6.74476 5.36925H11.2448C11.2945 5.36925 11.3422 5.3495 11.3773 5.31433C11.4125 5.27917 11.4323 5.23148 11.4323 5.18175Z"
                                    fill="white" />
                            </svg>
                            <span>Tạo hóa đơn thanh toán</span>
                        </button>
                    </a> --}}
                </div>
            </div>
        </div>
    </div>


    <div class="content-wrapper1 py-0 pl-0 px-0" id="main">
        <section class="content-header p-2">
            <div class="d-flex justify-content-between">
                <ul class="nav nav-tabs bg-filter-search border-0 py-2 rounded">
                    <li class="text-nav"><a data-toggle="tab" href="#info" class="active text-secondary">
                            Thông tin</a>
                    </li>
                    <li class="text-nav"><a data-toggle="tab" href="#history" class="text-secondary mx-4">Lịch
                            sử</a>
                    </li>
                    <li class="text-nav">
                        <a data-toggle="tab" href="#files" class="text-secondary">File đính kèm
                        </a>
                    </li>
                </ul>
                <div class="d-flex position-fixed" style="right: 10px; top: 65px;">
                    @if ($import->status_receive == 0)
                        <div class="border text-secondary p-1">
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
                    @elseif($import->status_receive == 2)
                        <div class="border text-success p-1">
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
                        <div class="border text-warning p-1">
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
                    @if ($import->status_reciept == 0)
                        <div class="border text-secondary p-1">
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
                    @elseif($import->status_reciept == 2)
                        <div class="border text-success p-1">
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
                        <div class="border text-warning p-1">
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
                    @if ($import->status_pay == 0)
                        <div class="border text-secondary p-1">
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
                    @elseif($import->status_pay == 2)
                        <div class="border text-success p-1">
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
                        <div class="border text-warning p-1">
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
        <section class="content">
            <div class="container-fluided">
                <div class="tab-content">
                    <div id="info" class="content tab-pane in active">
                        <div class="bg-filter-search border-top-0 text-center py-2">
                            <span class="font-weight-bold text-secondary text-nav">THÔNG TIN SẢN PHẨM</span>
                        </div>
                        <div class="col-12">
                            <section class="content">
                                <div class="container-fluided order_content">
                                    <table class="table table-hover bg-white rounded">
                                        <thead>
                                            <tr>
                                                <th class="border-right p-1 border-bottom" style="width: 15%;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                        height="12" viewBox="0 0 12 12" fill="none">
                                                        <path
                                                            d="M5.37 6.63C5.49289 6.75305 5.56192 6.91984 5.56192 7.09375C5.56192 7.26766 5.49289 7.43445 5.37 7.5575L3.375 9.5L4.46875 10.5938C4.46875 10.7678 4.39961 10.9347 4.27654 11.0578C4.15347 11.1809 3.98655 11.25 3.8125 11.25H1.40625C1.2322 11.25 1.06528 11.1809 0.942211 11.0578C0.81914 10.9347 0.75 10.7678 0.75 10.5938V8.1875C0.75 8.01345 0.81914 7.84653 0.942211 7.72346C1.06528 7.60039 1.2322 7.53125 1.40625 7.53125L2.5 8.625L4.4425 6.63C4.56555 6.50711 4.73234 6.43808 4.90625 6.43808C5.08016 6.43808 5.24695 6.50711 5.37 6.63ZM6.63 5.37C6.50711 5.24695 6.43808 5.08016 6.43808 4.90625C6.43808 4.73234 6.50711 4.56555 6.63 4.4425L8.625 2.5L7.53125 1.40625C7.53125 1.2322 7.60039 1.06528 7.72346 0.942211C7.84653 0.81914 8.01345 0.75 8.1875 0.75H10.5938C10.7678 0.75 10.9347 0.81914 11.0578 0.942211C11.1809 1.06528 11.25 1.2322 11.25 1.40625V3.8125C11.25 3.98655 11.1809 4.15347 11.0578 4.27654C10.9347 4.39961 10.7678 4.46875 10.5938 4.46875L9.5 3.375L7.5575 5.37C7.43445 5.49289 7.26766 5.56192 7.09375 5.56192C6.91984 5.56192 6.75305 5.49289 6.63 5.37Z"
                                                            fill="#26273B" fill-opacity="0.8" />
                                                    </svg>
                                                    <input class="ml-2 border-danger" id="checkall" type="checkbox">
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
                                                </th>
                                                <th class="border-right note p-1 border-bottom">
                                                    <span class="text-table text-secondary">Ghi
                                                        chú</span>
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
                                                            <input readonly type="text" name="product_code[]"
                                                                class="border-0 px-3 py-2 w-75 searchProduct"
                                                                value="{{ $item->product_code }}"
                                                                @if ($import->status == 2) echo readonly @endif>
                                                            <ul id="listProductCode"
                                                                class="listProductCode bg-white position-absolute w-100 rounded shadow p-0 scroll-data"
                                                                style="z-index: 99; left: 24%; top: 75%;">
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td class="border border-bottom-0 position-relative">
                                                        <input readonly id="searchProductName" type="text"
                                                            name="product_name[]"
                                                            class="searchProductName border-0 px-3 py-2 w-100"
                                                            value="{{ $item->product_name }}"
                                                            @if ($import->status == 2) echo readonly @endif>
                                                        <ul id="listProductName"
                                                            class="listProductName bg-white position-absolute w-100 rounded shadow p-0 scroll-data"
                                                            style="z-index: 99; left: 1%; top: 74%; display: none;">
                                                        </ul>
                                                    </td>
                                                    <td class="border border-bottom-0">
                                                        <input type="text" name="product_unit[]"
                                                            class="border-0 px-3 py-2 w-100 product_unit"
                                                            value="{{ $item->product_unit }}" readonly>
                                                    </td>
                                                    <td class="border border-bottom-0 border-right-0">
                                                        <input readonly
                                                            oninput="checkQty(this,{{ $item->product_qty }})"
                                                            type="text" name="product_qty[]"
                                                            class="border-0 px-3 py-2 w-100 quantity-input"
                                                            value="{{ number_format($item->product_qty) }}">
                                                    </td>
                                                    <td class="border border-bottom-0 border-right-0">
                                                        <input type="text" name="price_export[]"
                                                            class="border-0 px-3 py-2 w-100 price_export"
                                                            value="{{ fmod($item->price_export, 2) > 0 ? number_format($item->price_export, 2, '.', ',') : number_format($item->price_export) }}"
                                                            readonly>
                                                    </td>
                                                    <input type="hidden" class="product_tax1">
                                                    <td class="border border-bottom-0 border-right-0">
                                                        <select name="product_tax[]" id="product_tax"
                                                            class="product_tax border-0" disabled>
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
                                                            class="border-0 px-3 py-2 w-100 total_price" readonly
                                                            readonly
                                                            value="{{ fmod($item->product_total, 2) > 0 ? number_format($item->product_total, 2, '.', ',') : number_format($item->product_total) }}"
                                                            @if ($import->status == 2) echo readonly @endif>
                                                    </td>
                                                    <td class="border border-bottom-0">
                                                        <input placeholder="Nhập ghi chú" readonly type="text"
                                                            name="product_note[]" class="border-0 px-3 py-2 w-100"
                                                            value="{{ $item->product_note }}">
                                                    </td>
                                                    <td class="border border">
                                                        <svg width="17" height="17" viewBox="0 0 17 17"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M13.1417 6.90625C13.4351 6.90625 13.673 7.1441 13.673 7.4375C13.673 7.47847 13.6682 7.5193 13.6589 7.55918L12.073 14.2992C11.8471 15.2591 10.9906 15.9375 10.0045 15.9375H6.99553C6.00943 15.9375 5.15288 15.2591 4.92702 14.2992L3.34113 7.55918C3.27393 7.27358 3.45098 6.98757 3.73658 6.92037C3.77645 6.91099 3.81729 6.90625 3.85826 6.90625H13.1417ZM9.03125 1.0625C10.4983 1.0625 11.6875 2.25175 11.6875 3.71875H13.8125C14.3993 3.71875 14.875 4.19445 14.875 4.78125V5.3125C14.875 5.6059 14.6371 5.84375 14.3438 5.84375H2.65625C2.36285 5.84375 2.125 5.6059 2.125 5.3125V4.78125C2.125 4.19445 2.6007 3.71875 3.1875 3.71875H5.3125C5.3125 2.25175 6.50175 1.0625 7.96875 1.0625H9.03125ZM9.03125 2.65625H7.96875C7.38195 2.65625 6.90625 3.13195 6.90625 3.71875H10.0938C10.0938 3.13195 9.61805 2.65625 9.03125 2.65625Z"
                                                                fill="#6B6F76"></path>
                                                        </svg>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                            <x-formsynthetic :import="''"></x-formsynthetic>
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
                                            <th class="border-right p-1 border-bottom">
                                                <span class="text-table text-secondary">Mã sản phẩm</span>
                                            </th>
                                            <th class="border-right p-1 border-bottom">
                                                <span class="text-table text-secondary">Tên sản phẩm</span>
                                            </th>
                                            <th class="border-right p-1 border-bottom">
                                                <span class="text-table text-secondary">Đơn vị</span>
                                            </th>
                                            <th class="border-right p-1 border-bottom">
                                                <span class="text-table text-secondary"> Số lượng</span>
                                            </th>
                                            <th class="border-right p-1 border-bottom">
                                                <span class="text-table text-secondary">Đơn giá</span>
                                            </th>
                                            <th class="border-right p-1 border-bottom">
                                                <span class="text-table text-secondary">Thuế</span>
                                            </th>
                                            <th class="border-right p-1 border-bottom">
                                                <span class="text-table text-secondary">Thành tiền</span>
                                            </th>
                                            <th class="border-right note p-1 border-bottom">
                                                <span class="text-table text-secondary">Ghi chú</span>
                                            </th>
                                            <th class="border-right note p-1 border-bottom">
                                                <span class="text-table text-secondary">Version</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($history as $item)
                                            <tr class="bg-white">
                                                <td class="border border-left-0 border-top-0 border-bottom-0">
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
                                                        <input type="text" name="" id=""
                                                            class="border-0 px-3 py-2 w-75" readonly
                                                            value="{{ $item->product_code }}">
                                                    </div>
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 position-relative">
                                                    <input type="text"
                                                        class="searchProductName border-0 px-3 py-2 w-100" readonly
                                                        value="{{ $item->product_name }}">
                                                </td>
                                                <td class="border border-top-0 border-bottom-0">
                                                    <input type="text"
                                                        class="border-0 px-3 py-2 w-100 product_unit" readonly
                                                        value="{{ $item->product_unit }}">
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 border-right-0">
                                                    <input type="text" class="border-0 px-3 py-2 w-100" readonly
                                                        value="{{ fmod($item->product_qty, 2) > 0 ? number_format($item->product_qty, 2, '.', ',') : number_format($item->product_qty) }}">
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 border-right-0">
                                                    <input type="text" class="border-0 px-3 py-2 w-100" readonly
                                                        value="{{ fmod($item->price_export, 2) > 0 ? number_format($item->price_export, 2, '.', ',') : number_format($item->price_export) }}">
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 border-right-0">
                                                    <input type="text" class="product_tax border-0 px-3 py-2 w-100"
                                                        readonly value="{{ $item->product_tax }}">
                                                </td>
                                                <td class="border border-top-0 border-bottom-0 border-right-0">
                                                    <input type="text" class="border-0 px-3 py-2 w-100" readonly
                                                        value="{{ fmod($item->product_total, 2) > 0 ? number_format($item->product_total, 2, '.', ',') : number_format($item->product_total) }}">
                                                </td>
                                                <td class="border border-top-0 border-bottom-0">
                                                    <input placeholder="Nhập ghi chú" type="text"
                                                        class="border-0 px-3 py-2 w-100" readonly
                                                        value="{{ $item->product_note }}">
                                                </td>
                                                <td class="border border-top-0 border ">
                                                    <input type="text" class="border-0 px-3 py-2 w-100" readonly
                                                        value="{{ $item->version }}">
                                                </td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                    <div class="content-wrapper2 px-0 py-0">
                        <div id="mySidenav" class="sidenavshow border">
                            <div id="show_info_Guest">
                                <div class="bg-filter-search border-top-0 py-2 text-center">
                                    <span class="font-weight-bold text-secondary text-nav">THÔNG TIN KHÁCH HÀNG</span>
                                </div>
                                <div
                                    class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                    <span class="text-table mr-3">Nhà cung cấp</span>
                                    <input type="text" placeholder="Chọn thông tin"
                                        class="border-0 bg w-50 bg-input-guest py-0 px-0 nameGuest" autocomplete="off"
                                        id="myInput" value="{{ $import->getProvideName->provide_name_display }}"
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
                                {{-- Người đại diện --}}
                                <div
                                    class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                    <span class="text-table mr-3">Người đại diện</span>
                                    <input type="text" placeholder="Chọn thông tin"
                                        class="border-0 bg w-50 bg-input-guest py-0 px-0" autocomplete="off"
                                        id="represent" readonly>
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
                                {{-- Đơn mua hàng --}}
                                <div
                                    class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                    <span class="text-table mr-3">Đơn mua hàng</span>
                                    <input readonly type="text" placeholder="Chọn thông tin"
                                        name="quotation_number" class="border-0 bg w-50 bg-input-guest py-0 px-0"
                                        autocomplete="off" value="{{ $import->quotation_number }}">
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
                                {{-- Số tham chiếu --}}
                                <div
                                    class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                    <span class="text-table mr-3">Số tham chiếu</span>
                                    <input readonly type="text" placeholder="Chọn thông tin"
                                        name="reference_number" class="border-0 bg w-50 bg-input-guest py-0 px-0"
                                        autocomplete="off" value="{{ $import->reference_number }}">
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
                                {{-- Ngày báo giá --}}
                                <div
                                    class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                    <span class="text-table mr-3">Ngày báo giá</span>
                                    <input readonly type="date" placeholder="Chọn thông tin" name="date_quote"
                                        class="border-0 bg w-50 bg-input-guest py-0 px-0" autocomplete="off"
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
                                {{-- Hiệu lực báo giá --}}
                                <div
                                    class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                    <span class="text-table mr-3">Hiệu lực báo giá</span>
                                    <input readonly type="text" placeholder="Chọn thông tin" name="price_effect"
                                        class="border-0 bg w-50 bg-input-guest py-0 px-0" autocomplete="off"
                                        value="{{ $import->price_effect }}">
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
                                {{-- Điều khoản thanh toán --}}
                                <div
                                    class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                    <span class="text-table mr-3">Điều khoản thanh toán</span>
                                    <input readonly type="text" placeholder="Chọn thông tin" name="terms_pay"
                                        class="border-0 bg w-50 bg-input-guest py-0 px-0" autocomplete="off"
                                        value="{{ $import->terms_pay }}">
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
                                {{-- Dự án --}}
                                <div
                                    class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1 position-relative">
                                    <span class="text-table mr-3">Dự án</span>
                                    <input readonly type="text" placeholder="Chọn thông tin" id="inputProject"
                                        class="border-0 bg w-50 bg-input-guest py-0 px-0" autocomplete="off"
                                        value="@if ($import->getProjectName) {{ $import->getProjectName->project_name }} @endif">
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
</form>
<div id="files" class="tab-pane fade">
    <div class="bg-filter-search border-top-0 text-center py-2">
        <span class="font-weight-bold text-secondary text-nav">File đính kèm</span>
    </div>
    <x-form-attachment :value="$import" name="DMH"></x-form-attachment>
</div>

<x-formprovides> </x-formprovides>
<script src="{{ asset('/dist/js/products.js') }}"></script>
<script src="{{ asset('/dist/js/import.js') }}"></script>
<script>
    // Xóa đơn hàng
    deleteImport('#delete_import',
        '{{ route('import.destroy', ['workspace' => $workspacename, 'import' => $import->id]) }}')

    function getAction(e) {
        $('#getAction').val($(e).find('button').val());
    }
    $('#addRowTable').off('click').on('click', function() {
        addRowTable(1);
    })

    $('.search-info').click(function() {
        var provides_id = $(this).attr('id');
        console.log(provides_id);
        $.ajax({
            url: "{{ route('show_provide') }}",
            type: "get",
            data: {
                provides_id: provides_id,
            },
            success: function(data) {
                $('#myInput').val(data.provide_name_display);
                $('#provides_id').val(data.id);
            }
        });
    });

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
            alert("Vui lòng nhập Tên hiển thị");
            check = true;
            return false;
        }
        if (provide_code == '') {
            alert("Vui lòng nhập Mã số thuế");
            check = true;
            return false;
        }
        if (provide_address == '') {
            alert("Vui lòng nhập Địa chỉ nhà cung cấp");
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
                        alert(data.msg);
                        $('.modal [data-dismiss="modal"]').click();
                        $("input[name='provide_name_display']").val('');
                        $("input[name='provide_code']").val('');
                        $("input[name='provide_address']").val('');
                        $("input[name='provide_name']").val('');
                        $("input[name='provide_represent']").val('');
                        $("input[name='provide_email']").val('');
                        $("input[name='provide_phone']").val('');
                        $("input[name='provide_address_delivery']").val('');
                    } else {
                        alert(data.msg);
                    }
                }
            });
        }
    })

    getProduct('searchProduct');

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
            $('.search-product').on('click', function() {
                inputName.val('');
                inputCode.val($(this).closest('li').find('span').text())
                var dataId = $(this).attr('id'); // Lấy giá trị data-id
                listProductCode.hide();
                $.ajax({
                    url: "{{ route('showProductName') }}",
                    type: "get",
                    data: {
                        dataId: dataId
                    },
                    success: function(data) {
                        listProductName.empty();
                        data.forEach(element => {
                            var UL = '<li>' +
                                '<a data-unit="' + element
                                .product_unit +
                                '" data-priceExport= "' +
                                element.product_price_export +
                                '" data-ratio="' + element
                                .product_ratio +
                                '" data-priceImport="' + element
                                .product_price_import +
                                '" href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-name" id="' +
                                element.id +
                                '" data-tax="' + element
                                .product_tax +
                                '" name="search-product">' +
                                '<span class="w-100" data-id="' +
                                element.id + '">' + element
                                .product_name + '</span>' +
                                '</a>' +
                                '</li>';
                            listProductName.append(UL);
                        })
                        $('.search-name').on('click', function() {
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
                    }
                })
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
    $('#file_restore').on('change', function(e) {
        e.preventDefault();
        $('#formSubmit').attr('action', '{{ route('addAttachment') }}');
        $('input[name="_method"]').remove();
        $('#formSubmit')[0].submit();
    })
</script>
</body>

</html>
