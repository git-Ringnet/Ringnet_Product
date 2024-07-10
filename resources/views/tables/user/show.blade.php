<x-navbar :title="$title" activeGroup="systemFirst" activeName="users"></x-navbar>
<form action="#" method="POST" id="formSubmit" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="content editGuest min-height--none">
        <div class="content-header-fixed p-0">
            <div class="content__header--inner">
                <div class="content__heading--left">
                    <span class="ml-4">Thiết lập ban đầu</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="nearLast-span">
                        <a class="text-dark" href="{{ route('users.index', ['workspace' => $workspacename]) }}">Nhân
                            viên
                        </a>
                    </span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="last-span">{{ $title }}</span>
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <div class="dropdown">
                            <a href="{{ route('users.index', ['workspace' => $workspacename]) }}" class="activity"
                                data-name1="KH" data-des="Trở về">
                                <button type="button" class="btn-save-print d-flex align-items-center h-100 rounded"
                                    style="margin-right:10px;">
                                    <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">
                                        <path
                                            d="M5.6738 11.4801C5.939 11.7983 6.41191 11.8413 6.73012 11.5761C7.04833 11.311 7.09132 10.838 6.82615 10.5198L5.3513 8.75H12.25C12.6642 8.75 13 8.41421 13 8C13 7.58579 12.6642 7.25 12.25 7.25L5.3512 7.25L6.82615 5.4801C7.09132 5.1619 7.04833 4.689 6.73012 4.4238C6.41191 4.1586 5.939 4.2016 5.6738 4.5198L3.1738 7.51984C2.942 7.79798 2.942 8.20198 3.1738 8.48012L5.6738 11.4801Z"
                                            fill="#6D7075" />
                                    </svg>
                                    <span class="text-button">Trở về</span>
                                </button>
                            </a>
                        </div>
                        <a class="activity" data-name1="KH" data-des="Xem trang sửa"
                            href="{{ route('users.edit', ['workspace' => $workspacename, 'user' => $user->id]) }}">
                            <button type="button" class="custom-btn d-flex align-items-center h-100 mx-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none">
                                    <path
                                        d="M4.75 2.00007C2.67893 2.00007 1 3.679 1 5.75007V11.25C1 13.3211 2.67893 15 4.75 15H10.2501C12.3212 15 14.0001 13.3211 14.0001 11.25V8.00007C14.0001 7.58586 13.6643 7.25007 13.2501 7.25007C12.8359 7.25007 12.5001 7.58586 12.5001 8.00007V11.25C12.5001 12.4927 11.4927 13.5 10.2501 13.5H4.75C3.50736 13.5 2.5 12.4927 2.5 11.25V5.75007C2.5 4.50743 3.50736 3.50007 4.75 3.50007H7C7.41421 3.50007 7.75 3.16428 7.75 2.75007C7.75 2.33586 7.41421 2.00007 7 2.00007H4.75Z"
                                        fill="white" />
                                    <path
                                        d="M12.1339 5.19461L10.7197 3.7804L6.52812 7.97196C5.77185 8.72823 5.25635 9.69144 5.0466 10.7402C5.03144 10.816 5.09828 10.8828 5.17409 10.8677C6.22285 10.6579 7.18606 10.1424 7.94233 9.38618L12.1339 5.19461Z"
                                        fill="white" />
                                    <path
                                        d="M13.4559 1.45679C13.2663 1.39356 13.0571 1.44293 12.9158 1.58431L11.7803 2.71974L13.1945 4.13395L14.33 2.99852C14.4714 2.85714 14.5207 2.64802 14.4575 2.45834C14.2999 1.98547 13.9288 1.61441 13.4559 1.45679Z"
                                        fill="white" />
                                </svg>
                                <span class="text-btnIner-primary ml-2">Sửa</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content margin-top-75">
            <div class="content">
                <div class="tab-content mt-3">
                    <div id="info" class="content tab-pane in active">
                        {{-- THÔNG TIN CHUNG --}}
                        <div class="bg-filter-search border-0 text-left border-custom">
                            <p class="font-weight-bold text-uppercase info-chung--heading text-left">THÔNG TIN CHUNG</p>
                        </div>
                        <div class="info-chung">
                            <div class="content-info">
                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info height-100 py-2 border border-left-0">
                                        <p class="p-0 m-0 required-label margin-left32 text-13-red">Mã nhân viên</p>
                                    </div>
                                    <input type="text" required placeholder="Nhập thông tin" name="user_code"
                                        class="border w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100"
                                        value="{{ $user->user_code }}" disabled>
                                </div>
                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info height-100 py-2 border border-left-0">
                                        <p class="p-0 m-0 required-label margin-left32 text-13-red">Tên</p>
                                    </div>
                                    <input type="text" required placeholder="Nhập thông tin" name="name"
                                        class="border w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100"
                                        value="{{ $user->name }}" disabled>
                                </div>
                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 margin-left32 text-13-red required-label">Chức vụ</p>
                                    </div>
                                    <select name="role_id" id="roleSelect"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100"
                                        disabled>
                                        <option value="0">Chọn chức vụ</option>
                                        @foreach ($roles as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($user->roleid == $item->id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 margin-left32 text-13-red required-label">Email(Tài khoản
                                            đăng
                                            nhập)</p>
                                    </div>
                                    <input type="email" required placeholder="Nhập thông tin" name="email"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100"
                                        value="{{ $user->email }}" disabled>
                                </div>
                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 margin-left32 text-13-black">Mật khẩu</p>
                                    </div>
                                    <input type="password" placeholder="Nhập thông tin" name="password"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100"
                                        value="{{ $user->password }}" disabled>
                                </div>
                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 margin-left32 text-13-black">Địa chỉ</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="address"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100"
                                        value="{{ $user->address }}" disabled>
                                </div>
                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 margin-left32 text-13-black">Điện thoại</p>
                                    </div>
                                    <input type="text" oninput="validateInput(this)" placeholder="Nhập thông tin"
                                        name="phone_number"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100"
                                        value="{{ $user->phone_number }}" disabled>
                                </div>

                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 margin-left32 text-13-black">Chọn nhóm đối tượng</p>
                                    </div>
                                    <select name="grouptype_id" id="grouptypeSelect"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100"
                                        disabled>
                                        <option value="0">Chưa chọn nhóm</option>
                                        @foreach ($groups as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($user->group_id == $item->id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
