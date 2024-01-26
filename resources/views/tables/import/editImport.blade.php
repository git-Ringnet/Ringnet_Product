<x-navbar :title="$title" activeGroup="buy" activeName="import"></x-navbar>
<!-- Content Wrapper. Contains page content -->
<form action="{{ route('import.update', ['workspace' => $workspacename, 'import' => $import->id]) }}" method="POST">
    <div class="content-wrapper1 py-2">
        <!-- Content Header (Page header) -->
        @method('PUT')
        @csrf
        <input type="hidden" id="provides_id" name="provides_id" value="{{ $import->provide_id }}">
        <input type="hidden" id="project_id" name="project_id" value="{{ $import->project_id }}">
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
    {{-- <section>
        <div class="container-fluided">
            <div class="row">
                <div class="col-12">
                    <div class="info-chung">
                        <p class="font-weight-bold ml-2 px-2">Th1ng tin chung</p>
                        <div class="content-info">
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-left-0">
                                    <p class="p-0 m-0 px-2 req1ired-label text-danger">Nhà cung cấp</p>
                                </div>
                                <input id="myInput" type="text" placeholder="Nhập thông tin"
                                    class="border w-100 py-2 border-left-0 border-right-0 px-2" au1ocomplete="off"
                                    value="{{ $import->getProvideName->provide_name_display }}">
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
                                        data-toggle="modal" data-target="#provideModal" style="bottom: 0;">
                                        <span class="w-50 text-white">Thêm mới</span>
                                    </a>
                                </ul>
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 px-2">Số1báo giá#</p>
                                </div>
                                <input type="text" placeholder="Nhập thông tin" name="quotation_number"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-2"
1                                 value="{{ $import->quotation_number }}">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 px-2">Số1tham chiếu#</p>
                                </div>
                                <input type="text" placeholder="Nhập thông tin" name="reference_number"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-2"
1                                 value="{{ $import->reference_number }}">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 px-2">Ng1y báo giá</p>
                                </div>
                                <input type="date" placeholder="Nhập thông tin" name="date_quote"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-2"
1                                 value="{{ $import->created_at->toDateString() }}">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border border-top-0 border-left-0">
                                    <p class="p-0 m-0 px-2">Hi1u lực báo giá</p>
                                </div>
                                <input type="text" placeholder="Nhập thông tin" name="price_effect"
                                    class="border w-100 border-top-0 py-2 border-left-0 border-right-0 px-2"
1                                 value="{{ $import->price_effect }}">
                            </div>
                            <div class="d-flex ml-2 align-items-center">
                                <div class="title-info py-2 border-top-0 border border-left-0">
                                    <p class="p-0 m-0 px-2">Đi1u khoản thanh toán</p>
                                </div>
                                <input type="text" placeholder="Nhập thông tin" name="terms_pay"
                                    class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-2"
1                                 value="{{ $import->terms_pay }}">
                            </div>
                            <div class="d-flex ml-2 align-items-center position-relative">
                                <div class="title-info py-2 border-top-0 border border-left-0">
                                    <p class="p-0 m-0 px-2">Dự1án</p>
                                </div>
                                <input id="inputProject" required type="text" placeholder="Nhập thông tin"
                                    class="border border-top-0 w-100 py-2 border-right-0 border-left-0 px-2"
1                                 value="@if ($import->getProjectName) {{ $import->getProjectName->project_name }} @endif">
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
                            <svg class="mr-1" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.25 15.75H3.75C3.35218 15.75 2.97064 15.592 2.68934 15.3107C2.40804 15.0294 2.25 14.6478 2.25 14.25V3.75C2.25 3.35218 2.40804 2.97064 2.68934 2.68934C2.97064 2.40804 3.35218 2.25 3.75 2.25H14.25C14.6478 2.25 15.0294 2.40804 15.3107 2.68934C15.592 2.97064 15.75 3.35218 15.75 3.75V14.25C15.75 14.6478 15.592 15.0294 15.3107 15.3107C15.0294 15.592 14.6478 15.75 14.25 15.75Z"
                                    stroke="#42526E" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M4.5 4.5H13.5V11.25H4.5V4.5Z" stroke="#42526E" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M4.5 13.5H9.75" stroke="#42526E" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M12 13.5H13.5" stroke="#42526E" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <p class="p-0 m-0 change_colum">Đầy đủ</p>
                            <svg class="ml-1" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
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
    </section> --}}
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
                                                        <input readonly type="text" name="product_code[]"
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
                                                    <input readonly id="searchProductName" type="text"
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
                                                        value="{{ $item->product_unit }}" readonly>
                                                </td>
                                                <td class="border border-bottom-0 border-right-0">
                                                    <input readonly oninput="checkQty(this,{{ $item->product_qty }})"
                                                        type="text" name="product_qty[]"
                                                        class="border-0 px-2 py-1 w-100 quantity-input"
                                                        value="{{ number_format($item->product_qty) }}">
                                                </td>
                                                <td class="border border-bottom-0 border-right-0">
                                                    <input type="text" name="price_export[]"
                                                        class="border-0 px-2 py-1 w-100 price_export"
                                                        value="{{ fmod($item->price_export, 2) > 0 ? number_format($item->price_export, 2, '.', ',') : number_format($item->price_export) }}"
                                                        readonly>
                                                </td>
                                                <input type="hidden" class="product_tax1">
                                                <td class="border border-bottom-0 border-right-0">
                                                    <select name="product_tax[]" id="product_tax"
                                                        class="product_tax">
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
                                                        class="border-0 px-2 py-1 w-100 total_price" readonly readonly
                                                        value="{{ fmod($item->product_total, 2) > 0 ? number_format($item->product_total, 2, '.', ',') : number_format($item->product_total) }}"
                                                        @if ($import->status == 2) echo readonly @endif>
                                                </td>
                                                <td class="border border-bottom-0">
                                                    <input placeholder="Nhập ghi chú" readonly type="text"
                                                        name="product_note[]" class="border-0 px-2 py-1 w-100"
                                                        value="{{ $item->product_note }}">
                                                </td>
                                                <td class="border border">
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
                            <input type="text" placeholder="Chọn thông tin"
                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0" autocomplete="off"
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
                            <input type="date" placeholder="Chọn thông tin" name="date_quote"
                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0" autocomplete="off"
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
                            <input type="text" placeholder="Chọn thông tin" name="price_effect"
                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0" autocomplete="off"
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

                        <div class="d-flex align-items-center justify-content-between border border-left-0 py-1">
                            <input type="text" placeholder="Chọn thông tin" name="terms_pay"
                                class="border-0 bg w-100 bg-input-guest py-0 nameGuest px-0" autocomplete="off"
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
                                            <span class="w-50">{{ $va->project_name }}</span>
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
<script src="{{ asset('/dist/js/products.js') }}"></script>
<script src="{{ asset('/dist/js/import.js') }}"></script>
<script>
    getKeyProvide($('#myInput'));
    $('#addRowTable').off('click').on('click', function() {
        addRowTable(1);
    })

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
                        $('#more_info').show();
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
            $.ajax({
                url: "{{ route('getAllProducts') }}",
                type: "get",
                success: function(result) {
                    listProductCode.empty()
                    inputUnit.val('');
                    inputPriceExprot.val('')
                    inputRatio.val('')
                    inputPriceImport.val('')
                    selectTax.val('0')
                    var createLi =
                        '<a class="bg-dark d-flex justify-content-between p-2 position-sticky">' +
                        '<span class="w-100 text-white">Thêm mới</span>' +
                        '</a>';
                    result.forEach(element => {
                        var UL = '<li>' +
                            '<a href="javascript:void(0)" class="text-dark d-flex justify-content-between p-2 search-product" id="' +
                            element.id + '" name="search-product">' +
                            '<span class="w-100" data-id="' + element.id + '">' + element
                            .product_code + '</span>' +
                            '</a>' +
                            '</li>';
                        listProductCode.append(UL);
                    });
                    listProductCode.append(createLi);
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
        $.ajax({
            url: "{{ route('checkQuotetion') }}",
            type: "get",
            data: {
                quotetion_number: quotetion_number,
                detail_id: detail_id
            },
            success: function(data) {
                if (!data['status']) {
                    alert('Số báo giá đã tồn tại')
                } else {
                    $('form')[0].submit();
                }
            }
        })

    })
</script>
</body>

</html>
