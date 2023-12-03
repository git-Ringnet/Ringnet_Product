<x-navbar :title="$title"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <form action="{{ route('import.update', $import->id) }}" method="POST" id="formSubmit" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="detail_id" value="{{ $import->id }}">
        <input type="hidden" name="table_name" value="DMH">
        <input type="hidden" id="provides_id" name="provides_id" value="{{ $import->provide_id }}">
        <input type="hidden" id="project_id" name="project_id" value="{{ $import->project_id }}">
        <section class="content-header p-0">
            <div class="container-fluided">
                <div class="mb-3">
                    <span>Mua hàng</span>
                    <span>/</span>
                    <span>Đơn nhập hàng</span>
                    <span>/</span>
                    <span class="font-weight-bold">{{ $title }}</span>
                </div>

                <div class="row m-0 mb-1">
                    @if ($import->status == 1)
                        <a href="{{ route('import.edit', $import->id) }}" style="margin-right:10px"
                            class="custom-btn d-flex align-items-center h-100">
                            <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.75528 1.6875H5.99476H11.9948H12.123C12.3939 1.6875 12.6621 1.74088 12.9123 1.84459C13.1626 1.94829 13.3899 2.10029 13.5814 2.29189L15.7022 4.41269C16.089 4.79939 16.3064 5.32394 16.3065 5.87088V14.25C16.3065 14.797 16.0892 15.3216 15.7024 15.7084C15.3156 16.0952 14.791 16.3125 14.244 16.3125H12.75H5.25H3.83328C3.28894 16.3125 2.76666 16.0973 2.38031 15.7139C1.99396 15.3304 1.77486 14.8098 1.77078 14.2655L1.69278 3.76547C1.69074 3.49333 1.74258 3.22344 1.84531 2.97143C1.94805 2.71941 2.09965 2.49021 2.29137 2.29705C2.4831 2.10389 2.71115 1.95058 2.9624 1.84597C3.21364 1.74135 3.48312 1.68749 3.75528 1.6875ZM5.8125 15.1875H12.1875V9.9645C12.1875 9.74238 12.0071 9.5625 11.7862 9.5625H6.2145C5.99266 9.5625 5.8125 9.74266 5.8125 9.9645V15.1875ZM13.3125 15.1875V9.9645C13.3125 9.12163 12.6289 8.4375 11.7862 8.4375H6.2145C5.37134 8.4375 4.6875 9.12134 4.6875 9.9645V15.1875H3.83326C3.58582 15.1875 3.34842 15.0897 3.17281 14.9154C2.9972 14.7411 2.89761 14.5044 2.89574 14.257L2.81774 3.75703C2.81682 3.63333 2.84038 3.51066 2.88708 3.39611C2.93378 3.28155 3.00269 3.17737 3.08983 3.08957C3.17698 3.00177 3.28064 2.93208 3.39485 2.88453C3.50905 2.83698 3.63154 2.8125 3.75524 2.8125H5.43226V5.18175C5.43226 5.52985 5.57054 5.86369 5.81668 6.10983C6.06282 6.35597 6.39666 6.49425 6.74476 6.49425H11.2448C11.5929 6.49425 11.9267 6.35597 12.1728 6.10983C12.419 5.86369 12.5573 5.52985 12.5573 5.18175V2.91925C12.6414 2.96326 12.7185 3.01991 12.7858 3.08725L14.9068 5.20831C15.0826 5.38405 15.1814 5.62254 15.1815 5.87112V14.25C15.1815 14.4986 15.0827 14.7371 14.9069 14.9129C14.7311 15.0887 14.4926 15.1875 14.244 15.1875H13.3125ZM11.4323 5.18175V2.8125H6.55726V5.18175C6.55726 5.23148 6.57701 5.27917 6.61218 5.31433C6.64734 5.3495 6.69503 5.36925 6.74476 5.36925H11.2448C11.2945 5.36925 11.3422 5.3495 11.3773 5.31433C11.4125 5.27917 11.4323 5.23148 11.4323 5.18175Z"
                                    fill="white" />
                            </svg>
                            <span>Chỉnh sửa</span>
                        </a>
                    @endif
                    <div class="dropdown">
                        <button type="button" data-toggle="dropdown"
                            class="btn-save-print d-flex align-items-center h-100 dropdown-toggle"
                            style="margin-right:10px">
                            <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.75528 1.6875H5.99476H11.9948H12.123C12.3939 1.6875 12.6621 1.74088 12.9123 1.84459C13.1626 1.94829 13.3899 2.10029 13.5814 2.29189L15.7022 4.41269C16.089 4.79939 16.3064 5.32394 16.3065 5.87088V14.25C16.3065 14.797 16.0892 15.3216 15.7024 15.7084C15.3156 16.0952 14.791 16.3125 14.244 16.3125H12.75H5.25H3.83328C3.28894 16.3125 2.76666 16.0973 2.38031 15.7139C1.99396 15.3304 1.77486 14.8098 1.77078 14.2655L1.69278 3.76547C1.69074 3.49333 1.74258 3.22344 1.84531 2.97143C1.94805 2.71941 2.09965 2.49021 2.29137 2.29705C2.4831 2.10389 2.71115 1.95058 2.9624 1.84597C3.21364 1.74135 3.48312 1.68749 3.75528 1.6875ZM5.8125 15.1875H12.1875V9.9645C12.1875 9.74238 12.0071 9.5625 11.7862 9.5625H6.2145C5.99266 9.5625 5.8125 9.74266 5.8125 9.9645V15.1875ZM13.3125 15.1875V9.9645C13.3125 9.12163 12.6289 8.4375 11.7862 8.4375H6.2145C5.37134 8.4375 4.6875 9.12134 4.6875 9.9645V15.1875H3.83326C3.58582 15.1875 3.34842 15.0897 3.17281 14.9154C2.9972 14.7411 2.89761 14.5044 2.89574 14.257L2.81774 3.75703C2.81682 3.63333 2.84038 3.51066 2.88708 3.39611C2.93378 3.28155 3.00269 3.17737 3.08983 3.08957C3.17698 3.00177 3.28064 2.93208 3.39485 2.88453C3.50905 2.83698 3.63154 2.8125 3.75524 2.8125H5.43226V5.18175C5.43226 5.52985 5.57054 5.86369 5.81668 6.10983C6.06282 6.35597 6.39666 6.49425 6.74476 6.49425H11.2448C11.5929 6.49425 11.9267 6.35597 12.1728 6.10983C12.419 5.86369 12.5573 5.52985 12.5573 5.18175V2.91925C12.6414 2.96326 12.7185 3.01991 12.7858 3.08725L14.9068 5.20831C15.0826 5.38405 15.1814 5.62254 15.1815 5.87112V14.25C15.1815 14.4986 15.0827 14.7371 14.9069 14.9129C14.7311 15.0887 14.4926 15.1875 14.244 15.1875H13.3125ZM11.4323 5.18175V2.8125H6.55726V5.18175C6.55726 5.23148 6.57701 5.27917 6.61218 5.31433C6.64734 5.3495 6.69503 5.36925 6.74476 5.36925H11.2448C11.2945 5.36925 11.3422 5.3495 11.3773 5.31433C11.4125 5.27917 11.4323 5.23148 11.4323 5.18175Z"
                                    fill="white" />
                            </svg>
                            <span>Lưu và in</span>
                        </button>
                        <div class="dropdown-menu" style="z-index: 9999;">
                            <a class="dropdown-item" href="#">Xuất Excel</a>
                            <a class="dropdown-item" href="#">Xuất PDF</a>
                        </div>
                    </div>

                    <a href="#" onclick="getAction(this)">
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
                    </a>
                    <a href="#" onclick="getAction(this)">
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
                    </a>
                    <a href="#" onclick="getAction(this)">
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
                    </a>

                    <label class="custom-btn d-flex align-items-center h-100 m-0 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" class="mr-1">
                            <path
                                d="M6.78565 11.9915C7.26909 11.9915 7.71035 11.9915 8.1516 11.9915C8.23486 11.9915 8.31812 11.9899 8.40082 11.9926C8.5923 11.9987 8.72995 12.0903 8.80599 12.2657C8.88425 12.445 8.84429 12.6071 8.71108 12.7425C8.40082 13.0589 8.08666 13.3713 7.77362 13.6855C7.28519 14.1762 6.79731 14.6679 6.30721 15.1569C6.03135 15.4322 5.81489 15.4322 5.54125 15.158C4.75809 14.3737 3.97771 13.5873 3.19344 12.8047C3.03969 12.6509 2.94423 12.4861 3.03581 12.2679C3.13016 12.0431 3.31666 11.9871 3.54367 11.9899C4.02822 11.996 4.51221 11.9915 5.01619 11.9915C5.03173 11.7812 5.04227 11.5769 5.0617 11.3732C5.33145 8.55805 6.6752 6.39617 9.13957 5.02744C14.0156 2.31941 19.6492 5.27333 20.8021 10.2814C21.7784 14.5225 19.0442 18.8202 14.7788 19.7643C12.3693 20.2977 10.1664 19.8015 8.1838 18.3334C7.74531 18.0087 7.65762 17.4681 7.964 17.0546C8.26983 16.6422 8.80821 16.5761 9.25003 16.9114C10.4556 17.825 11.811 18.2396 13.3223 18.1885C16.042 18.0969 18.502 16.0228 19.0726 13.3219C19.8113 9.82465 17.4652 6.4217 13.9246 5.85334C10.641 5.32605 7.4134 7.66055 6.89777 10.9414C6.84504 11.28 6.8245 11.6241 6.78565 11.9915Z"
                                fill="#0095F6" />
                            <path
                                d="M12.129 10.7643C12.129 10.2315 12.1274 9.69806 12.1296 9.16522C12.1312 8.74062 12.406 8.44811 12.7945 8.44922C13.183 8.45033 13.4567 8.74339 13.4578 9.17022C13.4606 10.091 13.4617 11.0118 13.4556 11.9326C13.4545 12.0675 13.4955 12.143 13.6132 12.2118C14.4075 12.6758 15.1973 13.1476 15.9876 13.6183C16.238 13.7676 16.3568 13.9952 16.3246 14.281C16.2935 14.5602 16.1342 14.7733 15.8572 14.8244C15.6868 14.8555 15.4692 14.8433 15.3238 14.7606C14.398 14.2344 13.485 13.6855 12.5714 13.1382C12.2767 12.9611 12.1279 12.6925 12.129 12.3434C12.1301 11.8166 12.129 11.2905 12.129 10.7643Z"
                                fill="#0095F6" />
                        </svg>
                        Attachment<input type="file" style="display: none;" id="file_restore" accept="*"
                            name="file">
                    </label>


                    <a href="#" id="delete_import" class="d-flex align-items-center h-100 btn-danger"
                        style="padding: 3px 16px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34"
                            fill="none">
                            <path
                                d="M22.981 10.9603C26.3005 14.2798 26.3005 19.6617 22.981 22.9811C19.6615 26.3006 14.2796 26.3006 10.9602 22.9811C7.64073 19.6617 7.64073 14.2798 10.9602 10.9603C14.2796 7.64084 19.6615 7.64084 22.981 10.9603Z"
                                stroke="#E4E4E4" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.728 12.7281C13.0023 12.4538 13.447 12.4538 13.7213 12.7281L21.2133 20.22C21.4876 20.4943 21.4876 20.9391 21.2133 21.2133C20.939 21.4876 20.4943 21.4876 20.22 21.2133L12.728 13.7214C12.4537 13.4471 12.4537 13.0024 12.728 12.7281Z"
                                fill="#E4E4E4" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M21.2133 12.7281C21.4876 13.0024 21.4876 13.4471 21.2133 13.7214L13.7213 21.2133C13.447 21.4876 13.0023 21.4876 12.728 21.2133C12.4537 20.9391 12.4537 20.4943 12.728 20.22L20.22 12.7281C20.4943 12.4538 20.939 12.4538 21.2133 12.7281Z"
                                fill="#E4E4E4" />
                        </svg>
                        <span>Xóa đơn nhận hàng</span>
                    </a>
                </div>
            </div>
        </section>

        <hr class="mt-3">
        <section class="content-header p-0">
            <ul class="nav nav-tabs">
                <li class="active mr-2 mb-3"><a data-toggle="tab" href="#info">Thông tin</a></li>
                <li class="mr-2 mb-3"><a data-toggle="tab" href="#history">Lịch sử sản phẩm</a></li>
                <li class="mr-2 mb-3"><a data-toggle="tab" href="#files">Attachment</a></li>
            </ul>
        </section>
        {{-- <hr class="mt-3"> --}}
        <!-- Main content -->
        <section>
            <x-formprovides> </x-formprovides>

            <div class="container-fluided">
                <div class="tab-content">
                    <div id="info" class="content tab-pane in active">
                        <section>
                            <div class="container-fluided">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="info-chung">
                                            <p class="font-weight-bold ml-2 px-3">Thông tin chung</p>
                                            <div class="content-info">
                                                <div class="d-flex ml-2 align-items-center">
                                                    <div class="title-info py-2 border border-left-0">
                                                        <p class="p-0 m-0 px-3 required-label text-danger">Nhà cung cấp
                                                        </p>
                                                    </div>
                                                    <input readonly id="myInput" type="text"
                                                        placeholder="Nhập thông tin"
                                                        class="border w-100 py-2 border-left-0 border-right-0 px-3"
                                                        autocomplete="off"
                                                        value="{{ $import->getProvideName->provide_name_display }}">
                                                    <ul id="myUL"
                                                        class="bg-white position-absolute w-50 rounded shadow p-0 scroll-data"
                                                        style="z-index: 99;left: 24%;top: 20%;">
                                                        @foreach ($provides as $item)
                                                            <li>
                                                                <a href="#"
                                                                    class="text-dark d-flex justify-content-between p-2 search-info"
                                                                    id="{{ $item->id }}" name="search-info">
                                                                    <span
                                                                        class="w-50">{{ $item->provide_name_display }}</span>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                        <a type="button"
                                                            class="bg-dark d-flex justify-content-between p-2 position-sticky"
                                                            data-toggle="modal" data-target="#provideModal"
                                                            style="bottom: 0;">
                                                            <span class="w-50 text-white">Thêm mới</span>
                                                        </a>
                                                    </ul>
                                                </div>
                                                <div class="d-flex ml-2 align-items-center">
                                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                                        <p class="p-0 m-0 px-3">Số báo giá#</p>
                                                    </div>
                                                    <input readonly type="text" placeholder="Nhập thông tin"
                                                        name="quotation_number"
                                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                                        value="{{ $import->quotation_number }}">
                                                </div>
                                                <div class="d-flex ml-2 align-items-center">
                                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                                        <p class="p-0 m-0 px-3">Số tham chiếu#</p>
                                                    </div>
                                                    <input readonly type="text" placeholder="Nhập thông tin"
                                                        name="reference_number"
                                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                                        value="{{ $import->reference_number }}">
                                                </div>
                                                <div class="d-flex ml-2 align-items-center">
                                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                                        <p class="p-0 m-0 px-3">Ngày báo giá</p>
                                                    </div>
                                                    <input readonly type="date" placeholder="Nhập thông tin"
                                                        name="date_quote"
                                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                                        value="{{ $import->created_at->toDateString() }}">
                                                </div>
                                                <div class="d-flex ml-2 align-items-center">
                                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                                        <p class="p-0 m-0 px-3">Hiệu lực báo giá</p>
                                                    </div>
                                                    <input readonly type="text" placeholder="Nhập thông tin"
                                                        name="price_effect"
                                                        class="border w-100 border-top-0 py-2 border-left-0 border-right-0 px-3"
                                                        value="{{ $import->price_effect }}">
                                                </div>
                                                <div class="d-flex ml-2 align-items-center">
                                                    <div class="title-info py-2 border-top-0 border border-left-0">
                                                        <p class="p-0 m-0 px-3">Điều khoản thanh toán</p>
                                                    </div>
                                                    <input readonly type="text" placeholder="Nhập thông tin"
                                                        name="terms_pay"
                                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                                        value="{{ $import->terms_pay }}">
                                                </div>
                                                <div class="d-flex ml-2 align-items-center position-relative">
                                                    <div class="title-info py-2 border-top-0 border border-left-0">
                                                        <p class="p-0 m-0 px-3">Dự án</p>
                                                    </div>
                                                    <input readonly id="" required type="text"
                                                        placeholder="Nhập thông tin"
                                                        class="border border-top-0 w-100 py-2 border-right-0 border-left-0 px-3"
                                                        value="@if ($import->getProjectName) {{ $import->getProjectName->project_name }} @endif">
                                                    <ul id="listProject"
                                                        class="bg-white position-absolute w-50 rounded shadow p-0 scroll-data"
                                                        style="z-index: 99;left: 23%;top: 96%;">
                                                        @foreach ($project as $va)
                                                            <li>
                                                                <a href="javascript:void(0)"
                                                                    class="text-dark d-flex justify-content-between p-2 project_name"
                                                                    id="{{ $va->id }}" name="project_name">
                                                                    <span
                                                                        class="w-50">{{ $va->project_name }}</span>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-5">
                                            <div class="d-flex align-items-center btn-basic pb-3 px-2">
                                                <svg class="mr-1" width="18" height="18"
                                                    viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.25 15.75H3.75C3.35218 15.75 2.97064 15.592 2.68934 15.3107C2.40804 15.0294 2.25 14.6478 2.25 14.25V3.75C2.25 3.35218 2.40804 2.97064 2.68934 2.68934C2.97064 2.40804 3.35218 2.25 3.75 2.25H14.25C14.6478 2.25 15.0294 2.40804 15.3107 2.68934C15.592 2.97064 15.75 3.35218 15.75 3.75V14.25C15.75 14.6478 15.592 15.0294 15.3107 15.3107C15.0294 15.592 14.6478 15.75 14.25 15.75Z"
                                                        stroke="#42526E" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M4.5 4.5H13.5V11.25H4.5V4.5Z" stroke="#42526E"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M4.5 13.5H9.75" stroke="#42526E" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M12 13.5H13.5" stroke="#42526E" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <p class="p-0 m-0 change_colum">Đầy đủ</p>
                                                <svg class="ml-1" width="18" height="18"
                                                    viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                                        fill="#42526E" />
                                                </svg>
                                            </div>
                                            <div class="btn-add-product m-0 pt-2 px-2 text-white">
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13.1221 7.74957H17.7085C17.7639 7.74959 17.8182 7.76654 17.8649 7.79842C17.9117 7.83031 17.949 7.87581 17.9725 7.92961C17.996 7.9834 18.0047 8.04326 17.9976 8.10218C17.9905 8.16109 17.9679 8.21662 17.9325 8.26226L15.6393 11.2133C15.6119 11.2485 15.5777 11.2768 15.539 11.2963C15.5003 11.3157 15.4581 11.3257 15.4153 11.3257C15.3726 11.3257 15.3304 11.3157 15.2917 11.2963C15.253 11.2768 15.2187 11.2485 15.1914 11.2133L12.8982 8.26226C12.8627 8.21662 12.8401 8.16109 12.833 8.10218C12.8259 8.04326 12.8347 7.9834 12.8582 7.92961C12.8817 7.87581 12.919 7.83031 12.9657 7.79842C13.0125 7.76654 13.0667 7.74959 13.1221 7.74957ZM0.291496 10.2505H4.87787C4.93328 10.2505 4.98753 10.2335 5.03428 10.2016C5.08103 10.1698 5.11834 10.1243 5.14184 10.0705C5.16534 10.0167 5.17405 9.9568 5.16697 9.89789C5.15988 9.83898 5.13728 9.78345 5.10182 9.7378L2.80863 6.78672C2.78127 6.75154 2.74702 6.72323 2.70832 6.70381C2.66962 6.68438 2.62741 6.67432 2.58468 6.67432C2.54195 6.67432 2.49974 6.68438 2.46104 6.70381C2.42234 6.72323 2.3881 6.75154 2.36073 6.78672L0.0675433 9.7378C0.0320814 9.78345 0.00948352 9.83898 0.00239575 9.89789C-0.00469202 9.9568 0.00402372 10.0167 0.0275224 10.0705C0.0510212 10.1243 0.0883301 10.1698 0.13508 10.2016C0.181831 10.2335 0.236087 10.2505 0.291496 10.2505Z"
                                                        fill="white" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M8.99998 2.7477C7.1897 2.7477 5.5707 3.63177 4.5011 5.02104C4.45333 5.0874 4.39361 5.14279 4.32548 5.18392C4.25735 5.22505 4.1822 5.25106 4.1045 5.26043C4.0268 5.26979 3.94814 5.26231 3.87319 5.23843C3.79824 5.21455 3.72854 5.17476 3.66822 5.12142C3.6079 5.06808 3.55821 5.00229 3.52209 4.92794C3.48597 4.8536 3.46416 4.77223 3.45796 4.68867C3.45177 4.60512 3.4613 4.52107 3.48601 4.44155C3.51072 4.36202 3.55009 4.28863 3.60178 4.22574C4.45583 3.11724 5.58889 2.29505 6.86621 1.85694C8.14352 1.41883 9.51134 1.38326 10.807 1.75444C12.1026 2.12563 13.2715 2.88795 14.1747 3.95075C15.0779 5.01355 15.6773 6.33208 15.9017 7.74954H14.7154C14.4461 6.33753 13.7303 5.06854 12.6888 4.15715C11.6474 3.24575 10.3443 2.74787 8.99998 2.7477ZM3.28452 10.2505C3.50533 11.4067 4.02677 12.4723 4.78859 13.3243C5.55041 14.1762 6.52152 14.7797 7.58974 15.0651C8.65795 15.3504 9.77967 15.306 10.8253 14.9368C11.8709 14.5677 12.7978 13.8889 13.4989 12.979C13.5466 12.9126 13.6064 12.8572 13.6745 12.8161C13.7426 12.775 13.8178 12.7489 13.8955 12.7396C13.9732 12.7302 14.0518 12.7377 14.1268 12.7616C14.2017 12.7854 14.2714 12.8252 14.3317 12.8786C14.3921 12.9319 14.4418 12.9977 14.4779 13.0721C14.514 13.1464 14.5358 13.2278 14.542 13.3113C14.5482 13.3949 14.5387 13.4789 14.514 13.5585C14.4892 13.638 14.4499 13.7114 14.3982 13.7743C13.5441 14.8828 12.4111 15.705 11.1338 16.1431C9.85644 16.5812 8.48862 16.6167 7.19299 16.2456C5.89736 15.8744 4.72844 15.112 3.82526 14.0492C2.92208 12.9865 2.32265 11.6679 2.09827 10.2505H3.28452Z"
                                                        fill="white" />
                                                </svg>
                                                Thêm sản phẩm mới
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <table class="table table-hover bg-white rounded" id="inputcontent">
                            <thead>
                                <tr>
                                    <th class="border-right"><input type="checkbox"> Mã sản phẩm</th>
                                    <th class="border-right">Tên sản phẩm</th>
                                    <th class="border-right">Đơn vị</th>
                                    <th class="border-right">Số lượng</th>
                                    <th class="border-right">Đơn giá</th>
                                    <th class="border-right">Thuế</th>
                                    <th class="border-right">Thành tiền</th>
                                    <th class="p-0 bg-secondary" style="width:1%;"></th>
                                    <th class="border-right">Ghi chú</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($product as $item)
                                    <tr class="bg-white">
                                        <td class="border border-left-0 border-top-0 border-bottom-0">
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
                                        <td class="border border-top-0 border-bottom-0 position-relative">
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
                                        <td class="border border-top-0 border-bottom-0">
                                            <input type="text" name="product_unit[]"
                                                class="border-0 px-3 py-2 w-100 product_unit"
                                                value="{{ $item->product_unit }}" readonly>
                                        </td>
                                        <td class="border border-top-0 border-bottom-0 border-right-0">
                                            <input readonly oninput="checkQty(this,{{ $item->product_qty }})"
                                                type="text" name="product_qty[]"
                                                class="border-0 px-3 py-2 w-100 quantity-input"
                                                value="{{ number_format($item->product_qty) }}">
                                        </td>
                                        <td class="border border-top-0 border-bottom-0 border-right-0">
                                            <input type="text" name="price_export[]"
                                                class="border-0 px-3 py-2 w-100 price_export"
                                                value="{{ fmod($item->price_export, 2) > 0 ? number_format($item->price_export, 2, '.', ',') : number_format($item->price_export) }}"
                                                readonly>
                                        </td>
                                        <input type="hidden" class="product_tax1">
                                        <td class="border border-top-0 border-bottom-0 border-right-0">
                                            <select name="product_tax[]" id="product_tax" class="product_tax">
                                                <option value="0"
                                                    @if ($item->product_tax == 0) selected @endif>0%
                                                </option>
                                                <option value="8"
                                                    @if ($item->product_tax == 8) selected @endif>8%
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
                                        <td class="border border-top-0 border-bottom-0 border-right-0">
                                            <input type="text" name="total_price[]"
                                                class="border-0 px-3 py-2 w-100 total_price" readonly readonly
                                                value="{{ fmod($item->product_total, 2) > 0 ? number_format($item->product_total, 2, '.', ',') : number_format($item->product_total) }}"
                                                @if ($import->status == 2) echo readonly @endif>
                                        </td>
                                        <td class="border border-bottom-0 p-0 bg-secondary"></td>
                                        <td class="border border-top-0 border-bottom-0">
                                            <input readonly type="text" name="product_note[]"
                                                class="border-0 px-3 py-2 w-100" value="{{ $item->product_note }}">
                                        </td>
                                        <td class="border border-top-0 border">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.5454 5C10.2442 5 9.99999 5.24421 9.99999 5.54545C9.99999 5.8467 10.2442 6.09091 10.5454 6.09091H13.4545C13.7558 6.09091 14 5.8467 14 5.54545C14 5.24421 13.7558 5 13.4545 5H10.5454ZM6 7.72726C6 7.42601 6.24421 7.18181 6.54545 7.18181H7.63637H16.3636H17.4545C17.7558 7.18181 18 7.42601 18 7.72726C18 8.02851 17.7558 8.27272 17.4545 8.27272H16.9091V17C16.9091 18.2113 15.9118 19.1818 14.7135 19.1818H9.25891C8.97278 19.1816 8.68906 19.1247 8.42499 19.0145C8.16092 18.9044 7.92126 18.7431 7.71979 18.5399C7.51833 18.3367 7.35905 18.0957 7.25112 17.8307C7.14347 17.5664 7.08903 17.2834 7.09091 16.9981V8.27272H6.54545C6.24421 8.27272 6 8.02851 6 7.72726ZM8.18182 17.0041V8.27272H15.8182V17C15.8182 17.5966 15.3216 18.0909 14.7135 18.0909H9.25938C9.11713 18.0908 8.97632 18.0625 8.84503 18.0077C8.71375 17.953 8.5946 17.8728 8.49444 17.7718C8.39429 17.6707 8.3151 17.5509 8.26144 17.4192C8.20779 17.2874 8.18074 17.1464 8.18182 17.0041ZM13.4545 10.0909C13.7558 10.0909 14 10.3351 14 10.6364V15.7273C14 16.0285 13.7558 16.2727 13.4545 16.2727C13.1533 16.2727 12.9091 16.0285 12.9091 15.7273V10.6364C12.9091 10.3351 13.1533 10.0909 13.4545 10.0909ZM11.0909 10.6364C11.0909 10.3351 10.8467 10.0909 10.5454 10.0909C10.2442 10.0909 9.99999 10.3351 9.99999 10.6364V15.7273C9.99999 16.0285 10.2442 16.2727 10.5454 16.2727C10.8467 16.2727 11.0909 16.0285 11.0909 15.7273V10.6364Z"
                                                    fill="#42526E"></path>
                                            </svg>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <x-formsynthetic :import="$import"></x-formsynthetic>
                    </div>
                    <div id="history" class="tab-pane fade">
                        <table class="table table-hover bg-white rounded">
                            <thead>
                                <tr>
                                    <th class="border-right"><input type="checkbox"> Mã sản phẩm</th>
                                    <th class="border-right">Tên sản phẩm</th>
                                    <th class="border-right">Đơn vị</th>
                                    <th class="border-right">Số lượng</th>
                                    <th class="border-right">Đơn giá</th>
                                    <th class="border-right">Thuế</th>
                                    <th class="border-right">Thành tiền</th>
                                    <th class="p-0 bg-secondary" style="width:1%;"></th>
                                    <th class="border-right">Ghi chú</th>
                                    <th class="border-right">Version</th>
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
                                            <input type="text" class="searchProductName border-0 px-3 py-2 w-100"
                                                readonly value="{{ $item->product_name }}">
                                        </td>
                                        <td class="border border-top-0 border-bottom-0">
                                            <input type="text" class="border-0 px-3 py-2 w-100 product_unit"
                                                readonly value="{{ $item->product_unit }}">
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
                                        <td class="border border-bottom-0 p-0 bg-secondary"></td>
                                        <td class="border border-top-0 border-bottom-0">
                                            <input type="text" class="border-0 px-3 py-2 w-100" readonly
                                                value="{{ $item->product_note }}">
                                        </td>
                                        <td class="border border-top-0 border ">
                                            <input type="text" class="border-0 px-3 py-2 w-100" readonly
                                                value="{{ $item->version }}">
                                        </td>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
    </form>
    <div id="files" class="tab-pane fade">
        <x-form-attachment :value="$import" name="DMH"></x-form-attachment>
    </div>
</div>
</div>

</section>


</div>
<script src="{{ asset('/dist/js/products.js') }}"></script>
<script src="{{ asset('/dist/js/import.js') }}"></script>
<script>
    // Xóa đơn hàng
    deleteImport('#delete_import', '{{ route('import.destroy', $import->id) }}')

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
