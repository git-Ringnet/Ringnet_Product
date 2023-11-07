<x-navbar :title="$title"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <form action="{{ route('import.store') }}" method="POST">
        @csrf
        <input type="hidden" id="provides_id" name="provides_id">
        <input type="hidden" id="project_id" name="project_id">
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
                    <a href="#">
                        <button type="submit" class="custom-btn d-flex align-items-center h-100"
                            style="margin-right:10px">
                            <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.75528 1.6875H5.99476H11.9948H12.123C12.3939 1.6875 12.6621 1.74088 12.9123 1.84459C13.1626 1.94829 13.3899 2.10029 13.5814 2.29189L15.7022 4.41269C16.089 4.79939 16.3064 5.32394 16.3065 5.87088V14.25C16.3065 14.797 16.0892 15.3216 15.7024 15.7084C15.3156 16.0952 14.791 16.3125 14.244 16.3125H12.75H5.25H3.83328C3.28894 16.3125 2.76666 16.0973 2.38031 15.7139C1.99396 15.3304 1.77486 14.8098 1.77078 14.2655L1.69278 3.76547C1.69074 3.49333 1.74258 3.22344 1.84531 2.97143C1.94805 2.71941 2.09965 2.49021 2.29137 2.29705C2.4831 2.10389 2.71115 1.95058 2.9624 1.84597C3.21364 1.74135 3.48312 1.68749 3.75528 1.6875ZM5.8125 15.1875H12.1875V9.9645C12.1875 9.74238 12.0071 9.5625 11.7862 9.5625H6.2145C5.99266 9.5625 5.8125 9.74266 5.8125 9.9645V15.1875ZM13.3125 15.1875V9.9645C13.3125 9.12163 12.6289 8.4375 11.7862 8.4375H6.2145C5.37134 8.4375 4.6875 9.12134 4.6875 9.9645V15.1875H3.83326C3.58582 15.1875 3.34842 15.0897 3.17281 14.9154C2.9972 14.7411 2.89761 14.5044 2.89574 14.257L2.81774 3.75703C2.81682 3.63333 2.84038 3.51066 2.88708 3.39611C2.93378 3.28155 3.00269 3.17737 3.08983 3.08957C3.17698 3.00177 3.28064 2.93208 3.39485 2.88453C3.50905 2.83698 3.63154 2.8125 3.75524 2.8125H5.43226V5.18175C5.43226 5.52985 5.57054 5.86369 5.81668 6.10983C6.06282 6.35597 6.39666 6.49425 6.74476 6.49425H11.2448C11.5929 6.49425 11.9267 6.35597 12.1728 6.10983C12.419 5.86369 12.5573 5.52985 12.5573 5.18175V2.91925C12.6414 2.96326 12.7185 3.01991 12.7858 3.08725L14.9068 5.20831C15.0826 5.38405 15.1814 5.62254 15.1815 5.87112V14.25C15.1815 14.4986 15.0827 14.7371 14.9069 14.9129C14.7311 15.0887 14.4926 15.1875 14.244 15.1875H13.3125ZM11.4323 5.18175V2.8125H6.55726V5.18175C6.55726 5.23148 6.57701 5.27917 6.61218 5.31433C6.64734 5.3495 6.69503 5.36925 6.74476 5.36925H11.2448C11.2945 5.36925 11.3422 5.3495 11.3773 5.31433C11.4125 5.27917 11.4323 5.23148 11.4323 5.18175Z"
                                    fill="white" />
                            </svg>
                            <span>Lưu nháp</span>
                        </button>
                    </a>
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
                                        <p class="p-0 m-0 px-3 required-label text-danger">Nhà cung cấp</p>
                                    </div>
                                    <input id="myInput" type="text" placeholder="Nhập thông tin"
                                        class="border w-100 py-2 border-left-0 border-right-0 px-3" autocomplete="off"
                                        required>
                                    <ul id="myUL"
                                        class="bg-white position-absolute w-50 rounded shadow p-0 scroll-data"
                                        style="z-index: 99;left: 24%;top: 20%;">
                                        @foreach ($provides as $item)
                                            <li>
                                                <a href="javascript:void(0)"
                                                    class="text-dark d-flex justify-content-between p-2 search-info"
                                                    id="{{ $item->id }}" name="search-info">
                                                    <span class="w-50">{{ $item->provide_name_display }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                        <a type="button"
                                            class="bg-dark d-flex justify-content-between p-2 position-sticky"
                                            data-toggle="modal" data-target="#exampleModal1" style="bottom: 0;">
                                            <span class="w-50 text-white">Thêm mới</span>
                                        </a>
                                    </ul>
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Số báo giá#</p>
                                    </div>
                                    <input type="text" required placeholder="Nhập thông tin" name="quotation_number"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Số tham chiếu#</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="reference_number"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Ngày báo giá</p>
                                    </div>
                                    <input type="date" placeholder="Nhập thông tin" name="date_quote"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3"
                                        value="{{ date('Y-m-d') }}">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 px-3">Hiệu lực báo giá</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="price_effect"
                                        class="border w-100 border-top-0 py-2 border-left-0 border-right-0 px-3">
                                </div>
                                <div class="d-flex ml-2 align-items-center">
                                    <div class="title-info py-2 border-top-0 border border-left-0">
                                        <p class="p-0 m-0 px-3">Điều khoản thanh toán</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="terms_pay"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                                </div>
                                <div class="d-flex ml-2 align-items-center position-relative">
                                    <div class="title-info py-2 border-top-0 border border-left-0">
                                        <p class="p-0 m-0 px-3">Dự án</p>
                                    </div>
                                    <input required id="inputProject" type="text" placeholder="Nhập thông tin"
                                        class="border border-top-0 w-100 py-2 border-right-0 border-left-0 px-3">
                                    <ul id="listProject"
                                        class="bg-white position-absolute w-50 rounded shadow p-0 scroll-data"
                                        style="z-index: 99;left: 23%;top: 96%;">
                                        @foreach ($project as $va)
                                            <li>
                                                <a href="javascript:void(0)"
                                                    class="text-dark d-flex justify-content-between p-2 project_name"
                                                    id="{{ $va->id }}" name="project_name">
                                                    <span class="w-50">{{ $va->project_name }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>

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
                                <p class="p-0 m-0 change_colum">Đầy đủ</p>
                                <svg class="ml-1" width="18" height="18" viewBox="0 0 18 18"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                        fill="#42526E" />
                                </svg>
                            </div>
                            <div class="btn-add-product m-0 pt-2 px-2 text-white">
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
                    </div>
                </div>
            </div>
        </section>

        <x-formprovides> </x-formprovides>

        <section class="content">
            <div class="container-fluided">
                <table class="table table-hover bg-white rounded" id="inputcontent">
                    <thead>
                        <tr>
                            <th class="border-right"><input type="checkbox"> Mã sản phẩm
                            </th>
                            <th class="border-right">Tên sản phẩm</th>
                            <th class="border-right">Đơn vị</th>
                            <th class="border-right">Số lượng</th>
                            <th class="border-right">Đơn giá</th>
                            <th class="border-right">Thuế</th>
                            <th class="border-right">Thành tiền</th>
                            <th class="p-0 bg-secondary" style="width:1%;"></th>
                            <th class="border-right product_ratio">Hệ số nhân</th>
                            <th class="border-right price_import">Giá nhập</th>
                            <th class="border-right">Ghi chú</th>
                            <th class="border-top"></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="content">
            <div class="container-fluided">
                <div class="d-flex">
                    <button type="button" data-toggle="dropdown"
                        class="btn-save-print d-flex align-items-center h-100" id="addRowTable"
                        style="margin-right:10px">
                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18" fill="none">
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
                        class="btn-save-print d-flex align-items-center h-100" style="margin-right:10px">
                        <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M3.75528 1.6875H5.99476H11.9948H12.123C12.3939 1.6875 12.6621 1.74088 12.9123 1.84459C13.1626 1.94829 13.3899 2.10029 13.5814 2.29189L15.7022 4.41269C16.089 4.79939 16.3064 5.32394 16.3065 5.87088V14.25C16.3065 14.797 16.0892 15.3216 15.7024 15.7084C15.3156 16.0952 14.791 16.3125 14.244 16.3125H12.75H5.25H3.83328C3.28894 16.3125 2.76666 16.0973 2.38031 15.7139C1.99396 15.3304 1.77486 14.8098 1.77078 14.2655L1.69278 3.76547C1.69074 3.49333 1.74258 3.22344 1.84531 2.97143C1.94805 2.71941 2.09965 2.49021 2.29137 2.29705C2.4831 2.10389 2.71115 1.95058 2.9624 1.84597C3.21364 1.74135 3.48312 1.68749 3.75528 1.6875ZM5.8125 15.1875H12.1875V9.9645C12.1875 9.74238 12.0071 9.5625 11.7862 9.5625H6.2145C5.99266 9.5625 5.8125 9.74266 5.8125 9.9645V15.1875ZM13.3125 15.1875V9.9645C13.3125 9.12163 12.6289 8.4375 11.7862 8.4375H6.2145C5.37134 8.4375 4.6875 9.12134 4.6875 9.9645V15.1875H3.83326C3.58582 15.1875 3.34842 15.0897 3.17281 14.9154C2.9972 14.7411 2.89761 14.5044 2.89574 14.257L2.81774 3.75703C2.81682 3.63333 2.84038 3.51066 2.88708 3.39611C2.93378 3.28155 3.00269 3.17737 3.08983 3.08957C3.17698 3.00177 3.28064 2.93208 3.39485 2.88453C3.50905 2.83698 3.63154 2.8125 3.75524 2.8125H5.43226V5.18175C5.43226 5.52985 5.57054 5.86369 5.81668 6.10983C6.06282 6.35597 6.39666 6.49425 6.74476 6.49425H11.2448C11.5929 6.49425 11.9267 6.35597 12.1728 6.10983C12.419 5.86369 12.5573 5.52985 12.5573 5.18175V2.91925C12.6414 2.96326 12.7185 3.01991 12.7858 3.08725L14.9068 5.20831C15.0826 5.38405 15.1814 5.62254 15.1815 5.87112V14.25C15.1815 14.4986 15.0827 14.7371 14.9069 14.9129C14.7311 15.0887 14.4926 15.1875 14.244 15.1875H13.3125ZM11.4323 5.18175V2.8125H6.55726V5.18175C6.55726 5.23148 6.57701 5.27917 6.61218 5.31433C6.64734 5.3495 6.69503 5.36925 6.74476 5.36925H11.2448C11.2945 5.36925 11.3422 5.3495 11.3773 5.31433C11.4125 5.27917 11.4323 5.23148 11.4323 5.18175Z"
                                fill="white" />
                        </svg>
                        <span>Thêm hàng loạt</span>
                    </button>
                    <button class="btn-option">
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
        <x-formsynthetic :import="''"></x-formsynthetic>
    </form>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="{{ asset('/dist/js/products.js') }}"></script>
<script>
    $('.search-info').click(function() {
        var provides_id = $(this).attr('id');
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
                        $('.modal [data-dismiss="modal"]').click();
                        alert(data.msg);
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
    });



    function getProduct(name) {
        $('#inputcontent tbody tr .' + name).on('click', function() {
            listProductName = $(this).closest('tr').find('#listProductName');
            inputName = $(this).closest('tr').find('.searchProductName');
            inputUnit = $(this).closest('tr').find('.product_unit');
            inputPriceExprot = $(this).closest('tr').find('.price_export');
            inputRatio = $(this).closest('tr').find('.product_ratio');
            inputPriceImport = $(this).closest('tr').find('.price_import');
            selectTax = $(this).closest('tr').find('.product_tax');
            $.ajax({
                url: "{{ route('showProductName') }}",
                type: "get",
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
                            'data-unit'));
                        inputPriceExprot.val(formatCurrency(
                            $(this).attr(
                                'data-priceExport')
                        ))
                        inputRatio.val($(this).attr(
                            'data-ratio'))
                        inputPriceImport.val(formatCurrency(
                            $(this).attr(
                                'data-priceImport')
                        ))
                        selectTax.val($(this).attr(
                            'data-tax'))
                        listProductName.hide();
                        checkDuplicateRows()
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
        var formSubmit = true;
        if ($('#provides_id').val() == '') {
            formSubmit = false;
            alert('Vui lòng chọn nhà cung cấp');
            return false;
        }
        if ($('#inputcontent tbody tr').length < 1) {
            formSubmit = false;
            alert('Vui lòng thêm ít nhất 1 sản phẩm');
            return false;
        }
        if (formSubmit) {
            this.submit()
        }
    })
</script>

</body>

</html>
