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
                <div class="row m-0 mb-1">
                    <label class="custom-btn d-flex align-items-center h-100 m-0 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" class="mr-1">
                            <path
                                d="M6.78565 11.9915C7.26909 11.9915 7.71035 11.9915 8.1516 11.9915C8.23486 11.9915 8.31812 11.9899 8.40082 11.9926C8.5923 11.9987 8.72995 12.0903 8.80599 12.2657C8.88425 12.445 8.84429 12.6071 8.71108 12.7425C8.40082 13.0589 8.08666 13.3713 7.77362 13.6855C7.28519 14.1762 6.79731 14.6679 6.30721 15.1569C6.03135 15.4322 5.81489 15.4322 5.54125 15.158C4.75809 14.3737 3.97771 13.5873 3.19344 12.8047C3.03969 12.6509 2.94423 12.4861 3.03581 12.2679C3.13016 12.0431 3.31666 11.9871 3.54367 11.9899C4.02822 11.996 4.51221 11.9915 5.01619 11.9915C5.03173 11.7812 5.04227 11.5769 5.0617 11.3732C5.33145 8.55805 6.6752 6.39617 9.13957 5.02744C14.0156 2.31941 19.6492 5.27333 20.8021 10.2814C21.7784 14.5225 19.0442 18.8202 14.7788 19.7643C12.3693 20.2977 10.1664 19.8015 8.1838 18.3334C7.74531 18.0087 7.65762 17.4681 7.964 17.0546C8.26983 16.6422 8.80821 16.5761 9.25003 16.9114C10.4556 17.825 11.811 18.2396 13.3223 18.1885C16.042 18.0969 18.502 16.0228 19.0726 13.3219C19.8113 9.82465 17.4652 6.4217 13.9246 5.85334C10.641 5.32605 7.4134 7.66055 6.89777 10.9414C6.84504 11.28 6.8245 11.6241 6.78565 11.9915Z"
                                fill="white"></path>
                            <path
                                d="M12.129 10.7643C12.129 10.2315 12.1274 9.69806 12.1296 9.16522C12.1312 8.74062 12.406 8.44811 12.7945 8.44922C13.183 8.45033 13.4567 8.74339 13.4578 9.17022C13.4606 10.091 13.4617 11.0118 13.4556 11.9326C13.4545 12.0675 13.4955 12.143 13.6132 12.2118C14.4075 12.6758 15.1973 13.1476 15.9876 13.6183C16.238 13.7676 16.3568 13.9952 16.3246 14.281C16.2935 14.5602 16.1342 14.7733 15.8572 14.8244C15.6868 14.8555 15.4692 14.8433 15.3238 14.7606C14.398 14.2344 13.485 13.6855 12.5714 13.1382C12.2767 12.9611 12.1279 12.6925 12.129 12.3434C12.1301 11.8166 12.129 11.2905 12.129 10.7643Z"
                                fill="white"></path>
                        </svg>
                        Attachment<input type="file" style="display: none;" id="file_restore" accept="*"
                            name="file">
                    </label>

                    <a href="#" id="delete_import"
                        class="d-flex align-items-center h-100 btn-danger mr-2 border-0 rounded"
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

                    <div class="dropdown mr-2">
                        <button type="button" data-toggle="dropdown"
                            class="btn-save-print d-flex align-items-center h-100 dropdown-toggle">
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
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.6511 0.123503C11.8471 0.0419682 12.0573 0 12.2695 0C12.4818 0 12.6919 0.0419682 12.888 0.123503C13.084 0.205038 13.2621 0.32454 13.4121 0.475171L14.7065 1.77321C14.8567 1.92366 14.9758 2.10232 15.0571 2.29897C15.1384 2.49564 15.1803 2.70643 15.1803 2.91931C15.1803 3.13219 15.1384 3.34299 15.0571 3.53965C14.9758 3.73631 14.8567 3.91497 14.7065 4.06542L13.0911 5.68531C13.0818 5.69595 13.072 5.70637 13.0618 5.71655C13.0517 5.72673 13.0413 5.73653 13.0307 5.74594L4.70614 14.094C4.57631 14.2241 4.40022 14.2973 4.21661 14.2973H1.61538C1.23302 14.2973 0.923067 13.9865 0.923067 13.603V10.9945C0.923067 10.8103 0.996015 10.6337 1.12586 10.5035L9.44489 2.16183C9.45594 2.149 9.46754 2.13648 9.47969 2.1243C9.49185 2.11211 9.50435 2.10046 9.51716 2.08936L11.127 0.475171C11.2768 0.324749 11.4552 0.20496 11.6511 0.123503ZM9.97051 3.59834L2.30768 11.2821V12.9088H3.92984L11.5923 5.22471L9.97051 3.59834ZM12.5714 4.24288L10.9496 2.61656L12.1069 1.45617C12.1282 1.43472 12.1536 1.41771 12.1815 1.4061C12.2094 1.39449 12.2393 1.38852 12.2695 1.38852C12.2997 1.38852 12.3297 1.39449 12.3576 1.4061C12.3855 1.41771 12.4113 1.43514 12.4326 1.45658L13.7277 2.75531C13.7491 2.77681 13.7664 2.8026 13.778 2.83069C13.7897 2.85878 13.7956 2.8889 13.7956 2.91931C13.7956 2.94973 13.7897 2.97985 13.778 3.00793C13.7664 3.03603 13.7491 3.06182 13.7277 3.08332L12.5714 4.24288ZM0 17.3057C0 16.9223 0.309957 16.6115 0.692308 16.6115H17.3077C17.69 16.6115 18 16.9223 18 17.3057C18 17.6892 17.69 18 17.3077 18H0.692308C0.309957 18 0 17.6892 0 17.3057Z"
                                    fill="white"></path>
                            </svg>
                            <span>Sửa</span>
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
                <div class="d-flex position-fixed" style="right: 10px; top: 80px;">
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
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M10.5454 5C10.2442 5 9.99999 5.24421 9.99999 5.54545C9.99999 5.8467 10.2442 6.09091 10.5454 6.09091H13.4545C13.7558 6.09091 14 5.8467 14 5.54545C14 5.24421 13.7558 5 13.4545 5H10.5454ZM6 7.72726C6 7.42601 6.24421 7.18181 6.54545 7.18181H7.63637H16.3636H17.4545C17.7558 7.18181 18 7.42601 18 7.72726C18 8.02851 17.7558 8.27272 17.4545 8.27272H16.9091V17C16.9091 18.2113 15.9118 19.1818 14.7135 19.1818H9.25891C8.97278 19.1816 8.68906 19.1247 8.42499 19.0145C8.16092 18.9044 7.92126 18.7431 7.71979 18.5399C7.51833 18.3367 7.35905 18.0957 7.25112 17.8307C7.14347 17.5664 7.08903 17.2834 7.09091 16.9981V8.27272H6.54545C6.24421 8.27272 6 8.02851 6 7.72726ZM8.18182 17.0041V8.27272H15.8182V17C15.8182 17.5966 15.3216 18.0909 14.7135 18.0909H9.25938C9.11713 18.0908 8.97632 18.0625 8.84503 18.0077C8.71375 17.953 8.5946 17.8728 8.49444 17.7718C8.39429 17.6707 8.3151 17.5509 8.26144 17.4192C8.20779 17.2874 8.18074 17.1464 8.18182 17.0041ZM13.4545 10.0909C13.7558 10.0909 14 10.3351 14 10.6364V15.7273C14 16.0285 13.7558 16.2727 13.4545 16.2727C13.1533 16.2727 12.9091 16.0285 12.9091 15.7273V10.6364C12.9091 10.3351 13.1533 10.0909 13.4545 10.0909ZM11.0909 10.6364C11.0909 10.3351 10.8467 10.0909 10.5454 10.0909C10.2442 10.0909 9.99999 10.3351 9.99999 10.6364V15.7273C9.99999 16.0285 10.2442 16.2727 10.5454 16.2727C10.8467 16.2727 11.0909 16.0285 11.0909 15.7273V10.6364Z"
                                                                fill="#42526E"></path>
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
                                                    <input type="text" class="border-0 px-3 py-2 w-100" readonly
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
                        <div id="mySidenav" class="sidenav1 border">
                            <div id="show_info_Guest">
                                <div class="bg-filter-search border-top-0 py-2 text-center">
                                    <span class="font-weight-bold text-secondary">THÔNG TIN KHÁCH HÀNG</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                    <span class="text-table mr-3">Nhà cung cấp</span>
                                    <input type="text" placeholder="Chọn thông tin"
                                        class="border-0 bg w-50 bg-input-guest py-0 px-0 nameGuest" autocomplete="off"
                                        id="myInput" value="{{ $import->getProvideName->provide_name_display }}"
                                        readonly>
                                    <div class="">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z" fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z" fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z" fill="#42526E"></path>
                                        </svg>
                                    </div>
                                </div>
                                {{-- Người đại diện --}}
                                <div class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                    <span class="text-table mr-3">Người đại diện</span>
                                    <input type="text" placeholder="Chọn thông tin"
                                        class="border-0 bg w-50 bg-input-guest py-0 px-0" autocomplete="off"
                                        id="represent" readonly>
                                    <div class="">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z" fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z" fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z" fill="#42526E"></path>
                                        </svg>
                                    </div>
                                </div>
                                {{-- Đơn mua hàng --}}
                                <div class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                    <span class="text-table mr-3">Đơn mua hàng</span>
                                    <input readonly type="text" placeholder="Chọn thông tin"
                                        name="quotation_number" class="border-0 bg w-50 bg-input-guest py-0 px-0"
                                        autocomplete="off" value="{{ $import->quotation_number }}">
                                    <div class="">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z" fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z" fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z" fill="#42526E"></path>
                                        </svg>
                                    </div>
                                </div>
                                {{-- Số tham chiếu --}}
                                <div class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                    <span class="text-table mr-3">Số tham chiếu</span>
                                    <input readonly type="text" placeholder="Chọn thông tin"
                                        name="reference_number" class="border-0 bg w-50 bg-input-guest py-0 px-0"
                                        autocomplete="off" value="{{ $import->reference_number }}">
                                    <div class="">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z" fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z" fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z" fill="#42526E"></path>
                                        </svg>
                                    </div>
                                </div>
                                {{-- Ngày báo giá --}}
                                <div class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                    <span class="text-table mr-3">Ngày báo giá</span>
                                    <input readonly type="date" placeholder="Chọn thông tin" name="date_quote"
                                        class="border-0 bg w-50 bg-input-guest py-0 px-0" autocomplete="off"
                                        value="{{ $import->created_at->toDateString() }}">
                                    <div class="">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z" fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z" fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z" fill="#42526E"></path>
                                        </svg>
                                    </div>
                                </div>
                                {{-- Hiệu lực báo giá --}}
                                <div class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                    <span class="text-table mr-3">Hiệu lực báo giá</span>
                                    <input readonly type="text" placeholder="Chọn thông tin" name="price_effect"
                                        class="border-0 bg w-50 bg-input-guest py-0 px-0" autocomplete="off"
                                        value="{{ $import->price_effect }}">
                                    <div class="">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z" fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z" fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z" fill="#42526E"></path>
                                        </svg>
                                    </div>
                                </div>
                                {{-- Điều khoản thanh toán --}}
                                <div class="d-flex align-items-center justify-content-between border border-left-0 py-1 px-1">
                                    <span class="text-table mr-3">Điều khoản thanh toán</span>
                                    <input readonly type="text" placeholder="Chọn thông tin" name="terms_pay"
                                        class="border-0 bg w-50 bg-input-guest py-0 px-0" autocomplete="off"
                                        value="{{ $import->terms_pay }}">
                                    <div class="">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z" fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z" fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z" fill="#42526E"></path>
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
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z" fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z" fill="#42526E"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z" fill="#42526E"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</form>
<div id="files" class="tab-pane fade">
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
