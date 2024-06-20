<x-navbar-setting title="Nhân viên" activeName="users"></x-navbar-setting>
<div class="content-wrapper m-0 min-height--none">
    <div class="content-header-fixed p-0 m-0 border-bottom-0">
        <div class="content__header--inner margin-left32">
            <div class="content__heading--left">
                <span class="font-weight-bold text-secondary">Nhân viên</span>
            </div>
            <div class="d-flex content__heading--right">
                <div class="row m-0">
                    <a href="{{ route('users.create') }}" class="activity mr-3" data-name1="BG" data-des="Tạo mới">
                        <button type="button" class="custom-btn mx-1 d-flex align-items-center h-100">
                            <svg class="mr-1" width="12" height="12" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                    fill="white" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                    fill="white" />
                            </svg>
                            <p class="m-0 ml-1">Tạo mới</p>
                        </button>
                    </a>
                    {{-- <button type="button" class="btn-option bg-white border-0">
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
                    </button> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="content-filter-all">
        <div class="bg-filter-search pl-4 border-bottom-0">
            <div class="content-wrapper1 py-2">
                <div class="row m-auto filter p-0">
                    <div class="w-100">
                        <div class="row mr-0">
                            <div class="col-md-5 d-flex align-items-center">
                                <form action="" method="get" id="search-filter" class="p-0 m-0">
                                    <div class="position-relative ml-1">
                                        <input type="text" placeholder="Tìm kiếm" id="search" name="keywords"
                                            style="outline: none;" class="pr-4 w-100 input-search text-13"
                                            value="{{ request()->keywords }}" />
                                        <span id="search-icon" class="search-icon">
                                            <i class="fas fa-search btn-submit"></i>
                                        </span>
                                        <input class="btn-submit" type="submit" id="hidden-submit" name="hidden-submit"
                                            style="display: none;" />
                                    </div>
                                </form>
                                <div class="dropdown mx-2 filter-all">
                                    <button class="btn-filter_search" data-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
                                            <path
                                                d="M12.9548 3H10.0457C9.74445 3 9.50024 3.24421 9.50024 3.54545V6.45455C9.50024 6.75579 9.74445 7 10.0457 7H12.9548C13.256 7 13.5002 6.75579 13.5002 6.45455V3.54545C13.5002 3.24421 13.256 3 12.9548 3Z"
                                                fill="#6D7075" />
                                            <path
                                                d="M6.45455 3H3.54545C3.24421 3 3 3.24421 3 3.54545V6.45455C3 6.75579 3.24421 7 3.54545 7H6.45455C6.75579 7 7 6.75579 7 6.45455V3.54545C7 3.24421 6.75579 3 6.45455 3Z"
                                                fill="#6D7075" />
                                            <path
                                                d="M6.45455 9.50024H3.54545C3.24421 9.50024 3 9.74445 3 10.0457V12.9548C3 13.256 3.24421 13.5002 3.54545 13.5002H6.45455C6.75579 13.5002 7 13.256 7 12.9548V10.0457C7 9.74445 6.75579 9.50024 6.45455 9.50024Z"
                                                fill="#6D7075" />
                                            <path
                                                d="M12.9548 9.50024H10.0457C9.74445 9.50024 9.50024 9.74445 9.50024 10.0457V12.9548C9.50024 13.256 9.74445 13.5002 10.0457 13.5002H12.9548C13.256 13.5002 13.5002 13.256 13.5002 12.9548V10.0457C13.5002 9.74445 13.256 9.50024 12.9548 9.50024Z"
                                                fill="#6D7075" />
                                        </svg>
                                        <span class="text-btnIner">Bộ lọc</span>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.42342 6.92342C5.65466 6.69219 6.02956 6.69219 6.26079 6.92342L9 9.66264L11.7392 6.92342C11.9704 6.69219 12.3453 6.69219 12.5766 6.92342C12.8078 7.15466 12.8078 7.52956 12.5766 7.76079L9.41868 10.9187C9.18745 11.1499 8.81255 11.1499 8.58132 10.9187L5.42342 7.76079C5.19219 7.52956 5.19219 7.15466 5.42342 6.92342Z"
                                                fill="#6B6F76" />
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu" id="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                        style="z-index:">
                                        <div class="search-container px-2">
                                            <input type="text" placeholder="Tìm kiếm" id="myInput" class="text-13"
                                                onkeyup="filterFunction()" style="outline: none;">
                                            <span class="search-icon mr-2">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </div>
                                        <div class="scrollbar">
                                            <button class="dropdown-item btndropdown text-13-black" id="btn-date"
                                                data-button="date" type="button">Ngày bán hàng
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black" id="btn-quotenumber"
                                                data-button="quotenumber" type="button">Số báo
                                                giá
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black"
                                                id="btn-reference_number" data-button="reference_number"
                                                type="button">Số tham chiếu
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black" id="btn-guests"
                                                data-button="guests" type="button">Khách hàng
                                            </button>
                                            @can('isAdmin')
                                                <button class="dropdown-item btndropdown text-13-black" id="btn-users"
                                                    data-button="users" type="button">Người tạo
                                                </button>
                                            @endcan
                                            <button class="dropdown-item btndropdown text-13-black" id="btn-receive"
                                                data-button="receive" type="button">Giao hàng
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black" id="btn-reciept"
                                                data-button="reciept" type="button">Hoá đơn
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black" id="btn-pay"
                                                data-button="pay" type="button">Thanh toán
                                            </button>
                                            <button class="dropdown-item btndropdown text-13-black" id="btn-total"
                                                data-button="total" type="button">
                                                Tổng tiền
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content margin-top-75">
        <section class="content">
            <div class="container-fluided">
                <div class="row result-filter-detailExport margin-left30 my-1">
                </div>
                <div class="row">
                    <div class="col-md-12 p-0 m-0 pl-2">
                        <div class="card">
                            <div class="outer2 text-nowrap">
                                <table id="example2" class="table table-hover bg-white rounded">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width:5%;padding-left: 2rem;"
                                                class="height-52">
                                                <input type="checkbox" name="all" id="checkall">
                                            </th>
                                            <th scope="col" class="height-52">
                                                <span class="d-flex justify-content-start">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="quotation_number" data-sort-type="DESC">
                                                        <button class="btn-sort text-13" type="submit">
                                                            Tên nhân viên#
                                                        </button>
                                                    </a>
                                                    <div class="icon" id="icon-quotation_number"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52">
                                                <span class="d-flex justify-content-start">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="ngayBG" data-sort-type="DESC">
                                                        <button class="btn-sort text-13" type="submit">
                                                            Email
                                                        </button>
                                                    </a>
                                                    <div class="icon" id="icon-ngayBG"></div>
                                                </span>
                                            </th>
                                            <th scope="col" class="height-52">
                                                <span class="d-flex justify-content-start">
                                                    <a href="#" class="sort-link btn-submit"
                                                        data-sort-by="guest_name_display"
                                                        data-sort-type="DESC"><button class="btn-sort text-13"
                                                            type="submit">Ngày tạo</button>
                                                    </a>
                                                    <div class="icon" id="icon-guest_name_display"></div>
                                                </span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody-detailExport">
                                        @foreach ($users as $value)
                                            @if ($value->id == Auth::user()->id || Auth::user()->roleid == 1)
                                                <tr class="position-relative detailExport-info height-52">
                                                    <td class="text-13-black border-top-0 border-bottom">
                                                        <span class="margin-Right10">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="6"
                                                                height="10" viewBox="0 0 6 10" fill="none">
                                                                <g clip-path="url(#clip0_1710_10941)">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z"
                                                                        fill="#282A30" />
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_1710_10941">
                                                                        <rect width="6" height="10"
                                                                            fill="white" />
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        </span>
                                                        <input type="checkbox" class="checkall-btn p-0 m-0"
                                                            name="ids[]" id="checkbox" value=""
                                                            onclick="event.stopPropagation();">
                                                    </td>
                                                    <td class="text-13-black border-top-0 border-bottom">
                                                        {{ $value->name }}
                                                    </td>
                                                    <td class="text-13-black border-top-0 border-bottom">
                                                        {{ $value->email }}
                                                    </td>
                                                    <td class="text-13-black border-top-0 border-bottom">
                                                        {{ $value->created_at }}
                                                    </td>
                                                    <td
                                                        class="position-absolute m-0 p-0 border-0 bg-hover-icon icon-center">
                                                        <div class="d-flex w-100">
                                                            <a href="{{ route('users.edit', $value->id) }}">
                                                                <div class="m-0 px-2 py-1 mx-2 rounded activity"
                                                                    data-name1="BG" data-des="Xem đơn báo giá">
                                                                    <svg width="16" height="16"
                                                                        viewBox="0 0 16 16" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path opacity="0.985" fill-rule="evenodd"
                                                                            clip-rule="evenodd"
                                                                            d="M11.1719 1.04696C11.7535 0.973552 12.2743 1.11418 12.7344 1.46883C13.001 1.72498 13.2562 1.9906 13.5 2.26571C13.9462 3.00226 13.9358 3.73143 13.4688 4.45321C10.9219 7.04174 8.35416 9.60946 5.76563 12.1563C5.61963 12.245 5.46338 12.3075 5.29688 12.3438C4.59413 12.4153 3.891 12.483 3.1875 12.547C2.61265 12.4982 2.32619 12.1857 2.32813 11.6095C2.3716 10.8447 2.44972 10.0843 2.5625 9.32821C2.60666 9.22943 2.65874 9.13568 2.71875 9.04696C5.26563 6.50008 7.8125 3.95321 10.3594 1.40633C10.6073 1.22846 10.8781 1.10867 11.1719 1.04696ZM11.3594 2.04696C11.5998 2.02471 11.8185 2.08201 12.0156 2.21883C12.2188 2.42196 12.4219 2.62508 12.625 2.82821C12.8393 3.14436 12.8497 3.4673 12.6562 3.79696C12.4371 4.02136 12.2131 4.24011 11.9844 4.45321C11.4427 3.93236 10.9115 3.40111 10.3906 2.85946C10.5933 2.64116 10.8016 2.42762 11.0156 2.21883C11.1255 2.14614 11.2401 2.08885 11.3594 2.04696ZM9.60938 3.60946C10.1552 4.13961 10.6968 4.67608 11.2344 5.21883C9.21353 7.23968 7.19272 9.26049 5.17188 11.2813C4.571 11.3686 3.96684 11.4364 3.35938 11.4845C3.41572 10.8909 3.473 10.2971 3.53125 9.70321C5.56359 7.67608 7.58962 5.64483 9.60938 3.60946Z"
                                                                            fill="#6C6F74" />
                                                                        <path opacity="0.979" fill-rule="evenodd"
                                                                            clip-rule="evenodd"
                                                                            d="M1.17188 14.1406C5.71356 14.1354 10.2552 14.1406 14.7969 14.1563C15.0348 14.2355 15.1598 14.4022 15.1719 14.6563C15.147 14.915 15.0116 15.0816 14.7656 15.1563C10.2448 15.1771 5.72397 15.1771 1.20312 15.1563C0.807491 14.9903 0.708531 14.7143 0.90625 14.3281C0.978806 14.2377 1.06735 14.1752 1.17188 14.1406Z"
                                                                            fill="#6C6F74" />
                                                                    </svg>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="m-0 mx-2 rounded">
                                                                    <form
                                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                                        action="{{ route('users.destroy', $value->id) }}"
                                                                        method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-sm">
                                                                            <svg width="16" height="16"
                                                                                viewBox="0 0 16 16" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path opacity="0.936"
                                                                                    fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M6.40625 0.968766C7.44813 0.958304 8.48981 0.968772 9.53125 1.00016C9.5625 1.03156 9.59375 1.06296 9.625 1.09436C9.65625 1.49151 9.66663 1.88921 9.65625 2.28746C10.7189 2.277 11.7814 2.28747 12.8438 2.31886C12.875 2.35025 12.9063 2.38165 12.9375 2.41305C12.9792 2.99913 12.9792 3.58522 12.9375 4.17131C12.9063 4.24457 12.8542 4.2969 12.7813 4.32829C12.6369 4.35948 12.4911 4.36995 12.3438 4.35969C12.3542 7.45762 12.3438 10.5555 12.3125 13.6533C12.1694 14.3414 11.7632 14.7914 11.0938 15.0034C9.01044 15.0453 6.92706 15.0453 4.84375 15.0034C4.17433 14.7914 3.76808 14.3414 3.625 13.6533C3.59375 10.5555 3.58333 7.45762 3.59375 4.35969C3.3794 4.3844 3.18148 4.34254 3 4.2341C2.95833 3.62708 2.95833 3.02007 3 2.41305C3.03125 2.38165 3.0625 2.35025 3.09375 2.31886C4.15605 2.28747 5.21855 2.277 6.28125 2.28746C6.27088 1.88921 6.28125 1.49151 6.3125 1.09436C6.35731 1.06018 6.38856 1.01832 6.40625 0.968766ZM6.96875 1.65951C7.63544 1.65951 8.30206 1.65951 8.96875 1.65951C8.96875 1.86882 8.96875 2.07814 8.96875 2.28746C8.30206 2.28746 7.63544 2.28746 6.96875 2.28746C6.96875 2.07814 6.96875 1.86882 6.96875 1.65951ZM3.65625 2.9782C6.53125 2.9782 9.40625 2.9782 12.2813 2.9782C12.2813 3.18752 12.2813 3.39684 12.2813 3.60615C9.40625 3.60615 6.53125 3.60615 3.65625 3.60615C3.65625 3.39684 3.65625 3.18752 3.65625 2.9782ZM4.34375 4.35969C6.76044 4.35969 9.17706 4.35969 11.5938 4.35969C11.6241 7.5032 11.5929 10.643 11.5 13.7789C11.3553 14.05 11.1366 14.2279 10.8438 14.3127C8.92706 14.3546 7.01044 14.3546 5.09375 14.3127C4.80095 14.2279 4.5822 14.05 4.4375 13.7789C4.34462 10.643 4.31337 7.5032 4.34375 4.35969Z"
                                                                                    fill="#6C6F74" />
                                                                                <path opacity="0.891"
                                                                                    fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M5.78125 5.28118C6.0306 5.2259 6.20768 5.30924 6.3125 5.53118C6.35419 8.052 6.35419 10.5729 6.3125 13.0937C6.08333 13.427 5.85417 13.427 5.625 13.0937C5.58333 10.552 5.58333 8.01037 5.625 5.46868C5.69031 5.4141 5.7424 5.3516 5.78125 5.28118Z"
                                                                                    fill="#6C6F74" />
                                                                                <path opacity="0.891"
                                                                                    fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M7.78125 5.28118C8.03063 5.2259 8.20769 5.30924 8.3125 5.53118C8.35419 8.052 8.35419 10.5729 8.3125 13.0937C8.08331 13.427 7.85419 13.427 7.625 13.0937C7.58331 10.552 7.58331 8.01037 7.625 5.46868C7.69031 5.4141 7.74238 5.3516 7.78125 5.28118Z"
                                                                                    fill="#6C6F74" />
                                                                                <path opacity="0.891"
                                                                                    fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M9.78125 5.28118C10.0306 5.2259 10.2077 5.30924 10.3125 5.53118C10.3542 8.052 10.3542 10.5729 10.3125 13.0937C10.0833 13.427 9.85419 13.427 9.625 13.0937C9.58331 10.552 9.58331 8.01037 9.625 5.46868C9.69031 5.4141 9.74238 5.3516 9.78125 5.28118Z"
                                                                                    fill="#6C6F74" />
                                                                            </svg>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="menu bg-hover rounded"
    style="display: none; background: #ffffff; position: absolute; width:13%;  padding: 3px 10px;  box-shadow: 0 0 10px -3px rgba(0, 0, 0, .3);   border: 1px solid #ccc;">
    <a href="#" class="text-dark">
        <p class="quickAction p-2 rounded my-1 text-13-black" data-type="payorder" data-toggle="modal"
            data-target="#exampleModal">
            <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                    fill="none">
                    <g clip-path="url(#clip0_5715_15670)">
                        <path
                            d="M5.71429 3.23868H4.64286C4.07454 3.23868 3.52949 3.45947 3.12763 3.85247C2.72576 4.24547 2.5 4.77849 2.5 5.33427V16.3361C2.5 16.8919 2.72576 17.4249 3.12763 17.8179C3.52949 18.2109 4.07454 18.4317 4.64286 18.4317H15.3571C15.9255 18.4317 16.4705 18.2109 16.8724 17.8179C17.2742 17.4249 17.5 16.8919 17.5 16.3361V5.33427C17.5 4.77849 17.2742 4.24547 16.8724 3.85247C16.4705 3.45947 15.9255 3.23868 15.3571 3.23868H14.2857V4.28648H15.3571C15.6413 4.28648 15.9138 4.39687 16.1148 4.59337C16.3157 4.78987 16.4286 5.05638 16.4286 5.33427V16.3361C16.4286 16.614 16.3157 16.8805 16.1148 17.077C15.9138 17.2735 15.6413 17.3839 15.3571 17.3839H4.64286C4.3587 17.3839 4.08617 17.2735 3.88524 17.077C3.68431 16.8805 3.57143 16.614 3.57143 16.3361V5.33427C3.57143 5.05638 3.68431 4.78987 3.88524 4.59337C4.08617 4.39687 4.3587 4.28648 4.64286 4.28648H5.71429V3.23868Z"
                            fill="#26273B" fill-opacity="0.8" />
                        <path
                            d="M11.6071 2.71479C11.7492 2.71479 11.8855 2.76998 11.986 2.86823C12.0864 2.96648 12.1429 3.09974 12.1429 3.23868V4.28648C12.1429 4.42542 12.0864 4.55868 11.986 4.65693C11.8855 4.75518 11.7492 4.81037 11.6071 4.81037H8.39286C8.25078 4.81037 8.11452 4.75518 8.01405 4.65693C7.91358 4.55868 7.85714 4.42542 7.85714 4.28648V3.23868C7.85714 3.09974 7.91358 2.96648 8.01405 2.86823C8.11452 2.76998 8.25078 2.71479 8.39286 2.71479H11.6071ZM8.39286 1.66699C7.96662 1.66699 7.55783 1.83258 7.25644 2.12733C6.95504 2.42208 6.78571 2.82185 6.78571 3.23868V4.28648C6.78571 4.70332 6.95504 5.10308 7.25644 5.39783C7.55783 5.69258 7.96662 5.85817 8.39286 5.85817H11.6071C12.0334 5.85817 12.4422 5.69258 12.7436 5.39783C13.045 5.10308 13.2143 4.70332 13.2143 4.28648V3.23868C13.2143 2.82185 13.045 2.42208 12.7436 2.12733C12.4422 1.83258 12.0334 1.66699 11.6071 1.66699H8.39286Z"
                            fill="#26273B" fill-opacity="0.8" />
                        <path
                            d="M6.78571 12.7622C6.90018 13.7603 7.95588 14.4686 9.56302 14.5603V15.2883H10.3697V14.5603C12.1253 14.4531 13.2143 13.6993 13.2143 12.5844C13.2143 11.6324 12.4819 11.0816 10.9281 10.7714L10.3697 10.6595V8.38305C11.2375 8.44892 11.8229 8.81055 11.9706 9.35062H13.1076C12.9792 8.39263 11.9165 7.70528 10.3697 7.62924V6.90596H9.56302V7.64421C8.06339 7.78192 7.03398 8.52555 7.03398 9.53383C7.03398 10.4044 7.78109 11.0205 9.09202 11.2804L9.5638 11.3774V13.7909C8.67515 13.6891 8.06339 13.3119 7.91566 12.7622H6.78571ZM9.40834 10.4655C8.60168 10.308 8.17089 9.97151 8.17089 9.49791C8.17089 8.9327 8.71537 8.51538 9.56302 8.40341V10.496L9.40834 10.4655ZM10.6388 11.5863C11.6342 11.7797 12.0712 12.1006 12.0712 12.6455C12.0712 13.3023 11.4324 13.74 10.3697 13.8064V11.5342L10.6388 11.5863Z"
                            fill="#26273B" fill-opacity="0.8" />
                        <path
                            d="M5.71429 3.23868H4.64286C4.07454 3.23868 3.52949 3.45947 3.12763 3.85247C2.72576 4.24547 2.5 4.77849 2.5 5.33427V16.3361C2.5 16.8919 2.72576 17.4249 3.12763 17.8179C3.52949 18.2109 4.07454 18.4317 4.64286 18.4317H15.3571C15.9255 18.4317 16.4705 18.2109 16.8724 17.8179C17.2742 17.4249 17.5 16.8919 17.5 16.3361V5.33427C17.5 4.77849 17.2742 4.24547 16.8724 3.85247C16.4705 3.45947 15.9255 3.23868 15.3571 3.23868H14.2857V4.28648H15.3571C15.6413 4.28648 15.9138 4.39687 16.1148 4.59337C16.3157 4.78987 16.4286 5.05638 16.4286 5.33427V16.3361C16.4286 16.614 16.3157 16.8805 16.1148 17.077C15.9138 17.2735 15.6413 17.3839 15.3571 17.3839H4.64286C4.3587 17.3839 4.08617 17.2735 3.88524 17.077C3.68431 16.8805 3.57143 16.614 3.57143 16.3361V5.33427C3.57143 5.05638 3.68431 4.78987 3.88524 4.59337C4.08617 4.39687 4.3587 4.28648 4.64286 4.28648H5.71429V3.23868Z"
                            stroke="#26273B" stroke-opacity="0.8" stroke-width="0.1" />
                        <path
                            d="M11.6071 2.71479C11.7492 2.71479 11.8855 2.76998 11.986 2.86823C12.0864 2.96648 12.1429 3.09974 12.1429 3.23868V4.28648C12.1429 4.42542 12.0864 4.55868 11.986 4.65693C11.8855 4.75518 11.7492 4.81037 11.6071 4.81037H8.39286C8.25078 4.81037 8.11452 4.75518 8.01405 4.65693C7.91358 4.55868 7.85714 4.42542 7.85714 4.28648V3.23868C7.85714 3.09974 7.91358 2.96648 8.01405 2.86823C8.11452 2.76998 8.25078 2.71479 8.39286 2.71479H11.6071ZM8.39286 1.66699C7.96662 1.66699 7.55783 1.83258 7.25644 2.12733C6.95504 2.42208 6.78571 2.82185 6.78571 3.23868V4.28648C6.78571 4.70332 6.95504 5.10308 7.25644 5.39783C7.55783 5.69258 7.96662 5.85817 8.39286 5.85817H11.6071C12.0334 5.85817 12.4422 5.69258 12.7436 5.39783C13.045 5.10308 13.2143 4.70332 13.2143 4.28648V3.23868C13.2143 2.82185 13.045 2.42208 12.7436 2.12733C12.4422 1.83258 12.0334 1.66699 11.6071 1.66699H8.39286Z"
                            stroke="#26273B" stroke-opacity="0.8" stroke-width="0.1" />
                        <path
                            d="M6.78571 12.7622C6.90018 13.7603 7.95588 14.4686 9.56302 14.5603V15.2883H10.3697V14.5603C12.1253 14.4531 13.2143 13.6993 13.2143 12.5844C13.2143 11.6324 12.4819 11.0816 10.9281 10.7714L10.3697 10.6595V8.38305C11.2375 8.44892 11.8229 8.81055 11.9706 9.35062H13.1076C12.9792 8.39263 11.9165 7.70528 10.3697 7.62924V6.90596H9.56302V7.64421C8.06339 7.78192 7.03398 8.52555 7.03398 9.53383C7.03398 10.4044 7.78109 11.0205 9.09202 11.2804L9.5638 11.3774V13.7909C8.67515 13.6891 8.06339 13.3119 7.91566 12.7622H6.78571ZM9.40834 10.4655C8.60168 10.308 8.17089 9.97151 8.17089 9.49791C8.17089 8.9327 8.71537 8.51538 9.56302 8.40341V10.496L9.40834 10.4655ZM10.6388 11.5863C11.6342 11.7797 12.0712 12.1006 12.0712 12.6455C12.0712 13.3023 11.4324 13.74 10.3697 13.8064V11.5342L10.6388 11.5863Z"
                            stroke="#26273B" stroke-opacity="0.8" stroke-width="0.1" />
                    </g>
                    <defs>
                        <clipPath id="clip0_5715_15670">
                            <rect width="20" height="20" rx="4" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
            </span>
            <span class="title_payment">Tạo đơn thanh toán</span>
        </p>
    </a>
</div>
<x-user-flow></x-user-flow>
<script src="{{ asset('/dist/js/filter.js') }}"></script>
</body>

</html>