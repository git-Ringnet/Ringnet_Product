<x-navbar :title="$title"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <form action="{{ route('detailExport.store') }}" method="POST">
        @csrf
        <!-- Content Header (Page header) -->
        <section class="content-header p-0">
            <div class="container-fluided">
                <div class="mb-3">
                    <span>Bán hàng</span>
                    <span>/</span>
                    <span>Đơn báo giá</span>
                    <span>/</span>
                    <span class="font-weight-bold">Báo giá mới</span>
                </div>
                <div class="row m-0 mb-1">
                    <button type="submit" class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                        <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M3.75528 1.6875H5.99476H11.9948H12.123C12.3939 1.6875 12.6621 1.74088 12.9123 1.84459C13.1626 1.94829 13.3899 2.10029 13.5814 2.29189L15.7022 4.41269C16.089 4.79939 16.3064 5.32394 16.3065 5.87088V14.25C16.3065 14.797 16.0892 15.3216 15.7024 15.7084C15.3156 16.0952 14.791 16.3125 14.244 16.3125H12.75H5.25H3.83328C3.28894 16.3125 2.76666 16.0973 2.38031 15.7139C1.99396 15.3304 1.77486 14.8098 1.77078 14.2655L1.69278 3.76547C1.69074 3.49333 1.74258 3.22344 1.84531 2.97143C1.94805 2.71941 2.09965 2.49021 2.29137 2.29705C2.4831 2.10389 2.71115 1.95058 2.9624 1.84597C3.21364 1.74135 3.48312 1.68749 3.75528 1.6875ZM5.8125 15.1875H12.1875V9.9645C12.1875 9.74238 12.0071 9.5625 11.7862 9.5625H6.2145C5.99266 9.5625 5.8125 9.74266 5.8125 9.9645V15.1875ZM13.3125 15.1875V9.9645C13.3125 9.12163 12.6289 8.4375 11.7862 8.4375H6.2145C5.37134 8.4375 4.6875 9.12134 4.6875 9.9645V15.1875H3.83326C3.58582 15.1875 3.34842 15.0897 3.17281 14.9154C2.9972 14.7411 2.89761 14.5044 2.89574 14.257L2.81774 3.75703C2.81682 3.63333 2.84038 3.51066 2.88708 3.39611C2.93378 3.28155 3.00269 3.17737 3.08983 3.08957C3.17698 3.00177 3.28064 2.93208 3.39485 2.88453C3.50905 2.83698 3.63154 2.8125 3.75524 2.8125H5.43226V5.18175C5.43226 5.52985 5.57054 5.86369 5.81668 6.10983C6.06282 6.35597 6.39666 6.49425 6.74476 6.49425H11.2448C11.5929 6.49425 11.9267 6.35597 12.1728 6.10983C12.419 5.86369 12.5573 5.52985 12.5573 5.18175V2.91925C12.6414 2.96326 12.7185 3.01991 12.7858 3.08725L14.9068 5.20831C15.0826 5.38405 15.1814 5.62254 15.1815 5.87112V14.25C15.1815 14.4986 15.0827 14.7371 14.9069 14.9129C14.7311 15.0887 14.4926 15.1875 14.244 15.1875H13.3125ZM11.4323 5.18175V2.8125H6.55726V5.18175C6.55726 5.23148 6.57701 5.27917 6.61218 5.31433C6.64734 5.3495 6.69503 5.36925 6.74476 5.36925H11.2448C11.2945 5.36925 11.3422 5.3495 11.3773 5.31433C11.4125 5.27917 11.4323 5.23148 11.4323 5.18175Z"
                                fill="white" />
                        </svg>
                        <span>Lưu nháp</span>
                    </button>
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
                    <button class="btn-option">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                                fill="#42526E" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                                fill="#42526E" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                                fill="#42526E" />
                        </svg>
                    </button>
                </div>
            </div>
        </section>
        <hr class="mt-3">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluided">
                <div class="row">
                    <div class="col-12">
                        <div class="info-chung">
                            <p class="font-weight-bold ml-2 px-3">Thông tin chung</p>
                            <div class="content-info">
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-left-0">
                                        <p class="p-0 m-0 px-3 required-label text-danger">Khách hàng</p>
                                    </div>
                                    <div class="w-100">
                                        <input type="text" placeholder="Nhập thông tin"
                                            class="border w-100 py-2 border-left-0 border-right-0 px-3 nameGuest"
                                            id="myInput" autocomplete="off" required>
                                        <input type="hidden" class="idGuest" autocomplete="off" name="guest_id">
                                        <ul id="myUL"
                                            class="bg-white position-absolute w-50 rounded shadow p-0 scroll-data"
                                            style="z-index: 99;">
                                            @foreach ($guest as $guest_value)
                                                <li>
                                                    <a href="#"
                                                        class="text-dark d-flex justify-content-between p-2 search-info"
                                                        id="{{ $guest_value->id }}" name="search-info">
                                                        <span
                                                            class="w-50">{{ $guest_value->guest_name_display }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                            <a type="button"
                                                class="bg-dark d-flex justify-content-between p-2 position-sticky addGuestNew"
                                                data-toggle="modal" data-target="#guestModal" style="bottom: 0;">
                                                <span class="w-50 text-white">Thêm mới</span>
                                            </a>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Số báo giá#</p>
                                    </div>
                                    <div class="w-100">
                                        <input type="text" placeholder="Nhập thông tin" name="quotation_number"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Số tham chiếu#</p>
                                    </div>
                                    <div class="w-100">
                                        <input type="text" placeholder="Nhập thông tin" name="reference_number"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Ngày báo giá</p>
                                    </div>
                                    <div class="w-100">
                                        <input type="date" placeholder="Nhập thông tin" name="date_quote"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Hiệu lực báo giá</p>
                                    </div>
                                    <div class="w-100">
                                        <input type="text" placeholder="Nhập thông tin" name="price_effect"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border-top-0 border border-left-0">
                                        <p class="p-0 m-0 px-3">Điều khoản thanh toán</p>
                                    </div>
                                    <div class="w-100">
                                        <input type="text" placeholder="Nhập thông tin" name="terms_pay"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border-top-0 border border-left-0">
                                        <p class="p-0 m-0 px-3">Dự án</p>
                                    </div>
                                    <div class="w-100">
                                        <input type="text" placeholder="Nhập thông tin"
                                            class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-5">
                            <div class="d-flex align-items-center btn-basic pb-3 px-2">
                                <svg class="mr-1" width="18" height="18" viewBox="0 0 18 18"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.25 15.75H3.75C3.35218 15.75 2.97064 15.592 2.68934 15.3107C2.40804 15.0294 2.25 14.6478 2.25 14.25V3.75C2.25 3.35218 2.40804 2.97064 2.68934 2.68934C2.97064 2.40804 3.35218 2.25 3.75 2.25H14.25C14.6478 2.25 15.0294 2.40804 15.3107 2.68934C15.592 2.97064 15.75 3.35218 15.75 3.75V14.25C15.75 14.6478 15.592 15.0294 15.3107 15.3107C15.0294 15.592 14.6478 15.75 14.25 15.75Z"
                                        stroke="#42526E" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M4.5 4.5H13.5V11.25H4.5V4.5Z" stroke="#42526E" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M4.5 13.5H9.75" stroke="#42526E" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12 13.5H13.5" stroke="#42526E" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p class="p-0 m-0 change_colum">Tối giản</p>
                                <svg class="ml-1" width="18" height="18" viewBox="0 0 18 18"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                        fill="#42526E" />
                                </svg>
                            </div>
                            <div class="btn-add-product mb-1 m-0 pt-2 px-2 text-white">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
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
                        <section class="content">
                            <div class="container-fluided order_content">
                                <section class="multiple_action" style="display: none;">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="count_checkbox mr-5">Đã chọn 1</span>
                                        <div class="row action">
                                            <div class="btn-chotdon my-2 ml-3">
                                                <button type="button" id="btn-chot"
                                                    class="btn-group btn-light d-flex align-items-center h-100">
                                                    <svg width="18" height="18" viewBox="0 0 18 18"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M11.6511 0.123503C11.8471 0.0419682 12.0573 0 12.2695 0C12.4818 0 12.6919 0.0419682 12.888 0.123503C13.084 0.205038 13.2621 0.32454 13.4121 0.475171L14.7065 1.77321C14.8567 1.92366 14.9758 2.10232 15.0571 2.29897C15.1384 2.49564 15.1803 2.70643 15.1803 2.91931C15.1803 3.13219 15.1384 3.34299 15.0571 3.53965C14.9758 3.73631 14.8567 3.91497 14.7065 4.06542L13.0911 5.68531C13.0818 5.69595 13.072 5.70637 13.0618 5.71655C13.0517 5.72673 13.0413 5.73653 13.0307 5.74594L4.70614 14.094C4.57631 14.2241 4.40022 14.2973 4.21661 14.2973H1.61538C1.23302 14.2973 0.923067 13.9865 0.923067 13.603V10.9945C0.923067 10.8103 0.996015 10.6337 1.12586 10.5035L9.44489 2.16183C9.45594 2.149 9.46754 2.13648 9.47969 2.1243C9.49185 2.11211 9.50435 2.10046 9.51716 2.08936L11.127 0.475171C11.2768 0.324749 11.4552 0.20496 11.6511 0.123503ZM9.97051 3.59834L2.30768 11.2821V12.9088H3.92984L11.5923 5.22471L9.97051 3.59834ZM12.5714 4.24288L10.9496 2.61656L12.1069 1.45617C12.1282 1.43472 12.1536 1.41771 12.1815 1.4061C12.2094 1.39449 12.2393 1.38852 12.2695 1.38852C12.2997 1.38852 12.3297 1.39449 12.3576 1.4061C12.3855 1.41771 12.4113 1.43514 12.4326 1.45658L13.7277 2.75531C13.7491 2.77681 13.7664 2.8026 13.778 2.83069C13.7897 2.85878 13.7956 2.8889 13.7956 2.91931C13.7956 2.94973 13.7897 2.97985 13.778 3.00793C13.7664 3.03603 13.7491 3.06182 13.7277 3.08332L12.5714 4.24288ZM0 17.3057C0 16.9223 0.309957 16.6115 0.692308 16.6115H17.3077C17.69 16.6115 18 16.9223 18 17.3057C18 17.6892 17.69 18 17.3077 18H0.692308C0.309957 18 0 17.6892 0 17.3057Z"
                                                            fill="#42526E" />
                                                    </svg>
                                                    <span class="px-1">Nhân hệ số</span>
                                                </button>
                                            </div>
                                            <div class="btn-xoahang my-2 ml-1">
                                                <button id="deleteExports" type="button"
                                                    class="btn-group btn-light d-flex align-items-center h-100">
                                                    <svg width="18" height="18" viewBox="0 0 18 18"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M11.6511 0.123503C11.8471 0.0419682 12.0573 0 12.2695 0C12.4818 0 12.6919 0.0419682 12.888 0.123503C13.084 0.205038 13.2621 0.32454 13.4121 0.475171L14.7065 1.77321C14.8567 1.92366 14.9758 2.10232 15.0571 2.29897C15.1384 2.49564 15.1803 2.70643 15.1803 2.91931C15.1803 3.13219 15.1384 3.34299 15.0571 3.53965C14.9758 3.73631 14.8567 3.91497 14.7065 4.06542L13.0911 5.68531C13.0818 5.69595 13.072 5.70637 13.0618 5.71655C13.0517 5.72673 13.0413 5.73653 13.0307 5.74594L4.70614 14.094C4.57631 14.2241 4.40022 14.2973 4.21661 14.2973H1.61538C1.23302 14.2973 0.923067 13.9865 0.923067 13.603V10.9945C0.923067 10.8103 0.996015 10.6337 1.12586 10.5035L9.44489 2.16183C9.45594 2.149 9.46754 2.13648 9.47969 2.1243C9.49185 2.11211 9.50435 2.10046 9.51716 2.08936L11.127 0.475171C11.2768 0.324749 11.4552 0.20496 11.6511 0.123503ZM9.97051 3.59834L2.30768 11.2821V12.9088H3.92984L11.5923 5.22471L9.97051 3.59834ZM12.5714 4.24288L10.9496 2.61656L12.1069 1.45617C12.1282 1.43472 12.1536 1.41771 12.1815 1.4061C12.2094 1.39449 12.2393 1.38852 12.2695 1.38852C12.2997 1.38852 12.3297 1.39449 12.3576 1.4061C12.3855 1.41771 12.4113 1.43514 12.4326 1.45658L13.7277 2.75531C13.7491 2.77681 13.7664 2.8026 13.778 2.83069C13.7897 2.85878 13.7956 2.8889 13.7956 2.91931C13.7956 2.94973 13.7897 2.97985 13.778 3.00793C13.7664 3.03603 13.7491 3.06182 13.7277 3.08332L12.5714 4.24288ZM0 17.3057C0 16.9223 0.309957 16.6115 0.692308 16.6115H17.3077C17.69 16.6115 18 16.9223 18 17.3057C18 17.6892 17.69 18 17.3077 18H0.692308C0.309957 18 0 17.6892 0 17.3057Z"
                                                            fill="#42526E" />
                                                    </svg>
                                                    <span class="px-1">Thuế</span>
                                                </button>
                                            </div>
                                            <div class="btn-huy my-2 ml-3">
                                                <button id="cancelBillExport"
                                                    class="btn-group btn-light d-flex align-items-center h-100">
                                                    <svg width="18" height="18" viewBox="0 0 18 18"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M15.75 15.75L2.25 2.25" stroke="#42526E"
                                                            stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M15.75 2.25L2.25 15.75" stroke="#42526E"
                                                            stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                    <span class="px-1">Xóa</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="btn ml-auto cancal_action">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path d="M18 18L6 6" stroke="white" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M18 6L6 18" stroke="white" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </section>
                                <table class="table table-hover bg-white rounded">
                                    <thead>
                                        <tr>
                                            <th class="border-right" style="width: 15%">
                                                <input class="ml-4" id="checkall" type="checkbox"> Mã sản phẩm
                                            </th>
                                            <th class="border-right" style="width: 20%">Tên sản phẩm</th>
                                            <th class="border-right" style="width: 8%">Đơn vị</th>
                                            <th class="border-right" style="width: 8%">Số lượng</th>
                                            <th class="border-right" style="width: 15%">Đơn giá</th>
                                            <th class="border-right" style="width: 10%">Thuế</th>
                                            <th class="border-right" style="width: 15%">Thành tiền</th>
                                            <th class=""></th>
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
                                <div class="d-flex">
                                    <button type="button" data-toggle="dropdown" id="add-field-btn"
                                        class="btn-save-print d-flex align-items-center h-100 py-1 px-2"
                                        style="margin-right:10px">
                                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18"
                                            height="18" viewBox="0 0 18 18" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                                fill="#42526E" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                                fill="#42526E" />
                                        </svg>
                                        <span>Thêm dòng</span>
                                    </button>
                                    <button type="button" data-toggle="dropdown"
                                        class="btn-save-print d-flex align-items-center h-100 py-1 px-2"
                                        style="margin-right:10px">
                                        <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M3.75528 1.6875H5.99476H11.9948H12.123C12.3939 1.6875 12.6621 1.74088 12.9123 1.84459C13.1626 1.94829 13.3899 2.10029 13.5814 2.29189L15.7022 4.41269C16.089 4.79939 16.3064 5.32394 16.3065 5.87088V14.25C16.3065 14.797 16.0892 15.3216 15.7024 15.7084C15.3156 16.0952 14.791 16.3125 14.244 16.3125H12.75H5.25H3.83328C3.28894 16.3125 2.76666 16.0973 2.38031 15.7139C1.99396 15.3304 1.77486 14.8098 1.77078 14.2655L1.69278 3.76547C1.69074 3.49333 1.74258 3.22344 1.84531 2.97143C1.94805 2.71941 2.09965 2.49021 2.29137 2.29705C2.4831 2.10389 2.71115 1.95058 2.9624 1.84597C3.21364 1.74135 3.48312 1.68749 3.75528 1.6875ZM5.8125 15.1875H12.1875V9.9645C12.1875 9.74238 12.0071 9.5625 11.7862 9.5625H6.2145C5.99266 9.5625 5.8125 9.74266 5.8125 9.9645V15.1875ZM13.3125 15.1875V9.9645C13.3125 9.12163 12.6289 8.4375 11.7862 8.4375H6.2145C5.37134 8.4375 4.6875 9.12134 4.6875 9.9645V15.1875H3.83326C3.58582 15.1875 3.34842 15.0897 3.17281 14.9154C2.9972 14.7411 2.89761 14.5044 2.89574 14.257L2.81774 3.75703C2.81682 3.63333 2.84038 3.51066 2.88708 3.39611C2.93378 3.28155 3.00269 3.17737 3.08983 3.08957C3.17698 3.00177 3.28064 2.93208 3.39485 2.88453C3.50905 2.83698 3.63154 2.8125 3.75524 2.8125H5.43226V5.18175C5.43226 5.52985 5.57054 5.86369 5.81668 6.10983C6.06282 6.35597 6.39666 6.49425 6.74476 6.49425H11.2448C11.5929 6.49425 11.9267 6.35597 12.1728 6.10983C12.419 5.86369 12.5573 5.52985 12.5573 5.18175V2.91925C12.6414 2.96326 12.7185 3.01991 12.7858 3.08725L14.9068 5.20831C15.0826 5.38405 15.1814 5.62254 15.1815 5.87112V14.25C15.1815 14.4986 15.0827 14.7371 14.9069 14.9129C14.7311 15.0887 14.4926 15.1875 14.244 15.1875H13.3125ZM11.4323 5.18175V2.8125H6.55726V5.18175C6.55726 5.23148 6.57701 5.27917 6.61218 5.31433C6.64734 5.3495 6.69503 5.36925 6.74476 5.36925H11.2448C11.2945 5.36925 11.3422 5.3495 11.3773 5.31433C11.4125 5.27917 11.4323 5.23148 11.4323 5.18175Z"
                                                fill="white" />
                                        </svg>
                                        <span>Thêm hàng loạt</span>
                                    </button>
                                    <button class="btn-option py-1 px-2">
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
                        <div class="content">
                            <div class="container-fluided">
                                <div class="row position-relative footer-total">
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6">
                                        <div class="mt-4 w-50" style="float: right;">
                                            <div class="d-flex justify-content-between">
                                                <span><b>Giá trị trước thuế:</b></span>
                                                <span id="total-amount-sum">0đ</span>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2 align-items-center">
                                                <span><b>Thuế VAT:</b></span>
                                                <span id="product-tax">0đ</span>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <span class="text-primary">Giảm giá:</span>
                                                <div class="w-50">
                                                    <input type="text" class="form-control text-right border-0 p-0"
                                                        name="" id="voucher" value="0">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <span class="text-primary">Phí vận chuyển:</span>
                                                <div class="w-50">
                                                    <input type="text" class="form-control text-right border-0 p-0"
                                                        name="transport_fee" id="transport_fee" value="0">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                <span class="text-lg"><b>Tổng cộng:</b></span>
                                                <span><b id="grand-total" data-value="0">0đ</b></span>
                                                <input type="text" hidden="" name="totalValue"
                                                    value="0" id="total">
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
    </form>
    <div class="modal fade" id="guestModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Thông tin khách hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="content-info">
                        <div class="d-flex ml-2 align-items-center">
                            <div class="title-info py-2 border border-left-0">
                                <p class="p-0 m-0 px-3 required-label text-danger">
                                    Tên hiển thị
                                </p>
                            </div>
                            <input name="guest_name_display" type="text" placeholder="Nhập thông tin"
                                class="border w-100 py-2 border-left-0 border-right-0 px-3" id="guest_name_display"
                                autocomplete="off">
                        </div>
                        <div class="d-flex ml-2 align-items-center">
                            <div class="title-info py-2 border border-left-0">
                                <p class="p-0 m-0 px-3 required-label text-danger">
                                    Địa chỉ
                                </p>
                            </div>
                            <input name="guest_address" type="text" placeholder="Nhập thông tin"
                                class="border w-100 py-2 border-left-0 border-right-0 px-3" id="guest_address"
                                autocomplete="off">
                        </div>
                        <div class="d-flex ml-2 align-items-center">
                            <div class="title-info py-2 border border-left-0">
                                <p class="p-0 m-0 px-3 required-label text-danger">
                                    Mã số thuế
                                </p>
                            </div>
                            <input name="guest_code" type="text" placeholder="Nhập thông tin"
                                class="border w-100 py-2 border-left-0 border-right-0 px-3" id="guest_code"
                                autocomplete="off">
                        </div>
                        <div class="d-flex ml-2 align-items-center">
                            <div class="title-info py-2 border border-left-0">
                                <p class="p-0 m-0 px-3">
                                    Tên công ty
                                </p>
                            </div>
                            <input name="guest_name" type="text" placeholder="Nhập thông tin"
                                class="border w-100 py-2 border-left-0 border-right-0 px-3" id="guest_name"
                                autocomplete="off">
                        </div>
                        <div class="d-flex ml-2 align-items-center">
                            <div class="title-info py-2 border border-left-0">
                                <p class="p-0 m-0 px-3">
                                    Email
                                </p>
                            </div>
                            <input name="guest_email" type="text" placeholder="Nhập thông tin"
                                class="border w-100 py-2 border-left-0 border-right-0 px-3" id="guest_email"
                                autocomplete="off">
                        </div>
                        <div class="d-flex ml-2 align-items-center">
                            <div class="title-info py-2 border border-left-0">
                                <p class="p-0 m-0 px-3">
                                    Số điện thoại
                                </p>
                            </div>
                            <input name="guest_phone" type="text" placeholder="Nhập thông tin"
                                class="border w-100 py-2 border-left-0 border-right-0 px-3" id="guest_phone"
                                autocomplete="off">
                        </div>
                        <div class="d-flex ml-2 align-items-center">
                            <div class="title-info py-2 border border-left-0">
                                <p class="p-0 m-0 px-3">
                                    Người nhận hàng
                                </p>
                            </div>
                            <input name="guest_receiver" type="text" placeholder="Nhập thông tin"
                                class="border w-100 py-2 border-left-0 border-right-0 px-3" id="guest_receiver"
                                autocomplete="off">
                        </div>
                        <div class="d-flex ml-2 align-items-center">
                            <div class="title-info py-2 border border-left-0">
                                <p class="p-0 m-0 px-3">
                                    Email cá nhân
                                </p>
                            </div>
                            <input name="guest_email_personal" type="text" placeholder="Nhập thông tin"
                                class="border w-100 py-2 border-left-0 border-right-0 px-3" id="guest_email_personal"
                                autocomplete="off">
                        </div>
                        <div class="d-flex ml-2 align-items-center">
                            <div class="title-info py-2 border border-left-0">
                                <p class="p-0 m-0 px-3">
                                    SĐT người nhận
                                </p>
                            </div>
                            <input name="guest_phone_receiver" type="text" placeholder="Nhập thông tin"
                                class="border w-100 py-2 border-left-0 border-right-0 px-3" id="guest_phone_receiver"
                                autocomplete="off">
                        </div>
                        <div class="d-flex ml-2 align-items-center">
                            <div class="title-info py-2 border border-left-0">
                                <p class="p-0 m-0 px-3">
                                    Ghi chú
                                </p>
                            </div>
                            <input name="guest_note" type="text" placeholder="Nhập thông tin"
                                class="border w-100 py-2 border-left-0 border-right-0 px-3" id="guest_note"
                                autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="addGuest">Thêm mới</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //hiện danh sách khách hàng khi click trường tìm kiếm
    $("#myUL").hide();
    $("#myInput").on("click", function() {
        $("#myUL").show();
    });
    //ẩn danh sách khách hàng
    $(document).click(function(event) {
        if (!$(event.target).closest("#myInput").length) {
            $("#myUL").hide();
        }
    });
    //search thông tin khách hàng
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toUpperCase();
            $("#myUL li").each(function() {
                var text = $(this).find("a").text().toUpperCase();
                $(this).toggle(text.indexOf(value) > -1);
            });
        });
    });
    //thêm sản phẩm
    $(document).ready(function() {
        let fieldCounter = 1;
        $("#add-field-btn").click(function() {
            let nextSoTT = $(".soTT").length + 1;
            // Tạo các phần tử HTML mới
            const newRow = $("<tr>", {
                "id": `dynamic-row-${fieldCounter}`,
                "class": `bg-white`,
            });
            const maSanPham = $(
                "<td class='border border-left-0 border-top-0 border-bottom-0 position-relative'>" +
                "<div class='d-flex w-100 justify-content-between align-items-center'>" +
                "<svg width='24' height='24' viewBox='0 0 24 24'" +
                "fill='none' xmlns='http://www.w3.org/2000/svg'>" +
                "<path fill-rule='evenodd' clip-rule='evenodd' d='M9 3C7.89543 3 7 3.89543 7 5C7 6.10457 7.89543 7 9 7C10.1046 7 11 6.10457 11 5C11 3.89543 10.1046 3 9 3Z' fill='#42526E'/>" +
                "<path fill-rule='evenodd' clip-rule='evenodd'" +
                "d='M9 10C7.89543 10 7 10.8954 7 12C7 13.1046 7.89543 14 9 14C10.1046 14 11 13.1046 11 12C11 10.8954 10.1046 10 9 10Z'" +
                "fill='#42526E' />" +
                "<path fill-rule='evenodd' clip-rule='evenodd'" +
                "d='M9 17C7.89543 17 7 17.8954 7 19C7 20.1046 7.89543 21 9 21C10.1046 21 11 20.1046 11 19C11 17.8954 10.1046 17 9 17Z'" +
                "fill='#42526E' />" +
                "<path fill-rule='evenodd' clip-rule='evenodd'" +
                "d='M15 3C13.8954 3 13 3.89543 13 5C13 6.10457 13.8954 7 15 7C16.1046 7 17 6.10457 17 5C17 3.89543 16.1046 3 15 3Z'" +
                "fill='#42526E' />" +
                "<path fill-rule='evenodd' clip-rule='evenodd'" +
                "d='M15 10C13.8954 10 13 10.8954 13 12C13 13.1046 13.8954 14 15 14C16.1046 14 17 13.1046 17 12C17 10.8954 16.1046 10 15 10Z'" +
                "fill='#42526E' />" +
                "<path fill-rule='evenodd' clip-rule='evenodd'" +
                "d='M15 17C13.8954 17 13 17.8954 13 19C13 20.1046 13.8954 21 15 21C16.1046 21 17 20.1046 17 19C17 17.8954 16.1046 17 15 17Z'" +
                "fill='#42526E' />" +
                "</svg>" +
                "<input type='checkbox' class='cb-element'>" +
                "<input type='text' autocomplete='off' class='border-0 px-2 py-1 w-75 product_code' required name='product_code[]'>" +
                "<ul class='list_code bg-white position-absolute w-100 rounded shadow p-0 scroll-data' style='z-index: 99;top: 75%;left: 9%;'>" +
                "@foreach ($product_code as $productCode_value)" +
                "<li>" +
                "<a href='javascript:void(0);' class='text-dark d-flex justify-content-between p-2 maSP' id='{{ $productCode_value->id }}' name='maSP'>" +
                "<span class='w-50'>{{ $productCode_value->product_code }}</span>" +
                "</a>" +
                "</li>" +
                "@endforeach" +
                "<a type='button' class='bg-dark d-flex justify-content-between p-2 position-sticky' data-toggle='modal' data-target='#' style='bottom: 0;'>" +
                "<span class='w-50 text-white'>Thêm mới</span>" +
                "</a></ul></div></td>");
            const tenSanPham = $(
                "<td class='border border-top-0 border-bottom-0 position-relative'>" +
                "<ul class='list_product bg-white position-absolute w-100 rounded shadow p-0 scroll-data' style='z-index: 99;top: 75%;left: 10%;'>" +
                "@foreach ($product as $product_value)" +
                "<li>" +
                "<a href='javascript:void(0);' class='text-dark d-flex justify-content-between p-2 idProduct' id='{{ $product_value->id }}' name='idProduct'>" +
                "<span class='w-50'>{{ $product_value->product_name }}</span>" +
                "</a>" +
                "</li>" +
                "@endforeach" +
                "<a type='button' class='bg-dark d-flex justify-content-between p-2 position-sticky' data-toggle='modal' data-target='#' style='bottom: 0;'>" +
                "<span class='w-50 text-white'>Thêm mới</span>" +
                "</a></ul>" +
                "<input type='text' class='border-0 px-2 py-1 w-100 product_name' autocomplete='off' required name='product_name[]'></td>"
            );
            const dvTinh = $(
                "<td class='border border-top-0 border-bottom-0'><input type='text' class='border-0 px-2 py-1 w-100 product_unit' required name='product_unit[]'></td>"
            );
            const soLuong = $(
                "<td class='border border-top-0 border-bottom-0 position-relative'>" +
                "<input type='text' class='border-0 px-2 py-1 w-100 quantity-input' required name='product_qty[]'>" +
                "<p class='text-primary text-center position-absolute inventory' style='top: 68%;'>Tồn kho: 35</p>" +
                "</td>"
            );
            const donGia = $(
                "<td class='border border-top-0 border-bottom-0 position-relative'>" +
                "<input type='text' class='border-0 px-2 py-1 w-100 product_price' name='product_price[]' required>" +
                "<p class='text-primary text-right position-absolute transaction' style='top: 68%;right: 5%;'>Giao dịch gần đây</p>" +
                "</td>"
            );
            const thue = $(
                "<td class='border border-top-0 border-bottom-0 px-4'>" +
                "<select name='product_tax[]' class='border-0 text-center product_tax' required>" +
                "<option value='0'>0%</option>" +
                "<option value='8'>8%</option>" +
                "<option value='10'>10%</option>" +
                "<option value='99'>NOVAT</option>" +
                "</select>" +
                "</td>"
            );
            const thanhTien = $(
                "<td class='border border-top-0 border-bottom-0'><input type='text' readonly class='border-0 px-2 py-1 w-100 total-amount'></td>"
            );
            const option = $(
                "<td class='border border-top-0 border-bottom-0 border-right-0 text-right'>" +
                "<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
                "<path fill-rule='evenodd' clip-rule='evenodd' d='M10.5454 5C10.2442 5 9.99999 5.24421 9.99999 5.54545C9.99999 5.8467 10.2442 6.09091 10.5454 6.09091H13.4545C13.7558 6.09091 14 5.8467 14 5.54545C14 5.24421 13.7558 5 13.4545 5H10.5454ZM6 7.72726C6 7.42601 6.24421 7.18181 6.54545 7.18181H7.63637H16.3636H17.4545C17.7558 7.18181 18 7.42601 18 7.72726C18 8.02851 17.7558 8.27272 17.4545 8.27272H16.9091V17C16.9091 18.2113 15.9118 19.1818 14.7135 19.1818H9.25891C8.97278 19.1816 8.68906 19.1247 8.42499 19.0145C8.16092 18.9044 7.92126 18.7431 7.71979 18.5399C7.51833 18.3367 7.35905 18.0957 7.25112 17.8307C7.14347 17.5664 7.08903 17.2834 7.09091 16.9981V8.27272H6.54545C6.24421 8.27272 6 8.02851 6 7.72726ZM8.18182 17.0041V8.27272H15.8182V17C15.8182 17.5966 15.3216 18.0909 14.7135 18.0909H9.25938C9.11713 18.0908 8.97632 18.0625 8.84503 18.0077C8.71375 17.953 8.5946 17.8728 8.49444 17.7718C8.39429 17.6707 8.3151 17.5509 8.26144 17.4192C8.20779 17.2874 8.18074 17.1464 8.18182 17.0041ZM13.4545 10.0909C13.7558 10.0909 14 10.3351 14 10.6364V15.7273C14 16.0285 13.7558 16.2727 13.4545 16.2727C13.1533 16.2727 12.9091 16.0285 12.9091 15.7273V10.6364C12.9091 10.3351 13.1533 10.0909 13.4545 10.0909ZM11.0909 10.6364C11.0909 10.3351 10.8467 10.0909 10.5454 10.0909C10.2442 10.0909 9.99999 10.3351 9.99999 10.6364V15.7273C9.99999 16.0285 10.2442 16.2727 10.5454 16.2727C10.8467 16.2727 11.0909 16.0285 11.0909 15.7273V10.6364Z' fill='#42526E'/>" +
                "</svg>" +
                "</td>" +
                "<td style='display:none;'><input type='text' class='product_tax1'></td>"
            );
            const heSoNhan = $(
                "<td class='border border-top-0 border-bottom-0 position-relative'>" +
                "<input type='text' class='border-0 px-2 py-1 w-100 product_price' name='product_price[]' required>" +
                "<p class='text-primary text-right position-absolute' style='top: 68%;right: 5%;'>Giao dịch gần đây</p>" +
                "</td>"
            );
            // Gắn các phần tử vào hàng mới
            newRow.append(maSanPham, tenSanPham, dvTinh,
                soLuong, donGia, thue, thanhTien, option
            );
            $("#dynamic-fields").before(newRow);
            // Tăng giá trị fieldCounter
            fieldCounter++;
            //kéo thả vị trí sản phẩm
            $("table tbody").sortable({
                axis: "y",
                handle: "td",
            });
            //Xóa sản phẩm
            option.click(function() {
                $(this).closest("tr").remove();
                fieldCounter--;
                calculateTotalAmount();
                calculateGrandTotal();
                var productTaxText = $('#product-tax').text();
                var productTaxValue = parseFloat(productTaxText.replace(/,/g, ''));
                var taxAmount = parseFloat(('.product_tax1').text());
                var totalTax = productTaxValue - taxAmount;
                $('#product-tax').text(totalTax);
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
            //Hiển thị danh sách mã sản phẩm
            $(".list_code").hide();
            $('.product_code').on("click", function(e) {
                e.stopPropagation();
                $(this).closest('tr').find(".list_code").show();
            });
            $(document).on("click", function(e) {
                if (!$(e.target).is(".product_code")) {
                    $(".list_code").hide();
                }
            });
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
            //search mã sản phẩm
            $(".product_code").on("keyup", function() {
                var value = $(this).val().toUpperCase();
                var $tr = $(this).closest("tr");
                $tr.find(".list_code li").each(function() {
                    var text = $(this).find("a").text().toUpperCase();
                    $(this).toggle(text.indexOf(value) > -1);
                });
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
            $('.inventory').hide();
            $('.transaction').hide();
            $(document).ready(function() {
                $('.idProduct').click(function() {
                    var idProduct = $(this).attr('id');
                    $.ajax({
                        url: '{{ route('getProduct') }}',
                        type: 'GET',
                        data: {
                            idProduct: idProduct
                        },
                        success: function(data) {
                            $('.product_name').val(data.product_name);
                            $('.product_unit').val(data.product_unit);
                            if(data.product_inventory == null)
                            {
                                $('.quantity-input').val();
                            }
                            else{
                                $('.quantity-input').val(data.product_inventory);
                                $('.inventory').show();
                                $('.transaction').show();
                            }
                        }
                    });
                });
            });
        });
    });
    //Lấy thông tin khách hàng
    $(document).ready(function() {
        $('.search-info').click(function() {
            var idGuest = $(this).attr('id');
            $.ajax({
                url: '{{ route('searchExport') }}',
                type: 'GET',
                data: {
                    idGuest: idGuest
                },
                success: function(data) {
                    $('.nameGuest').val(data.guest_name_display);
                    $('.idGuest').val(data.id);
                }
            });
        });
    });
    //Thêm thông tin khách hàng
    $(document).on('click', '#addGuest', function(e) {
        var guest_name_display = $('#guest_name_display').val();
        var guest_name = $('#guest_name').val();
        var guest_address = $('#guest_address').val();
        var guest_code = $('#guest_code').val();
        var guest_email = $('#guest_email').val();
        var guest_phone = $('#guest_phone').val();
        var guest_receiver = $('#guest_receiver').val();
        var guest_email_personal = $('#guest_email_personal').val();
        var guest_phone_receiver = $('#guest_phone_receiver').val();
        var guest_note = $('#guest_note').val();
        $('.nameGuest').val(null);
        $('.idGuest').val(null);
        $.ajax({
            url: "{{ route('addGuest') }}",
            type: "get",
            data: {
                guest_name_display,
                guest_name,
                guest_address,
                guest_code,
                guest_email,
                guest_phone,
                guest_receiver,
                guest_email_personal,
                guest_phone_receiver,
                guest_note,
            },
            success: function(data) {
                if (data.success) {
                    alert(data.msg);
                    $('.nameGuest').val(data.guest_name_display);
                    $('.idGuest').val(data.id);
                    $('.modal [data-dismiss="modal"]').click();
                    // Nếu thành công, tạo một mục mới
                    var newGuestInfo = data;
                    var guestList = $('#myUL'); // Danh sách hiện có
                    var newListItem =
                        '<li><a href="#" class="text-dark d-flex justify-content-between p-2 search-info" id="' +
                        newGuestInfo.id + '" name="search-info">' +
                        '<span class="w-50">' + newGuestInfo.guest_name_display +
                        '</span></a></li>';
                    // Thêm mục mới vào danh sách
                    var addButton = $(".addGuestNew");
                    $(newListItem).insertBefore(addButton);
                    //clear
                    $('#guest_name_display').val(null);
                    $('#guest_address').val(null);
                    $('#guest_code').val(null);
                    $('.search-info').click(function() {
                        var idGuest = $(this).attr('id');
                        $.ajax({
                            url: '{{ route('searchExport') }}',
                            type: 'GET',
                            data: {
                                idGuest: idGuest
                            },
                            success: function(data) {
                                $('.nameGuest').val(data.guest_name_display);
                                $('.idGuest').val(data.id);
                            }
                        });
                    });
                } else {
                    alert(data.msg);
                }
            }
        });
    });

    //tính thành tiền của sản phẩm
    $(document).on('input', '.quantity-input, [name^="product_price"]', function(e) {
        var productQty = parseFloat($(this).closest('tr').find('.quantity-input').val()) || 0;
        var productPrice = parseFloat($(this).closest('tr').find('input[name^="product_price"]').val().replace(
            /[^0-9.-]+/g, "")) || 0;
        updateTaxAmount($(this).closest('tr'));

        if (!isNaN(productQty) && !isNaN(productPrice)) {
            var totalAmount = productQty * productPrice;
            $(this).closest('tr').find('.total-amount').val(formatCurrency(totalAmount));
            calculateTotalAmount();
            calculateTotalTax();
        }
    });

    $(document).on('change', '.product_tax', function() {
        updateTaxAmount($(this).closest('tr'));
        calculateTotalAmount();
        calculateTotalTax();
    });

    function updateTaxAmount(row) {
        var productQty = parseFloat(row.find('.quantity-input').val());
        var productPrice = parseFloat(row.find('input[name^="product_price"]').val().replace(/[^0-9.-]+/g, ""));
        var taxValue = parseFloat(row.find('.product_tax').val());
        if (taxValue == 99) {
            taxValue = 0;
        }
        if (!isNaN(productQty) && !isNaN(productPrice) && !isNaN(taxValue)) {
            var totalAmount = productQty * productPrice;
            var taxAmount = (totalAmount * taxValue) / 100;

            row.find('.product_tax1').text(Math.round(taxAmount));
        }
    }

    function calculateTotalAmount() {
        var totalAmount = 0;
        $('tr').each(function() {
            var rowTotal = parseFloat(String($(this).find('.total-amount').val()).replace(/[^0-9.-]+/g, ""));
            if (!isNaN(rowTotal)) {
                totalAmount += rowTotal;
            }
        });
        totalAmount = Math.round(totalAmount); // Làm tròn thành số nguyên
        $('#total-amount-sum').text(formatCurrency(totalAmount));
        calculateTotalTax();
        calculateGrandTotal();
    }

    function calculateTotalTax() {
        var totalTax = 0;
        $('tr').each(function() {
            var rowTax = parseFloat($(this).find('.product_tax1').text().replace(/[^0-9.-]+/g, ""));
            if (!isNaN(rowTax)) {
                totalTax += rowTax;
            }
        });
        totalTax = Math.round(totalTax); // Làm tròn thành số nguyên
        $('#product-tax').text(formatCurrency(totalTax));

        calculateGrandTotal();
    }

    function calculateGrandTotal() {
        var totalAmount = parseFloat($('#total-amount-sum').text().replace(/[^0-9.-]+/g, ""));
        var totalTax = parseFloat($('#product-tax').text().replace(/[^0-9.-]+/g, ""));

        var grandTotal = totalAmount + totalTax;
        grandTotal = Math.round(grandTotal); // Làm tròn thành số nguyên
        $('#grand-total').text(formatCurrency(grandTotal));

        // Update data-value attribute
        $('#grand-total').attr('data-value', grandTotal);
        $('#total').val(totalAmount);
    }

    function formatCurrency(value) {
        value = Math.round(value * 100) / 100;

        var parts = value.toString().split(".");
        var integerPart = parts[0];
        var formattedValue = "";

        var count = 0;
        for (var i = integerPart.length - 1; i >= 0; i--) {
            formattedValue = integerPart.charAt(i) + formattedValue;
            count++;
            if (count % 3 === 0 && i !== 0) {
                formattedValue = "," + formattedValue;
            }
        }

        if (parts.length > 1) {
            formattedValue += "." + parts[1];
        }
        return formattedValue;
    }

    //format giá
    var inputElement = document.getElementById('product_price');
    $('body').on('input', '.product_price,#transport_fee', function(event) {
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
    //Mở rộng
    var status_form = 0;
    $('.change_colum').off('click').on('click', function() {
        if (status_form == 0) {
            $(this).text('Đầy đủ');
            $('.price_export').attr('readonly', false);
            // Xóa dữ liệu trường hệ số nhân, giá nhập
            $('.product_ratio').val('')
            $('.price_import').val('')
            // Xóa required
            $('#inputcontent tbody .product_ratio').removeAttr('required');
            $('#inputcontent tbody .price_import').removeAttr('required');
            $('.price-import').hide();
            $('.product-ratio').hide();
            $('.product_ratio').hide()
            $('.price_import').hide();
            status_form = 1;
        } else {
            $(this).text('Tối giản');
            $('.price_export').attr('readonly', true);
            // Xóa dữ liệu trương đơn giá
            $('.price_export').val('')
            // Thêm required
            $('#inputcontent tbody .product_ratio').attr('required', true);
            $('#inputcontent tbody .price_import').attr('required', true);
            $('.price-import').show();
            $('.product-ratio').show();
            $('.product_ratio').show()
            $('.price_import').show();
            status_form = 0;
        }
    });
</script>
</body>

</html>