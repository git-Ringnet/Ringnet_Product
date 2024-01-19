<x-navbar :title="$title" activeGroup="buy" activeName="provide"></x-navbar>
<form action="{{ route('provides.store', $workspacename) }}" method="POST">
    @csrf
    <div class="content-wrapper1 py-0 border-bottom px-4">
        <!-- Content Header (Page header) -->
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
                    <span class="font-weight-bold"><a class="text-dark"
                            href="{{ route('provides.index', $workspacename) }}">Nhà cung
                            cấp</a></span>
                    <span class="mx-2">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8"></path>
                        </svg>
                    </span>
                    <span>Tạo nhà cung cấp</span>
                </div>
            </div>

            <div class="container-fluided">
                <div class="row m-0 mb-3">
                    <a href="{{ route('provides.index', $workspacename) }}">
                        <button type="button" class="btn-save-print rounded d-flex align-items-center h-100"
                            style="margin-right:10px">
                            <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z"
                                    fill="#6D7075"></path>
                            </svg>
                            <span>Hủy</span>
                        </button>
                    </a>

                    <button type="submit" class="custom-btn d-flex align-items-center h-100" style="margin-right:10px">
                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="12" height="14"
                            viewBox="0 0 12 14" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.75 0V5.75C4.75 6.5297 5.34489 7.17045 6.10554 7.24313L6.25 7.25H12V12C12 13.1046 11.1046 14 10 14H2C0.89543 14 0 13.1046 0 12V2C0 0.89543 0.89543 0 2 0H4.75ZM6 0L12 6.03022H7C6.44772 6.03022 6 5.5825 6 5.03022V0Z"
                                fill="white"></path>
                        </svg>
                        <span>Lưu nhà cung cấp</span>
                    </button>

                    <a href="#" class="d-flex aligin-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                                fill="#26273B" fill-opacity="0.8" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                                fill="#26273B" fill-opacity="0.8" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="content-wrapper1 py-0 pl-0 px-0">
        <div class="container-fluided">
            <div class="tab-content">
                <div id="info" class="content tab-pane in active">
                    <div class="bg-filter-search border-bottom-0 text-left py-2">
                        <span class="font-weight-bold text-secondary text-nav ml-4">THÔNG TIN SẢN PHẨM</span>
                    </div>
                    <div class="content-info">
                        <div class="d-flex ml-2 align-items-center">
                            <div class="title-info py-2 border border-left-0">
                                <p class="p-0 m-0 px-4 btn-sort text-secondary text-nav">Tên hiển thị</p>
                            </div>
                            <input type="text" required placeholder="Nhập thông tin" name="provide_name_display"
                                class="border w-100 py-2 border-left-0 border-right-0 px-3">
                        </div>
                        <div class="d-flex ml-2 align-items-center">
                            <div class="title-info py-2 border border-top-0 border-left-0">
                                <p class="p-0 m-0 px-4 btn-sort text-secondary text-nav">Mã số thuế</p>
                            </div>
                            <input type="text" required placeholder="Nhập thông tin" name="provide_code"
                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                        </div>
                        <div class="d-flex ml-2 align-items-center">
                            <div class="title-info py-2 border border-top-0 border-left-0">
                                <p class="p-0 m-0 px-4 btn-sort text-secondary text-nav">Địa chỉ</p>
                            </div>
                            <input type="text" required placeholder="Nhập thông tin" name="provide_address"
                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                        </div>
                        <div class="d-flex ml-2 align-items-center">
                            <div class="title-info py-2 border border-top-0 border-left-0">
                                <p class="p-0 m-0 px-4 btn-sort text-secondary text-nav">Tên viết tắt</p>
                            </div>
                            <input type="text" placeholder="Nhập thông tin" name="key"
                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                        </div>
                        <div class="d-flex ml-2 align-items-center">
                            <div class="title-info py-2 border border-top-0 border-left-0">
                                <p class="p-0 m-0 px-4 btn-sort text-secondary text-nav">Tên đầy đủ</p>
                            </div>
                            <input type="text" placeholder="Nhập thông tin" name="provide_name"
                                class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Thông tin đại diện --}}
    <div class="content-wrapper1 py-0 pl-0 px-0">
        <div class="container-fluided">
            <div class="tab-content">
                <div id="info" class="content tab-pane in active">
                    <div class="bg-filter-search border-bottom-0 text-left py-2">
                        <span class="font-weight-bold text-secondary text-nav ml-4">THÔNG TIN NGƯỜI ĐẠI DIỆN</span>
                    </div>
                    <div class="content-info">
                        <div class="d-flex align-items-center">
                            <table class="table table-hover" id="listrepesent">
                                <thead>
                                    <tr>
                                        <th class="border-right border-left btn-sort text-secondary text-nav"
                                            style="width:23%;"><span class="ml-3">Người đại diện</span>
                                        </th>
                                        <th class="border-right btn-sort text-secondary text-nav" style="width:15%;">
                                            Số điện thoại
                                        </th>
                                        <th class="border-right btn-sort text-secondary text-nav" style="width:20%;">
                                            Email</th>

                                        <th class="border-right btn-sort text-secondary text-nav" style="">
                                            Địa chỉ nhận
                                        </th>
                                        <th class="border-right btn-sort text-secondary text-nav" style="width:5%;">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="ml-3">
                        <span class="text-perpage">
                            <section class="content">
                                <div class="container-fluided">
                                    <div class="d-flex">
                                        <button type="button" data-toggle="dropdown"
                                            class="btn-save-print d-flex align-items-center h-100" id="addRowRepesent"
                                            style="margin-right:10px">
                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="14"
                                                height="14" viewBox="0 0 18 18" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                                    fill="#42526E"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                                    fill="#42526E"></path>
                                            </svg>
                                            <span class="text-table">Thêm người đại diện</span>
                                        </button>

                                        <button class="btn-option py-1 px-2 bg-white border-0">
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
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
<script src="{{ asset('/dist/js/import.js') }}"></script>
<script src="{{ asset('/dist/js/products.js') }}"></script>
<script>
    getKeyProvide($('input[name="provide_name_display"]'))
</script>
