<x-navbar :title="$title" activeGroup="systemFirst" activeName="users"></x-navbar>
<form action="{{ route('users.update', ['workspace' => $workspacename, 'user' => $user->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="content-wrapper m-0">
        <div class="content-header-fixed p-0">
            <div class="content__header--inner">
                <div class="content__heading--left text-long-special">
                    <span class="ml-4">Thiết lập ban đầu</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span>
                        <a class="text-dark" href="{{ route('users.index', ['workspace' => $workspacename]) }}">Nhân
                            viên</a>
                    </span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                                fill="#26273B" fill-opacity="0.8" />
                        </svg>
                    </span>
                    <span class="font-weight-bold">{{ $title }}</span>
                </div>
                <div class="d-flex content__heading--right">
                    <div class="row m-0">
                        <div class="dropdown">
                            <a href="{{ route('users.index', ['workspace' => $workspacename]) }}">
                                <button type="button" class="btn-save-print d-flex align-items-center h-100 rounded"
                                    style="margin-right:10px;">
                                    <svg class="mx-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2.96967 2.96967C3.26256 2.67678 3.73744 2.67678 4.03033 2.96967L8 6.939L11.9697 2.96967C12.2626 2.67678 12.7374 2.67678 13.0303 2.96967C13.3232 3.26256 13.3232 3.73744 13.0303 4.03033L9.061 8L13.0303 11.9697C13.2966 12.2359 13.3208 12.6526 13.1029 12.9462L13.0303 13.0303C12.7374 13.3232 12.2626 13.3232 11.9697 13.0303L8 9.061L4.03033 13.0303C3.73744 13.3232 3.26256 13.3232 2.96967 13.0303C2.67678 12.7374 2.67678 12.2626 2.96967 11.9697L6.939 8L2.96967 4.03033C2.7034 3.76406 2.6792 3.3474 2.89705 3.05379L2.96967 2.96967Z"
                                            fill="#6D7075"></path>
                                    </svg>
                                    <span class="text-button">Hủy</span>
                                </button>
                            </a>
                        </div>
                        <button type="submit" class="custom-btn d-flex align-items-center h-100"
                            style="margin-right:10px">
                            <svg class="mx-1" width="18" height="18" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.75 1V6.75C6.75 7.5297 7.34489 8.17045 8.10554 8.24313L8.25 8.25H14V13C14 14.1046 13.1046 15 12 15H4C2.89543 15 2 14.1046 2 13V3C2 1.89543 2.89543 1 4 1H6.75ZM8 1L14 7.03022H9C8.44772 7.03022 8 6.5825 8 6.03022V1Z"
                                    fill="white" />
                            </svg>
                            <p class="m-0 ml-1">Lưu nhân viên</p>
                        </button>
                        {{-- <div>
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
                        </div> --}}
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
                                    <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 margin-left32 text-13-black">Chọn nhóm đối tượng</p>
                                    </div>
                                    <select name="grouptype_id" id="grouptypeSelect"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100 bg-input-guest-blue">
                                        <option value="0">Chưa chọn nhóm</option>
                                        @foreach ($groups as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($user->group_id == $item->id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info height-100 py-2 border border-left-0">
                                        <p class="p-0 m-0 required-label margin-left32 text-13-red">Mã nhân viên</p>
                                    </div>
                                    <input type="text" required placeholder="Nhập thông tin" name="user_code"
                                        class="border w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100 bg-input-guest-blue"
                                        value="{{ $user->user_code }}">
                                </div>
                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info height-100 py-2 border border-left-0">
                                        <p class="p-0 m-0 required-label margin-left32 text-13-red">Tên</p>
                                    </div>
                                    <input type="text" required placeholder="Nhập thông tin" name="name"
                                        class="border w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100 bg-input-guest-blue"
                                        value="{{ $user->name }}">
                                </div>
                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 margin-left32 text-13-red required-label">Chức vụ</p>
                                    </div>
                                    <select name="role_id" id="roleSelect"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100 bg-input-guest-blue">
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
                                        <p class="p-0 m-0 margin-left32 text-13-black">Email(Tài khoản
                                            đăng
                                            nhập)</p>
                                    </div>
                                    <input type="email" placeholder="Nhập thông tin" name="email"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100 bg-input-guest-blue"
                                        value="{{ $user->email }}">
                                </div>
                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 margin-left32 text-13-black">Mật khẩu</p>
                                    </div>
                                    <input type="password" placeholder="Nhập thông tin" name="password"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100 bg-input-guest-blue"
                                        value="{{ old('password') ? old('password') : '' }}">
                                </div>
                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 margin-left32 text-13-black">Địa chỉ</p>
                                    </div>
                                    <input type="text" placeholder="Nhập thông tin" name="address"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100 bg-input-guest-blue"
                                        value="{{ $user->address }}">
                                </div>
                                <div class="d-flex align-items-center height-60-mobile">
                                    <div class="title-info height-100 py-2 border border-top-0 border-left-0">
                                        <p class="p-0 m-0 margin-left32 text-13-black">Điện thoại</p>
                                    </div>
                                    <input type="text" oninput="validateInput(this)" placeholder="Nhập thông tin"
                                        name="phone_number"
                                        class="border border-top-0 w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100 bg-input-guest-blue"
                                        value="{{ $user->phone_number }}">
                                </div>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
